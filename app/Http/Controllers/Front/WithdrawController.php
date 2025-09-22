<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Withdraw;
use App\Models\CommissionHistory;

class WithdrawController extends Controller
{
    public function sendOtp(Request $request)
{
    $otp = rand(100000, 999999);
    
    Session::put('refer_withdraw_otp', $otp);

    Mail::raw("Your OTP for referral withdrawal is: $otp", function ($message) use ($request) {
        $message->to($request->email)->subject('Referral Withdrawal OTP');
    });

    return response()->json(['message' => 'OTP sent to your email.']);
}

public function verifyOtp(Request $request)
{
    $validOtp = Session::get('refer_withdraw_otp');
    if ($request->otp == $validOtp) {
        return response()->json(['success' => true, 'message' => 'OTP verified. You can now submit.']);
    }
    return response()->json(['success' => false, 'message' => 'Invalid OTP.']);
}

public function submit(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'reason' => 'required',
    ]);

    $user = auth()->user();

    $withdrawableAmount = CommissionHistory::where('referrer_id', $user->id)
        ->where('created_at', '<', now()->startOfMonth())
        ->sum('amount');

    if ($request->amount > $withdrawableAmount || $request->amount > $user->refer_wallet) {
        return response()->json(['success' => false, 'message' => 'Amount exceeds withdrawable balance.']);
    }

    Withdraw::create([
        'userid' => $user->id,
        'amount' => $request->amount,
        'reason' => $request->reason, 
        'type' => 'refferal', 
        'status' => 'pending',
    ]);

      $user->refer_wallet -= $request->amount;
    $user->wallet -= $request->amount;
    $user->save();

    return response()->json(['success' => true, 'message' => 'Withdraw request submitted successfully.']);
}

}