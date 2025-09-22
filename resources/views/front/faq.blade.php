@extends('front.layout.index')
@section('content')

  <!-- banner section start-->
  <section class="banner-section pt-120 pb-120">
    <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
      <div class="row">
        <div class="col-12 breadcrumb-area">
          <h2 class="mb-4">FAQ's</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li
                class="breadcrumb-item ms-2 ps-7 active"
                aria-current="page"
              >
                <span>FAQ's</span>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- banner section end -->

  <!-- FAQ Section Starts -->
  <section class="faq pb-120 pt-120 position-relative z-0">
    <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
      <img
        src="{{url('website')}}/assets/images/button.png"
        alt="vector"
        class="position-absolute pt-6 pt-xl-15 previewShapeRevX d-none d-lg-flex"
      />
      <img
        src="{{url('website')}}/assets/images/star30.png"
        alt="vector"
        class="position-absolute push_animat end-0 top-0 mt-4 me-xl-20 pe-20 d-none d-xxl-flex"
      />
      <img
        src="{{url('website')}}/assets/images/vector21.png"
        alt="vector"
        class="position-absolute bottom-0 start-0 pb-11 ps-20 ms-10 d-none d-xxxl-flex"
      />
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xxl-7">
          <div class="heading__content mb-10 mb-lg-15 text-center">
            <span class="heading fs-five p1-color mb-5">Faq’s</span>
            <h3>Frequently Asked Question</h3>
          </div>
        </div>
      </div>
      <div class="row gy-10 justify-content-center align-items-center">
        <div class="col-md-12 col-lg-7 col-xxl-6">
          <div class="faq__part">
            <div class="accordion-section d-grid gap-6">
              @foreach ($Faq as $val)
                  
              <div
                class="accordion-single cus-rounded-1 nb3-bg box-shadow py-3 py-md-4 px-4 px-md-5"
              >
                <h5 class="header-area">
                  <button
                    class="accordion-btn transition fw-semibold text-start d-flex position-relative w-100"
                    type="button"
                  >
                    <?=$val->title ?>
                  </button>
                </h5>
                <div class="content-area">
                  <div class="content-body pt-5">
                    <p>
                      <?=$val->description ?>
                    </p>
                  </div>
                </div>
              </div>

              
              @endforeach
  
            </div>
          </div>
        </div>
        <div class="col-9 col-sm-8 col-lg-5 col-xxl-6">
          <div
            class="faq_thumbs d-flex justify-content-center justify-content-xl-end"
          >
            <img src="{{url('website')}}/assets/images/faq.png" alt="image" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- FAQ Section Ends -->
   
@endsection