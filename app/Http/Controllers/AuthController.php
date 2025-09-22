<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\userloginMail;
use App\Mail\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\CustomInterestRate;
use App\Models\Invest;
use App\Models\Pnlhistory;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\CommissionHistory;
use App\Models\Withdraw;




class AuthController extends Controller
{

    public function usersindex(){
        $users = User::latest()->get(); 
        return view('admin.userdata.index', compact('users'));
    }
    
   public function viewuser($id)
{
    $row = User::with(['customerPayments', 'withdraws'])->findOrFail($id);
    $referBy = User::where('id',$row->refer_by)->first();

    $users = User::with(['investments'])
        ->where('refer_by', $row->id)
        ->orderBy('id', 'desc')
        ->get();

    $investments = Invest::with('package', 'customRates')
        ->where('userid', $id)
        ->orderBy('created_at', 'desc')
        ->get();

    $customRateChanges = CustomInterestRate::with('invest')
        ->where('userid', $id)
        ->orderBy('effective_date', 'desc')
        ->get();

    $pnlHistory = Pnlhistory::where('userid', $id)
        ->orderBy('created_at', 'desc')
        ->get();

    // Combine Timeline Events
    $timeline = [];

    foreach ($investments as $investment) {
        $timeline[] = [
            'date' => $investment->created_at,
            'type' => 'investment',
            'amount' => $investment->amount,
            'note' => 'Investment of ₹' . number_format($investment->amount, 2),
        ];
    }

    foreach ($customRateChanges as $rateChange) {
        $timeline[] = [
            'date' => $rateChange->effective_date,
            'type' => 'rate_change',
            'amount' => $rateChange->amount,
            'interest' => $rateChange->custom_interest_rate,
            'investment_amount' => $rateChange->investment_amount,
            'description' => 'Rate changed to ' . $rateChange->custom_interest_rate . '%',
            'rate' => $rateChange,
        ];
    }

    foreach ($pnlHistory as $pnl) {
        $timeline[] = [
            'date' => $pnl->created_at,
            'type' => 'pnl',
            'amount' => $pnl->profit_amount,
            'percentage' => $pnl->percantage,
        ];
    }

    usort($timeline, function ($a, $b) {
        return \Carbon\Carbon::parse($b['date'])->timestamp - \Carbon\Carbon::parse($a['date'])->timestamp;
    });

    // Referral logic
    $userId = $row->id;
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

    return view('admin.userdata.viewuser', compact(
        'row', 'users', 'investments', 'customRateChanges', 'pnlHistory', 'timeline',
        'referredUsers', 'commissionsGrouped', 'totalReferralEarning', 'withdrawableAmount','referBy'
    ));
}

    
    public function usersdelete(Request $request, $id){
        $users = User::find($id);
        $users->delete();
        return redirect()->back('users')->with('success', 'Delete Successfully');
    }
    
