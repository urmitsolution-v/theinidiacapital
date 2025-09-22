@extends('front.layout.index')
@section('content')



 <!-- banner section start-->
 <section class="banner-section pt-120 pb-120">
  <div class="container mt-lg-0 pt-18 pt-xl-20">
    <div class="row">
      <div class="col-12 breadcrumb-area">
        <h2 class="mb-4">Deposit History</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li
              class="breadcrumb-item ms-2 ps-7 active"
              aria-current="page"
            >
              <span>Deposit History</span>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- banner section end -->

<!-- Company Story start-->
<section class="company-story position-relative z-0 pt-120 pb-120">
  <div class="animation position-absolute w-100 h-100 z-n1">
    <img
      src="{{url('website')}}/assets/images/star3.png"
      alt="vector"
      class="position-absolute top-0 end-0 pt-10 pe-20 me-20 d-none d-xxl-flex previewSkew"
    />
  </div>
  <div class="container">
    <div
      class="row gy-15 gy-lg-0 justify-content-center align-items-center"
    >
      <div class="col-12">
        <h4>Deposit History</h4>
      </div>
      <div class="col-12 table-responsive">
     @php
    $deposit = DB::table('customer_payment')
        ->where('customer_id', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->get();
@endphp

<div class="row mt-4">
    @forelse($deposit as $key => $item)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">Payment #{{ $key + 1 }}</h6>
                        <span class="badge 
                            @if ($item->status == 'complete') bg-success 
                            @elseif($item->status == 'reject') bg-danger 
                            @else bg-warning 
                            @endif text-uppercase">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                    <hr class="my-2">
                    <p class="mb-1 text-dark"><strong>Amount:</strong> Rs.{{ $item->amount }}</p>
                    <p class="mb-1 text-dark"><strong>Date:</strong> {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:i A') }}</p>
                    @if($item->status !== "pending" )
                    <p class="mb-1 text-dark"><strong>Verified Date:</strong> {{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y h:i A') }}</p>
                    @endif
                    @if($item->status == 'reject' && $item->rejection_reason)
                        <div class="mt-3 p-3 bg-danger bg-opacity-10 text-danger rounded border-start border-4 border-danger">
                            <div class="d-flex align-items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x-circle-fill me-2 mt-1" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                                <div>
                                    <strong>Rejection Reason:</strong><br>
                                    {{ $item->rejection_reason }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">No payment history found.</div>
        </div>
    @endforelse
</div>

    
      </div>
    </div>
  </div>
</section>
<!-- Company Story end -->


@endsection
