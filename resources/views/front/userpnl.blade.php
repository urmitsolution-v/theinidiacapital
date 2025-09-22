@extends('front.layout.index')
@section('content')



 <!-- banner section start-->
 <section class="banner-section pt-120 pb-120">
  <div class="container mt-lg-0 pt-18 pt-xl-20">
    <div class="row">
      <div class="col-12 breadcrumb-area">
        <h2 class="mb-4">My PNL</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li
              class="breadcrumb-item ms-2 ps-7 active"
              aria-current="page"
            >
              <span>My PNL</span>
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
        <h4>PNL List</h4>
        <p class="my-2">Total Pnl Earning : Rs.{{userpnl(Auth::user()->id)}}</p>
      </div>
      <div class="col-12 mt-0 table-responsive">
        <table style="width: max-content;min-width: 100%;" class="table table-bordered table-responsive border-light text-center mt-4 text-white">
            <thead class="table-dark table-responsive">
                <tr>
                    <th>SN</th>
                    <th>Amount</th>
                    <th>Trade Balance</th>
                    <th>Profit Balance</th>
                    <th>Percentage</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
@foreach ($users as $key => $user)
<tr>
    <td>{{ $key + 1 }}</td>
    <td>Rs.{{ $user->amount ?? 0 }}</td>
    <td>Rs.{{ $user->trade_balance ?? 0 }}</td>
    <td>Rs.{{ $user->profit_amount ?? 0 }}</td>
    <td>Rs.{{ $user->percantage ?? 0 }}%</td>
    <td>{{ $user->created_at->format('d-m-Y h:i A') }}</td>
</tr>
@endforeach
            </tbody>
        </table>
        
    
      </div>
    </div>
  </div>
</section>
<!-- Company Story end -->


@endsection
