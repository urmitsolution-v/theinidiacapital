@extends('front.layout.index')
@section('content')


 <!-- hero section start-->
 <section class="hero-section position-relative z-0">
    <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
      <img
        src="{{url('website')}}/assets/images/hero_vector.png"
        alt="vector"
        class="position-absolute d-none d-xxxl-flex bottom-0 end-0 previewShapeRevX"
      />
    </div>
    <div class="container pt-0 mt-12 mt-lg-20">
      <div
        class="row pt-4 pt-lg-10 gy-12 gy-lg-0 justify-content-center justify-content-lg-between align-items-center"
      >
        <div class="col-lg-6 col-xxl-7">
          <div
            class="hero-card p1-xxl-bg pt-xl-20 pb-xl-20 position-relative"
          >
            <div class="pt-xxl-10 pb-xxl-10">
              <!-- <span class="heading p1-max-xxl nb4-xxl-color fs-five mb-3"
                >Trading platforms
              </span> -->
              <h1 class="display-two nb4-xxl-color mb-5 mb-lg-6">
                <?= $home->title ?>
              </h1>
              <p class="fs-six-up fw_500 nb4-xxl-color text-white">
                <?= $home->sub_title ?>
              </p>
              <div
                class="d-inline-flex flex-wrap gap-4 gap-lg-10 align-items-center mt-8 mt-lg-10"
              >
                <a
                  href="<?= $home->link ?>"
                  class="cmn-btn alt-xxl-bg fs-five nb4-xxl-bg gap-2 gap-lg-3 align-items-center py-2 px-5 py-lg-3 px-lg-6"
                  >Start Trading <i class="ti ti-trending-up"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-10 col-lg-6 col-xxl-5">
          <div class="hero-section__thumbs pb-xxl-10">
            <img
              src="{{url('uploads')}}/<?= $home_banner->image ?>"
              class="max-auto max-xxl-un"
              alt="img"
            />
          </div>
        </div>
        <ul
          class="list_items col-12 d-flex row-gap-6 gap-lg-15 justify-content-between flex-wrap pt-2 pt-lg-15 pt-xl-2 pt-xxl-15 pb-15"
        >
          <li class="d-flex gap-3 align-items-center">
            <span class="d-center s1-bg p-3 p-lg-4 rounded-circle"
              ><i class="ti ti-tools fs-three nb4-color"></i
            ></span>
            <h4 class="nw1-color">Enhanced Tools</h4>
          </li>
          <li class="d-flex gap-3 align-items-center">
            <span class="d-center s1-bg p-3 p-lg-4 rounded-circle"
              ><i class="ti ti-trending-up fs-three nb4-color"></i
            ></span>
            <h4 class="nw1-color">Trading Guides</h4>
          </li>
          <li class="d-flex gap-3 align-items-center">
            <span class="d-center s1-bg p-3 p-lg-4 rounded-circle"
              ><i class="ti ti-broadcast fs-three nb4-color"></i
            ></span>
            <h4 class="nw1-color">Fast Execution</h4>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- hero section end -->

  <!-- Why Trade start-->
  <section class="why-trade s1-bg alt-color position-relative z-0">
    <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
      <img
        src="{{url('website')}}/assets/images/sun2.png"
        alt="vector"
        class="position-absolute push_animat"
      />
      <img
        src="{{url('website')}}/assets/images/star2.png"
        alt="vector"
        class="position-absolute d-xxxl-flex previewSkew"
      />
    </div>
    <div class="container">
      <div class="row gy-3 gy-lg-0 justify-content-center">
        <div class="col-sm-7 col-lg-6 col-xxl-5 order-2 order-lg-0">
          <div
            class="why-trade__thumbs h-100 d-flex align-items-end ps-20 ps-sm-5 ps-lg-0"
          >
            <img src="{{url('uploads')}}/<?= $data->image ?>" alt="Imgae" />
          </div>
        </div>
        <div class="col-lg-6 col-xxl-7">
          <div class="row pt-120 pb-120">
            <div class="col-xxl-6 offset-xxl-2">
              <div class="why-trade__part">
                <span class="heading fs-five text-warning">Our Value</span>
                {{-- <h3 class="mb-3 mt-5 text-white">
                  Your Success is Our Priority
                </h3> --}}
                <p class="text-white">
                 <?= $row->core_value ?>
                </p>
              </div>
            </div>
            <div class="col-xxl-12 mt-7 mt-md-8 mt-xxl-3">
              <div class="why-trade__part d-flex align-items-center">
                <div class="vector px-xxl-15">
                  <img
                    src="{{url('website')}}/assets/images/trade_vector.png"
                    alt="Image"
                    class="max-xxl-un"
                  />
                </div>
                <div class="content mb-5">
                  <h3 class="mb-3 text-warning">Our Vision</h3>
                  <p class="text-white">
                    <?= $row->our_vision ?>
                  </p>
                </div>
              </div>

              <div class="why-trade__part d-flex align-items-center">
                <div class="vector px-xxl-15">
                  <img
                    src="{{url('website')}}/assets/images/trade_vector.png"
                    alt="Image"
                    class="max-xxl-un"
                  />
                </div>
                <div class="content">
                  <h3 class="mb-3 text-warning">Our Mission</h3>
                  <p class="text-white">
                    <?= $row->Our_mission ?>
                  </p>
                  <a
                    href="<?= $row->link ?>"
                    class="cmn-btn link text-white fs-six-up gap-2 gap-lg-3 align-items-center mt-5"
                  >
                    Learn more <i class="ti ti-arrow-narrow-right fs-four"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Why Trade end -->

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
              <h4 class="mt-5 mb-5"><?= $val->title ?></h4>
              <p>
                {{ Str::words($val->description, 20, '...') }}
              </p>
            </div>
          </a>
        </div>
    
        @endforeach
      </div>
      <div class="text-center pt-10">
        <a
          href="/services"
          class="cmn-btn alt-xxl-bg fs-five nb4-xxl-bg gap-2 gap-lg-3 align-items-center py-2 px-5 py-lg-3 px-lg-6"
          style="--top: 43.8125px; --left: 203px"
          >View More Services <i class="ti ti-trending-up"></i
        ></a>
      </div>
    </div>
  </section>
  <!-- Services-world end -->

  <!--Trade On start-->
  <section class="trade_on a2-bg pt-120 pb-120 position-relative z-0">
    <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
      <img
        src="{{url('website')}}/assets/images/coin.png"
        alt="vector"
        class="position-absolute d-none d-md-flex previewShapeRevX"
      />
      <img
        src="{{url('website')}}/assets/images/star2.png"
        alt="vector"
        class="position-absolute d-none d-xl-flex push_animat"
      />
      <img
        src="{{url('website')}}/assets/images/coin_vector.png"
        alt="vector"
        class="position-absolute d-none d-xxxl-flex bottom-0 end-0 previewShapeRevX opacity-50"
      />
    </div>
    <div class="container">
      <div
        class="row gy-10 gy-xxl-0 justify-content-center justify-content-xxl-between align-items-center"
      >
        <div class="col-lg-6 col-xxl-5">
          <div class="trade_on__content">
            <span class="heading s1-color fs-five mb-5"><?= $trad->title ?></span>
            <h3 class="mb-4 mb-lg-5"><?= $trad->sub_title ?></h3>
            <p class="fs-six mx-ch">
              <?= $trad->desc ?>
            </p>
       
            <a
              href="/sign-up"
              class="cmn-btn secondary-alt fs-six-up nb4-xxl-bg gap-2 gap-lg-3 align-items-center py-2 px-5 py-lg-3 px-lg-6 mt-7 mt-xxl-8"
              >Sign up Now <i class="ti ti-arrow-right fs-four"></i
            ></a>
          </div>
        </div>
        <div class="col-md-8 col-lg-6">
          <div class="trade_on__thumbs d-flex justify-content-end">
            <img src="{{url('uploads')}}/<?= $platform->image ?>" alt="Imgae" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Trade On end -->

  <!--People Trust start-->
  <section class="people_trust pt-120 pb-120 position-relative z-0">
    <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
      <img
        src="{{url('website')}}/assets/images/vector.png"
        alt="vector"
        class="position-absolute jello d-none d-xl-flex"
      />
      <img
        src="{{url('website')}}/assets/images/star3.png"
        alt="vector"
        class="position-absolute push_animat d-none d-xxxl-flex"
      />
      <img
        src="{{url('website')}}/assets/images/vector3.png"
        alt="vector"
        class="position-absolute bottom-0 end-0 d-none d-xxxl-flex"
      />
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8 col-xxl-7">
          <div class="heading__content mb-8 mb-lg-10 text-center">
            <span class="heading p1-color fs-five mb-5">People Trust Us</span>
            <h3 class="mb-4 mb-lg-6"><?=$people->main_title ?></h3>
            <p class="fs-six-up mx-ch mx-auto">
              <?=$people->main_sub_title ?>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="singletab">
            <div class="tabcontents">
              <div class="tabitem active">
                <div
                  class="row gy-10 gy-xl-0 justify-content-center justify-content-lg-between align-items-center"
                >
                  <div class="col-xl-6 col-xxl-7">
                    <div
                      class="people_trust_thumb d-center p-2 p-lg-5 pseudo_element_after overflow-hidden"
                    >
                      <img
                        src="{{url('website')}}/assets/images/people_trust_video.png"
                        class="w-100 max-xxl-un cus-rounded-2"
                        alt="video"
                      />
                      <a
                        href="https://www.youtube.com/watch?v=BHACKCNDMW8"
                        class="popup-video box_10 btn-popup-animation position-absolute d-center rounded-circle">
                        
                        <i class="fa-solid fa-play fs-four"></i>
                      </a>
                    </div>
                  </div>
                  <div class="col-xl-6 col-xxl-5">
                    <div class="trade_on__content">
                      <h4 class="mb-4"> <?=$people->title ?></h4>
                      <p class="mx-ch">
                        <?=$people->desc ?>
                      </p>
                 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- People Trust end -->

  <!--CHOOSE YOUR PACKAGE On start-->
  <section class="trade_on a2-bg pt-120 pb-120 position-relative z-0">
    <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
      <img
        src="{{url('website')}}/assets/images/coin.png"
        alt="vector"
        class="position-absolute d-none d-md-flex previewShapeRevX"
      />
      <img
        src="{{url('website')}}/assets/images/star2.png"
        alt="vector"
        class="position-absolute d-none d-xl-flex push_animat"
      />
      <img
        src="{{url('website')}}/assets/images/coin_vector.png"
        alt="vector"
        class="position-absolute d-none d-xxxl-flex bottom-0 end-0 previewShapeRevX opacity-50"
      />
    </div>
    <div class="container">
      <div
        class="row gy-10 gy-xxl-0 justify-content-center justify-content-xxl-between align-items-center"
      >
        <div class="col-lg-12 col-xxl-12">
          <div class="trade_on__content">
            <span class="heading s1-color fs-five mb-5"
              >CHOOSE YOUR PACKAGE</span
            >
            <h3 class="mb-4 mb-lg-5">
              Tailored Pricing for Your Financial Goals
            </h3>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="tabs_packages">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Normal</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Business</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            
              <div class="col-md-4">
                <div class="pricing-table purple">
                  <!-- Table Head -->
                  <div class="pricing-label">Star</div>
      
                  <h2>Features:</h2>
      
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
                  <a class="price-button" href="{{ route('investnow',['investtype' => 'normel','id' => '0']) }}">Get Started</a>
                  @else
                  <a class="price-button" href="/sign-in">Get Started</a>
                  @endif
                </div>
              </div>
              
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="row">
                @foreach ($pakeges as $val)
            
                <div class="col-md-4">
                  <div class="pricing-table purple">
                    <!-- Table Head -->
                    <div class="pricing-label"><?= getCategoryTitle($val->category) ?></div>
        
                    {{-- <h2>Features:</h2> --}}
        
                    <!-- Features -->
                    <div class="pricing-features">
                    <div class="feature mb-0">Interest : <?= $val->interest_rate ?? ""?> %</div>

                      <div class="feature mt-0"><?= $val->deac?></div>
                    </div>
                    <!-- Price -->
                    <div class="price-tag">
                      <span class="symbol"><?=$val->currency ?></span>
                      <span class="amount"><?=$val->ammount ?></span>
                      <span class="after">/<?=$val->formate ?></span>
                    </div>
                    <!-- Button -->
                    @if (Auth::check())
                    <a class="price-button" href="{{ route('investnow',['investtype' => 'business','id' => $val->id]) }}">Get Started</a>
                    @else
                    <a class="price-button" href="/sign-in">Get Started</a>
                    @endif
                  </div>
                </div>
                
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CHOOSE YOUR PACKAGE On end -->

  <!--Testimonial start-->
  <section class="testimonial p1-bg pt-120 pb-120 position-relative z-0">
    <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
      <img
        src="{{url('website')}}/assets/images/star2.png"
        alt="vector"
        class="position-absolute push_animat"
      />
      <img
        src="{{url('website')}}/assets/images/vector2.png"
        alt="vector"
        class="position-absolute bottom-0 start-0 d-none d-xxxl-flex"
      />
      <img
        src="{{url('website')}}/assets/images/sun.png"
        alt="vector"
        class="position-absolute push_animat d-none d-xxl-flex"
      />
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xxl-7">
          <div class="heading__content alt-color mb-10 mb-lg-15 text-center">
            <span class="heading fs-five mb-5 text-warning">Testimonial</span>
            <h3 class="text-white">What people say</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div
            class="swiper common-slider1 cus-rounded-1 d-center align-items-end align-items-xxl-center"
          >
            <div class="swiper-wrapper">
              @foreach ($testimonial as $val)
                  
              <div
                class="swiper-slide cus-rounded-1 overflow-hidden cus-rounded-1 overflow-hidden"
              >
                <div
                  class="testimonial__part a2-bg d-flex flex-column flex-sm-row align-items-center"
                >
                  <div class="testimonial__author d-none d-sm-flex">
                    <img
                      src="{{url('uploads')}}/<?=$val->image ?>"
                      class="max-xxl-un"
                      alt="Image"
                    />
                  </div>
                  <div
                    class="testimonial__content p-4 px-lg-7 px-xxl-8 py-lg-6 py-xxl-7"
                  >
                    <div class="content__part">
                      <img
                        src="{{url('website')}}/assets/images/icon/quote_left.png"
                        alt="icon"
                      />
                      <p class="fs-six-up mt-5 mt-xxl-6">
                        <?=$val->description ?>
                      </p>
                      <h5 class="heading p1-color mt-4"><?=$val->name ?></h5>
                      <span class="fs-seven fw_500 mt-2"
                        ><?=$val->destination ?></span
                      >
                    </div>
                  </div>
                </div>
              </div>
             
              @endforeach
          
            </div>
            <div
              class="slider-btn position-absolute justify-content-end d-center justify-content-xxl-between gap-2 w-100 pb-3 pb-sm-5 pb-xxl-0 px-8 px-sm-18 px-xl-12 px-xxl-18"
            >
              <button
                type="button"
                aria-label="Slide Prev"
                class="ara-prev slide-button cmn-btn2 d-center"
              >
                <i class="ti ti-arrow-narrow-right"></i>
              </button>
              <button
                type="button"
                aria-label="Slide Next"
                class="ara-next slide-button cmn-btn2 d-center"
              >
                <i class="ti ti-arrow-narrow-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimonial end -->

  <!--blog_news start-->
  <section class="blog_news pt-120 pb-120 position-relative z-0">
    <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
      <img
        src="{{url('website')}}/assets/images/star.png"
        alt="vector"
        class="position-absolute"
      />
      <img
        src="{{url('website')}}/assets/images/vector2.png"
        alt="vector"
        class="position-absolute bottom-0 start-0"
      />
      <img
        src="{{url('website')}}/assets/images/sun.png"
        alt="vector"
        class="position-absolute"
      />
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div
          class="heading__content d-flex row-gap-7 gap-20 flex-wrap justify-content-between align-items-center mb-10 mb-lg-15"
        >
          <div class="heading__part">
            <span class="heading s1-color fs-five mb-5">Blog</span>
            <h3>News & Analysis</h3>
          </div>
          <a
            href="blog.html"
            class="cmn-btn link fs-six-up gap-2 gap-lg-3 align-items-center"
          >
            See All <i class="ti ti-arrow-right fs-four"></i
          ></a>
        </div>
      </div>
      <div class="row gy-6">
        @foreach ($recentBlogs as $val)
          
        <div class="col-md-4 col-xxl-4">
          <div class="blog_news__card nb3-bg rounded-3 overflow-hidden">
            <div class="blog_news__thumbs position-relative">
              <img
                src="{{url('uploads')}}/<?=$val->image ?>"
                alt="Image"
                class="w-100"
              />
              {{-- <a
                href="#"
                class="border-color-s1 nw1-color fs-seven rounded-2 position-absolute top-0 end-0 py-1 px-3 mt-5 me-5"
                >News</a
              > --}}
            </div>
            <div
              class="blog_news__content py-6 py-lg-7 py-xxl-8 px-4 px-lg-5 px-xxl-6"
            >
              <a href="/blog-single/<?= $val->slug ?>">
                <h5 class="mb-4 mb-lg-5">
                 <?=$val->title ?>
                </h5>
              </a>
              <div
                class="fs-seven fw_500 d-flex row-gap-0 flex-wrap gap-3 mb-4 mb-lg-5"
              >
              <?= date("F j, Y", strtotime($val->created_at)) ?> <span>|</span> Written by <?= $val->admin ?>
              </div>
              <p>
                <?= $val->short_description ?>
              </p>
              <a
                href="/blog-single/<?= $val->slug ?>"
                class="link fs-five fw-semibold d-flex gap-2 gap-lg-3 align-items-center mt-6 mt-lg-8"
              >
                Continue Reading <i class="ti ti-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>
     
        @endforeach
      </div>
    </div>
  </section>
  <!-- blog_news end -->

@endsection
