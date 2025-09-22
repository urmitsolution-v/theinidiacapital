@section('title', 'Dashboard - Stock-Market')
@extends('layout.admin')
@section('content')


@php

$userId = $row->id;
    
    // Fetch all years where user has earnings
    $years = App\Models\CustomInterestRate::where('userid', $userId)
        ->selectRaw('YEAR(effective_date) as year')
        ->distinct()
        ->pluck('year');

    $report = [];

    foreach ($years as $year) {
        $monthly = [];

        for ($month = 1; $month <= 12; $month++) {
            // Get earned amount and interest dates
            $earnedData = App\Models\CustomInterestRate::where('userid', $userId)
                ->whereYear('effective_date', $year)
                ->whereMonth('effective_date', $month)
                ->get(['amount', 'effective_date', 'investment_amount']);

            $totalEarned = $earnedData->sum('amount');

            // Get total investment in that month
            $invested = App\Models\Invest::where('userid', $userId)
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->sum('amount');

            $growth = ($invested > 0) ? ($totalEarned / $invested) * 100 : 0;

            $monthly[] = [
                'month' => date('F', mktime(0, 0, 0, $month, 10)),
                'invested' => $invested,
                'earned' => $totalEarned,
                'growth' => $growth,
                'details' => $earnedData, // Individual records with date and amount
            ];
        }

        $report[$year] = $monthly;
    }


@endphp

<style>

.bbbbbbr .card {
    margin-bottom: 0px;
}
.bbbbbbr .col-lg-4{
    margin-top: 5px;
}

/* Timeline Styling */
.timeline-container {
    position: relative;
    padding: 20px 0;
}

.timeline-container::before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 20px;
    width: 4px;
    background: rgba(255, 255, 255, 0.2);
    z-index: 1;
}

.timeline-item {
    position: relative;
    margin-bottom: 30px;
    padding-left: 60px;
}

.timeline-date {
    color: #aaa;
    font-size: 14px;
    margin-bottom: 5px;
}

.timeline-content {
    position: relative;
    padding: 15px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
}

.timeline-badge {
    position: absolute;
    left: 10px;
    top: 15px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
    z-index: 2;
}

.timeline-badge i {
    font-size: 20px;
}

.timeline-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.timeline-header h5 {
    margin: 0;
    color: #fff;
}

.details-card {
    background: rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    padding: 15px;
    margin-top: 10px;
}

/* Table styling */
.table-dark {
    background-color: #1a1a1a;
    color: #fff;
}

.table-dark th {
    background-color: #2c2c2c;
}

