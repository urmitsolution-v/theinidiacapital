<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invest;
use App\Models\Withdraw;
use App\Models\Pnlhistory;
use App\Models\CustomInterestRate;
use App\Models\CommissionHistory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class Investcontroller extends Controller
{

    // public function referrallist(Request $request){

    //     $users = User::with(['investments'])
    //     ->where('refer_by', Auth::id())
    //     ->orderBy('id', 'desc')
    //     ->get();

        
    //     return view('front.referrallist',compact('users'));
    // }


//     public function referralList()
// {
//     $userId = auth()->id();

//     $referredUsers = User::where('refer_by', $userId)->with('investments')->get();
//     $commissionHistory = CommissionHistory::where('referrer_id', $userId)->get();
//     $commissionsGrouped = $commissionHistory->groupBy('user_id');
//     $totalReferralEarning = $commissionHistory->sum('amount');

//     $currentMonthStart = Carbon::now()->startOfMonth();
//     $withdrawableAmount = CommissionHistory::where('referrer_id', $userId)
//     ->where('created_at', '<', $currentMonthStart)
//     ->sum('amount');

//     $withdrawnAmount = Withdraw::where('userid', $userId)
//         ->where('type', 'refferal')
//         ->whereIn('status', ['pending', 'completed']) // optional: exclude 'rejected'
//         ->sum('amount');

//          $withdrawableAmount = max(0, $totalPreviousMonthCommission - $withdrawnAmount);
        

//     return view('front.referrallist', compact(
//         'referredUsers',
//         'commissionsGrouped',
//         'totalReferralEarning',
//         'withdrawableAmount'
//     ));
// }



public function referralList()
{
    $userId = auth()->id();

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

    return view('front.referrallist', compact(
        'referredUsers',
        'commissionsGrouped',
        'totalReferralEarning',
        'withdrawableAmount'
    ));
}
 
 
    public function userpnl(Request $request){

        $users = Pnlhistory::where('userid', Auth::id())
        ->latest()
        ->get();

        
        return view('front.userpnl',compact('users'));
    }

    public function deposithistory(Request $request){
        return view('front.deposithistory');
    }

    public function withdrawRequest(Request $request)
{
    // $invest = Invest::findOrFail($investid);
    
    // Create a new withdraw request
    
    $request->validate([
        'amount' => 'required|numeric',
    ], [
        'amount.required' => 'The amount field is required.',
        'amount.numeric'  => 'The amount must be a number.',
    ]);

    if (Session::get('otp_verify') !== "Y") {
        return redirect()->back()->with('error', 'Please verify OTP before making a withdrawal request.');
    }
    //  $totalwithdraw = Withdraw::where('invest_id',$investid)->where('userid',Auth::user()->id)->where('amount_cut','Y')->sum('amount');
     $availble =  getUserInvestmentSummary(Auth::user()->id)['wallet_balance'] ?? 0;
     
  
    if ($request->amount > $availble) {
        return redirect()->back()->with('error', 'Insufficient Earning Balance. You can withdraw only Rs.' . $availble);
    }

    // $invest->firstminus == "Y";
    
    $new = new Withdraw();
    $new->userid = Auth::user()->id;
    // $new->invest_id = 0;
    $new->amount_cut = 'Y';
    $new->package_id = 0;
    $new->amount = $request->amount; // Make sure to validate this in the request
    $new->reason = $request->reason; // Optional reason for withdrawal
    $new->status = 'pending'; // Default status
    $new->type = 'invest'; // Default status
    $new->save();
    // $invest->save();


    Session::forget('otp_verify');
    
    return redirect()->back()->with('success','Withdraw request submitted successfully');
}

    public function investnow(Request $request,$investType,$id){


        if ($investType == "normel") {
            return view('front/invest/normel');
        }
        elseif ($investType == "business") {

            $packageid = $id;
            $package = DB::table('pakeges')->where('id', $packageid)->first();
            if(!$package){
                abort(404);
            }
            return view('front/invest/business',compact('packageid','package'));
        }
    }

    
    public function buynormelpackage(Request $request)
{
    try {
        // Validate investment amount
        $request->validate([
            'amount' => 'required|numeric|min:1000|max:9999',
        ], [
            'amount.required' => 'The amount field is required.',
            'amount.numeric'  => 'The amount must be a number.',
            'amount.min'      => 'The minimum amount is 1000.',
            'amount.max'      => 'The maximum amount is 9999.',
        ]);

        $user = auth()->user();

        // Check if user has enough wallet balance
        if ($request->amount > $user->wallet) {
            return response()->json([
                'errors' => ['amount' => ['Insufficient wallet balance.']]
            ], 422);
        }

        // Handle referral commission
        // $refer_by = $user->refer_by;

        $commission = 0;

         $currentMonthStart = now()->startOfMonth();

        $eligibleReferralCommission = CommissionHistory::where('referrer_id', $user->id)
            ->where('created_at', '<', $currentMonthStart)
            ->sum('amount');

            $ineligibleReferralCommission = CommissionHistory::where('referrer_id', $user->id)
    ->where('created_at', '>=', $currentMonthStart)
    ->sum('amount');

        // ✅ Step 2: Calculate already used referral amount (pending or complete)
        $alreadyUsedReferral = Withdraw::where('userid', $user->id)
            ->where('type', 'refferal')
            ->whereIn('status', ['pending', 'complete'])
            ->sum('amount');

               

        $availableReferWallet = max(0, $eligibleReferralCommission - $alreadyUsedReferral);

        $totalUsable = $user->wallet - $ineligibleReferralCommission;

  if ($request->amount > $totalUsable) {
    return response()->json([
        'errors' => [
            'amount' => [
                "You don’t have enough usable balance. You can use only ₹" . number_format($totalUsable, 2) . " (wallet + matured refer wallet)."
            ]
        ]
    ], 422);
    }


        // if ($refer_by) {
        //     $amount = $request->amount;
        //     $referpercentage = refer_amount() ?? 0; // Assuming a fixed 3% referral percentage
        //     $referrer = User::find($refer_by);

        //     if ($referrer) {
        //         $commission += ($amount * $referpercentage) / 100;
        //         $referrer->wallet += $commission; 
        //         $referrer->refer_wallet += $commission; 
        //         $referrer->save();
        //     }
        // }

        // Create investment record
        Invest::create([
            'userid' => $user->id,
            'package_id' => 0,
            'amount' => $request->amount,
            'time' => 'Months',
            'interest' => 6,
            'status' => 'Y',
            'type' => 'normal',
            'completestatus' => 'pending',
        ]);

        // Deduct wallet balance
        $user->wallet -= $request->amount;
        $user->refer_by_wallet += $commission;
        $user->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Well done! 🌟 Your funds are now invested. Let’s grow together!',
        ], 200);

    } catch (ValidationException $e) {
        return response()->json([
            'errors' => $e->errors()
        ], 422);
    }
}

    

