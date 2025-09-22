<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CRM\Customers;
use App\Models\CRM\Customerpayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Carbon\Carbon;
use \Exception;
class SuperadminController extends Controller
{
    public function upload_voice(Request $request){
        $uploadedFileUrl = Cloudinary::uploadFile($request->file('audio')->getRealPath())->getSecurePath();
        return response()->json(['url' => $uploadedFileUrl]);
    }

    public function dashboard(){

        if (Auth::user()->role_type == "receptionist") {
            return view('receptionist.dashboard');
        } if (Auth::user()->role_type == "billing") {
            return view('billing.dashboard');
        }else{
        return view('superadmin.dashboard');
    }
    }


    public function cuttion_masterconfirm(Request $request, $customer_id){
        $validated = $request->validate([
            'confirmation' => 'required',
        ]);

        $customer =  Customers::findorfail($customer_id);
        $customer->allow_cutting_master = $request->confirmation;
        $customer->save();
        return redirect()->back()->with('success','Updated');
    }



    public function makepayment_customer($customer_id,Request $request) {

        $validated = $request->validate([
            'amount' => 'required',
            'payment_date' => 'required',
            'payment_mode' => 'required',
        ]);

        $customer = Customers::findorfail($customer_id);
         $total_amount = $customer->total_amount;
         $balance = $customer->balance;
         $transaction = CustomerPayment::where('customer_id',$customer_id)->sum('amount');

         $total_paid =  $transaction + $request->amount;

         if($total_paid > $balance){
            return redirect()->back()->with('error','You are entering invalid payment.');
         }else{


            $customer = Customers::findorfail($customer_id);
            $customer->payment_confirm = "complete";
            $customer->save();



            // if($total_paid == $balance){
            //     // Complete Payment

            // }


        // Fetch the customer
        $customer = Customers::find($customer_id);

        if (!$customer) {
            abort(404, 'Customer not found.');
        }

        // Convert the customer model to an array
        $row = $customer->toArray();
        $total_payment_maked = CustomerPayment::where('customer_id',$customer_id)->sum('amount');
        // Render the view as HTML for debugging
        $htmlContent = view('superadmin.pdfsendinvoice', compact('row','total_payment_maked'))->render();
        // Load the PDF with the rendered HTML
        $pdf = Pdf::loadHTML($htmlContent);



    // Prepare the file name and path
    $fileName = 'invoice_' . $customer_id . '.pdf';
    $directoryPath = storage_path('app/public/invoices');

    // Check if the directory exists, if not, create it
    if (!is_dir($directoryPath)) {
        mkdir($directoryPath, 0775, true); // Create the directory if it doesn't exist
    }

    // Define the file path
    $filePath = $directoryPath . '/' . $fileName;

    // Save the PDF to the file path
    $pdf->save($filePath);


    // Upload the PDF to the media API and get the URL
    $fileUrl = $this->uploadFileToMediaAPI($filePath);



            if ($fileUrl['status'] == "success") {
                $message = 'Welcome to SP Cotton!

Dear ' . $customer->name . ',

Thank you for your payment! We have received your payment of Rs. ' . $request->amount . ' for your recent order.

Payment Mode: ' . $request->payment_mode . '.';


                $mediaid = $fileUrl['mediaid'];
                $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://wapi.nationalsms.in/wapp/v2/api/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('apikey' => '2f233ed1a046484f9bfa0f985e4d0f0b','mobile' => '8766749080','msg' => ''.$message.'','img1' => '<http url of image>','mediaid' => ''.$mediaid.''),
));

$response = curl_exec($curl);

curl_close($curl);
 $result = json_decode($response);
            }