.table-dark.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(255, 255, 255, 0.05);
}
</style>
    <style>
        .dyanamic_image {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            object-fit: cover;
        }



        .profile-card {
            max-width: 350px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .profile-card:hover {
            transform: scale(1.05);
        }

        .profile-header {
            background: linear-gradient(135deg, #007bff, #00d4ff);
            padding: 50px;
            text-align: center;
            color: white;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-top: -60px;
            border: 5px solid white;
        }

        .profile-body {
            text-align: center;
            padding: 20px;
        }

        .social-icons a {
            margin: 0 10px;
            color: #007bff;
            font-size: 20px;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #0056b3;
        }
    </style>


    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-primary alert-dismissible fade show" style="margin-top: 20px;" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">View Users</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12">

                        <div class="container ">
                            <div class="card profile-card">
                                <div class="profile-header"></div>
                                <div class="card-body profile-body">
                                    <img src="@if ($row->image) {{ url('') }}/uploads/profile_photos/{{ $row->image }}
                 @else
                 {{ url('') }}/uploads/profile_photos/profile.png @endif"
                                        alt="User" class="profile-image">
                                    <h4 class="mt-3">{{ $row->name }}</h4>
                                    <p class="text-muted mb-1"><b>Wallet : Rs.{{ $row->wallet }}</b></p>
                                    <p class="text-muted"><b>Refer Code : {{ $row->id }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card p-3">
                            <h4>Personal Details</h4>
                            <table>
                                <tr>
                                    <th>First Name :</th>
                                    <td>{{ $row->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name :</th>
                                    <td>{{ $row->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td>{{ $row->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Phone :</th>
                                    <td>{{ $row->phone ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>


                   @if($referBy)
<div class="col-md-6">
    <div class="card p-3">
        <h4>Refer By Details</h4>
        <table>
            <tr>
                <th>Name:</th>
                <td>{{ $referBy->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $referBy->email ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td>{{ $referBy->phone ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
</div>
@endif


<div class="col-md-6">
    <div class="card p-3">
        <h4>Nominee Details</h4>
        <table>
            <tr>
                <th>Nominee Name:</th>
                <td>{{ $row->nominee_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Nominee Relation:</th>
                <td>{{ $row->nominee_relation ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Nominee Age:</th>
                <td>{{ $row->nominee_age ?? 'N/A' }} Years</td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td>{{ $row->nominee_contact ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
</div>


                    <div class="col-md-6">
                        <div class="card p-3">
                            <h4>Bank & Kyc Details</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="table-dark">Bank Name</th>
                                            <td>{{ $row->bank_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">Account Holder Name</th>
                                            <td>{{ $row->account_holder_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">Account Number</th>
                                            <td>{{ $row->account_number ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">IFSC Code</th>
                                            <td>{{ $row->ifsc_code ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">Branch Name</th>
                                            <td>{{ $row->branch_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">Aadhar Front</th>
                                            <td>
                                                @if (isset($row->aadhar_card))
                                                    <a href="{{ url('') }}/{{ $row->aadhar_card }}" target="_blank">
                                                        <img src="{{ url('') }}/{{ $row->aadhar_card }}"
                                                            class="img-thumbnail" width="100px" height="80px">
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">Aadhar Back</th>
                                            <td>
                                                @if (isset($row->aadhar_card_back))
                                                    <a href="{{ url('') }}/{{ $row->aadhar_card_back }}" target="_blank">
                                                        <img src="{{ url('') }}/{{ $row->aadhar_card_back }}"
                                                            class="img-thumbnail" width="100px" height="80px">
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">Bank Passbook</th>
                                            <td>
                                                @if (isset($row->cancel_chaque))
                                                    <a href="{{ url('') }}/{{ $row->cancel_chaque }}" target="_blank">
                                                        <img src="{{ url('') }}/{{ $row->cancel_chaque }}"
                                                            class="img-thumbnail" width="100px" height="80px">
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">PAN Number</th>
                                            <td>{{ $row->pan_number ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">PAN Card</th>
                                            <td>
                                                @if (isset($row->pan_card))
                                                    <a href="{{ url('') }}/{{ $row->pan_card }}" target="_blank">
                                                        <img src="{{ url('') }}/{{ $row->pan_card }}"
                                                            class="img-thumbnail" width="100px" height="80px">
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-dark">Bank Passbook/ Cancel Chque photo</th>
                                            <td>
                                                @if (isset($row->bank_identity))
                                                    <a href="{{ url('') }}/{{ $row->bank_identity }}" target="_blank">
                                                        <img src="{{ url('') }}/{{ $row->bank_identity }}"
                                                            class="img-thumbnail" width="100px" height="80px">
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card">
                            <div class="comments-form cus-rounded-1 nb3-bg p-4">
                                <h6 class="message__title mb-8 mb-lg-10 text-warning">
                                    Dahboard
                                </h6>
                              
                                @include('admin.particles.userdashboard')

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card p-3">
                            @php
                                $totalReferralUsers = App\Models\User::where('refer_by', $row->id)->count();
                            @endphp
                            <h5>Total Referrals = {{ $totalReferralUsers }}</h5>
                            <h5>Total Referral Earning : Rs.{{ $row->refer_wallet ?? 0 }}</h5>
                        </div>
                    </div>


                   
                </div>
            </div>
        </div>

        <!-- Referral Summary & List start -->
<section class="company-story position-relative z-0 pt-120 pb-60">
  <div class="animation position-absolute w-100 h-100 z-n1">
    <img
      src="{{url('website')}}/assets/images/star3.png"
      alt="vector"
      class="position-absolute top-0 end-0 pt-10 pe-20 me-20 d-none d-xxl-flex previewSkew"
    />
  </div>
  <div class="container">
    <div class="row gy-15 gy-lg-0 justify-content-center align-items-center">
      <div class="col-12">
        <h4>Referral List</h4>
       <p class="my-2">
  {{-- <strong>Total Referral Earning:</strong> Rs.{{ number_format($totalReferralEarning, 2) }} --}}
  
</p>
<p>{{ $row->name }} available referral wallet balance is <strong>Rs.{{ number_format($row->refer_wallet, 2) }}</strong></p>
<p class="text-warning">{{ $row->name }} can withdraw only from previous months: <strong>Rs.{{ number_format($withdrawableAmount, 2) }}</strong></p>

</div>
      <div class="col-12 mt-0 table-responsive">
        <table class="table table-bordered border-light text-center mt-4 text-white">
          <thead class="table-dark">
            <tr>
              <th>SN</th>
              <th>Username</th>
              <th>Earning from User</th>
              <th>Total Invest</th>
              <th>Register Date</th>
              <th>Commission Details</th>
            </tr>
          </thead>
          <tbody>
            @foreach($referredUsers as $key => $refUser)
              @php
                $userCommissions = $commissionsGrouped[$refUser->id] ?? collect();
                $userTotalCommission = $userCommissions->sum('amount');
              @endphp
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $refUser->name }}</td>
                <td>Rs.{{ number_format($userTotalCommission, 2) }}</td>
                <td>Rs.{{ number_format($refUser->investments->sum('amount'), 2) }}</td>
                <td>{{ \Carbon\Carbon::parse($refUser->created_at)->format('d-m-Y h:i A') }}</td>
                <td>
                  @if($userCommissions->count())
                    <ul class="text-start px-2">
                      @foreach($userCommissions as $comm)
                        <li>
                          ₹{{ number_format($comm->amount, 2) }} 
                          on {{ \Carbon\Carbon::parse($comm->created_at)->format('d M Y') }} 
                          {{-- (Investment ID: {{ $comm->invest_id }}) --}}
                        </li>
                      @endforeach
                    </ul>
                  @else
                    <span>No commissions yet</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- Referral Summary & List end -->

<!-- Commission History Table -->
<section class="company-story pt-60 pb-120">
  <div class="container">
    <div class="row gy-4">
      <div class="col-12">
        <h4 class="mb-3">All Commission History</h4>
        <div class="table-responsive">
          <table class="table table-bordered border-light text-center mt-2 text-white">
            <thead class="table-dark">
              <tr>
                <th>SN</th>
                <th>From User</th>
                <th>Investment ID</th>
                <th>Commission Amount</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
             @php $sn = 1; $currentMonthStart = \Carbon\Carbon::now()->startOfMonth(); @endphp
@foreach($commissionsGrouped as $refUserId => $records)
  @foreach($records as $comm)
    @php
      $isWithdrawable = \Carbon\Carbon::parse($comm->created_at)->lt($currentMonthStart);
    @endphp
    <tr>
      <td>{{ $sn++ }}</td>
      <td>{{ \App\Models\User::find($comm->user_id)->name ?? 'Unknown' }}</td>
      <td>{{ $comm->invest_id }}</td>
      <td>
        Rs.{{ number_format($comm->amount, 2) }}
        @if($isWithdrawable)
          <span class="badge bg-success">Withdrawable</span>
        @else
          <span class="badge bg-secondary">Next Month</span>
        @endif
      </td>
      <td>{{ \Carbon\Carbon::parse($comm->created_at)->format('d-m-Y h:i A') }}</td>
    </tr>
  @endforeach
@endforeach
@if($sn === 1)
  <tr>
    <td colspan="5">No commission history found.</td>
  </tr>
@endif

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>



        <section class="trade_on a2-bg pt-120 pb-120 position-relative z-0">
    <div class="container">
        <div class="row">
            
        <!-- Investment Summary Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Investment Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>Start Date</th>
                                        <th>Original Rate</th>
                                        <th>Current Rate</th>
                                        {{-- <th>Earnings</th> --}}
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($investments as $investment)
                                    
                                        @php
                                            $investmentData = calculateInvestmentEarnings($investment->id, Auth::id());
                                            $currentRate = $investmentData['interest_rate'];
                                            $isCustomRate = $investmentData['is_custom_rate'];
                                            $originalRate = $isCustomRate ? $investmentData['original_rate'] : $currentRate;
                                        @endphp
                                        <tr>
                                            <td>

                                                @if($investment->package_id == 0)
                                                    Normal Package
                                                @else
                                                    {{ $investment->package->category ?? 'N/A' }}
                                                @endif
                                            </td>
                                            <td>₹{{ number_format($investment->amount, 2) }}</td>
                                            <td>{{ $investment->created_at->format('d M Y') }}</td>
                                            <td>{{ $originalRate }}%</td>
                                            <td>
                                                @if($isCustomRate)
                                                    <span class="badge bg-success">{{ $currentRate }}%</span>
                                                @else
                                                    {{ $currentRate }}%
                                                @endif
                                            </td>
                                            {{-- <td>₹{{ number_format($investmentData['earning_amount'], 2) }}</td> --}}
                                            <td>
                                                <span class="badge bg-{{ $investment->completestatus == 'pending' ? 'success' : 'secondary' }}">
                                                    {{ ucfirst($investment->completestatus) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PNL History -->
        @if(count($customRateChanges) > 0)
        <div class="row mt-5">
            <div class="col-12">
                <div class="card p-0 bg-dark text-white">
                  
                    <div class="card-body">
                        <div class="table-responsive">
<h5 class="text-center mt-4">Trade Summary</h5>
<table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Sr. No.</th>
            <th>Order No</th>
            {{-- <th>Total Invest</th> --}}
            <th>Pnl Date</th>
            <th>Trade Balance</th>
            <th>Profit Amount</th>
            <th>Percentage (%)</th>
        </tr>
    </thead>
    <tbody>
        @php
            $sr = 1;
            $totalProfit = 0;
            $totalNetInvestment = 0;
            $growth = 0;
        @endphp

        @foreach($customRateChanges->groupBy('user_id') as $userId => $changes)
            @php
                $latest = $changes->sortByDesc('effective_date')->first();
                $tradeBalance = $latest->investment_amount ?? 0;

                $changesSorted = $changes->sortBy('effective_date');
                $firstChange = $changesSorted->first();
                $firstProfit = $firstChange->amount ?? 0;
                $firstInvestmentAmount = $firstChange->investment_amount ?? 0;
                $originalTradeBalance = $firstInvestmentAmount - $firstProfit;
            @endphp

            {{-- New Row: Show Original Trade Balance before first profit --}}
            <tr class="table-info fw-bold text-dark">
                <td colspan="6" class="text-center">
                    🟦 Original Trade Balance (Before First Profit) for User {{ $userId }} = ₹{{ number_format($originalTradeBalance, 3) }}
                </td>
            </tr>

            @foreach($changesSorted as $change)
                @php
                    $profit = $change->amount ?? 0;
                    $percent = $change->custom_interest_rate ?? 0;

                    $date = \Carbon\Carbon::parse($change->effective_date)->endOfDay();

                    $totalInvested = \App\Models\Invest::where('userid', $userId)
                        ->where('created_at', '<=', $date)
                        ->sum('amount');

                    $totalWithdrawn = \App\Models\Withdraw::where('userid', $userId)
                        ->where('verify_time', '<=', $date)
                        ->where('status', 'approved')
                        ->sum('amount');

                    $netInvestment = $totalInvested - $totalWithdrawn;

                    $note = '';
                    $nextChangeDate = $changesSorted->where('effective_date', '>', $change->effective_date)->first()?->effective_date ?? null;

                    $nextInvest = \App\Models\Invest::where('userid', $userId)
                        ->whereBetween('created_at', [$change->effective_date, $nextChangeDate ?? now()])
                        ->exists();

                    $nextWithdraw = \App\Models\Withdraw::where('userid', $userId)
                        ->whereBetween('verify_time', [$change->effective_date, $nextChangeDate ?? now()])
                        ->exists();

                    if ($nextInvest && $nextWithdraw) $note = 'Invest + Withdraw';
                    elseif ($nextInvest) $note = 'New Invest';
                    elseif ($nextWithdraw) $note = 'Withdraw';

                    $totalProfit += $profit;
                    $totalNetInvestment += $netInvestment;
                    $growth += $percent;
                @endphp

                <tr>
                    <td>{{ $sr++ }}</td>
                    <td>{{ str_pad($change->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ \Carbon\Carbon::parse($change->effective_date)->format('d/m/Y') }}</td>
                    <td>₹{{ number_format($change->investment_amount, 3) }}</td>
                    <td>₹{{ number_format($profit, 3) }}</td>
                    <td>{{ number_format($percent, 2) }}</td>
                </tr>

                @if($note)
                    <tr class="table-warning">
                        <td colspan="6" class="text-center text-dark">
                            📌 Note: {{ $note }}
                        </td>
                    </tr>
                @endif
            @endforeach

            {{-- Final row per user --}}
            <tr class="table-dark text-white fw-bold">
                <td colspan="2" class="text-center">
                    Total Trade Balance = ₹{{ number_format(getUserInvestmentSummary($row->id)['wallet_balance'], 2) }}
                </td>
                <td colspan="2" class="text-center">
                    Growth = {{ number_format($growth,2) }} %
                </td>
                <td colspan="2" class="text-center">
                    Total Profit = ₹{{ number_format(DB::table('custom_interest_rates')->where('status','active')->where('userid', $row->id)->sum('amount'), 2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>




                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>


<section class="container-fluid">
    <div class="container">
        <divc class="row">
            <div class="col-12">
                <div class="card">
                  @foreach($report as $year => $months)
    <div class="mb-5">
        <h3 class="mb-3 ms-3 mt-3">Year: {{ $year }}</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Month</th>
                        <th scope="col">Invested (₹)</th>
                        <th scope="col">Earned (₹)</th>
                        <th scope="col">Growth %</th>
                        <th scope="col">Details (Earn Date & Amount)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($months as $month)
                        <tr>
                            <td>{{ $month['month'] }}</td>
                            <td>₹{{ number_format($month['invested'], 2) }}</td>
                            <td>₹{{ number_format($month['earned'], 2) }}</td>
                            <td>{{ number_format($month['growth'], 2) }}%</td>
                            <td>
                                @if($month['details']->isEmpty())
                                    <span class="text-muted">No earnings</span>
                                @else
                                    <ul class="mb-0 ps-3">
                                        @foreach($month['details'] as $entry)
                                            <li>
                                                {{ \Carbon\Carbon::parse($entry->effective_date)->format('d M Y') }}
                                                – ₹{{ number_format($entry->amount, 2) }}
                                                <small class="text-muted">(from ₹{{ number_format($entry->investment_amount, 2) }})</small>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endforeach





                </div>
            </div>
        </divc>
    </div>
</section>



<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                 <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Deposit History</h4>
                    </div>
                    <div class="card-body">
                <table id="depositTable" class="table table-bordered table-striped align-middle mt-4">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Amount (₹)</th>
            <th scope="col">Payment Mode</th>
            <th scope="col">UTR</th>
            <th scope="col">Date & Time</th>
            <th scope="col">Status</th>
            <th scope="col">Screenshot</th>
        </tr>
    </thead>
    <tbody>
        @forelse($row->customerPayments->sortByDesc('id') as $index => $payment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>₹{{ number_format($payment->amount, 2) }}</td>
                <td>{{ ucfirst($payment->payment_mode ?? 'N/A') }}</td>
                <td>{{ $payment->utr ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y, h:i A') }}</td>
                <td>
                    <span class="badge 
                        @if($payment->status === 'complete') bg-success
                        @elseif($payment->status === 'reject') bg-danger
                        @else bg-warning
                        @endif
                        ">
                        {{ ucfirst($payment->status) }}
                    </span>
                    @if($payment->status === 'reject' && $payment->rejection_reason)
                        <div class="mt-1 text-danger small">
                            <strong>Reason:</strong> {{ $payment->rejection_reason }}
                        </div>
                    @endif
                </td>
                <td>
                    @if($payment->screenshot)
                        <a href="{{ url($payment->screenshot) }}" target="_blank">
                            <img src="{{ url($payment->screenshot) }}" width="80px" height="60px" class="img-thumbnail">
                        </a>
                    @else
                        <span class="text-muted">N/A</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-muted">No deposit history available.</td>
            </tr>
        @endforelse
    </tbody>
</table>


            </div>
            </div>
            </div>  
        </div>
    </div>
</section>


<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Withdraw History</h4>
                    </div>
                    <div class="card-body">
                        <table id="withdrawTable" class="table table-bordered table-striped align-middle mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Amount (₹)</th>
                                    <th scope="col">Reason / UTR / Remark</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date / Verified</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($row->withdraws->sortByDesc('id') as $index => $withdraw)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>₹{{ number_format($withdraw->amount, 2) }}</td>
                                        <td>
                                            {{ $withdraw->reason ?? 'N/A' }}
                                            
                                            @if ($withdraw->utr)
                                                <br><small class="text-info">UTR: {{ $withdraw->utr }}</small>
                                            @endif
                                            
                                            @if ($withdraw->remark)
                                                <br><small class="text-warning">Admin: {{ $withdraw->remark }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge 
                                                @if($withdraw->status === 'approved') bg-success
                                                @elseif($withdraw->status === 'rejected') bg-danger
                                                @else bg-warning
                                                @endif">
                                                {{ ucfirst($withdraw->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $withdraw->created_at->format('d M Y, h:i A') }}
                                            
                                            @if ($withdraw->verify_time)
                                                <br><small class="text-success">Verified: {{ \Carbon\Carbon::parse($withdraw->verify_time)->format('d M Y, h:i A') }}</small>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No withdraw history available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</section>




@section('header')
<!-- Datatables css -->
<link href="{{ url('admin') }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection



@section('footer')
<script src="{{ url('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('admin') }}/assets/js/pages/datatable.init.js"></script>

  <script>
        $(document).ready(function () {
            $('#depositTable').DataTable({
                responsive: true,
                pageLength: 10,
                ordering: true,
                // dom: 'Bfrtip',
              
            });

             $('#withdrawTable').DataTable({
                responsive: true,
                pageLength: 10,
                ordering: true,
                // dom: 'Bfrtip',
              
            });
        });
    </script>

@endsection

@endsection
