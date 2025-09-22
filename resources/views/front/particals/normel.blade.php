<div class="pricing-table purple">
    <!-- Table Head -->
    {{-- <div class="pricing-label">Star</div> --}}

    <h2>Features:</h2>

    @php
      
      $purchased_amount = $val->amount;
      $purchased_date = $val->created_at;
      $interest_percent = $val->interest;


      // Calculate days passed
$days_passed = \Carbon\Carbon::parse($purchased_date)->diffInDays(now());

$daily_earning = ($interest_percent / 100) * $purchased_amount;




// Calculate earning amount
$earning_amount = ($interest_percent / 100) * $purchased_amount * $days_passed;

// Calculate new amount
$new_amount = $purchased_amount + $earning_amount;

    @endphp

@php
    $daily_earningT += 10;
@endphp

<div class="earningampunt">Invest Date: {{ \Carbon\Carbon::parse($val->created_at)->format('d-m-Y') }}</div>

    <div class="earningampunt">Daily Earning: {{ number_format($daily_earning, 2) }}</div>
    <div class="earningampunt">Earning Amount: {{ number_format($earning_amount, 2) }}</div>
    <div class="earningampunt">New Amount: {{ number_format($new_amount, 2) }}</div>

    <!-- Features -->
    <div class="pricing-features">

      <div class="feature">Interest : 6 - 7%</div>
      <div class="feature">All Starter Package Features</div>
      <div class="feature">Basic Risk Management Tools</div>
      <div class="feature">Quarterly Portfolio Review</div>
      <div class="feature">24/7 Customer Support</div>
      <div class="feature">Monthly Portfolio Review</div>

    </div>
    <!-- Price -->
    <div class="price-tag">
      <span class="symbol">₹</span>
      <span class="amount" style="font-size: 20px;">1000 - 9999</span>
      <span class="after">/ Month</span>
    </div>
    <!-- Button -->

    @if (Auth::check())
    @else
    <a class="price-button" href="/sign-in">Get Started</a>
    @endif
  </div>