         $newpayment = new Customerpayment;
         $newpayment->payment_date = $request->payment_date;
         $newpayment->customer_id= $customer_id;
         $newpayment->payment_mode= $request->payment_mode;
         $newpayment->amount = $request->amount;
         $newpayment->save();
         return redirect()->back()->with('success','New Payment Entery Added');
        }
    }

    public function addcustomers(){
        return view('superadmin.addcustomers');
    }

    public function topitems(){
        return view('superadmin.topitems');
    }

    public function savecustomer(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ]);

        $customer = new Customers;
        $top = [];
        $i = 0;

        foreach ($request->top as $key => $value) {
            $top[$i]['type'] = $value['type'];
            $top[$i]['arms'] = $value['arms'];
            $top[$i]['hip'] = $value['hip'];
            $top[$i]['length'] = $value['length'];
            $top[$i]['shoulder'] = $value['shoulder'];
            $top[$i]['chest'] = $value['chest'];
            $top[$i]['belly'] = $value['belly'];
            $top[$i]['sleeve_length'] = $value['sleeve_length'];
            $top[$i]['collor'] = $value['collor'];
            $top[$i]['cuff'] = $value['cuff'];
            $top[$i]['three_foure'] = $value['three_foure'];
            $top[$i]['style'] = $value['style'];
            $i++;
        }
        $customer->top_data = json_encode($top);




        $febrics_detail = [];
        $i = 0;
        $total_quantity = 0; // Initialize total quantity

        foreach ($request->fabricsd as $key => $value) {
            $febrics_detail[$i]['fabrics'] = $value['fabrics'];
            $febrics_detail[$i]['quantity'] = $value['quantity'];
            $febrics_detail[$i]['amount'] = $value['amount'];
            $i++;
            $total_quantity += $value['quantity']; // Accumulate the quantity
        }
        $customer->febrics_detail = json_encode($febrics_detail);

        $bottom = [];
        $i = 0;
        foreach ($request->bottom as $key => $value) {
            $bottom[$i]['type'] = $value['type'];
            $bottom[$i]['length'] = $value['length'];
            $bottom[$i]['waist'] = $value['waist'];
            $bottom[$i]['hip'] = $value['hip'];
            $bottom[$i]['pockland'] = $value['pockland'];
            $bottom[$i]['thigh'] = $value['thigh'];
            $bottom[$i]['knee'] = $value['knee'];
            $bottom[$i]['potree'] = $value['potree'];
            $bottom[$i]['btm'] = $value['btm'];
            $bottom[$i]['btm'] = $value['btm'];
            $bottom[$i]['hight'] = $value['hight'];
            $bottom[$i]['style'] = $value['style'];
            $i++;
        }
        $customer->bottom_data = json_encode($bottom);
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->audioPlayer_input = $request->audioPlayer_input;
        $customer->dob = $request->dob;
        $customer->delivery_date = $request->delivery_date;


        $lastItem = DB::table('cusotmers')->orderBy('id', 'desc')->first();

        // Check if we have a record to get the last ID, or start from 0 if it's empty
        $lastId = $lastItem ? (int) $lastItem->id : 0;

        // Increment the ID for the next one
        $newId = $lastId + 1;

        // Format the ID to have leading zeros (e.g., 001, 002, ..., 990)
        $formattedId = str_pad($newId, 3, '0', STR_PAD_LEFT);

        $customer->bill_number =  $formattedId;
        $customer->order_date = $request->order_date;
        $customer->salesman_code = $request->salesman_code;
        $customer->gst = $request->gst;
        $customer->fabrics = $request->fabrics;
        $customer->quantity = $total_quantity;
        $customer->amount = $request->amount;
        $customer->total_quantity = $total_quantity;
        $customer->total_amount = $request->total_amount;
        $customer->discount = $request->discount;
        $customer->advance = $request->advance;
        $customer->advance_date = $request->advance_date;
        $customer->balance = $request->balance;
        $customer->receive = $request->receive;
        $customer->receive_date = $request->receive_date;

        if ($request->fabric_image) {
            $customer->fabric_image = uploadImage($request->fabric_image,$customer,'fabric_image');
        }
        $customer->note = $request->note;


        // $message = 'Welcome to SP Cotton! 🎉
