<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionCompletedMail;
use App\Mail\WithdrawCompletedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Usertype;
use App\Models\Withdraw;
use App\Models\Projects;
use App\Models\Invest;
use App\Models\Pnlhistory;
use App\Models\CustomInterestRate;
use App\Models\CRM\Customerpayment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class AdminpanelController extends Controller
{
    public function updatetransaction(Request $request)
    {
        // Validate request inputs
        $request->validate([
            'transaction_id' => 'required|exists:customer_payment,id', 
            'status' => 'required|in:pending,complete,reject', 
        ]);
        $payment = Customerpayment::findOrFail($request->transaction_id);
        $user = User::findOrFail($payment->customer_id); 
        if ($request->status == "complete") {
            $user->wallet += $payment->amount;
            $user->save();
             Mail::to($user->email)->send(new TransactionCompletedMail($user, $payment));
        }
       $payment->status = $request->status;
       $payment->rejection_reason = $request->rejection_reason;
        $payment->save();
        return redirect()->back()->with('success', 'Transaction Updated Successfully!');
    }
 
 
    public function updatewithdraw(Request $request) {
        $request->validate([
            'transaction_id' => 'required|exists:withdraw,id', 
            'status' => 'required|in:pending,complete,reject', 
        ]);
    
        $payment = Withdraw::findOrFail($request->transaction_id);
        
        $user = $payment->user;
    
        $payment->amount_cut = ($request->status == "reject") ? 'N' : 'Y';
    
        $payment->status = $request->status;
        $payment->remark = $request->remark;
        $payment->utr = $request->utr;
        $payment->verify_time = now(); 

        $payment->save();

        if($payment->type == "refferal" && $request->status == "reject"){
             $user = $payment->user; 

        $user->refer_wallet += $payment->amount;
        $user->wallet += $payment->amount;
        $user->save();
        }
    
    if ($request->status == "complete" && $user) {
       Mail::to($user->email)->send(new WithdrawCompletedMail($user, $payment));
    }
    
        return redirect()->back()->with('success', 'Withdraw Updated Successfully!');
    }
    
    

    public function gettransaction($modelid){
        $row  = Customerpayment::findorfail($modelid);
        return view('admin/transaction/edit',compact('row'));
        
    }

    public function getwithdraw($modelid){
        $row  = Withdraw::findorfail($modelid);
        return view('admin/transaction/getwithdraw',compact('row'));
        
    }

    public function transactions(Request $request) {
        $data['payments'] = Customerpayment::where('status', 'pending')->latest()->get();
    
        if ($request->ajax()) {
           
          
            // $query = CustomerPayment::query()->with('user')->latest();
            $query = Customerpayment::with('user')->latest();
    

           

            // Filter by Request No
            if ($request->has('request_no') && !empty($request->request_no)) {
                $query->where('id', 'like', "%{$request->request_no}%");
            }
    
            if ($request->has('username') && !empty($request->username)) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('name', 'like', "%{$request->username}%");
                });

                
            }
            
            // 🔍 Debug the query
           


            
            // 🔹 Filter by Customer ID (Direct match)
            if ($request->has('customer_id') && !empty($request->customer_id)) {
                $query->where('customer_id', $request->customer_id);
            }
    
            // Filter by Status
            if ($request->has('status') && !empty($request->status)) {
                $query->where('status', $request->status);
            }
    
            // Filter by Date Range
            if ($request->has('from_date') && $request->has('to_date') && !empty($request->from_date) && !empty($request->to_date)) {
                $dateColumn = $request->date_filter === 'request' ? 'created_at' : 'updated_at';
                $query->whereBetween($dateColumn, [$request->from_date, $request->to_date]);
            }
    
            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('customer_id', function ($payment) {
                    return $payment->user ? $payment->user->name : 'N/A';
                })
                ->editColumn('screenshot', function ($payment) {
                    return $payment->screenshot ? 
                        '<a href="' . $payment->screenshot . '" target="_blank">
                            <img src="' . $payment->screenshot . '" alt="Screenshot" class="img-thumbnail" width="50">
                        </a>' : 'No Screenshot';
                })
                ->editColumn('action', function ($payment) {
                    return '<a href="javascript:void(0)" onclick="openmodel('.$payment->id.')" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>';
                })
                ->editColumn('status', function ($payment) {
                    if ($payment->status == 'pending') {
                        return '<button class="badge border-0 bg-warning">Pending</button>';
                    } elseif ($payment->status == 'complete') {
                        return '<button class="badge border-0 bg-success">Complete</button>';
                    } elseif ($payment->status == 'reject') {
                        return '<button class="badge border-0 bg-danger">Reject</button>';
                    } else {
                        return 'Unknown Status';
                    }
                })
                ->editColumn('created_at', function ($payment) {
                    return Carbon::parse($payment->created_at)->format('d/m/Y h:iA'); // 20/02/2025 09:10PM
                })
                ->editColumn('updated_at', function ($payment) {
                    return Carbon::parse($payment->updated_at)->format('d/m/Y h:iA'); // 20/02/2025 09:10PM
                })
                ->rawColumns(['action', 'screenshot', 'status', 'created_at', 'updated_at'])
                ->make(true);
        }
    
        return view('admin/transaction/index', $data);
    }
    


    public function updateTransactionStatus(Request $request, $id)
{
    $payment = CustomerPayment::findOrFail($id);
    $payment->status = $request->status;
    $payment->save();

    // Send email when transaction is marked as complete
    if ($payment->status === 'complete') {
        Mail::to($payment->user->email)->send(new TransactionCompletedMail($payment));
    }

    return response()->json(['message' => 'Transaction updated successfully']);
}
    
    
    public function kycrequests(Request $request)
    {
        $data['users'] = User::where('kyc_status', 'apply')->orderBy('kyc_time','desc')->get();
    
        if ($request->ajax()) {
            $query = User::query()->where('kyc_status', '!=', 'pending')->orderBy('kyc_time','desc');
           // Filter by Request No (User ID)
            if ($request->has('request_no') && !empty($request->request_no)) {
                $query->where('id', 'like', "%{$request->request_no}%");
            }
    
            // Filter by KYC Status
            if ($request->has('status') && !empty($request->status)) {
                $query->where('kyc_status', $request->status);
            }
    
            // Filter by Date Range
            if ($request->has('from_date') && $request->has('to_date') && !empty($request->from_date) && !empty($request->to_date)) {
                $query->whereBetween('kyc_date', [$request->from_date, $request->to_date]);
            }
    
            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->editColumn('username', function ($user) {
                    return $user->name; // Assuming 'name' is the username field
                })
                ->editColumn('mobile', function ($user) {
                    return $user->mobile ?? 'N/A';
                })
                ->editColumn('email', function ($user) {
                    return $user->email ?? 'N/A';
                })
                ->editColumn('kyc_status', function ($user) {
                    // Display status as a badge
                    if ($user->kyc_status == 'apply') {
                        return '<button class="badge border-0 bg-warning">Pending</button>';
                    } elseif ($user->kyc_status == 'complete') {
                        return '<button class="badge border-0 bg-success">complete</button>';
                    } elseif ($user->kyc_status == 'reject') {
                        return '<button class="badge border-0 bg-danger">Rejected</button>';
                    } else {
                        return 'Unknown';
                    }
                })
                ->editColumn('kyc_date', function ($user) {
                    return $user->kyc_date ? Carbon::parse($user->kyc_date)->format('d/m/Y h:i A') : 'N/A';
                })
                ->editColumn('action', function($payment) {
                    return '<a href="javascript:void(0)" onclick="openmodel('.$payment->id.')" data-bs-toggle="modal" data-bs-target="#exampleModal">View & Update
                    </a>';
                })

                ->rawColumns(['action', 'kyc_status'])
                ->make(true);
        }
    
        return view('admin/transaction/kyc', $data);
    }
    
    public function viewkyc(Request $request,$id) {
        $row = User::findorfail($id);
        if($request->method() == "POST"){
            $row->kyc_status = $request->kyc_status;
            $row->kyc_reason = $request->kyc_reason;
            $row->save();
            return redirect()->back()->with('success','Updated Successfully');
        }
        return view('admin/transaction/viewkyc',compact('row'));
    }

    public function withdraw(Request $request)
    {
        $searchkey = $request->query('type');  // Use $request->query() to safely retrieve the 'type' parameter
    
        if ($request->ajax()) {


        

            // Fetch the data with relationships
            $query = Withdraw::latest()->with(['user', 'invest']);
    
            // If there is a date filter, add it to the query
            if ($request->has('start_date') && $request->has('end_date')) {
                $startDate = $request->start_date;
                $endDate = $request->end_date;
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }


    
            if ($request->has('status')) {
                $query->where('status', $request->status);
            }
    
            // Return the response formatted for DataTables
            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('user_name', function ($withdraw) {
                    return $withdraw->user ? $withdraw->user->name : 'N/A';
                })
                ->addColumn('invest_name', function ($withdraw) {
                    return $withdraw->invest ? $withdraw->invest->name : 'N/A'; // Assuming 'name' is a field in the 'invests' table
                })
                ->addColumn('package_name', function ($withdraw) {
                    return $withdraw->package ? $withdraw->package->name : 'N/A'; // Assuming 'name' is a field in the 'packages' table
                })
                ->editColumn('action', function ($withdraw) {
                    return $withdraw->id ?
                        '<a href="javascript:void(0)" onclick="openmodel(' . $withdraw->id . ')" target="_blank" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>' :
                        'No Action';
                })

                ->editColumn('created_at', function ($withdraw) {
                    return $withdraw->created_at ? $withdraw->created_at->format('d F Y h:i A') : 'N/A';
                })

                ->editColumn('status', function ($withdraw) {
                    // Check the status and return corresponding button
                    if ($withdraw->status == 'pending') {
                        return '<button class="badge border-0 bg-warning">Pending</button>';
                    } elseif ($withdraw->status == 'complete') {
                        return '<button class="badge border-0 bg-success">Complete</button>';
                    } elseif ($withdraw->status == 'reject') {
                        return '<button class="badge border-0 bg-danger">Reject</button>';
                    } else {
                        return 'Unknown Status';
                    }
                })
                ->setRowId('id') // Optional: You can set a custom row ID here
                ->rawColumns(['action','created_at','status', 'user_name', 'invest_name', 'package_name']) // Allow HTML in these columns
                ->make(true);
        }
    
        return view('admin/transaction/withdraw');
    }

    public function newpnl(Request $request){
        if ($request->isMethod('post')) {
            $request->validate([
                'user' => 'required|exists:users,id',
                'amount' => 'required|numeric|min:1',
                'profit_amount' => 'required|numeric|min:1',
                'percantage' => 'required',
                'invest' => 'required|exists:invested,id'
            ]); 
            DB::beginTransaction(); 
            try {
                $user = User::findOrFail($request->user);


                $invest = DB::table('invested')->where('id',$request->invest)->first();
                
              
                $pnl = new Pnlhistory();
                $pnl->userid = $user->id;
                $pnl->amount = $request->amount;
                $pnl->trade_balance = $user->wallet; 
                $pnl->invest = $request->invest; 
                $pnl->profit_amount = $request->profit_amount; 
                $pnl->percantage = $request->percantage; 
                $pnl->package_id = $invest->package_id; 
                $pnl->save();

                $ffamount = $invest->admin_added+$request->amount;
                $update = DB::table('invested')->where('id',$request->invest)->update(['admin_added' => $ffamount]);
                
                // $user->wallet += $request->amount;
                // $user->save();
                
                DB::commit();
    
                return redirect('/admin/pnl-history')->with('success', 'PNL record created & amount added to user wallet');
            } catch (\Exception $e) {
                DB::rollBack(); // Rollback on error
                return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
            }
        } else {
            return view('admin.transaction.newpnl');
        }
    }
    public function getpurchaedpackages(Request $request){
        $userid = $request->user_id;
        

        $invested = Invest::with('package')->where('userid', $userid)->get();
    
        // Start the return string
        $return  = '<div class="col-md-6 mb-3"><label class="form-label">Select Invest Id</label>';
        $return .= '<select class="form-control" name="invest">';
    
        if ($invested->isEmpty()) {
            $return .= '<option value="">No Packages Found</option>';
        } else {
            foreach ($invested as $investment) {
                // Check if package exists to avoid null error
                $package = $investment->package;
            
                $criteria = $package->clint_criteria ?? "5 - 6%"; // Fallback if null
                $benefit = $package->benefit ?? "5 - 6%"; 
                $amount = $investment->amount;
                $type = $investment->package_id == 0 ? 'Normal' : 'Business';
                $optionValue = $investment->id ?? 0;
                $return .= '<option value="'.$optionValue.'">' . 
                $type . ' , ' . $benefit . ' , Amount - Rs. ' . number_format($amount, 2) . 
                            '</option>';
            }            
        }
    
        $return .= '</select></div>'; 
    
        return response()->json(['html' => $return]);
    }

    // Add these methods to your AdminpanelController

