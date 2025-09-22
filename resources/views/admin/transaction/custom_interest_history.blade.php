@section('title', 'Dashboard - Tic')
@extends('layout.admin')
@section('content')

    <style>
        .dyanamic_image {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            object-fit: cover;
        }
        .btn-white{
                color: #000;
    background-color: #fff !important;
    width: max-content;
        }
    </style>



<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            @if (session()->has('success'))
                <div class="alert alert-primary alert-dismissible fade show" style="margin-top: 20px;" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">


                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Transaction</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Transaction</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">@if (isset($_GET['type']) && !empty($_GET['type']))
                                @if ($_GET['type'] == 'pending')
                                    Deposit Request
                                    @elseif($_GET['type'] == 'reject')
                                    Rejected Requests
                                    @else 
                                    Accepted Requests
                                @endif
                            @endif</h5>
                        </div>

                        <div class="card-body">
                               @if(count($customRateChanges) > 0)
        <div class="row">
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
            <th>User</th>
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
        // इस group का पहला रिकॉर्ड (सबका user वही है)
        $user = $changes->first()->user;

   
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
                <td colspan="7" class="text-center">
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
                    <td>
                        <a href="/admin/viewuser/{{ $change->userid }}" target="_blank" class="btn btn-white">View User</a>
                    </td>

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
                    Total Trade Balance = ₹@php
                          $allTradeBalance = getUserInvestmentSummaryaAll()['wallet_balance'] ?? 0;
                                                    
                                                    echo number_format($allTradeBalance, 3);
                    @endphp
                </td>
                <td colspan="3" class="text-center">
                    {{-- Growth = {{ number_format($growth,2) }} % --}}
                </td>
                <td colspan="2" class="text-center">
                    Total Profit = ₹{{ number_format(DB::table('custom_interest_rates')->where('status','active')->sum('amount'), 3) }}
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
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->



</div>
@endsection
