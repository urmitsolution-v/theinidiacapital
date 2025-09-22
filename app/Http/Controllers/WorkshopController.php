<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CRM\Customers;
use App\Models\Cutting_QTY;
use App\Models\Workshop_Cutting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class WorkshopController extends Controller
{
    public function dashboard(){


        if (isset($_GET['search']) && !empty($_GET['search'])) {

            $d['all_cutting'] = Cutting_QTY::with('customer')
            ->whereHas('customer', function ($query) {
                $query->where('bill_number', 'like', '%' . $_GET['search'] . '%');
                $query->where('workshop_user',Auth::user()->id);
            })
            ->get();

            // $data = Cutting_QTY::with('customer')->where('bill_number', 'like', '%' . $searchTerm . '%')->where('user_id',Auth::user()->id)->get();
        }else{



        $d['all_cutting'] = Cutting_QTY::with('customer')->whereHas('customer', function ($query) {
            $query->where('workshop_user',Auth::user()->id);
        })->latest()->paginate(10);

        }
        return view('workshop/dashboard',$d);
    }

    public function update_workshop_cutting(Request $request){

        $validated = $request->validate([
            'bill' => 'required|numeric|exists:cusotmers,bill_number',
            'category_type' => 'required',
            'qty' => 'required|numeric',
        ]);

        $customerbill = Customers::where('bill_number',$request->bill)->first();
        $customerId = $customerbill->id;

        $total_qunatity = $customerbill->quantity;
        $cut_qunatity =  $request->qty;

        $total_worked_quantities = Customers::where('id', $customerId)->first();
        $total_worked_quantity = $total_worked_quantities->qunatity_work;


        $find = Workshop_Cutting::where('customer_id',$customerId)->first();

        $real_worked =  $total_worked_quantity;

        if (isset($find)) {
            $worked = $find->qty;
        }else{
            $worked = 0;
        }

        $rrworked = $worked+$request->qty;
        if($rrworked > $real_worked){
            return redirect()->back()->with('error','The quantity you are sending cannot be sent because you are making an invalid entry.');
        }else{
             if($total_worked_quantity + $request->qty == $total_qunatity){
                Cutting_QTY::where('customer_id',$customerId)->update(['qunatity_work' => $request->qty+$total_worked_quantity,'work_status'=>'complete']);
                Customers::where('bill_number',$request->bill)->update(['workshop_status'=>'complete']);
            }else{
                Cutting_QTY::where('customer_id',$customerId)->update(['qunatity_work' => $request->qty+$total_worked_quantity]);
            }
        }




        if (isset($find)) {
            $new  = Workshop_Cutting::find($find->id);
            $update_qty = $request->qty + $find->qty;
            $new->qty = $update_qty;

                $existingCategoryTypes = $new->category_type ? json_decode($new->category_type, true) : [];

                if (!is_array($existingCategoryTypes)) {
                        $existingCategoryTypes = [];
                    }

                $newCategoryType = $request->category_type;

            if (!in_array($newCategoryType, $existingCategoryTypes)) {
    $existingCategoryTypes[] = $newCategoryType;
            }

            $new->category_type = json_encode($existingCategoryTypes);
        }else{
            $new  = new Workshop_Cutting;
            $new->category_type = json_encode($request->category_type);
            $new->qty = $request->qty;
        }

        $new->customer_id = $customerId;
        $new->user_id = Auth::user()->id;

        $new->save();
        return redirect()->back()->with('success','Updated.');
    }

    public function completedwork_workshop() {
        $data = Workshop_Cutting::with('customer')->latest()->where('user_id',Auth::user()->id)->paginate(20);
        return view('workshop.completedwork',compact('data'));
    }

    public function newwork(){
        return view('workshop/newwork');
    }

    // --cuttingmaster-unctions

    public function cuttingdashboard(){
        // $today_work =  Customers::whereDate('created_at', Carbon::today())->get();


        if (isset($_GET['search']) && !empty($_GET['search'])) {

            $data['allwork'] = Customers::where('work_status','pending')->where('allow_cutting_master','Y')->where('bill_number', 'like', '%' . $_GET['search'] . '%')->get();

            // $data = Cutting_QTY::with('customer')->where('bill_number', 'like', '%' . $searchTerm . '%')->where('user_id',Auth::user()->id)->get();
        }else{



        $data['allwork'] =  Customers::where('work_status','pending')->where('allow_cutting_master','Y')->latest()->paginate(10);}
        return view('cutting_master/dashboard',$data);

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
        $find = Cutting_QTY::where('customer_id', $customerId)->first();
        if(isset($find)){
            $new  = Cutting_QTY::find($find->id);
            $update_qty = $request->qty + $find->qty;
            $new->qty = $update_qty;
            $existingCategoryTypes = $new->category_type ? json_decode($new->category_type, true) : [];
            if (!is_array($existingCategoryTypes)) {
                    $existingCategoryTypes = [];
            }
            $newCategoryType = $request->category_type;

            if (!in_array($newCategoryType, $existingCategoryTypes)) {
                    $existingCategoryTypes[] = $newCategoryType; // Append the new value
            }
            $new->category_type = json_encode($existingCategoryTypes);
                }else{
            $new  = new Cutting_QTY;
            $new->qty = $request->qty;
            $new->category_type = json_encode($request->category_type);
        }
        $new->customer_id = $customerId;
        $new->user_id = Auth::user()->id;
        $new->save();
        return redirect()->back()->with('success','New Cutting Updated');
    }

    public function completedwork(){


        $data = Cutting_QTY::with('customer')->where('user_id',Auth::user()->id)->latest()->paginate(20);

        return view('cutting_master/completedwork',compact('data'));
    }

    public function pendingwork(){
       $data['allwork'] =  Customers::where('work_status','pending')->where('allow_cutting_master','Y')->latest()->paginate(10);
       return view('cutting_master/pendingwork',$data);
    }
}
