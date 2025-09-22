@extends('front.layout.index')
@section('content')


<style>
  #withdrawForm label{
        color: #fff;
    margin-bottom: 10px;
  }
</style>

<!-- banner section start-->
<section class="banner-section pt-120 pb-120">
  <div class="container mt-lg-0 pt-18 pt-xl-20">
    <div class="row">
      <div class="col-12 breadcrumb-area">
        <h2 class="mb-4">Referral List</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item ms-2 ps-7 active" aria-current="page">
              <span>Referral List</span>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- banner section end -->

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
<p>Your available referral wallet balance is <strong>Rs.{{ number_format(auth()->user()->refer_wallet, 2) }}</strong></p>
<p class="text-warning">You can withdraw only from previous months: <strong>Rs.{{ number_format($withdrawableAmount, 2) }}</strong></p>
      
<button class="btn btn-sm btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#withdrawModal">
    Withdraw Amount
  </button>
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

<!-- Withdraw Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white border-light">
      <div class="modal-header">
        <h5 class="modal-title">Withdraw Referral Commission</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form id="withdrawForm">
        @csrf
        <div class="modal-body">
          {{-- <p>Your referral wallet balance is 
            <strong>Rs.{{ number_format(auth()->user()->refer_wallet, 2) }}</strong><br>
            You can withdraw up to: <strong>Rs.{{ number_format($withdrawableAmount, 2) }}</strong>
          </p> --}}

          <input type="hidden" name="reason" value="Withdrawal of referral earnings as per policy.">

          <div class="mb-3">
            <label for="name">Your Name</label>
            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
          </div>

          <div class="mb-3">
            <label for="email">Your Email</label>
            <input type="email" class="form-control" value="{{ auth()->user()->email }}" id="user_email" readonly>
          </div>

          <div class="mb-3">
            <label for="amount">Withdraw Amount</label>
            <input type="number" step="0.01"  class="form-control" id="withdraw_amount" name="amount" required>
          </div>

          <div class="mb-3">
            <label>Enter OTP (sent to your email)</label>
            <div class="d-flex">
              <input type="text" class="form-control me-2" name="otp" id="otp_input" placeholder="Enter OTP" required>
              <button type="button" class="btn btn-sm btn-warning" id="send_otp_btn">Send OTP</button>
            </div>
            <div id="otp_status" class="small mt-1 text-info"></div>
          </div>

          @php
    $withdrawableAmountValue = $withdrawableAmount; // Use in JS
@endphp

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Submit Withdraw Request</button>
        </div>
      </form>
    </div>
  </div>
</div>


@section('footer')

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const maxAmount = {{ $withdrawableAmountValue }};
    const amountInput = document.getElementById("withdraw_amount");
    const sendOtpBtn = document.getElementById("send_otp_btn");

    function checkAmount() {
      const enteredAmount = parseFloat(amountInput.value);
      if (enteredAmount > maxAmount) {
        sendOtpBtn.style.display = "none";
      } else {
        sendOtpBtn.style.display = "inline-block";
      }
    }

    amountInput.addEventListener("input", checkAmount);

    // Initial check (in case of prefilled value)
    checkAmount();
  });
</script>

<script>
document.getElementById('send_otp_btn').addEventListener('click', function () {
    const email = document.getElementById('user_email').value;
    const otpStatus = document.getElementById('otp_status');

    // Show sending status
    otpStatus.innerText = 'OTP Sending...';

    fetch("{{ route('refer.withdraw.sendOtp') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ email: email })
    })
    .then(res => res.json())
    .then(data => {
        otpStatus.innerText = data.message; // keep this in status div only
    });
});

document.getElementById('otp_input').addEventListener('keyup', function () {
    const otp = this.value;
    const otpStatus = document.getElementById('otp_status');

    if (otp.length === 6) {
        fetch("{{ route('refer.withdraw.verifyOtp') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ otp: otp })
        })
        .then(res => res.json())
        .then(data => {
            otpStatus.innerText = data.message;

            const submitBtn = document.getElementById('submitBtn');

            if (data.success) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        });
    }
});

document.getElementById('withdrawForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const form = this;
    const submitBtn = document.getElementById('submitBtn');

    // Disable the button and show loading text
    submitBtn.disabled = true;
    const originalText = submitBtn.innerText;
    submitBtn.innerText = 'Processing...';

    const formData = new FormData(form);

    fetch("{{ route('refer.withdraw.submit') }}", {
        method: "POST",
        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        Swal.fire({
            icon: data.success ? 'success' : 'error',
            title: data.message
        });

        submitBtn.innerText = originalText;
        submitBtn.disabled = !data.success;

        if (data.success) {
            setTimeout(() => location.reload(), 2000);
        }
    })
    .catch(() => {
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong. Try again!'
        });
        submitBtn.innerText = originalText;
        submitBtn.disabled = false;
    });
});
</script>

@endsection
@endsection
