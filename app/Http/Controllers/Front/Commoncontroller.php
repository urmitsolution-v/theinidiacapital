<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Info;
use App\Models\User;
use App\Models\Testimonials;
use App\Models\ProjectModel;
use App\Models\Franchise;
use App\Models\Blogmodel;
use App\Models\Videos;
use App\Models\Blogcomments;
use App\Models\Comment;
use App\Models\CRM\Customerpayment;
use App\Models\Contact;
use App\Models\Withdraw;
use App\Models\Gallery;
use App\Models\Studentszone;
use App\Models\Reels;
use App\Models\CommissionHistory;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Clients;
use App\Models\Fenquiry;
use App\Models\Pagesetting;
use App\Models\PlacementEnq;
use App\Models\Project;
use App\Models\Service;
use App\Models\Team;
use App\Models\Work;
use App\Models\Process;
use App\Models\Pakeges;
use App\Models\Bestourservice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\Echo_;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;



class Commoncontroller extends Controller
{
    // public function termsandconditions($category)
    // {
    //     // $projects = Project::where('category', $category)->get();
    //     return view('front.terms-and-conditions);
    // }
    public function getCategoryProjects($category)
    {
        $projects = Project::where('category', $category)->get();
        return view('project.colbox', compact('projects'));
    }


    public function index(){
        $testimonial = Testimonials::where('status', 'Y')->get();
        $Banners = Banners::where('status', 'Y')->get();
        $workinssdata = Info::where('id', 14)->first();
        $workinss = $workinssdata ? json_decode($workinssdata->info_one) : null;
        $aboutus = Info::where('id', 7)->first();
        $info_one = json_decode($aboutus->info_one);
        $homeserve1 = Info::where('id', 8)->first();
        $homeserve1_data = json_decode($homeserve1->info_one);
        $homeserve2 = Info::where('id', 9)->first();
        $homeserve2_data = json_decode($homeserve2->info_one);
        $homeserve3 = Info::where('id', 10)->first();
        $homeserve3_data = json_decode($homeserve3->info_one);
        $welcomeBox1 = Info::where('id', 11)->first();
        $welcomeBox1 = $welcomeBox1 ? json_decode($welcomeBox1->info_one) : null;
        $welcomeBox2 = Info::where('id', 12)->first();
        $welcomeBox2 = $welcomeBox2 ? json_decode($welcomeBox2->info_one) : null;
        $welcomeBox3 = Info::where('id', 13)->first();
        $welcomeBox3 = $welcomeBox3 ? json_decode($welcomeBox3->info_one) : null;
        $team = Team::where('status', 'Y')->get();
        $blog = Blogmodel::with('get_Category')->where('status', 'Y')->get();
        $category = DB::table('category')->where('type', 'project')->where('status', 'Y')->get(['id', 'title']);
        // $projects = Project::where('status', 'Y')->get();
        $data = DB::table('webinfo')->where('id', 5)->select(['image', 'favicon', 'info_one'])->first();
        $row = json_decode($data->info_one);
        $h_banner = Banners::where('status','Y')->orderBy('id', 'desc')->get();
        $data = Info::find(7);
        $row = json_decode($data->info_one);
        $counters = Info::find(16);
        $row1233 = $counters ? json_decode($counters->info_one) : null;
        $service = Service::where('status', 'Y')->get();
        $bestservice = Bestourservice::where('status','Y')->get();
        $teams = Team::where('status','Y')->get();
        $blogs = Blogmodel::where('status', 'Y')->orderBy('id', 'desc')->limit(3)->get();
        $gallery = Gallery::where('status','Y')->get();
        $clients = Clients::where('status','Y')->get();
        $data_a = Info::find(17);
        $row_a = json_decode($data_a->info_one);
        $recentBlogs = Blogmodel::where('status','Y')->take(3)->get();
        $platform = Info::find(18);
        $trad = json_decode($platform->info_one);
        $people_trust = Info::find(19);
        $people = json_decode($people_trust->info_one);
        $home_banner = Info::find(20);
        $home = json_decode($home_banner->info_one);
        $pakeges = Pakeges::where('status', 'Y')
        ->orderBy('created_at', 'desc') // Or use any other timestamp column if different
        ->take(3)
        ->get();
        return view('front.index', compact('pakeges','home','home_banner','people','people_trust','trad','platform',
        'recentBlogs','row_a','data_a','clients','gallery','blogs','teams','bestservice','service','counters','row1233','h_banner','row','data','aboutus', 'testimonial', 'workinssdata',   'workinss', 'Banners', 'info_one', 'team', 'blog', 'homeserve1_data', 'homeserve2_data', 'homeserve3_data', 'category', 'welcomeBox1', 'welcomeBox2', 'welcomeBox3'));
    }