public function customInterestRates(Request $request)
{
    if ($request->ajax()) {
        $query = CustomInterestRate::with(['user', 'invest'])->latest();
        
        // Filter by user
        if ($request->filled('user_id')) {
            $query->where('userid', $request->user_id);
        }
        
        // Filter by date range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $startDate = Carbon::parse($request->from_date)->startOfDay();
            $endDate = Carbon::parse($request->to_date)->endOfDay();
            $query->whereBetween('effective_date', [$startDate, $endDate]);
        }
        
        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('user_name', function ($rate) {
                return $rate->user ? $rate->user->name : 'N/A';
            })
            ->addColumn('package_details', function ($rate) {
                if ($rate->invest && $rate->invest->package) {
                    return $rate->invest->package->category . ' - ' . 
                           $rate->invest->package->benefit;
                }
                return 'N/A';
            })
            ->addColumn('investment_amount', function ($rate) {
                return $rate->invest ? '₹' . number_format($rate->invest->amount, 2) : 'N/A';
            })
            ->editColumn('effective_date', function ($rate) {
                return Carbon::parse($rate->effective_date)->format('d M Y');
            })
            ->editColumn('end_date', function ($rate) {
                return $rate->end_date ? Carbon::parse($rate->end_date)->format('d M Y') : 'Ongoing';
            })
            ->editColumn('custom_interest_rate', function ($rate) {
                return $rate->custom_interest_rate ? $rate->custom_interest_rate . '%' : '0%';
            })
            ->editColumn('status', function ($rate) {
                $statusClasses = [
                    'active' => 'bg-success',
                    'expired' => 'bg-warning',
                    'cancelled' => 'bg-danger'
                ];
                $class = $statusClasses[$rate->status] ?? 'bg-secondary';
                return '<span class="badge ' . $class . '">' . ucfirst($rate->status) . '</span>';
            })
            ->addColumn('action', function ($rate) {
                return '<a href="javascript:void(0)" onclick="editRate(' . $rate->id . ')" class="btn btn-sm btn-primary">Edit</a> ' .
                       '<a href="javascript:void(0)" onclick="cancelRate(' . $rate->id . ')" class="btn btn-sm btn-danger">Cancel</a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    
    $data['totalRecords'] = CustomInterestRate::count();
    $data['activeRecords'] = CustomInterestRate::where('status', 'active')->count();
    
    return view('admin.transaction.custom_interest_rates', $data);
}


// public function newCustomInterestRate(Request $request)
// {
//     if ($request->isMethod('post')) {
//         $request->validate([
//             'custom_interest_rate' => 'required|numeric|min:0.01',
//             'effective_date' => 'required|date',
//             'end_date' => 'nullable|date|after_or_equal:effective_date',
//             'notes' => 'nullable|string|max:500'
//         ]);

//         $users = User::get();

//         foreach ($users as $user) {
//             $userId = $user->id;

//             // Get last custom rate entry
//             $lastCustom = CustomInterestRate::where('userid', $userId)
//                 ->orderByDesc('id')
//                 ->first();

//             $lastBaseAmount = $lastCustom ? $lastCustom->investment_amount : 0;

//             // Get all investments till now
//             $investments = Invest::where('userid', $userId)->where('status', 'Y')->get();
//             if ($investments->isEmpty()) continue;

//             $investIds = $investments->pluck('id')->toArray();
//             $totalInvested = $investments->sum('amount');

//             // Withdraws since last custom interest date
//             $withdrawQuery = Withdraw::where('userid', $userId)
//                 ->whereIn('status', ['pending', 'complete'])
//                 ->whereIn('invest_id', $investIds);

//             if ($lastCustom) {
//                 $withdrawQuery->where('created_at', '>=', $lastCustom->created_at);
//             }

//             $totalWithdrawn = $withdrawQuery->sum('amount');

//             // New base amount = last base - withdraws since then
//             $baseAmount = $lastCustom ? ($lastCustom->investment_amount - $totalWithdrawn) : ($totalInvested - $totalWithdrawn);
//             $baseAmount = max(0, $baseAmount); // Ensure not negative

//             if ($baseAmount <= 0) continue;

//             // Calculate new interest
//             $interestAmount = ($baseAmount * $request->custom_interest_rate) / 100;
//             $newTotal = $baseAmount + $interestAmount;

//             // Save new custom rate
//             CustomInterestRate::create([
//                 'userid' => $userId,
//                 'invest_id' => implode(',', $investIds),
//                 'original_interest_rate' => 0,
//                 'custom_interest_rate' => $request->custom_interest_rate,
//                 'effective_date' => $request->effective_date,
//                 'end_date' => $request->end_date,
//                 'notes' => $request->notes,
//                 'amount' => round($interestAmount, 2),
//                 'investment_amount' => round($newTotal, 2),
//                 'status' => 'active',
//             ]);
//         }

//         return redirect()->route('custom.interest.rates')->with('success', 'Compound interest applied successfully.');
//     }

//     return view('admin.transaction.new_custom_interest_rate');
// }






public function newCustomInterestRate(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'custom_interest_rate' => 'required|numeric|min:0.01',
            'effective_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:effective_date',
            'notes' => 'nullable|string|max:500'
        ]);

        $users = User::get();

        foreach ($users as $user) {
            $userId = $user->id;

            // Step 1: Get all active investments of this user
            $investments = Invest::where('userid', $userId)
                ->where('status', 'Y')
                ->get();

            if ($investments->isEmpty()) {
                continue; // skip if no active investments
            }

            $investIds = $investments->pluck('id')->toArray();

            // Step 2: Net base amount calculation (invested + past interest - withdrawal)
            $baseAmount = getNetInvestedAmount($userId);

            if ($baseAmount <= 0) {
                continue;
            }

            $interestAmount = ($baseAmount * $request->custom_interest_rate) / 100;
            $newTotal = $baseAmount + $interestAmount;

            CustomInterestRate::create([
                'userid' => $userId,
                'invest_id' => implode(',', $investIds),
                'original_interest_rate' => 0,
                'custom_interest_rate' => $request->custom_interest_rate,
                'effective_date' => $request->effective_date,
                'end_date' => $request->end_date,
                'notes' => $request->notes,
                'amount' => round($interestAmount, 2),
                'investment_amount' => round($newTotal, 2),
                'status' => 'active',
            ]);
        }

        return redirect()->route('custom.interest.rates')->with('success', '✅ Compound interest applied successfully.');
    }

    return view('admin.transaction.new_custom_interest_rate');
}


