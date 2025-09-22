@extends('front.layout.index')
@section('content')


<?php 
$data = DB::table('webinfo')->where('id', 5)->select(['image', 'favicon', 'info_one'])->first();
$row = json_decode($data->info_one);
?>

 <!-- banner section start-->
 <section class="banner-section pt-120 pb-120">
  <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
    <div class="row">
      <div class="col-12 breadcrumb-area">
        <h2 class="mb-4">Contact</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li
              class="breadcrumb-item ms-2 ps-7 active"
              aria-current="page"
            >
              <span>Contact</span>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- banner section end -->

<!-- Contact start -->
<section class="contact nb4-bg pt-120 pb-120">
  <div class="container">
    <div class="row gy-18 justify-content-between">
      <div class="col-12 col-lg-5 col-xl-5">
        <div class="submissions-area d-flex flex-column gap-8 gap-lg-10">
          <div class="submissions">
            <h3>Business submissions</h3>
            <p class="fs-six-up mt-4">
              For business plan submissions. Please submit using this
            </p>
          </div>
          <div
            class="contact__mail d-flex flex-column gap-5 gap-lg-6 pb-8 pb-lg-10 border-bottom border-color four"
          >
            <div class="d-flex align-items-center gap-3">
              <span class="box_12 p1-bg rounded-circle d-center"
                ><i class="ti ti-message-2 fs-four-up nb4-color"></i
              ></span>
              <span class="fs-six-up"><a href=""><?=$row->email ?></a></span>
            </div>
            <div class="d-flex align-items-center gap-3">
              <span class="box_12 p1-bg rounded-circle d-center"
                ><i class="ti ti-phone fs-four-up nb4-color"></i
              ></span>
              <span class="fs-six-up">+<?=$row->phone ?></span>
            </div>
          </div>
          <div class="submissions">
            <h3>Our socials media</h3>
            <ul
              class="social-area d-center justify-content-start gap-2 gap-md-3 mt-7 mt-lg-8"
            >
              <li>
                <a class="d-center cus-rounded-1 fs-four" href="#"
                  ><i class="ti ti-brand-facebook"></i
                ></a>
              </li>
              <li>
                <a class="d-center cus-rounded-1 fs-four" href="#"
                  ><i class="ti ti-brand-twitter"></i
                ></a>
              </li>
              <li>
                <a class="d-center cus-rounded-1 fs-four" href="#"
                  ><i class="ti ti-brand-instagram"></i
                ></a>
              </li>

              <li>
                <a class="d-center cus-rounded-1 fs-four" href="#"
                  ><i class="ti ti-brand-youtube"></i
                ></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-7 col-xl-6">
        <form method="POST">
          @csrf

          <h3 class="contact__title mb-7 mb-md-10 mb-lg-15">
            Enquiry Form
          </h3>
          <div class="d-flex gap-3 gap-sm-5 gap-lg-8 flex-column">
            <div class="row gap-3 gap-sm-0">
              <div class="col-sm-6">
                <div class="single-input">
                  <input
                    type="text"
                    class="fs-six-up"
                    name="fname"
                    placeholder="Fast Name"
                  />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="single-input">
                  <input
                    type="text"
                    class="fs-six-up"
                    name="lname"
                    placeholder="Last Name"
                  />
                </div>
              </div>
            </div>
            <div class="row gap-3 gap-sm-0">
              <div class="col-sm-6">
                <div class="single-input">
                  <input
                    type="email"
                    class="fs-six-up"
                    name="email"
                    placeholder="Email"
                   
                  />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="single-input">
                  <input
                    type="text"
                    class="fs-six-up"
                    name="phone"
                    placeholder="Phone"
                  />
                </div>
              </div>
            </div>
            <div class="input-single">
              <textarea
                class="fs-six-up"
                name="message"
                rows="4"
                placeholder="Message"
              ></textarea>
            </div>
          </div>
          <span id="msg"></span>
          <button
            type="submit"
            class="cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto"
            name="submit"
            id="submit"
          >
            Send Message<i class="bi bi-arrow-up-right"></i><span></span>
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Contact end -->


@endsection