    public function aboutus(){
        $process = Process::where('status','Y')->get();
        $counters = Info::find(16);
        $row1233 = $counters ? json_decode($counters->info_one) : null;
        $teams = Team::where('status','Y')->get();
        $testimonial = Testimonials::where('status', 'Y')->get();
        $data = Info::find(7);
        $row = json_decode($data->info_one);
        $gallery = Gallery::where('status','Y')->get();
        return view('front.aboutus',compact('gallery','testimonial','teams','row','data','process','row1233','counters'));
    }


    public function imagegallery() {
        $gallery = Gallery::where('status','Y')->get();
        return view('front.imagegallery',compact('gallery'));
    }

    public function videogallery() {
        $video = Videos::where('status','Y')->get();
        return view('front.videogallery',compact('video'));
    }





    public function shop()
    {
        return view('front.shop');
    }

    public function partners()
    {
        return view('front.partners');
    }

    public function event()
    {
        return view('front.event');
    }

    public function projects()
    {
        $category = DB::table('category')->where('type', 'project')->where('status', 'Y')->get(['id', 'title']);

        $projects = Project::where('status', 'Y')->get();
        return view('front.projects', compact('projects', 'category'));
    }

    public function teamdetails($slug)
    {

        $teams = Team::where('slug', $slug)->where('status', 'Y')->first();

        // if ($request->method() == "POST") {
        //     $Contact = new Contact();
        //     $Contact->name = $request->name;
        //     $Contact->email = $request->email;
        //     $Contact->phone = $request->phone;
        //     $Contact->code = $request->code;
        //     $Contact->message = $request->message;
        //     $Contact->services = $request->services;
        //     $Contact->save();
        // }
        return view('front.team-details', compact('teams'));
    }

    public function causes()
    {
        return view('front.causes');
    }


    public function about()
    {
        // $totalProjects = Project::count();


        $counters = Info::where('id', 16)->first();
        $counters = json_decode($counters->info_one);

        $team = Team::where('status', 'Y')->get();
        $works = Work::where('status', 'Y')->get();
        $aboutus = Info::where('id', 7)->first();

        // Make sure $aboutus exists (i.e., a record with id 7 was found)
        if (!$aboutus) {
            // Handle the case if no data is found (optional)
            return redirect()->back()->with('error', 'About Us data not found.');
        }

        $info_one = json_decode($aboutus->info_one);

        $Pagesetting = Pagesetting::where('id', 2)->first();

        return view('front.about', compact('team', 'aboutus', 'info_one', 'works', 'counters', 'Pagesetting'));
    }


    public function contact(Request $request){
        if ($request->method() == "POST") {
            // $validated = $request->validate([
            //     'name' => 'required',
            //     'email' => 'required',
            //     'phone' => 'required',
            //     'subject' => 'required',
            //     'message' => 'required',
            // ]);
            $Contact = new Contact();
            $Contact->fname = $request->fname;
            $Contact->lname = $request->lname;
            $Contact->email = $request->email;
            $Contact->phone = $request->phone;
            $Contact->message = $request->message;
            $Contact->save();
        }
        return view('front.contact');
    }

    public function contactsubmitfree(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'email'],
        //     'phone' => ['required', 'numeric', 'digits:10'],
        //     'subject' => ['required'],
        //     'message' => ['required'],
        // ]);