public function getInvestmentDetails(Request $request)
{
    $userId = $request->user_id;
    $investId = $request->invest_id;
    
    if ($investId) {
        $investment = Invest::with('package')->findOrFail($investId);
        
        return response()->json([
            'success' => true,
            'data' => [
                'amount' => $investment->amount,
                'current_interest_rate' => $investment->interest,
                'package_name' => $investment->package ? $investment->package->category : 'N/A',
                'package_benefit' => $investment->package ? $investment->package->benefit : 'N/A',
                'investment_date' => Carbon::parse($investment->created_at)->format('d M Y')
            ]
        ]);
    } elseif ($userId) {
        $investments = Invest::with('package')
            ->where('userid', $userId)
            ->where('completestatus', 'pending')
            ->get();
        
        $options = '<option value="">Select Investment</option>';
        foreach ($investments as $investment) {
            $packageName = $investment->package ? $investment->package->category : 'N/A';
            $amount = number_format($investment->amount, 2);
            $interest = $investment->interest;
            
            $options .= "<option value='{$investment->id}'>₹{$amount} - {$packageName} ({$interest}%)</option>";
        }
        
        return response()->json(['success' => true, 'options' => $options]);
    }
    
    return response()->json(['success' => false, 'message' => 'Invalid request']);
}

