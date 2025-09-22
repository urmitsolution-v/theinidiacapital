@extends('front.layout.index')
@section('content')



 <!-- banner section start-->
 <section class="banner-section pt-120 pb-120">
  <div class="container mt-lg-0 pt-18 pt-xl-20">
    <div class="row">
      <div class="col-12 breadcrumb-area">
        <h2 class="mb-4">About Us</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li
              class="breadcrumb-item ms-2 ps-7 active"
              aria-current="page"
            >
              <span>About Us</span>
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
      <div class="col-sm-10 col-lg-6 col-xxl-5 order-2 order-lg-0">
        <div class="company-story__thumbs d-center">
          <img
            src="{{url('website')}}/assets/images/company_story.png"
            class="cus-rounded-1 w-100"
            alt="Imgae"
          />
          <a
            href="https://www.youtube.com/watch?v=BHACKCNDMW8"
            class="popup-video btn-popup-animation position-absolute d-center rounded-circle"
          >
            <i class="fa-solid fa-play fs-four"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-xxl-7">
        <div class="row ms-xl-3 ms-xxl-10">
          <div class="col-xxl-6">
            <div class="company-story__part">
              <span class="heading p1-color fs-five"
                >Our Company Story</span
              >
              <h3 class="mb-3 mt-5">What We Do</h3>
              <p>
                Trading is the art and science of buying and selling
                financial instruments, such as stocks bonds currencies.
              </p>
            </div>
          </div>
          <div class="col-xxl-12 mt-8 mt-md-10 mt-xxl-13">
            <div
              class="company-story__part d-flex align-items-sm-center flex-column flex-sm-row"
            >
              <div
                class="btn-area mt-8 mt-sm-0 me-2 me-sm-6 me-xxl-10 order-2 order-sm-0"
              >
                <a
                  href="signin.html"
                  class="cmn-btn cmn-btn-circle d-center flex-column fw_500"
                >
                  <i class="ti ti-arrow-up-right fs-three"></i>
                  Start Now
                </a>
              </div>
              <div class="content">
                <h3 class="mb-3">Who We Are</h3>
                <p>
                  Trading in financial markets involves a wide range of
                  strategies that traders employ to make informed decisions.
                  From trading to swing trading and long-term investing,
                  each strategy has its own set of principles and risk
                  factors.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Company Story end -->

<!-- Client Company Section Start -->
<div
  class="client_company_section py-15 align-items-center justify-content-center"
  style="background: #8d95e8ed"
>
  <!-- Swiper -->
  <div class="swiper client_company">
    <div class="swiper-wrapper align-items-center">
      <div class="swiper-slide text-center">
        <img src="{{url('website')}}/assets/images/company_logo.png" alt="Client Logo" />
      </div>
      <div class="swiper-slide text-center">
        <img src="{{url('website')}}/assets/images/company_logo2.png" alt="Client Logo" />
      </div>
      <div class="swiper-slide text-center">
        <img src="{{url('website')}}/assets/images/company_logo3.png" alt="Client Logo" />
      </div>
      <div class="swiper-slide text-center">
        <img src="{{url('website')}}/assets/images/company_logo4.png" alt="Client Logo" />
      </div>
      <div class="swiper-slide text-center">
        <img src="{{url('website')}}/assets/images/company_logo5.png" alt="Client Logo" />
      </div>
      <div class="swiper-slide text-center">
        <img src="{{url('website')}}/assets/images/company_logo6.png" alt="Client Logo" />
      </div>
      <div class="swiper-slide text-center">
        <img src="{{url('website')}}/assets/images/company_logo7.png" alt="Client Logo" />
      </div>
    </div>
  </div>
</div>
<!-- Client Company Section End -->

<!--Our Mission start-->
<section
  class="provide-world our_mission pt-120 pb-120 position-relative z-0"
