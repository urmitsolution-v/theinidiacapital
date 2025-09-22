@extends('layout.admin')
@section('title', 'PNL History')

@section('header')
    <style>
        table th, table td {
            white-space: nowrap;
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <h4 class="mb-4">Interest Report</h4>

            @foreach($groupedData as $year => $months)
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Year: {{ $year }}</h5>
                    </div>
                    <div class="card-body">
                        @foreach($months as $month => $dates)
                            <h6 class="text-primary">Month: {{ \Carbon\Carbon::create()->month($month)->format('F') }}</h6>
                            <table class="table table-bordered table-sm mb-4">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Invested Amount</th>
                                        <th>Interest Rate (%)</th>
                                        <th>Interest Amount</th>
                                        <th>Order ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dates as $date => $users)
                                        @foreach($users as $userId => $entries)
                                            @foreach($entries as $entry)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($date)->format('d M Y') }}</td>
                                                    <td>{{ $userMeta[$userId]['name'] ?? 'N/A' }}</td>
                                                    <td>₹{{ number_format($entry['investment_amount'], 2) }}</td>
                                                    <td>{{ $entry['rate'] }}%</td>
                                                    <td>₹{{ number_format($entry['interest_amount'], 2) }}</td>
                                                    <td>#{{ $entry['order_id'] }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
