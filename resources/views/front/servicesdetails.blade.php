@extends('front.layout.index')
@section('content')
  

 <!-- banner section start-->
 <section class="banner-section pt-120 pb-120">
  <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
    <div class="row">
      <div class="col-12 breadcrumb-area">
        <h2 class="mb-4">Service Details</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li
              class="breadcrumb-item ms-2 ps-7 active"
              aria-current="page"
            >
              <span>Service Details</span>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- banner section end -->

<!--Service Details start-->
<section class="market-details pt-120 pb-120 position-relative z-0">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h3 class="mb-7 mb-lg-8">
          <?=$service->title ?>
        </h3>
        <div class="market-details__card">
          <div class="market-details__thumbs position-relative">
            <img
              src="{{url('Service-image')}}/<?= $service->image ?>"
              alt="Image"
              class="cus-rounded-2 w-100"
            />
          </div>
          <div
            class="market-details__content d-flex flex-column gap-5 gap-lg-6 mt-5 mt-lg-6"
          >
            <p>
              <?= $service->long_description ?>
            </p>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Service end -->



@endsection