public function cancelCustomInterestRate($id)
{
    $customRate = CustomInterestRate::findOrFail($id);
    $customRate->status = 'cancelled';
    $customRate->end_date = now();
    $customRate->save();
    
    return response()->json(['success' => true, 'message' => 'Custom interest rate cancelled successfully']);
}




public function updateCustomInterestRate(Request $request)
{
    $request->validate([
        'rate_id' => 'required|exists:custom_interest_rates,id',
        'custom_interest_rate' => 'required|numeric|min:0.01',
        'end_date' => 'nullable|date',
        'notes' => 'nullable|string|max:500'
    ]);
    
    $customRate = CustomInterestRate::findOrFail($request->rate_id);
    
    // Only allow editing active rates
    if ($customRate->status !== 'active') {
        return response()->json([
            'success' => false,
            'message' => 'Only active rates can be edited'
        ]);
    }
    
    $customRate->custom_interest_rate = $request->custom_interest_rate;
    
    if ($request->filled('end_date')) {
        // Validate end date is after effective date
        if (Carbon::parse($request->end_date)->lt(Carbon::parse($customRate->effective_date))) {
            return response()->json([
                'success' => false,
                'message' => 'End date must be after effective date'
            ]);
        }
        
        $customRate->end_date = $request->end_date;
        
        // If end date is today or in the past, mark as expired
        if (Carbon::parse($request->end_date)->lte(Carbon::today())) {
            $customRate->status = 'expired';
        }
    }
    
    if ($request->filled('notes')) {
        $customRate->notes = $request->notes;
    }
    
    $customRate->save();
    
    return response()->json([
        'success' => true,
        'message' => 'Custom interest rate updated successfully'
    ]);
}