// We\'re excited to have you join our community!
// Let us know if you have any questions.
// We\'re here to help!
// SP Cotton Team';
//         $phone = $request->mobile;
//         $whatsapp_message = Http::post('http://wapi.nationalsms.in/wapp/v2/api/send?apikey=2f233ed1a046484f9bfa0f985e4d0f0b&mobile=' . $phone . '&msg=' . $message . '');
//         $result = json_decode($whatsapp_message);



        $customer->save();


        return redirect('/crm/customers-list')->with('success','Customer Added Successfully !');


        // if($result->status == "success" && $result->statuscode == 200){

        // return redirect('/crm/customers-list')->with('success','Customer Added Successfully !');
        // }

        // else{
        //     return redirect('/crm/customers-list')->with('error',$result->msg);
        // }


    }

    public function send_birthday_reminder($customer_id){
        $customer = Customers::findorfail($customer_id);

        $message = 'Hi '.$customer->name.', Happy Birthday! 🎉
It’s your special day! Wishing you a day filled with joy, love, and unforgettable memories. Celebrate to the fullest and make it truly special!
';
                $phone = $customer->mobile;
                $whatsapp_message = Http::post('http://wapi.nationalsms.in/wapp/v2/api/send?apikey=2f233ed1a046484f9bfa0f985e4d0f0b&mobile=' . $phone . '&msg=' . $message . '');
                $result = json_decode($whatsapp_message);
        if($result->status == "success" &&  $result->statuscode == 200){
        return redirect()->back()->with('success','Reminder Successfully send');

    }else{
        return redirect()->back()->with('error','Something went wrong');

    }
    }


    public function customerslist(Request $request){
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $request->input('search');  // Get the search query from the request

            $customers = Customers::where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('mobile', 'like', "%{$search}%")
                      ->orWhere('bill_number', 'like', "%{$search}%");
            })->get();

        }else{
        $customers = Customers::latest()->paginate(10);

    }
    return view('superadmin.customerslist',compact('customers'));
    }



    public function editcustomers(Request $request, $id){
        $row = Customers::findorfail($id);
        if ($request->method() == "POST") {

            $validated = $request->validate([
                'name' => 'required',
                'mobile' => 'required',
            ]);



            $febrics_detail = [];
            $i = 0;
            $total_quantity = 0; // Initialize total quantity

            foreach ($request->fabricsd as $key => $value) {
                $febrics_detail[$i]['fabrics'] = $value['fabrics'];
                $febrics_detail[$i]['quantity'] = $value['quantity'];
                $febrics_detail[$i]['amount'] = $value['amount'];
                $i++;
                $total_quantity += $value['quantity']; // Accumulate the quantity
            }
            $row->febrics_detail = json_encode($febrics_detail);



            $top = [];
            $i = 0;

            foreach ($request->top as $key => $value) {
                $top[$i]['type'] = $value['type'];
                $top[$i]['arms'] = $value['arms'];
                $top[$i]['hip'] = $value['hip'];
                $top[$i]['length'] = $value['length'];
                $top[$i]['shoulder'] = $value['shoulder'];
                $top[$i]['chest'] = $value['chest'];
                $top[$i]['belly'] = $value['belly'];
                $top[$i]['sleeve_length'] = $value['sleeve_length'];
                $top[$i]['collor'] = $value['collor'];
                $top[$i]['cuff'] = $value['cuff'];
                $top[$i]['three_foure'] = $value['three_foure'];
                $top[$i]['style'] = $value['style'];
                $i++;
            }

            $row->top_data = json_encode($top);
            $bottom = [];
            $i = 0;

            foreach ($request->bottom as $key => $value) {
                $bottom[$i]['type'] = $value['type'];
                $bottom[$i]['length'] = $value['length'];
                $bottom[$i]['waist'] = $value['waist'];
                $bottom[$i]['hip'] = $value['hip'];
                $bottom[$i]['pockland'] = $value['pockland'];
                $bottom[$i]['thigh'] = $value['thigh'];
                $bottom[$i]['knee'] = $value['knee'];
                $bottom[$i]['potree'] = $value['potree'];
                $bottom[$i]['btm'] = $value['btm'];
                $bottom[$i]['btm'] = $value['btm'];
                $bottom[$i]['hight'] = $value['hight'];
                $bottom[$i]['style'] = $value['style'];
                $i++;
            }

            $row->bottom_data = json_encode($bottom);
            $row->name = $request->name;
            $row->mobile = $request->mobile;
            $row->dob = $request->dob;
            $row->audioPlayer_input = $request->audioPlayer_input;
            $row->delivery_date = $request->delivery_date;
            $row->order_date = $request->order_date;


            $lastItem = DB::table('cusotmers')->orderBy('id', 'desc')->first();

            // Check if we have a record to get the last ID, or start from 0 if it's empty
            $lastId = $lastItem ? (int) $lastItem->id : 0;

            // Increment the ID for the next one
            $newId = $lastId + 1;

            // Format the ID to have leading zeros (e.g., 001, 002, ..., 990)
            $formattedId = str_pad($newId, 3, '0', STR_PAD_LEFT);


            // $row->bill_number =  $request->bill_number;
            $row->order_date = $request->order_date;
            $row->salesman_code = $request->salesman_code;
            $row->gst = $request->gst;
            $row->fabrics = $request->fabrics;
            $row->quantity = $total_quantity;
            $row->amount = $request->amount;
            $row->total_quantity = $total_quantity;
            $row->total_amount = $request->total_amount;
            $row->discount = $request->discount;
            $row->advance = $request->advance;
            $row->advance_date = $request->advance_date;
            $row->balance = $request->balance;
            $row->receive = $request->receive;
            $row->receive_date = $request->receive_date;
            if ($request->fabric_image) {
                $row->fabric_image = updateImage($request->fabric_image,$row,'fabric_image');
            }
            $row->note = $request->note;
            $row->save();
            return redirect('/crm/customers-list')->with('success','Customer Update Successfully !');
        }
        return view('superadmin.editcustomers',compact('row'));
    }


    public function customerinvoice($id){
        $row = Customers::findorfail($id);
        return view('superadmin.customerinvoice',compact('row'));
    }

    public function sendpdf($id){
        $customerid = $id;

        // Fetch the customer
        $customer = Customers::find($customerid);

        if (!$customer) {
            abort(404, 'Customer not found.');
        }

        // Convert the customer model to an array
        $row = $customer->toArray();
        $total_payment_maked = CustomerPayment::where('customer_id',$id)->sum('amount');
        // Render the view as HTML for debugging
        $htmlContent = view('superadmin.pdfsendinvoice', compact('row','total_payment_maked'))->render();
        // Load the PDF with the rendered HTML
        $pdf = Pdf::loadHTML($htmlContent);



    // Prepare the file name and path
    $fileName = 'invoice_' . $customerid . '.pdf';
    $directoryPath = storage_path('app/public/invoices');

    // Check if the directory exists, if not, create it
    if (!is_dir($directoryPath)) {
        mkdir($directoryPath, 0775, true); // Create the directory if it doesn't exist
    }

    // Define the file path
    $filePath = $directoryPath . '/' . $fileName;

    // Save the PDF to the file path
    $pdf->save($filePath);


    // Upload the PDF to the media API and get the URL
    $fileUrl = $this->uploadFileToMediaAPI($filePath);



            if ($fileUrl['status'] == "success") {

                $message = 'Welcome to SP Cotton!

Dear '.$customer->name.',

Thank you for your payment! We have received your payment of Rs. 1000 for your recent order.';


                $mediaid = $fileUrl['mediaid'];
                $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://wapi.nationalsms.in/wapp/v2/api/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('apikey' => '2f233ed1a046484f9bfa0f985e4d0f0b','mobile' => '8766749080','msg' => ''.$message.'','img1' => '<http url of image>','mediaid' => ''.$mediaid.''),
));