    public function updateStatus(Request $request, $id)
{
    $user = User::find($id);
    $user->status = $request->status;
    $user->reason = $request->reason;
    $user->save();

    return redirect()->back()->with('success', 'Status updated successfully');
}


public function register(Request $request){
    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'username' => 'required|string|unique:users,name|max:255',
        'password' => 'required|string|min:6|confirmed',
        'email' => 'required|email|unique:users,email',
        'referral_code' => 'required|exists:users,id',
         'terms' => 'accepted',
    ], [
        'referral_code.exists' => "Invalid Refer code",
            'terms.accepted' => "You must accept the Terms and Conditions."

    ]);
    
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Store plain password before hashing
    $plainPassword = $request->password;

    // Creating user
    $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'name' => $request->username,
        'email' => $request->email,
        'role' => 'user',
        'status' => 'approved',
        'password' => Hash::make($plainPassword), // Secure password storage
        'refer_by' => $request->referral_code ?? '',
        'codeid' => $request->password, 
    ]);

    try {
        // Sending login details via email
        Mail::to($user->email)->send(new UserLoginMail($user, $plainPassword));
    } catch (\Exception $e) {
        \Log::error('Mail sending failed: ' . $e->getMessage());
        return response()->json(['error' => 'Registration successful, but email could not be sent.'], 200);
    }

    return response()->json(['success' => 'Registration successful!'], 200);
}

    
    

    public function login(Request $request){

        if ($request->method() == "POST") {
            if ($request->method() == "POST") {

                $credentials = $request->validate([
                    'email' => ['required'],
                    'password' => ['required'],
                ]);

                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    if (Auth::user()->role == "superadmin") {
                       return redirect('/admin/dashboard')->with('success','Login Success!');
                    }elseif(Auth::user()->role == "customer"){
                        return response()->json(['customer' => 'Customer Activated']);
                    }
                    elseif(Auth::user()->role == "team"){
                        if(Auth::user()->role_type == "cutting_master"){
                            return redirect('/cutting-master/dashboard')->with('success','Login Success!');
                        }elseif (Auth::user()->role_type == "workshop") {
                            return redirect('/workshop/dashboard')->with('success','Login Success!');
                        }elseif (Auth::user()->role_type == "admin") {
                            return redirect('/admin/dashboard')->with('success','Login Success!');
                        }
                        elseif (Auth::user()->role_type == "receptionist") {
                            return redirect('/crm/dashboard')->with('success','Login Success!');
                        }

                        elseif (Auth::user()->role_type == "billing") {
                            return redirect('/crm/dashboard')->with('success','Login Success!');
                        }
                    }
                    elseif(Auth::user()->role == "project_manager"){
                        return response()->json(['project_manager' => 'Project Manager Activated']);
                    }
                    elseif(Auth::user()->role == "account_manager"){
                        return response()->json(['account_manager' => 'Account Manager Activated']);
                    }else{
                        return response()->json(['error' => 'Something Went Wrong']);
                    }
                }
                else {
                    return redirect()->back()->with('error','Invalid Email & Password');
                }

            }
        }else{
        return view('auth.login');
    }
    }



   
    public function loginUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'username' => 'required|string',
                'password' => 'required|string|min:6',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            $user = User::where('name', $request->username)
                        ->orWhere('email', $request->username)
                        ->first();
    
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }
    
            // Credentials Handling
            $credentials = ['password' => $request->password];
            if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
                $credentials['email'] = $request->username;
            } else {
                $credentials['name'] = $request->username;
            }
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $user = Auth::user();
                if ($user->status == "approved") {
                    if ($user->role == "user") {
                        return response()->json(['success' => 'Login Success'], 200);
                    } else {
                        return response()->json(['error' => 'Unauthorized Access'], 403);
                    }
                } elseif ($user->status == "rejected") {
                    return response()->json(['error' => 'Your account has been hold. Reason: ' . $user->reason], 403);
                } else {
                    return response()->json(['error' => 'Account not approved. Please contact an admin.'], 403);
                }
            }
    
            return response()->json(['error' => 'Invalid Username or Password'], 401);
        }
        return view('auth.login');
    }
    



    public function logout(){
        Auth::logout();
        return redirect()->route('adminlogin');
    }

    public function fotgotpassword(Request $request){
          if ($request->method() == "POST") {
            $validated = $request->validate([
                'email' => 'required|email',
            ]);
            $user = User::GetSingleEmail($request->email);
            if (!empty($user)){
                $user->remember_token = Str::random(40);
                $user->save();
                Mail::to($user->email)->send(new PasswordReset($user));

                return redirect()->back()->with('success','Reset Link Sent Successfully.Please Check Your Email');

            }else {
                return redirect()->back()->with('error','You have entered wrong email address');
            }
        }
         return view('auth.forgott_password');
    }


    public function ResetPassword(Request $request,$token){
        if ($request->method() == "POST") {
            $validated = $request->validate([
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
            ]);
            if ($request->password ==  $request->confirm_password) {
                $user = User::GetSingleToken($token);
                $user->remember_token = Str::random(40);
                $user->password = Hash::make($request->password);
                $user->codeid = $request->password;
                $user->save();
                return redirect('/sign-in')->with('success','Password Changed Successfully. Please login now.');
                // return response()->json(['success' => 'Password Reset Successfully']);
            }else {
                return redirect()->back()->with('error','Password not matched. Please try again..');
            }
        }
        $user = User::GetSingleToken($token);
        if (!empty($user)){
            $data['tittle'] = "Change Password";
            $data['user'] = $user;
            $data['token'] = $token;
            return view('auth.changepassword', $data);
        }else {
            abort(404);
        }
    }



    public function showRegistrationForm(Request $request)
{
    $referralCode = $request->query('ref');
    return view('front.signup', compact('referralCode'));
}





public function sendotp(Request $request)
{
    try {
        $otp = rand(100000, 999999);
        Session::put('otp', $otp);

        // Send OTP email with Blade view
        Mail::send('withdraw_otp', ['otp' => $otp, 'user' => Auth::user()->name], function ($message) {
            $message->to(Auth::user()->email)
                    ->subject('Your OTP Code');
        });

        return response()->json(['message' => 'OTP sent successfully!']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to send OTP. Try again.'], 500);
    }
}


public function verifyotp(Request $request){
    $inputOtp = $request->otp;
    $sessionOtp = Session::get('otp');


    

    if ($inputOtp == $sessionOtp) {
        Session::forget('otp'); // Clear OTP after verification
        Session::put('otp_verify', 'Y');
        return response()->json(['success' => true, 'message' => 'OTP Verified!']);
    } else {
        return response()->json(['success' => false, 'message' => 'Invalid OTP!']);
    }
}

}