public function getCustomRate($id)
{
    $customRate = CustomInterestRate::findOrFail($id);
    
    return response()->json([
        'success' => true,
        'data' => [
            'custom_interest_rate' => $customRate->custom_interest_rate,
            'end_date' => $customRate->end_date,
            'notes' => $customRate->notes
        ]
    ]);
}


    




public function pnlhistory(Request $request)
{
    $interestEntries = CustomInterestRate::with('user')->orderBy('effective_date', 'desc')->get();

    $groupedData = [];
    $userMeta = [];
    $dateMeta = [];

    foreach ($interestEntries as $entry) {
        $date = \Carbon\Carbon::parse($entry->effective_date);
        $year = $date->format('Y');
        $month = $date->format('m');
        $day = $date->format('Y-m-d');
        $userId = $entry->userid;
        $userName = $entry->user->name ?? 'Unknown';

        // Append multiple entries for the same user on the same day
        $groupedData[$year][$month][$day][$userId][] = [
            'interest_amount' => $entry->amount,
            'rate' => $entry->custom_interest_rate ?? 0,
            'order_id' => str_pad($entry->id, 5, '0', STR_PAD_LEFT),
            'investment_amount' => $entry->investment_amount,
        ];

        if (!isset($userMeta[$userId])) {
            $totalInvest = Invest::where('userid', $userId)->sum('amount');
            $userMeta[$userId] = [
                'name' => $userName,
                'amount' => $totalInvest,
            ];
        }
    }

    // Sort by year → month descending, date ascending
    krsort($groupedData);
    foreach ($groupedData as &$months) {
        krsort($months);
        foreach ($months as &$dates) {
            ksort($dates);
        }
    }

    return view('admin.transaction.pnlhistory', compact('groupedData', 'userMeta'));
}



    public function withdrawadmin(Request $request)
{
    $query = Withdraw::with(['user', 'invest'])->latest();

    // Filter by Request No
    if ($request->filled('request_no')) {
        $query->where('id', $request->request_no);
    }

    // Filter by Status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }
    
    if ($request->has('username') && !empty($request->username)) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', "%{$request->username}%");
        });
    }

    // Handle Date Filtering
    if ($request->filled('from_date') && $request->filled('to_date')) {
        $startDate = Carbon::parse($request->from_date)->startOfDay();
        $endDate = Carbon::parse($request->to_date)->endOfDay();

        if ($request->date_filter === 'request') {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } elseif ($request->date_filter === 'verified') {
            $query->whereBetween('updated_at', [$startDate, $endDate]);
        }
    }

    return DataTables::eloquent($query)
        ->addIndexColumn()
        ->addColumn('user_name', function ($withdraw) {
            return $withdraw->user ? $withdraw->user->name : 'N/A';
        })
        ->editColumn('created_at', function ($withdraw) {
            return $withdraw->created_at ? $withdraw->created_at->format('d/m/Y h:i A') : 'N/A';
        })
        ->editColumn('updated_at', function ($withdraw) {
            return $withdraw->updated_at ? $withdraw->updated_at->format('d/m/Y h:i A') : 'N/A';
        })
        ->editColumn('status', function ($withdraw) {
            $statusClasses = [
                'pending' => 'bg-warning',
                'complete' => 'bg-success',
                'reject' => 'bg-danger'
            ];
            $class = $statusClasses[$withdraw->status] ?? 'bg-secondary';
            return '<button class="badge border-0 ' . $class . '">' . ucfirst($withdraw->status) . '</button>';
        })

        ->editColumn('action', function ($withdraw) {
            if ($withdraw->status == "pending") {
                return $withdraw->id ?
                '<a href="javascript:void(0)" onclick="openmodel(' . $withdraw->id . ')" target="_blank" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>' :
                'No Action';    
            }else{
                return 
                'No Action';
            }
            
        })
        
        
        ->setRowId('id')
        ->rawColumns(['status','action'])
        ->make(true);
}



    public function maintenance(){
        return view('maintenance');
    }

    public function updateprofileadmin(Request $request){
        if($request->method() == "POST"){

             $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'destination' => 'required',
                'phone' => 'required|digits:10'
            ]);
            $data = [
                'name'  => $request->name,
                'email'  => $request->email,
                'destination'  => $request->destination,
                'phone'  => $request->phone,
            ];
            $userid = Auth::user()->id;
            DB::table('users')->where('id',$userid)->update($data);
            return redirect()->back()->with('success','Successfully Updated.');
        }
    }
    public function dashboard(){
        return view('admin.dashboard');
    }


    public function customInterestHistory(){
        // Get all user investments
        $investments = Invest::with('package')->with('customRates')
            // ->where('userid', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Get all custom interest rate changes for this user
        $customRateChanges = CustomInterestRate::with('invest','user')
            // ->where('userid', Auth::id())
            ->orderBy('effective_date', 'desc')
            ->get();

            // echo "<pre>";
            // print_r($customRateChanges->toArray());
            // exit;
        
        // Get all PNL history for this user
        $pnlHistory = Pnlhistory::
        // where('userid', Auth::id())
            orderBy('created_at', 'desc')
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

        usort($timeline, function($a, $b) {
    $dateA = $a['date'] instanceof Carbon ? $a['date'] : Carbon::parse($a['date']);
    $dateB = $b['date'] instanceof Carbon ? $b['date'] : Carbon::parse($b['date']);
    
    return $dateB->timestamp - $dateA->timestamp;
});

        return view('admin.transaction.custom_interest_history', compact('investments', 'customRateChanges', 'pnlHistory', 'timeline'));
    }


    public function profile(){
        return view('admin.profile');
    }
    public function change_password(Request $request){
        $validated = $request->validate([
            'currunt_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required| min:6'
    ]);

    #Match The Old Password

    if(!Hash::check($request->currunt_password, auth()->user()->password)){
            return back()->with("error", "Currunt Password Doesn't match!");
    }
        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");
    }

    public function createuser(Request $request){

        if (isset($_GET['type']) && !empty($_GET['type'])) {
            if ($_GET['type'] == 'customer') {
                $type = "customer";
                $title = 'Customer';
            }elseif($_GET['type'] == 'team'){
                $type = "team";
                $title = 'Team';

            }
            elseif($_GET['type'] == 'project_manager'){
                $type = "project_manager";
                $title = 'Project Manager';
        }
            elseif($_GET['type'] == 'account_manager'){
                $type = "account_manager";
                $title = 'Account Manager';
        }
    }else{
            return redirect()->route('dashboard')->with("error", "Invalid Request Found !");
        }

        if ($request->method() == "POST") {

            // $validated = $request->validate([
            //     'name' => 'required',
            //     'email' => 'required|email|unique:users',
            //     'phone' => 'required|digits:10|unique:users',
            //     'company_name' => 'required',
            //     'company_address' => 'required',
            //     'gstin_number' => 'required',
            //     'domain' => 'required',
            //     'password' => 'required|min:6',
            // ]);


            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company_name = $request->company_name;
            $user->company_address = $request->company_address;
            $user->gstin = $request->gstin_number;
            $user->domain = $request->domain;
            $user->password = Hash::make($request->password);
            $user->codeid = $request->password;

            if ($request->image) {
                $user->image = uploadImage($request->image,$user,'image');
            }

            if ($_GET['type'] == "team") {
            $user->customer_type_id = $request->customertype;
            $user->role = "team";
            }

            if ($user->save()) {
                if ($_GET['type'] == "customer") {
                    return redirect('admin/users-list?type=customer')->with('success','Customer Created Successfully');
                }elseif($_GET['type'] == "team"){
                    return redirect('admin/users-list?type=team')->with('success','Team Created Successfully');
                }
                elseif($_GET['type'] == "project_manager"){
                    return redirect('admin/users-list?type=project_manager')->with('success','Project Manager Created Successfully');
                }
                elseif($_GET['type'] == "account_manager"){
                    return redirect('admin/users-list?type=account_manager')->with('success','Account Manager Created Successfully');
                }
            }
        }

        if (isset($_GET['type']) && !empty($_GET['type'])) {
            return view('admin.usersmanagement.create',compact('title'));
        }else{
            return redirect()->route('dashboard')->with("error", "Invalid Request Found !");
        }


    }

    public function users_list(){

        if (isset($_GET['type']) && !empty($_GET['type'])) {
            if ($_GET['type'] == 'customer') {
                $user = User::where('role','customer')->get();
                $title = 'Customer ( Partner )';
                $type = 'customer';
            }elseif($_GET['type'] == 'team'){
                $user = User::where('role','team')->get();
                $title = 'Team';
                $type = "team";
            }
            elseif($_GET['type'] == 'project_manager'){
                $user = User::where('role','project_manager')->get();
                $title = 'Project Manager';
                $type = "project_manager";
            }
            elseif($_GET['type'] == 'account_manager'){
                $user = User::where('role','account_manager')->get();
                $title = 'Account Manager';
                $type = "account_manager";
            }
            return view('admin.usersmanagement.index',compact('user','title','type'));

        }else{
            return redirect()->route('dashboard')->with("error", "Invalid Request Found !");
        }
    }

    public function edit_users(Request $request, $id){

        $user = User::findOrFail($id);
        if (isset($_GET['type']) && !empty($_GET['type'])) {
            if ($_GET['type'] == 'customer') {
                $type = "customer";
                $title = "Customer";
            }elseif($_GET['type'] == 'team'){
                $type = "team";
                $title = "Team";
            }
            elseif($_GET['type'] == 'project_manager'){
                $type = "project_manager";
                $title = "Project Manager";
            }
            elseif($_GET['type'] == 'account_manager'){
                $type = "account_manager";
                $title = "Account Manager";
            }
        }else{
            return redirect()->route('dashboard')->with("error", "Invalid Request Found !");
        }

        if ($request->method() == "POST") {
            // $validated = $request->validate([
            //     'name' => 'required',
            //     'email' => 'required|email',
            //     'phone' => 'required|digits:10',
            //     'company_name' => 'required',
            //     'company_address' => 'required',
            //     'gstin_number' => 'required',
            //     'domain' => 'required',
            //     'customertype' => 'required',
            // ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company_name = $request->company_name;
            $user->company_address = $request->company_address;
            $user->gstin = $request->gstin_number;
            $user->domain = $request->domain;
            if ($request->image) {
                $user->image = updateImage($request->image,$user,'image');
            }
            if ($_GET['type'] == "team") {
                $user->customer_type_id = $request->customertype;
            }
            if (!empty($request->password)) {
                $user->codeid = $request->password;
            $user->password = Hash::make($request->password);
            }
            $user->codeid = $request->password;
            if ($user->save()) {
                if ($_GET['type'] == "customer") {
                    return redirect('admin/users-list?type=customer')->with('success','Customer Updated Successfully');
                }
                elseif($_GET['type'] == "team"){
                    return redirect('admin/users-list?type=team')->with('success','Team Updated Successfully');
                }
                elseif($_GET['type'] == "project_manager"){
                    return redirect('admin/users-list?type=project_manager')->with('success','Project Manager Updated Successfully');
                }
                elseif($_GET['type'] == "account_manager"){
                    return redirect('admin/users-list?type=account_manager')->with('success','Account Manager Updated Successfully');
                }
            }
        }
        return view('admin.usersmanagement.edituser',compact('user','title'));
    }



    // --customers-types

    public function customertypes(){
        $data = Usertype::get();
        return view('admin.customerstype',compact('data'));
    }

    public function usertypecreate(Request $request){
        $validated = $request->validate([
            'user_type' => 'required',
            'status' => 'required'
        ]);
        $usertype = new Usertype;
        $usertype->type = $request->user_type;
        $usertype->status = $request->status;
        if ($usertype->save()) {
            return redirect()->back()->with('success','Created Successfully');
        }
    }
    public function editusertype(Request $request){
        $id = $request->usertypeid;
        $usertype = Usertype::find($id);
        $usertype->type = $request->user_type;
        if ($usertype->save()) {
            return redirect()->back()->with('success','Updated Successfully');
        }
    }

    public function customerslist(){

        if (isset($_GET['type']) && !empty($_GET['type'])) {
            if ($_GET['type'] == 'customer') {
                $user =  DB::table('users')->where('users.role', '!=', 'admin')
                         ->where('users.role',  'customer')->get();
                $title = 'Customer ( Partner )';
                $type = 'customer';
            }elseif($_GET['type'] == 'team'){
                $user =  DB::table('users')
                ->join('user_types', function($join) {
                    $join->on('users.customer_type_id', '=', 'user_types.id')
                         ->where('users.role', '!=', 'admin')
                         ->where('users.role',  'team');
                })
                ->select('users.*', 'user_types.type','user_types.id as usertypeid')
                ->get();
                $title = 'Team';
                $type = "team";
            }
            elseif($_GET['type'] == 'project_manager'){
                $user = User::where('role','project_manager')->get();
                $title = 'Project Manager';
                $type = "project_manager";
            }
            elseif($_GET['type'] == 'account_manager'){
                $user = User::where('role','account_manager')->get();
                $title = 'Account Manager';
                $type = "account_manager";
            }
            return view('admin.usersmanagement.index',compact('user','title','type'));

        }else{
            return redirect()->route('dashboard')->with("error", "Invalid Request Found !");
        }


    }




