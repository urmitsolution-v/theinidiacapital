<div class="pricing-table purple">
    <!-- Table Head -->
    {{-- <div class="pricing-label"><?= getCategoryTitle($val->category) ?></div> --}}

    <h2>Features:</h2>
    <!-- Features -->

    
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

<div class="earningampunt">Invest Date: {{ \Carbon\Carbon::parse($val->created_at)->format('d-m-Y') }}</div>

    <div class="earningampunt">Daily Earning: {{ number_format($daily_earning, 2) }}</div>
    <div class="earningampunt">Earning Amount: {{ number_format($earning_amount, 2) }}</div>
    <div class="earningampunt">New Amount: {{ number_format($new_amount, 2) }}</div>
   
    <div class="pricing-features">
        <div class="feature mb-0">Interest : <?= $val->package->interest_rate ?? ""?> %</div>
      <div class="feature mt-0"><?= $val->package->deac ?? ""?></div>
    </div>
    <!-- Price -->
    <div class="price-tag">
      <span class="symbol"><?=$val->package->currency ?? "" ?></span>
      <span class="amount"><?=$val->package->ammount ?? "" ?></span>
      <span class="after">/<?=$val->package->formate ?? "" ?></span>
    </div>
    <!-- Button -->
    @if (Auth::check())
    @else
    <a class="price-button" href="/sign-in">Get Started</a>
    @endif
  </div>