//     public function buybusinesspackage(Request $request){


//         try {
//             $package = DB::table('pakeges')->where('id', $request->package_id)->first();

//                 $min_amount =  $package->ammount;
//                 $max_amount =  $package->max_amount;

//             if (!$package) {
//                 return response()->json([
//                     'status'  => 'error',
//                     'message' => 'Invalid package selected.',
//                 ], 422);
//             }
            

//          $min_amount = $package->ammount;
// $max_amount = $package->max_amount;


// $request->validate([
//     'amount' => 'required|numeric|min:' . $min_amount . '|max:' . $max_amount,
// ], [
//     'amount.required' => 'The amount field is required.',
//     'amount.numeric'  => 'The amount must be a number.',
//     'amount.min'      => 'The amount must be at least ' . $min_amount . '.',
//     'amount.max'      => 'The amount must not exceed ' . $max_amount . '.',
//     'amount.between'  => 'The amount must be between ' . $min_amount . ' and ' . $max_amount . '.',
// ]);

            
    
//             $user = auth()->user();
//             // Check if the user has enough wallet balance
//             // Check if user has enough wallet balance
//             if ($request->amount > Auth::user()->wallet) {
//                 return response()->json([
//                     'errors' => ['amount' => ['Insufficient wallet balance.']]
//                 ], 422);
//             }

//             $commission = 0;
            
//                   $refer_by = $user->refer_by;
//                   $total_referrals = User::where('refer_by', $refer_by)->count();
//                   if ($total_referrals >= 3 && $request->amount >= 10000) {
//                       if ($refer_by) {
//                           $amount = $request->amount;
//                           $referpercentage = refer_amount() ?? 0;
//                           $referrer = User::find($refer_by);
                  