// ---------common-functions--------

public function changestatus($table,$id,$colom,$value){
    DB::table($table)->where('id',$id)->update([$colom => $value]);
    return redirect()->back()->with('success','Successfully Updated');
}

public function deleterow($table,$id){
    DB::table($table)->where('id',$id)->delete();
    return redirect()->back()->with('success','Successfully Deleted');
}

// --view-users---

public function viewusers_admin(Request $request,$id){
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        if ($_GET['type'] == "team") {
            $user = User::find($id);
            $data = DB::table('projectasign')
            // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
            ->join('projects', 'projectasign.project_id', '=', 'projects.id')
            ->join('projectasignuser', 'projectasign.id', '=', 'projectasignuser.project_id')
            ->where('projectasignuser.user_id',$id)
            ->select('projectasign.*','projectasignuser.*','projects.name as project_name')
            ->get();


            //   $data = DB::table('projectasign')
            // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
            // ->join('projects', 'projectasign.project_id', '=', 'projects.id')
            // ->join('projectasignuser', 'projectasign.id', '=', 'projectasignuser.project_id')
            // ->where('projectasignuser.user_id',$id)
            // ->select('projectasign.*', 'projectstatus.id as status_id','projectasignuser.*','projectstatus.name as status_name','projects.name as project_name')
            // ->get();

            //   echo "<pre>";
            // print_r($data);
            // die;


            return view('admin.usersmanagement.viewteaminfo',compact('user','data'));

        }elseif($_GET['type'] == "customer"){
            $user = User::find($id);
            $data = DB::table('projectasign')
            // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
            ->join('projects', 'projectasign.project_id', '=', 'projects.id')
            ->where('projectasign.customer_id',$id)
            ->select('projectasign.*','projects.name as project_name')
            ->get();

            //  $data = DB::table('projectasign')
            // ->join('projectstatus', 'projectasign.work_status', '=', 'projectstatus.id')
            // ->join('projects', 'projectasign.project_id', '=', 'projects.id')
            // ->where('projectasign.customer_id',$id)
            // ->select('projectasign.*', 'projectstatus.id as status_id','projectstatus.name as status_name','projects.name as project_name')
            // ->get();

            // echo "<pre>";
            // print_r($data);
            // die;

            return view('admin.usersmanagement.viewcustomerinfo',compact('user','data'));
        }else {
            abort(404);
        }
    }else{
        abort(404);
    }
}


}