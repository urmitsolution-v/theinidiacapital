@extends('front.layout.index')
@section('content')

<!-- banner section start-->
<section class="banner-section pt-120 pb-120">
    <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
      <div class="row">
        <div class="col-12 breadcrumb-area">
          <h2 class="mb-4">Investment History</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li
                class="breadcrumb-item ms-2 ps-7 active"
                aria-current="page"
              >
                <span>Investment History</span>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
</section>
<!-- banner section end -->

<!-- Investment History Section -->
<section class="trade_on a2-bg pt-120 pb-120 position-relative z-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Your Investment Timeline</h4>
                    </div>
                    <div class="card-body">
                        <div class="timeline-container">
                            @if(count($timeline) > 0)
                                @foreach($timeline as $event)
                                    <div class="timeline-item">
                                      <div class="timeline-date">
    @if($event['date'] instanceof \Carbon\Carbon)
        {{ $event['date']->format('d M Y, h:i A') }}
    @else
        {{ \Carbon\Carbon::parse($event['date'])->format('d M Y, h:i A') }}
    @endif
</div>

                                        <div class="timeline-content">
                                            @if($event['type'] == 'investment')
                                              <!--  <div class="timeline-badge bg-primary">
                                                    <i class="bi bi-cash-coin"></i>
                                                </div> -->
                                                <div class="timeline-header">
                                                    <h5>New Investment</h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>{{ $event['description'] }}</p>
                                                    <div class="details-card">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <strong>Package:</strong> 
                                                                @if($event['data']->package_id == 0)
                                                                    Normal Package
                                                                @else
                                                                    {{ $event['data']->package->category ?? 'N/A' }}
                                                                @endif
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>Amount:</strong> ₹{{ number_format($event['data']->amount, 2) }}
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>Interest Rate:</strong> {{ $event['data']->interest }}%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($event['type'] == 'rate_change')
                                             <!--   <div class="timeline-badge bg-success">
                                                    <i class="bi bi-percent"></i>
                                                </div> -->
                                                <div class="timeline-header">
                                                    <h5>Interest Rate Changed</h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>{{ $event['description'] }}</p>
                                                    <div class="details-card">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <strong>Investment:</strong> ₹{{ number_format($event['data']->invest->amount ?? 0, 2) }}
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>Original Rate:</strong> {{ $event['data']->original_interest_rate }}%
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>New Rate:</strong> {{ $event['data']->custom_interest_rate }}%
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-4">
                                                                <strong>Effective From:</strong> {{ \Carbon\Carbon::parse($event['data']->effective_date)->format('d M Y') }}
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>Valid Until:</strong> 
                                                                {{ $event['data']->end_date ? \Carbon\Carbon::parse($event['data']->end_date)->format('d M Y') : 'Ongoing' }}
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>Status:</strong> 
                                                                <span class="badge bg-{{ $event['data']->status == 'active' ? 'success' : ($event['data']->status == 'expired' ? 'warning' : 'danger') }}">
                                                                    {{ ucfirst($event['data']->status) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @if($event['data']->notes)
                                                            <div class="row mt-2">
                                                                <div class="col-12">
                                                                    <strong>Notes:</strong> {{ $event['data']->notes }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @elseif($event['type'] == 'pnl')
                                             <!--   <div class="timeline-badge bg-info">
                                                    <i class="bi bi-graph-up-arrow"></i>
                                                </div> -->
                                                <div class="timeline-header">
                                                    <h5>PNL Added</h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>{{ $event['description'] }}</p>
                                                    <div class="details-card">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <strong>Amount:</strong> ₹{{ number_format($event['data']->amount, 2) }}
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>Profit:</strong> ₹{{ number_format($event['data']->profit_amount, 2) }}
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>Percentage:</strong> {{ $event['data']->percantage }}%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-5">
                                    <p>No investment history found.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                        <th>Earnings</th>
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
                                            <td>₹{{ number_format($investmentData['earning_amount'], 2) }}</td>
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

        <!-- Custom Interest Rate History -->
        @if(count($customRateChanges) > 0)
        <div class="row mt-5">
            <div class="col-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Custom Interest Rate History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-dark table-striped">
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
                    Total Trade Balance = ₹{{ number_format(getUserInvestmentSummary(Auth::user()->id)['wallet_balance'], 2) }}
                </td>
                <td colspan="2" class="text-center">
                    Growth = {{ number_format($growth,2) }} %
                </td>
                <td colspan="2" class="text-center">
                    Total Profit = ₹{{ number_format(DB::table('custom_interest_rates')->where('status','active')->where('userid', Auth::user()->id)->sum('amount'), 2) }}
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

<style>
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
@endsection
