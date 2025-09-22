@extends('front.layout.index')
@section('content')

 <!-- banner section start-->
 <section class="banner-section pt-120 pb-120">
    <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
      <div class="row">
        <div class="col-12 breadcrumb-area">
          <h2 class="mb-4">Roadmap</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li
                class="breadcrumb-item ms-2 ps-7 active"
                aria-current="page"
              >
                <span>Roadmap</span>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- banner section end -->

  <!-- Roadmap start -->
  <section class="roadmap pt-120 pb-120" id="roadmap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xxl-7">
          <div class="heading__content mb-10 mb-lg-15 text-center">
            <h1 class="display-four mb-5 mb-lg-6">Roadmap</h1>
            <p class="fs-six-up mx-ch mx-auto">
              We're constantly updating our roadmap to bring transparency for
              our users and to get your feedback - please tell us what is
              important for you!
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="roadmap__content">
            <span class="roadmap__line"></span>
            <div class="roadmap__part">
              <div class="event cus-rounded-1 p-4 p-md-5 p-xxl-10 me-5">
                <span class="heading fs-three p1-color mb-3"><?=$road->year ?></span>
                <h4><?=$road->title ?></h4>
                <p class="mt-4">
                  <?=$road->sub_title ?>
                </p>
              </div>
            </div>
            <div class="roadmap__part">
              <div class="event cus-rounded-1 p-4 p-md-5 p-xxl-10">
                <span class="heading fs-three p1-color mb-3"><?=$road->year_2 ?></span>
                <h4><?=$road->title_2 ?></h4>
                <p class="mt-4">
                  <?=$road->sub_title_2 ?>
                </p>
              </div>
            </div>
            <div class="roadmap__part">
              <div class="event cus-rounded-1 p-4 p-md-5 p-xxl-10 me-5">
                <span class="heading fs-three p1-color mb-3"><?=$road->year_3 ?></span>
                <h4><?=$road->title_3 ?></h4>
                <p class="mt-4">
                  <?=$road->sub_title_3 ?>
                </p>
              </div>
            </div>
            <div class="roadmap__part">
              <div class="event cus-rounded-1 p-4 p-md-5 p-xxl-10">
                <span class="heading fs-three p1-color mb-3"><?=$road->year_4 ?></span>
                <h4><?=$road->title_4 ?></h4>
                <p class="mt-4">
                  <?=$road->sub_title_4 ?>
                </p>
              </div>
            </div>
            <div class="roadmap__part">
              <div class="event cus-rounded-1 p-4 p-md-5 p-xxl-10 me-5">
                <span class="heading fs-three p1-color mb-3"><?=$road->year_5 ?></span>
                <h4><?=$road->title_5 ?></h4>
                <p class="mt-4">
                  <?=$road->sub_title_5 ?>
                </p>
              </div>
            </div>
            <div class="roadmap__part">
              <div class="event cus-rounded-1 p-4 p-md-5 p-xxl-10">
                <span class="heading fs-three p1-color mb-3"><?=$road->year_6 ?></span>
                <h4><?=$road->title_6 ?></h4>
                <p class="mt-4">
                  <?=$road->sub_title_6 ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Roadmap end -->

@endsection