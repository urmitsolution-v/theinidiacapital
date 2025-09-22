@extends('front.layout.index')
@section('content')


<!-- banner section start-->
<section class="banner-section pt-120 pb-120">
    <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
      <div class="row">
        <div class="col-12 breadcrumb-area">
          <h2 class="mb-4">Invest Now</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li
                class="breadcrumb-item ms-2 ps-7 active"
                aria-current="page"
              >
                <span>Invest Now</span>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- banner section end -->

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
                      <span class="amount"><?=$val->ammount ?> -</span>
                      <span class="amount"><?=$val->max_amount ?></span>
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


@endsection