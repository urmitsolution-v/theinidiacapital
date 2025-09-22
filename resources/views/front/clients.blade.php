@extends('front.layout.index')
@section('content')


<div class="stricky-header stricked-menu main-menu main-menu-two">
    <div class="sticky-header__content"></div>
    <!-- /.sticky-header__content -->
  </div>
  <!-- /.stricky-header -->

  <!--Page Header Start-->
  <section class="page-header">
    <div
      class="page-header-bg"
      style="background-image: url({{url('website')}}/assets/images/services/2.jpg)"
    ></div>
    <div class="container">
      <div class="page-header__inner">
        <h2>Clients</h2>
        <ul class="thm-breadcrumb list-unstyled">
          <li><a href="index.html">Home</a></li>
          <li><span>-</span></li>
          <li class="active">Clients</li>
        </ul>
      </div>
    </div>
  </section>
  <!--Page Header End-->

  <!--Brand  Start-->
  <section class="brand-two mt-5 mb-5">
    <div class="container">
      <div class="row gy-4">
        @foreach ($clients as $val)
            
        <div class="col-lg-3">
          <div
            style="
              border: 1px dotted #000;
              padding: 20px;
              display: flex;
              justify-content: center;
              align-items: center;
              width: 100%;
              height: 100px;
            "
          >
            <div style="width: 100px; height: auto">
              <img
                src="{{url('uploads')}}/<?=$val->image ?>"
                alt="logo"
                style="width: 100%; height: 100%"
              />
            </div>
          </div>
        </div>

        @endforeach
      
      </div>
    </div>
  </section>
  <!--Brand  End-->


@endsection