        $Contact = new Contact();
        $Contact->name = $request->name;
        $Contact->email = $request->email;
        $Contact->phone = $request->phone;
        $Contact->code = $request->code;
        $Contact->message = $request->message;
        $Contact->services = $request->services;
        $Contact->save();
        return redirect()->back()->with('success', 'Your inquiry has been successfully submitted!');;
    }

    public function contactsubmit(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'email'],
        //     'phone' => ['required', 'numeric', 'digits:10'],
        //     'subject' => ['required'],
        //     'message' => ['required'],
        // ]);


        $Contact = new Contact();
        $Contact->name = $request->name;
        $Contact->email = $request->email;
        $Contact->phone = $request->phone;
        $Contact->code = $request->code;
        $Contact->message = $request->message;
        $Contact->services = $request->services;
        $Contact->save();
        return redirect()->back()->with('success', 'Your inquiry has been successfully submitted!');;
    }

    public function projectsdetails($slug)
    {
        $relatedProjects = Project::with('get_Categorys')->where('slug', $slug)->where('status', 'Y')->latest()->take(3)->get();
        $project = Project::with('get_Categorys')->where('slug', $slug)->where('status', 'Y')->firstOrFail();
        $category = DB::table('category')->where('type', 'project')->where('status', 'Y')->get(['id', 'title']);
        return view('front.projects-details', compact('project', 'category', 'relatedProjects'));
    }
    public function admission()
    {
        return view('front.admission');
    }


    public function blogsingle($slug){
        $category = DB::table('category')->where('type', 'blogs')->where('status', 'Y')->get(['id', 'title']);
        $blogsingle = Blogmodel::where('slug',$slug)->first();
        $recentBlogs = Blogmodel::where('status','Y')->take(3)->get();
        return view('front.blogsingle',compact('blogsingle','recentBlogs','category'));
    }


    public function clients(){
        $clients = Clients::where('status','Y')->get();
        return view('front.clients',compact('clients'));
    }

    public function profileupdate(Request $request){
        // Validate form data
        
    
        $user = Auth::user();
    
        // Update password if provided
        if ($request->input('password')) {

            $request->validate([
                'password' => 'nullable|string|min:6',
                'new_password' => 'nullable|string|min:6|confirmed',
            ]);
        
            


            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('errors', 'Incorrect current password.');
            }
            if ($request->filled('new_password')) {
                $user->password = Hash::make($request->new_password);
            }

             $user->save();
             return redirect()->back()->with('success', 'updated your password successfully.');
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif' // Validate image
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Update profile fields
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->nominee_contact = $request->nominee_contact;
        $user->nominee_age = $request->nominee_age;
        $user->nominee_relation = $request->nominee_relation;
        $user->nominee_name = $request->nominee_name;
    
        // Handle profile photo upload
        if ($request->profile_photo) {
            $file = $request->profile_photo;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile_photos'), $filename);
    
            // Delete old profile photo if exists
            if ($user->image && file_exists(public_path('uploads/profile_photos/' . $user->image))) {
                unlink(public_path('uploads/profile_photos/' . $user->image));
            }
            $user->image = $filename; // Save new profile photo
        }
    
        $user->save();

        return response()->json(['success' => 'Profile updated successfully.'], 200);
    }
    


        public function updatebank(Request $request){
               // Validation Rules

               if($request->type == "updatebank"){
        $validator = Validator::make($request->all(), [
            'account_holder_name' => 'required|string|max:255',
            'account_number' => 'required|numeric|digits_between:6,20',
            'ifsc_code' => 'required|string|max:20',
            'branch_name' => 'required|string|max:255',
             'bank_name' => 'required',
          
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
     }else{
        $validator = Validator::make($request->all(), [
            'aadhar_card_number' => 'required|numeric|digits:12',
            'aadhar_card' => 'required|mimes:jpg,jpeg,png,pdf',
            'pan_number' => 'required|string|size:10',
            'pan_card' => 'required|mimes:jpg,jpeg,png,pdf',
           
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    }

        // Get Authenticated User
        $user = auth()->user();

        // Upload New Files or Keep Old Ones
         // Define upload directory
    $uploadDir = public_path('uploads/kyc');

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create directory if not exists
    }

   // Aadhaar
if ($request->hasFile('aadhar_card')) {
    if ($user->aadhar_card && file_exists(public_path($user->aadhar_card))) {
        unlink(public_path($user->aadhar_card));
    }

    $aadharFile = $request->file('aadhar_card');
    $aadharFileName = time() . '_aadhar.' . $aadharFile->getClientOriginalExtension();
    $aadharFile->move($uploadDir, $aadharFileName);
    $aadharPath = 'uploads/kyc/' . $aadharFileName;
} else {
    $aadharPath = $user->aadhar_card;
}


// Bank Identity
if ($request->hasFile('bank_identity')) {
    if ($user->bank_identity && file_exists(public_path($user->bank_identity))) {
        unlink(public_path($user->bank_identity));
    }

    $bankidenFile = $request->file('bank_identity');
    $bankidenFileName = time() . '_bank_identity.' . $bankidenFile->getClientOriginalExtension();
    $bankidenFile->move($uploadDir, $bankidenFileName);
    $bankIdentityPath = 'uploads/kyc/' . $bankidenFileName;
} else {
    $bankIdentityPath = $user->bank_identity;
}



// Handle Aadhar Card Back Upload
if ($request->hasFile('aadhar_card_back')) {
    if ($user->aadhar_card_back && file_exists(public_path($user->aadhar_card_back))) {
        unlink(public_path($user->aadhar_card_back));
    }
    $aadharBackFile = $request->file('aadhar_card_back');
    $aadharBackFileName = time() . '_aadhar_back.' . $aadharBackFile->getClientOriginalExtension();
    $aadharBackFile->move($uploadDir, $aadharBackFileName);
    $aadharBackPath = 'uploads/kyc/' . $aadharBackFileName;
} else {
    $aadharBackPath = $user->aadhar_card_back;
}
// Handle Canceled Cheque Upload
if ($request->hasFile('cancel_chaque')) {
    if ($user->cancel_chaque && file_exists(public_path($user->cancel_chaque))) {
        unlink(public_path($user->cancel_chaque));
    }
    $chequeFile = $request->file('cancel_chaque'); // Corrected variable name
    $chequeFileName = time() . '_cancel_cheque.' . $chequeFile->getClientOriginalExtension();
    $chequeFile->move($uploadDir, $chequeFileName);
    $cancelChequePath = 'uploads/kyc/' . $chequeFileName;
} else {
    $cancelChequePath = $user->cancel_chaque; // Corrected variable name
}



    // Handle PAN Card Upload
    if ($request->hasFile('pan_card')) {
        // Delete old file if exists
        if ($user->pan_card && file_exists(public_path($user->pan_card))) {
            unlink(public_path($user->pan_card));
        }

        // Upload new file
        $panFile = $request->file('pan_card');
        $panFileName = time() . '_pan.' . $panFile->getClientOriginalExtension();
        $panFile->move($uploadDir, $panFileName);
        $panPath = 'uploads/kyc/' . $panFileName;
    } else {
        $panPath = $user->pan_card;
    }


        if($request->type == "updatebank"){

        // Update User Data
        $user->update([
            'account_holder_name' => $request->account_holder_name,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'ifsc_code' => $request->ifsc_code,
            'branch_name' => $request->branch_name,
            
        ]);
        }else{
            $user->update([
               'aadhar_card_number' => $request->aadhar_card_number,
            'aadhar_card' => $aadharPath ?? "",
            'bank_identity' => $bankIdentityPath ?? "",
            'aadhar_card_back' => $aadharBackPath ?? "",
            'cancel_chaque' => $cancelChequePath ?? "",
            'pan_number' => $request->pan_number,
            'pan_card' => $panPath,
            'kyc_status' => 'apply',
            'kyc_reason' => 'Applied For Kyc. Please wait for Tic verification.',
            'kyc_time' => today(),
            ]);
        }
        return response()->json(['success' => 'Updated successfully!']);
    }

    public function dashboard(){
        $data['mywithdrawlist'] = Withdraw::where('userid',Auth::user()->id)->latest()->get(); $userId = auth()->id();

    $referredUsers = User::where('refer_by', $userId)->with('investments')->get();
    $commissionHistory = CommissionHistory::where('referrer_id', $userId)->get();
    $commissionsGrouped = $commissionHistory->groupBy('user_id');
    $totalReferralEarning = $commissionHistory->sum('amount');

    $currentMonthStart = Carbon::now()->startOfMonth();

    $totalPreviousMonthCommission = CommissionHistory::where('referrer_id', $userId)
        ->where('created_at', '<', $currentMonthStart)
        ->sum('amount');

    $withdrawnAmount = Withdraw::where('userid', $userId)
        ->where('type', 'refferal')
        ->whereIn('status', ['pending', 'complete'])
        ->sum('amount');

    $withdrawableAmount = max(0, $totalPreviousMonthCommission - $withdrawnAmount);


        
        $withdraw = Withdraw::where('userid', Auth::id())->sum('amount');
        $DepositedAmount = Auth::user()->wallet;
       $pnl_amount = Auth::user()->amount; // Agar column ka naam 'pnl_amount' hai

       
       
        return view('front.dashboard',$data,compact('DepositedAmount','withdraw','pnl_amount' , 'withdrawableAmount'));
    }
    

    public function walletstore(Request $request){
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'transaction_id' => 'required|alpha_num|size:12|unique:customer_payment,utr',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ],[
            'image.required' => 'Upload Payment Screenshot and Amount Details.'
        ]);

        // Upload file to Cloudinary
        $imageUrl = null;
    
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        
        try {
            $uploadedFile = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'wallet_payments',
            ]);
            $imageUrl = $uploadedFile->getSecurePath();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cloudinary upload failed: ' . $e->getMessage()], 500);
        }
    }

        // Save transaction
        Customerpayment::create([
            'customer_id' => Auth::id(),
            'amount' => $request->amount,
            'utr' => $request->transaction_id,
            'screenshot' => $imageUrl,
            'status' => 'pending',
        ]);

        return response()->json(['status' =>'success','message' => 'Your Request Submitted Successfully! The India Capital will verify.']);
    }


    public function comment(Request $request)
    {
        if ($request->post()) {
            $comment = new Comment;
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->url = $request->url;
            $comment->comment = $request->comment;
            $comment->save();
        }
        return redirect()->back();
    }
    public function blog(){
        $aboutus = Info::where('id', 7)->first();

        // Make sure $aboutus exists (i.e., a record with id 7 was found)
        if (!$aboutus) {
            // Handle the case if no data is found (optional)
            return redirect()->back()->with('error', 'About Us data not found.');
        }

        $info_one = json_decode($aboutus->info_one);
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $blog = Blogmodel::with('get_Category')
                ->where('status', 'Y')
                ->where('category', $_GET['category'])
                ->get();
        } else {
            $blog = Blogmodel::with('get_Category')
                ->where('status', 'Y')
                ->get();
        }

        $category = DB::table('category')->where('type', 'blogs')->where('status', 'Y')->get(['id', 'title']);
        $category = $category->map(function ($cat) {
            $cat->post_count = Blogmodel::where('category', $cat->id)->where('status', 'Y')->count();
            return $cat;
        });

        $data['blogs'] = Blogmodel::where('status','Y')->orderBy('id', 'desc')->get();
        $category = DB::table('category')->where('type', 'blogs')->where('status', 'Y')->get(['id', 'title']);
        $recentBlogs = Blogmodel::where('status','Y')->take(3)->get();
        return view('front.blog' ,$data , compact('blog', 'category', 'aboutus', 'info_one','recentBlogs'));
    }

    // public function blogsingle($slug,Request $request){
    //     $row = Blogmodel::where('slug',$slug)->first();
    //     if ($row) {

    //     $recentblogs = Blogmodel::where('status','Y')->orderBy('id','desc')->take(3)->select(['title','slug','short_description','banner','created_at'])->get();


    //         $comments = Blogcomments::where('blog_id',$row->id)->get();

    //         if ($request->method() == "POST") {
    //             $validatedData = $request->validate([
    //                 'name' => ['required'],
    //                 'email' => ['required','email'],
    //                 'message' => ['required'],
    //             ]);
    //             $comments = new Blogcomments;
    //             $comments->name = $request->name;
    //             $comments->blog_id = $row->id;
    //             $comments->email = $request->email;
    //             $comments->message = $request->message;
    //             $comments->save();
    //             return redirect()->back()->with('success','Comment on this post has been successful');
    //         }

    //     return view('front.blogsingle',compact('row','comments','recentblogs'));
    //     }else{
    //         abort(404);
    //     }
    // }

    public function events()
    {
        return view('front.events');
    }
    public function courses()
    {
        return view('front.courses');
    }
    public function coursesdetails()
    {
        return view('front.coursesdetails');
    }

    public function testimonials()
    {
        return view('front.testimonials');
    }

    public function volunteer()
    {
        return view('front.volunteer');
    }

    public function error()
    {
        return view('front.error');
    }


    public function signin(){
        return view('front.signin');
    }
    public function signup(){
        return view('front.signup');
    }

    // public function services()
    // {
    //     $service = Service::where('status', 'Y')->get();
    //     return view('services', compact('service'));
    // }

    public function servicesdetails($slug){
        // $category = DB::table('category')->where('type', 'service')->where('status', 'Y')->get(['id', 'title']);
        // $services = Service::with('get_Category')->where('slug', $slug)->where('status', 'Y')->firstOrFail();
        $service = Service::where('slug',$slug)->first();
        $testimonial = Testimonials::where('status', 'Y')->get();
        return view('front.servicesdetails',compact('service','testimonial'));
    }


    public function services(){
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $service = Service::with('get_Category')
                ->where('status', 'Y')
                ->where('category', $_GET['category'])
                ->get();
        } else {
            $service = service::with('get_Category')->where('status', 'Y')->get();
        }
        $Pagesetting = Pagesetting::where('id', 3)->first();
        $category = DB::table('category')->where('type', 'service')->where('status', 'Y')->get(['id', 'title']);
        $service = Service::where('status', 'Y')->get();
        $bestservice = Bestourservice::where('status','Y')->get();
        $testimonial = Testimonials::where('status', 'Y')->get();
        return view('front.services', compact('testimonial','bestservice','service','service', 'category', 'Pagesetting'));
    }

    public function faq(){
        // $data = Faq::where('status', 'Y')->orderBy('id', 'desc')->get();
        $Faq = Faq::where('status', 'Y')->get();
        return view('front.faq',compact('Faq'));
    }

    public function privacypolicy(){
        $data = Info::find(2);
        $row = json_decode($data->info_one);
        return view('front.privacy_policy',compact('data','row'));
    }

    public function termsandconditions(){
        $data = Info::find(1);
        $row = $data->info_one;
       return view('front.termsandconditions',compact('row','data'));
    }

    public function team(){
        // $team = Team::where('status', 'Y')->orderBy('id', 'desc')->get();
        return view('front.team');
    }

    public function partner(){
        return view('front.partner');
    }

    public function pricing(){
        $pakeges = Pakeges::where('status', 'Y')->get();
        return view('front.pricing',compact('pakeges'));
    }


    public function forgot_pass(){
        return view('front.forgot_pass');
    }

    public function roadmap(){
        $roadmaps = Info::find(21);
        $road = json_decode($roadmaps->info_one);
        return view('front.roadmap',compact('road','roadmaps'));
    }


    public function userlogout(){
        Auth::logout();
        return redirect('/sign-in');
    }
}