$response = curl_exec($curl);

curl_close($curl);
 $result = json_decode($response);

 print_r($result);


            }

        // Return the PDF download
        // return $pdf->download('customer_details.pdf');

    }



    private function uploadFileToMediaAPI($filePath) {
        $apiKey = '2f233ed1a046484f9bfa0f985e4d0f0b';
        $url = 'https://wapi.nationalsms.in/wapp/api/upload/media';

        // Correct use of CURLFile
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'file' => new \CURLFile($filePath), // Use global CURLFile class
            ],
            CURLOPT_HTTPHEADER => [
                'X-API-KEY: ' . $apiKey,
            ],
        ]);

        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            $errorMessage = curl_error($curl);
            curl_close($curl);
            throw new Exception("CURL Error: " . $errorMessage);
        }

        curl_close($curl);

        if ($httpStatus !== 200) {
            throw new Exception("API Error: Received HTTP Status $httpStatus");
        }

        $responseArray = json_decode($response, true);


        return $responseArray;

    }




    public function viewcustomer($id){
        $row = Customers::findorfail($id);
        return view('superadmin.viewcustomer',compact('row'));
    }

    public function deliverylist(){
        $todayDate = Carbon::today();
        $cot = Customers::whereDate('delivery_date', $todayDate)->get();
        return view('superadmin.deliverylist',compact('cot'));
    }
    public function ongoinglist(){
        return view('superadmin.ongoinglist');
    }
    public function newworklist(){
        return view('superadmin.newworklist');
    }
    public function birthdayreminder(){
        $today = Carbon::today();
        $data = Customers::whereMonth('dob', $today->month)
                         ->whereDay('dob', $today->day)
                         ->latest()
                         ->get();
        return view('superadmin.birthdayreminder',compact('data'));
    }


    public function asignto(){
        $data = Customers::where('payment_confirm','complete')->where('allow_cutting_master','N')->latest()->paginate(10);

        return view('superadmin.asignto',compact('data'));
    }

    public function assignpost($id,Request $request){
        $customer = Customers::findorfail($id);
        $customer->workshop_user = $request->workshop;
        $customer->cutting_master_user = $request->cutting_master;
        $customer->allow_cutting_master = 'Y';
        $customer->save();
        return redirect('/crm/asignto')->with('success','Assigned Successfully, Now cutting master and workshop can start work !');
    }


    public function assignuserct_workshop($id){
        $row = Customers::where('id',$id)->firstorfail();
        return view('superadmin.assignuserct_workshop',compact('row'));
    }

    public function invoice(){
        return view('superadmin.invoice');
    }

    public function manage_billing($customerId){

        $row = Customers::findorfail($customerId);
        $tran = CustomerPayment::where('customer_id',$row->id)->get();
        $total_payment_maked = CustomerPayment::where('customer_id',$row->id)->sum('amount');

        return view('superadmin.manage_billing',compact('row','tran','total_payment_maked'));
    }

    public function cutting_update(Request $request){

        $validated = $request->validate([
            'bill' => 'required|numeric|exists:cusotmers,bill_number',
            'category_type' => 'required',
            'qty' => 'required|numeric',
        ]);

        $customerbill = Customers::where('bill_number',$request->bill)->first();
        $customerId = $customerbill->id;

        $total_qunatity = $customerbill->quantity;
        $cut_qunatity =  $request->qty;

        $total_worked_quantities = Cutting_QTY::where('customer_id', $customerId)->get();
        $total_worked_quantity = $total_worked_quantities->sum('qty');

        $real_worked = $customerbill->quantity - $total_worked_quantity;

        if($request->qty > $real_worked){
            return redirect()->back()->with('error','The quantity you are sending cannot be sent because you are making an invalid entry.');
        }else{

            if($total_worked_quantity + $request->qty == $total_qunatity){
                Customers::where('bill_number',$request->bill)->update(['qunatity_work' => $request->qty+$total_worked_quantity,'work_status'=>'complete']);
            }else{
                Customers::where('bill_number',$request->bill)->update(['qunatity_work' => $request->qty+$total_worked_quantity]);
            }
        }

        $new  = new Cutting_QTY;
        $new->customer_id = $customerId;
        $new->user_id = Auth::user()->id;
        $new->category_type = $request->category_type;
        $new->qty = $request->qty;
        $new->save();
        return redirect()->back()->with('success','New Cutting Updated');
    }

}


