@extends('front.layout.index')
@section('content')

 <!-- banner section start-->
 <section class="banner-section pt-120 pb-120">
  <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
    <div class="row">
      <div class="col-12 breadcrumb-area">
        <h2 class="mb-4">Blog Details</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li
              class="breadcrumb-item ms-2 ps-7 active"
              aria-current="page"
            >
              <span>Blog Details</span>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- banner section end -->

<!-- Blog details start -->
<section
  class="blog-details overflow-visible sidebar-section pt-120 pb-120"
>
  <div class="container">
    <div class="row gy-4 gy-lg-0">
      <div class="col-lg-7 col-xl-8">
        <div class="d-lg-none">
          <button
            class="button sidebar_toggler_btn mb-4 d-flex align-items-center gap-2"
          >
            <i class="ti ti-layout-sidebar-left-collapse"></i>
            <span>Sidebar Toggler</span>
          </button>
        </div>
        <div class="d-flex flex-column gap-10 gap-lg-15">
          <div class="blog__card">
            <div class="blog__thumbs position-relative">
              <img
                src="{{url('uploads')}}/<?=$blogsingle->image  ?>"
                alt="Image"
                class="w-100 cus-rounded-1"
              />
            </div>
            <div class="blog_news__content mt-5">
              <div
                class="fs-seven fw_500 d-flex flex-wrap row-gap-0 gap-3 mb-3"
              >
              <?= date("F j, Y", strtotime($blogsingle->created_at)) ?> <span>|</span> Written by <?= $blogsingle->admin ?>
              </div>
              <h2 class="mb-5">
                <?= $blogsingle->title ?>..
              </h2>
              <p class="mb-7 mb-lg-8">
                <?= $blogsingle->description ?>
              </p>
            
            </div>
          </div>
     
          <div
            class="tag-area border-top border-bottom border-color third py-5 d-flex justify-content-between gap-10 flex-wrap row-gap-4"
          >
            <div class="tag d-center gap-5 gap-lg-6">
              <span class="heading fs-four">Tags</span>
              <div class="tag-content d-flex gap-3">
                <a
                  href="#"
                  class="cmn-btn tag_btn active cus-rounded-3 py-2 px-4"
                  >Trading</a
                >
                <a href="#" class="cmn-btn tag_btn cus-rounded-3 py-2 px-4"
                  >Investor</a
                >
              </div>
            </div>
            <div class="tag d-center gap-5 gap-lg-6">
              <span class="heading fs-four">Share</span>
              <ul class="social-area d-center gap-2 gap-md-3">
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
          <div class="comments-area d-flex gap-7 gap-lg-8 flex-column">
            <h4 class="mb-2"><span>02</span> Comment</h4>
            <div
              class="content-part d-flex flex-column flex-sm-row gap-4 gap-lg-6"
            >
              <div class="author__thumbs">
                <img
                  src="{{url('website')}}/assets/images/comment_author.png"
                  class="rounded-circle max-un"
                  alt="image"
                />
              </div>
              <div class="author__content">
                <div class="d-flex justify-content-between gap-10">
                  <div class="author__info">
                    <span class="fs-five fw_500 nw1-color"
                      >Suraj Jamdade</span
                    >
                    <p class="author__submit-time fs-seven mt-1">
                      October 07,2025
                    </p>
                  </div>
                  <div class="feedback__content">
                    <button
                      class="reply-btn gap-2 d-center fs-six-up fw_500 nw1-color"
                    >
                      <i class="ti ti-message-dots fs-four p1-color"></i
                      >Reply
                    </button>
                  </div>
                </div>
                <p class="mt-3">
                  Trading is not just about making money; it's about
                  personal growth. It challenges you to become a better
                  decision-maker, strategist, and disciplined individual.
                </p>
                <form method="POST" name="replySearch" class="reply-form">
                  <div
                    class="input-area d-flex p-3 px-lg-5 gap-2 cus-rounded-1 mt-4"
                  >
                    <input type="text" placeholder="Search" required />
                    <button
                      type="submit"
                      class="icon_btn d-center p1-bg rounded-circle"
                    >
                      <i class="ti ti-search fs-five nb4-color"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div
              class="content-part d-flex flex-column flex-sm-row gap-4 gap-lg-6"
            >
              <div class="author__thumbs">
                <img
                  src="{{url('website')}}/assets/images/comment_author2.png"
                  class="rounded-circle max-un"
                  alt="image"
                />
              </div>
              <div class="author__content">
                <div class="d-flex justify-content-between gap-10">
                  <div class="author__info">
                    <span class="fs-five fw_500 nw1-color"
                      >Suraj Jamdade
                    </span>
                    <p class="author__submit-time fs-seven mt-1">
                      October 05,2025
                    </p>
                  </div>
                  <div class="feedback__content">
                    <button
                      class="reply-btn gap-2 d-center fs-six-up fw_500 nw1-color"
                    >
                      <i class="ti ti-message-dots fs-four p1-color"></i
                      >Reply
                    </button>
                  </div>
                </div>
                <p class="mt-3">
                  Trading is not just about making money; it's about
                  personal growth. It challenges you to become a better
                  decision-maker, strategist, and disciplined individual.
                </p>
                <form method="POST" name="replySearch" class="reply-form">
                  <div
                    class="input-area d-flex p-3 px-lg-5 gap-2 cus-rounded-1 mt-4"
                  >
                    <input type="text" placeholder="Search" required />
                    <button
                      type="submit"
                      class="icon_btn d-center p1-bg rounded-circle"
                    >
                      <i class="ti ti-search fs-five nb4-color"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="comments-form cus-rounded-1 nb3-bg">
            <form
              method="POST"
              autocomplete="off"
              id="frmContactus"
              class="message__form p-4 p-lg-8"
            >
              <h6 class="message__title mb-8 mb-lg-10">Leave A Comment</h6>
              <div class="d-flex gap-7 gap-lg-8 flex-column">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="single-input">
                      <label class="label fw_500 nw1-color mb-4" for="name"
                        >Name</label
                      >
                      <input
                        type="text"
                        class="fs-seven"
                        name="name"
                        id="name"
                        placeholder="Full Name"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="single-input">
                      <label class="label fw_500 nw1-color mb-4" for="email"
                        >Email</label
                      >
                      <input
                        type="email"
                        class="fs-seven"
                        name="email"
                        id="email"
                        placeholder="Your Email"
                        required
                      />
                    </div>
                  </div>
                </div>
                <div class="input-single">
                  <label class="label fw_500 nw1-color mb-4" for="message"
                    >Message</label
                  >
                  <textarea
                    class="fs-seven"
                    id="message"
                    name="message"
                    rows="8"
                    placeholder="Enter Your Message"
                    required
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
                Submit Comments<i class="bi bi-arrow-up-right"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-xl-4">
        <div
          class="sidebar nb4-bg cus-scrollbar sidebar-lg-section d-flex flex-column gap-5 gap-lg-6"
        >
          <div class="nb3-bg cus-rounded-1 p-4 p-lg-6">
            <h5 class="mb-4">Search Here</h5>
            <form method="POST" name="sidebarSearch" class="sidebar-search">
              <div class="input-area d-flex p-3 gap-2 cus-rounded-1">
                <input type="text" placeholder="Search" required />
                <button
                  type="button"
                  class="icon_btn d-center p1-bg rounded-circle"
                >
                  <i class="ti ti-search fs-five nb4-color"></i>
                </button>
              </div>
            </form>
          </div>
          <div class="nb3-bg cus-rounded-1 p-4 p-lg-6">
            <h5 class="pb-5 mb-5 border-bottom border-color four">
              Category
            </h5>
            <ul class="category d-flex flex-column gap-4">
              @foreach ($category as $val)
                  
              <li>
                <a
                  href="#"
                  class="d-flex align-items-center justify-content-between"
                  ><span><?=$val->title ?></span> 
                </a>
              </li>
             
              @endforeach
            </ul>
          </div>
          <div class="nb3-bg cus-rounded-1 p-4 p-lg-6">
            <h5 class="pb-5 mb-5 border-bottom border-color four">
              Recent Post
            </h5>
            <div class="recent-posts d-flex flex-column gap-5">
              @foreach ($recentBlogs as $val)
                  
              <div
                class="recent-posts__part d-flex gap-3 align-items-center"
              >
                <div class="recent-posts__thumb">
                  <img
                    src="{{url('uploads')}}/<?=$val->image ?>"
                    class="cus-rounded-1" width="200"
                    alt="image"
                  />
                </div>
                <div class="recent-posts__title">
                  <a href="/blog-single/<?= $val->slug ?>">
                    <h5><?=$val->title ?></h5>
                  </a>
                  <p class="author__submit-time mt-3"><?= date("F j, Y", strtotime($blogsingle->created_at)) ?></p>
                </div>
              </div>
             
              @endforeach
          
            </div>
          </div>
          <div class="nb3-bg cus-rounded-1 p-4 p-lg-6">
            <h5 class="pb-5 mb-5 border-bottom border-color four">
              Popular Tag
            </h5>
            <div class="tag-area">
              <div class="tag d-center gap-5 gap-lg-6">
                <div class="tag-content d-flex gap-3 flex-wrap">
                  <a
                    href="#"
                    class="cmn-btn tag_btn active cus-rounded-3 py-2 px-4"
                    >Trading</a
                  >
                  <a
                    href="#"
                    class="cmn-btn tag_btn cus-rounded-3 py-2 px-4"
                    >Analysis</a
                  >
                  <a
                    href="#"
                    class="cmn-btn tag_btn cus-rounded-3 py-2 px-4"
                    >Research</a
                  >
                  <a
                    href="#"
                    class="cmn-btn tag_btn cus-rounded-3 py-2 px-4"
                    >Mentoring</a
                  >
                  <a
                    href="#"
                    class="cmn-btn tag_btn cus-rounded-3 py-2 px-4"
                    >Strategy</a
                  >
                  <a
                    href="#"
                    class="cmn-btn tag_btn cus-rounded-3 py-2 px-4"
                    >Planning</a
                  >
                  <a
                    href="#"
                    class="cmn-btn tag_btn cus-rounded-3 py-2 px-4"
                    >Business</a
                  >
                  <a
                    href="#"
                    class="cmn-btn tag_btn cus-rounded-3 py-2 px-4"
                    >Leadership</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Blog details end -->

<!--blog_news start-->
<section class="blog_news pb-120 position-relative z-0">
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
          Learn more <i class="ti ti-arrow-right"></i
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
