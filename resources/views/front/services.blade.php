@extends('front.layout.index')
@section('content')


 <!-- banner section start-->
 <section class="banner-section pt-120 pb-120">
  <div class="container mt-lg-0 pt-18 pt-xl-20">
    <div class="row">
      <div class="col-12 breadcrumb-area">
        <h2 class="mb-4">Services</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li
              class="breadcrumb-item ms-2 ps-7 active"
              aria-current="page"
            >
              <span>Services</span>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- banner section end -->

<!--Services-world start-->
<section
  class="provide-world bg nb4-bg pt-120 pb-120 position-relative z-0"
>
  <div
    class="animation position-absolute top-0 left-0 w-100 h-100 z-n1 d-none d-md-flex"
  >
    <img
      src="{{url('website')}}/assets/images/button.png"
      alt="vector"
      class="position-absolute pt-6 pt-xl-15 previewShapeRevX"
    />
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xxl-7">
        <div class="heading__content mb-10 mb-lg-15 text-center">
          <span class="heading p1-color fs-five mb-5"
            >Services We offer</span
          >
          <h3 class="mb-5 mb-lg-6">
            Join a club of more than
            <span class="s1-color">480,000</span> traders
          </h3>
          <p class="fs-six-up mx-ch mx-auto">
            Trading is the art and science of buying and selling financial
            instruments, such as stocks bonds currencies commodities
          </p>
        </div>
      </div>
    </div>
    <div class="row gy-6 gy-xxl-0">
      @foreach ($service as $val)
          
      <div class="col-md-4 col-xxl-4">
        <a href="/services-details/<?=$val->slug ?>">
          <div
            class="provide-world__card nb3-bg text-center cus-rounded-1 py-5 py-lg-10 px-4 px-lg-9"
          >
            <span
              class="provide-card__icon d-center nb4-bg p-4 rounded-circle mx-auto"
            >
              <img src="{{url('Service-image')}}/<?=$val->icon ?>" alt="">
            </span>
            <h4 class="mt-5 mb-5"><?=$val->title ?></h4>
            <p>
              {{ Str::words($val->description, 20, '...') }}
            </p>
          </div>
        </a>
      </div>
   
      @endforeach
    </div>
    {{-- <div class="text-center pt-10">
      <a
        href="services.html"
        class="cmn-btn alt-xxl-bg fs-five nb4-xxl-bg gap-2 gap-lg-3 align-items-center py-2 px-5 py-lg-3 px-lg-6"
        style="--top: 43.8125px; --left: 203px"
        >View More Services <i class="ti ti-trending-up"></i
      ></a>
    </div> --}}
  </div>
</section>
<!-- Services-world end -->

@endsection