//                           if ($referrer) {
//                               $commission = ($amount * $referpercentage) / 100;
//                               $referrer->wallet += $commission;
//                               $referrer->refer_wallet += $commission;
//                               $referrer->save();
//                           }
//                       }
//                   }
                  
                  
//             // Create investment record
//             $investment = new Invest;
//             $investment->userid = $user->id;
//             $investment->package_id = $package->id;
//             $investment->amount = $request->amount;
//             $investment->time = $package->formate;
//             $investment->type = 'business';
//             $investment->completestatus = 'pending';
//             $investment->interest = $package->interest_rate;
//             $investment->status = 'Y';
//             $investment->start_time = now(); // Store start time
//         $investment->earnings_per_second = $commission;
//             $investment->save();
//             // Deduct wallet balance
//             $user->wallet -= $request->amount;
//             $user->refer_by_wallet += $commission;
//             $user->save();
//             return response()->json([
//                 'status'  => 'success',
//                 'message' => 'Well done! 🌟 Your funds are now invested. Let’s grow together!.',
//             ], 200);
    
//         }catch (ValidationException $e) {
//             return response()->json([
//                 'errors' => $e->errors()
//             ], 422);
//         }
//     }
    
//     /**
//      * Display user's investment history including custom interest rate changes
//      *
//      * @return \Illuminate\Contracts\View\View
//      */
    public function investmentHistory()
    {
        // Get all user investments
        $investments = Invest::with('package')->with('customRates')
            ->where('userid', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Get all custom interest rate changes for this user
        $customRateChanges = CustomInterestRate::with('invest')
            ->where('userid', Auth::id())
            ->orderBy('effective_date', 'desc')
            ->get();
        
        // Get all PNL history for this user
        $pnlHistory = Pnlhistory::where('userid', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Combine all events into a timeline
        $timeline = [];
        
        // Add investments to timeline
        foreach ($investments as $investment) {
            $timeline[] = [
                'date' => $investment->created_at,
                'type' => 'investment',
                'data' => $investment,
                'description' => 'Investment of ₹' . number_format($investment->amount, 2) . ' at ' . $investment->interest . '% interest rate'
            ];
        }
        
        // Add custom rate changes to timeline
        foreach ($customRateChanges as $rateChange) {
            $timeline[] = [
                'date' => $rateChange->effective_date,
                'type' => 'rate_change',
                'data' => $rateChange,
                'description' => 'Interest rate changed from ' . $rateChange->original_interest_rate . '% to ' . 
                                $rateChange->custom_interest_rate . '% (effective ' . 
                                Carbon::parse($rateChange->effective_date)->format('d M Y') . ')'
            ];
        }
        
        // Add PNL entries to timeline
        foreach ($pnlHistory as $pnl) {
            $timeline[] = [
                'date' => $pnl->created_at,
                'type' => 'pnl',
                'data' => $pnl,
                'description' => 'PNL of ₹' . number_format($pnl->profit_amount, 2) . ' (' . $pnl->percantage . '%) added'
            ];
        }
        
 // Sort timeline by date (newest first)
usort($timeline, function($a, $b) {
    // Convert strings to Carbon objects if they're not already
    $dateA = $a['date'] instanceof Carbon ? $a['date'] : Carbon::parse($a['date']);
    $dateB = $b['date'] instanceof Carbon ? $b['date'] : Carbon::parse($b['date']);
    
    return $dateB->timestamp - $dateA->timestamp;
});
       return view('front.investment_history', compact('investments', 'customRateChanges', 'pnlHistory', 'timeline'));
    }



// public function buybusinesspackage(Request $request)
// {
//     try {
//         $package = DB::table('pakeges')->find($request->package_id);

//         if (!$package) {
//             return response()->json(['status' => 'error', 'message' => 'Invalid package.'], 422);
//         }

//         $request->validate([
//             'amount' => "required|numeric|min:{$package->ammount}|max:{$package->max_amount}"
//         ]);

//         $user = auth()->user();

//         if ($request->amount > $user->wallet) {
//             return response()->json(['errors' => ['amount' => ['Insufficient wallet balance.']]], 422);
//         }

//         $refer_by = $user->refer_by;
//         $commission = 0;

//         if ($refer_by) {
//             $referrer = User::find($refer_by);
//             $total_referrals = User::where('refer_by', $refer_by)->count();

//             // if ($total_referrals >= 3 && $request->amount >= 10000 && $referrer) {
//                 // Calculate remaining days of the month
//                 $today = now();
//                 $daysInMonth = $today->daysInMonth;
//                 $remainingDays = $daysInMonth - $today->day + 1;
//                 $percent = refer_amount() ?? 0;
//                 $fullCommission = ($request->amount * $percent) / 100;
//                 $dailyCommission = $fullCommission / $daysInMonth;
//                 $proratedCommission = $dailyCommission * $remainingDays;

//                 $commission = round($proratedCommission, 2);

//                 // Update wallet
//                 $referrer->wallet += $commission;
//                 $referrer->refer_wallet += $commission;
//                 $referrer->save();

//                 // Store in commission history
//                 CommissionHistory::create([
//                     'referrer_id' => $referrer->id,
//                     'user_id' => $user->id,
//                     'invest_id' => 0, // temp placeholder; will update after investment save
//                     'amount' => $commission,
//                     'month' => $today->format('Y-m'),
//                 ]);
//             // }
//         }

//         // Save investment
//         $investment = Invest::create([
//             'userid' => $user->id,
//             'package_id' => $package->id,
//             'amount' => $request->amount,
//             'time' => $package->formate,
//             'type' => 'business',
//             'completestatus' => 'pending',
//             'interest' => $package->interest_rate,
//             'status' => 'Y',
//             'start_time' => now(),
//             'earnings_per_second' => $commission,
//         ]);

//         // Update commission history with correct invest_id
//         if ($commission > 0) {
//             CommissionHistory::where([
//                 'referrer_id' => $referrer->id,
//                 'user_id' => $user->id,
//                 'invest_id' => 0,
//             ])->update(['invest_id' => $investment->id]);
//         }

//         $user->wallet -= $request->amount;
//         $user->refer_by_wallet += $commission;
//         $user->save();

//         return response()->json([
//             'status' => 'success',
//             'message' => 'Well done! 🌟 Your funds are now invested. Let’s grow together!',
//         ]);

//     } catch (ValidationException $e) {
//         return response()->json(['errors' => $e->errors()], 422);
//     }
// }

// public function buybusinesspackage(Request $request)
// {
//     try {
//         $package = DB::table('pakeges')->find($request->package_id);

//         if (!$package) {
//             return response()->json(['status' => 'error', 'message' => 'Invalid package.'], 422);
//         }

//         $request->validate([
//             'amount' => "required|numeric|min:{$package->ammount}|max:{$package->max_amount}"
//         ]);

//         $user = auth()->user();

//         if ($request->amount > $user->wallet) {
//             return response()->json(['errors' => ['amount' => ['Insufficient wallet balance.']]], 422);
//         }

//         $refer_by = $user->refer_by;
//         $commission = 0;
//         $referrer = null;

//         if ($refer_by) {
//             $referrer = User::find($refer_by);
//             $total_referrals = User::where('refer_by', $refer_by)->count();

//             // Calculate commission (no longer inserting into commission_histories yet)
//             $today = now();
//             $daysInMonth = $today->daysInMonth;
//             $remainingDays = $daysInMonth - $today->day + 1;
//             $percent = refer_amount() ?? 0;

//             $fullCommission = ($request->amount * $percent) / 100;
//             $dailyCommission = $fullCommission / $daysInMonth;
//             $proratedCommission = $dailyCommission * $remainingDays;

//             $commission = round($proratedCommission, 2);
//         }

//         // Save investment
//         $investment = Invest::create([
//             'userid' => $user->id,
//             'package_id' => $package->id,
//             'amount' => $request->amount,
//             'time' => $package->formate,
//             'type' => 'business',
//             'completestatus' => 'pending',
//             'interest' => $package->interest_rate,
//             'status' => 'Y',
//             'start_time' => now(),
//             'earnings_per_second' => $commission,
//         ]);

//         if ($commission > 0 && $referrer) {
//             // Update referrer wallet
//             $referrer->wallet += $commission;
//             $referrer->refer_wallet += $commission;
//             $referrer->save();
            
//             CommissionHistory::create([
//                 'referrer_id' => $referrer->id,
//                 'user_id' => $user->id,
//                 'invest_id' => $investment->id,
//                 'amount' => $commission,
//                 'month' => now()->format('Y-m'),
//             ]);
//         }

//         // Update user's wallet and refer_by_wallet
//         $user->wallet -= $request->amount;
//         $user->refer_by_wallet += $commission;
//         $user->save();

//         return response()->json([
//             'status' => 'success',
//             'message' => 'Well done! 🌟 Your funds are now invested. Let’s grow together!',
//         ]);

//     } catch (ValidationException $e) {
//         return response()->json(['errors' => $e->errors()], 422);
//     } catch (\Throwable $e) {
//         return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
//     }
// }



public function buybusinesspackage(Request $request)
{
    try {
        $package = DB::table('pakeges')->find($request->package_id);

        if (!$package) {
            return response()->json(['status' => 'error', 'message' => 'Invalid package.'], 422);
        }

        $request->validate([
            'amount' => "required|numeric|min:{$package->ammount}|max:{$package->max_amount}"
        ]);

        $user = auth()->user();

        // ✅ Step 1: Calculate previous months' referral commission (exclude current month)
        $currentMonthStart = now()->startOfMonth();

        $eligibleReferralCommission = CommissionHistory::where('referrer_id', $user->id)
            ->where('created_at', '<', $currentMonthStart)
            ->sum('amount');

            $ineligibleReferralCommission = CommissionHistory::where('referrer_id', $user->id)
    ->where('created_at', '>=', $currentMonthStart)
    ->sum('amount');

        // ✅ Step 2: Calculate already used referral amount (pending or complete)
        $alreadyUsedReferral = Withdraw::where('userid', $user->id)
            ->where('type', 'refferal')
            ->whereIn('status', ['pending', 'complete'])
            ->sum('amount');

               

        $availableReferWallet = max(0, $eligibleReferralCommission - $alreadyUsedReferral);

        // $totalUsable = $user->wallet - $ineligibleReferralCommission;
        
        $totalUsable = (float)$user->wallet - (float)$ineligibleReferralCommission;


  if ($request->amount > $totalUsable) {
    return response()->json([
        'errors' => [
            'amount' => [
                "You don’t have enough usable balance. You can use only ₹" . number_format($totalUsable, 2) . " (wallet + matured refer wallet)."
            ]
        ]
    ], 422);
    }

        // ✅ Step 4: Deduct proportionally
        // $walletToUse = min($user->wallet, $request->amount);
        
        $walletToUse = min((float)$user->wallet, (float)$request->amount);


        $referToUse = $request->amount - $walletToUse;

        if ($referToUse > $availableReferWallet) {
            return response()->json([
                'errors' => ['amount' => ['Requested amount exceeds your matured referral balance.']]
            ], 422);
        }

        $refer_by = $user->refer_by;
        $commission = 0;
        $referrer = null;

        if ($refer_by) {
            $referrer = User::find($refer_by);
            $today = now();
            $daysInMonth = $today->daysInMonth;
            $remainingDays = $daysInMonth - $today->day + 1;
            $percent = refer_amount() ?? 0;

            $fullCommission = ($request->amount * $percent) / 100;
            $dailyCommission = $fullCommission / $daysInMonth;
            $proratedCommission = $dailyCommission * $remainingDays;
            $commission = round($proratedCommission, 2);
        }

        // ✅ Step 6: Save Investment
        $investment = Invest::create([
            'userid' => $user->id,
            'package_id' => $package->id,
            'amount' => $request->amount,
            'time' => $package->formate,
            'type' => 'business',
            'completestatus' => 'pending',
            'interest' => $package->interest_rate,
            'status' => 'Y',
            'start_time' => now(),
            'earnings_per_second' => $commission,
        ]);

        // ✅ Step 7: Give commission to referrer
        if ($commission > 0 && $referrer) {
            
            // $referrer->wallet += $commission;
            
        $referrer->wallet = (float)$referrer->wallet + (float)$commission;
$referrer->refer_wallet = (float)$referrer->refer_wallet + (float)$commission;
            
            
            $referrer->save();

            CommissionHistory::create([
                'referrer_id' => $referrer->id,
                'user_id' => $user->id,
                'invest_id' => $investment->id,
                'amount' => $commission,
                'month' => now()->format('Y-m'),
            ]);
        }

        // ✅ Step 8: Update user wallet
      $user->wallet = (float)$user->wallet - (float)$walletToUse;
$user->refer_by_wallet = (float)$user->refer_by_wallet + (float)$commission;

        $user->save();

        // ✅ Step 9: Mark referral usage
        if ($referToUse > 0) {
            Withdraw::create([
                'userid' => $user->id,
                'type' => 'refferal',
                'amount' => $referToUse,
                'status' => 'complete',
                'notes' => 'Used for business package investment',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => '✅ Investment successful! Your money is now working for you.',
        ]);
    } catch (ValidationException $e) {
        return response()->json(['errors' => $e->errors()], 422);
    } catch (\Throwable $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
}



    
}