>
  <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
    <img
      src="{{url('website')}}/assets/images/vector7.png"
      alt="vector"
      class="position-absolute bottom-0 pt-6 pt-xl-15 d-none d-lg-flex push_animat"
    />
  </div>
  <div class="container">
    <div
      class="row justify-content-between align-items-center mb-10 mb-lg-15"
    >
      <div class="col-xl-5">
        <span class="heading s1-color fs-five mb-5"><?=$row->title ?></span>
        <h3><?=$row->sub_title ?></h3>
      </div>
      <div class="col-xl-4">
        <p class="fs-six-up mx-ch text-xl-end mt-3 mt-xl-0">
          <?=$row->desc ?>
        </p>
      </div>
    </div>
    <div class="row gy-6 gy-xxl-0">
      <div class="col-md-4 col-xxl-4">
        <div
          class="provide-world__card nb3-bg text-center cus-rounded-1 py-5 py-lg-10 px-4 px-lg-9"
        >
          <span
            class="provide-card__icon d-center nb4-bg p-4 rounded-circle mx-auto"
          >
            <i class="ti ti-currency-dollar-brunei fs-three p1-color"></i>
          </span>
          <h4 class="mt-5 mb-5">Our Mission</h4>
          <p>
            <?=$row->Our_mission ?>
          </p>
        </div>
      </div>
      <div class="col-md-4 col-xxl-4">
        <div
          class="provide-world__card nb3-bg text-center cus-rounded-1 py-5 py-lg-10 px-4 px-lg-9"
        >
          <span
            class="provide-card__icon d-center nb4-bg p-4 rounded-circle mx-auto"
          >
            <i class="ti ti-brand-cakephp fs-three p1-color"></i>
          </span>
          <h4 class="mt-5 mb-5">Our Vision</h4>
          <p>
            <?=$row->our_vision ?>
          </p>
        </div>
      </div>
      <div class="col-md-4 col-xxl-4">
        <div
          class="provide-world__card nb3-bg text-center cus-rounded-1 py-5 py-lg-10 px-4 px-lg-9"
        >
          <span
            class="provide-card__icon d-center nb4-bg p-4 rounded-circle mx-auto"
          >
            <i class="ti ti-broadcast fs-three p1-color"></i>
          </span>
          <h4 class="mt-5 mb-5">Core Value</h4>
          <p>
            <?= $row->core_value ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Our Mission end -->

<!--Testimonial start-->
<section
  class="testimonial-secondary te pt-120 pb-120 position-relative z-0"
>
  <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
    <img
      src="{{url('website')}}/assets/images/icon/quote_bg.png"
      alt="vector"
      class="position-absolute push_animat d-none d-md-flex"
    />
    <img
      src="{{url('website')}}/assets/images/icon/quote_bg.png"
      alt="vector"
      class="position-absolute push_animat d-none d-md-flex"
    />
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xxl-7">
        <div class="heading__content mb-10 mb-lg-15 text-center">
          <span class="heading fs-five s1-color mb-5">Testimonial</span>
          <h3>What people say</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="swiper testimonial_swiper">
          <div class="swiper-wrapper">
            @foreach ($testimonial as $val)
                
            <div class="swiper-slide d-flex justify-content-center">
              <div class="col-lg-10 col-xl-8 col-xxl-6">
                <div class="testimonial__par text-center">
                  <div class="author_thumbs">
                    <img
                      src="{{url('uploads')}}/<?=$val->image ?>"
                      alt="icon"
                      class="rounded-circle"
                      width="100"
                    />
                  </div>
                  <div class="author_content">
                    <p class="fs-six-up mt-5 mt-xxl-6">
                    <?=$val->description ?>
                    </p>
                    <h5 class="heading p1-color mt-5"><?=$val->name ?></h5>
                    <span class="fs-eight fw_500 mt-2"
                      ><?=$val->destination ?></span
                    >
                  </div>
                </div>
              </div>
            </div>
          
            @endforeach
          </div>
          <div class="swiper-pagination mt-8 mt-md-10 mt-lg-15"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Testimonial end -->

@endsection
