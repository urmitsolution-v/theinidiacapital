@extends('front.layout.index')
@section('content')


  <!-- banner section start-->
  <section class="banner-section pt-120 pb-120">
    <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
      <div class="row">
        <div class="col-12 breadcrumb-area">
          <h2 class="mb-4">Blog</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li
                class="breadcrumb-item ms-2 ps-7 active"
                aria-current="page"
              >
                <span>Blog</span>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- banner section end -->

  <!--blog_news start-->
  <section class="blog_news pt-120 pb-120 position-relative z-0">
    <div class="container">
      <div class="row gy-6">
        @foreach ($blogs as $val)
            
        <div class="col-md-6 col-xxl-4">
          <div class="blog_news__card nb3-bg cus-rounded-1 overflow-hidden">
            <div class="blog_news__thumbs position-relative">
              <img
                src="{{url('uploads')}}/<?=$val->image ?>"
                alt="Image"
                class="w-100"
              />
              {{-- <a
                href="#"
                class="border border-color second nw1-color fs-seven rounded-3 position-absolute top-0 end-0 py-1 px-3 mt-5 me-5">News</a> --}}
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
              <?= date("F j, Y", strtotime($val->created_at)) ?>
              <span>|</span> Written by    <?= $val->admin ?>
              </div>
              <p>
   
                <?php 
                $words = explode(' ', $val->short_description);
                echo implode(' ', array_slice($words, 0, 20)) . (count($words) > 20 ? '...' : '');
            ?>
s            
                 
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
      <!--<div class="row">-->
      <!--  <div class="col-12">-->
      <!--    <nav-->
      <!--      aria-label="Page navigation"-->
      <!--      class="d-flex justify-content-center mt-10 mt-lg-15"-->
      <!--    >-->
      <!--      <ul-->
      <!--        class="pagination gap-2 nb3-bg px-4 px-lg-5 py-3 cus-rounded-1"-->
      <!--      >-->
      <!--        <li class="page-item">-->
      <!--          <a-->
      <!--            class="page-link d-center border-none cus-rounded-1 gap-1 prev w-100 ps-1 pe-2"-->
      <!--            href="javascript:void(0)"-->
      <!--            aria-label="Previous"-->
      <!--          >-->
      <!--            <i class="ti ti-chevron-left"></i>-->
      <!--            <span class="d-none d-md-block">Prev</span></a-->
      <!--          >-->
      <!--        </li>-->
      <!--        <li class="page-item">-->
      <!--          <a-->
      <!--            class="page-link d-center border-none cus-rounded-1"-->
      <!--            href="javascript:void(0)"-->
      <!--            >1</a-->
      <!--          >-->
      <!--        </li>-->
      <!--        <li class="page-item">-->
      <!--          <a-->
      <!--            class="page-link d-center border-none cus-rounded-1 active"-->
      <!--            href="javascript:void(0)"-->
      <!--            >2</a-->
      <!--          >-->
      <!--        </li>-->
      <!--        <li class="page-item">-->
      <!--          <a-->
      <!--            class="page-link d-center border-none cus-rounded-1 align-items-end"-->
      <!--            href="javascript:void(0)"-->
      <!--            ><i class="ti ti-dots"></i-->
      <!--          ></a>-->
      <!--        </li>-->
      <!--        <li class="page-item">-->
      <!--          <a-->
      <!--            class="page-link d-center border-none cus-rounded-1"-->
      <!--            href="javascript:void(0)"-->
      <!--            >5</a-->
      <!--          >-->
      <!--        </li>-->
      <!--        <li class="page-item">-->
      <!--          <a-->
      <!--            class="page-link d-center border-none cus-rounded-1 gap-1 next w-100 ps-2 pe-1 active"-->
      <!--            href="javascript:void(0)"-->
      <!--            aria-label="Next"-->
      <!--          >-->
      <!--            <span class="d-none d-md-block">Next</span>-->
      <!--            <i class="ti ti-chevron-right"></i-->
      <!--          ></a>-->
      <!--        </li>-->
      <!--      </ul>-->
      <!--    </nav>-->
      <!--  </div>-->
      <!--</div>-->
    </div>
  </section>
  <!-- blog_news end -->


@endsection
