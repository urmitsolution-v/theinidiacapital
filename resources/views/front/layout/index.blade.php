<?php 
$data = DB::table('webinfo')->where('id', 5)->select(['image', 'favicon', 'info_one'])->first();
$row = json_decode($data->info_one);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- #keywords -->
    <meta
      name="keywords"
      content="boot, Bootstrap, Forex and Stock Broker HTML Template"/>
    <!-- #description -->
    <meta name="description" content="Forex and Stock Broker HTML Template" />
    <!-- #title -->
    <title>TIC</title>
    <!-- #favicon -->
    <link
      rel="shortcut icon"
      href="{{url('website')}}/assets/images/fav.png"
      type="image/x-icon"/>
    <!-- ==== css dependencies start ==== -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.36.0/tabler-icons.min.css"/>
    <link rel="stylesheet" href="{{url('website')}}/assets/css/style.min.css?v1=12" />
  </head>
  
  <style>
      img.d-none.d-sm-flex.rotate.time_dur.ms-auto.ms-lg-0.me-md-5 {
    display: none !important;
}
  </style>
  

  <body>
    <!--  Preloader  -->
    <div class="preloader">
      <span class="loader"></span>
    </div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <button
      class="scrollToTop d-none d-md-flex d-center rounded"
      aria-label="scroll Bar Button"
    >
      <i class="mat-icon fs-four nb4-color ti ti-arrow-up"></i>
    </button>
    <!-- Scroll To Top End -->

    <!-- header-section start -->
    <header
      class="header-section a2-bg-0 header-section--secondary header-menu w-100"
    >
      <div class="container d-center">
        <nav
          class="navbar a2-lg-bg py-5 p-lg-5 rounded-3 navbar-expand-lg w-100 justify-content-between"
        >
          <div class="d-flex align-items-center">
            <button
              class="navbar-toggler ms-4"
              type="button"
              data-bs-toggle="collapse"
              aria-label="Navbar Toggler"
              data-bs-target="#navbar-content"
              aria-expanded="true"
              id="nav-icon3"
            >
              <span></span><span></span><span></span><span></span>
            </button>
            <a
              href="/"
              class="navbar-brand m-0 p-0 d-flex align-items-center gap-5 gap-xl-5 me-2"
            >
              <img
                src="{{url('uploads')}}/{{ weblogo() ?? "" }}" class="logo small_logo d-sm-none" alt="logo"/>
              <img
                src="{{url('uploads')}}/{{ weblogo() ?? "" }}" class="logo d-none  d-sm-flex" width="100px" alt="logo"/>
            </a>
          </div>
          <div class="nav_alt">
            <div
              class="right-area position-relative ms-0 d-center gap-1 gap-xl-4 d-lg-none"
            >
            @if (Auth::check() && Auth::user() && Auth::user()->status == "approved")
              
              
                  <div>
                          <a href="{{ url()->current() }}">
                    <svg width="15" class="text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18.5374 19.5674C16.7844 21.0831 14.4993 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 14.1361 21.3302 16.1158 20.1892 17.7406L17 12H20C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.1502 20 16.1022 19.1517 17.5398 17.7716L18.5374 19.5674Z"></path></svg>
                      </a>
                  </div>
           
              <div class="single-item">
                  
                  
                <a
                  href="/dashboard"
                  class="rotate_eff flex-nowrap py-1 px-2 px-xl-3 d-center gap-1 fw-bold nw1-color"
                >
                <div class="show_profile">
                  <div class="d-flex justify-content-center align-items-center">
  <div class="profile-card text-center">
    @if (Auth::user()->image)
    <img src="{{ url('uploads/profile_photos') }}/{{ Auth::user()->image }}" id="profile-pic" class="profile-img" alt="Profile Picture">
   
   @if (Auth::user()->kyc_status == "complete")
   <img src="{{ url('') }}/admin/tick-mark.png" class="png_verified" alt="">
   @endif 
    @else
    <img src="{{ url('uploads/profile_photos') }}/profile.png" id="profile-pic" class="profile-img" alt="Profile Picture">
    @if (Auth::user()->kyc_status == "complete")
    <img src="{{ url('') }}/admin/tick-mark.png" class="png_verified" alt="">
    @endif       @endif
     
    
  </div>
</div>
                </div> <i class="ti ti-arrow-right fs-six-up"></i
                ></a>
              </div>
                @else
                <div class="single-item">
                  <a
                    href="/sign-up"
                    class="cmn-btn fw-bold py-2 px-2 px-sm-3 px-lg-4 align-items-center gap-1"
                  >
                    Sign Up <i class="ti ti-arrow-right fw-semibold fs-six-up"></i
                  ></a>
                </div>

              @endif

              
            </div>
          </div>
          <div
            class="collapse navbar-collapse justify-content-center"
            id="navbar-content"
          >
            <ul
              class="navbar-nav gap-2 gap-lg-8 gap-xxl-8 align-self-center mx-auto mt-4 mt-lg-0"
            >
              <li class="dropdown show-dropdown">
                <a class="" href="/">Home</a>
              </li>
              <li class="">
                <a class="" href="/about-us">About Us</a>
              </li>
              <li class="">
                <a class="" href="/services">Services</a>
              </li>
              <li class="">
                <a class="" href="/blog">Blog</a>
              </li>
              <li class="">
                <a class="" href="/pricing">Invest Now</a>
              </li>

              <li class="dropdown show-dropdown">
                <button
                  type="button"
                  aria-label="Navbar Dropdown Button"
                  class="dropdown-toggle dropdown-nav"
                >
                  Resources
                </button>
                <ul class="dropdown-menu custom_droupdown">
                  <li>
                    <a class="dropdown-item" href="/roadmap">roadmap</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/faq">FAQ's</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/terms-and-conditions"
                      >terms conditions</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="/privacy-policy"
                      >privacy-policy</a
                    >
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div
            class="right-area position-relative ms-0 d-center gap-1 gap-xl-4 d-none d-lg-flex"
          >

          @if (Auth::check() && Auth::user() && Auth::user()->status == "approved")
            <div class="single-item">
              <ul
                class="navbar-nav custom_droupdown gap-2 gap-lg-3 gap-xxl-8 d-flex align-items-center mx-auto mt-4 mt-lg-0" 
              >
                  
                  <li>
                         <a href="{{ url()->current() }}">
                          <svg width="15" class="text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18.5374 19.5674C16.7844 21.0831 14.4993 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 14.1361 21.3302 16.1158 20.1892 17.7406L17 12H20C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.1502 20 16.1022 19.1517 17.5398 17.7716L18.5374 19.5674Z"></path></svg>
                      </a>
                  </li>
                  
              <li class="walletbox">
               Deposite Amount -
                Rs.{{ Auth::user()->wallet ?? 0 }}</li>
                <li class="dropdown show-dropdown">
                  <button
                    type="button"
                    aria-label="Navbar Dropdown Button"
                    class="dropdown-toggle dropdown-nav"
                  >
                  <div class="show_profile">
                    <div class="d-flex justify-content-center align-items-center">
    <div class="profile-card text-center">
      @if (Auth::user()->image)
      <img src="{{ url('uploads/profile_photos') }}/{{ Auth::user()->image }}" id="profile-pic" class="profile-img" alt="Profile Picture">
     
     @if (Auth::user()->kyc_status == "complete")
     <img src="{{ url('') }}/admin/tick-mark.png" class="png_verified" alt="">
     @endif 
      @else
      <img src="{{ url('uploads/profile_photos') }}/profile.png" id="profile-pic" class="profile-img" alt="Profile Picture">
      @if (Auth::user()->kyc_status == "complete")
      <img src="{{ url('') }}/admin/tick-mark.png" class="png_verified" alt="">
      @endif       @endif
       
      
    </div>
</div>
                  </div>
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="/dashboard">Profile</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/userlogout">Logout</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            @else
            <div class="single-item">
              <a
                href="/sign-up"
                class="cmn-btn fw-bold py-2 px-2 px-sm-3 px-lg-4 align-items-center gap-1"
              >
                Sign Up <i class="ti ti-arrow-right fw-semibold fs-six-up"></i
              ></a>
            </div>

            @endif
          </div>
        </nav>
      </div>
    </header>
    <!-- header-section end -->
    @yield('content')

    <?php 
$data = DB::table('webinfo')->where('id', 5)->select(['image', 'favicon', 'info_one'])->first();
$row = json_decode($data->info_one);
?>
   <!-- Footer Section Starts -->
   <footer class="footer a2-bg position-relative pt-15 pt-lg-0 z-0">
    <div
      class="animation position-absolute top-0 left-0 w-100 h-100 z-n1 d-none d-xxxl-flex"
    >
      <img
        src="{{url('website')}}/assets/images/vector.png"
        alt="vector"
        class="position-absolute jello"
      />
      <img
        src="{{url('website')}}/assets/images/vector4.png"
        alt="vector"
        class="position-absolute bottom-0 end-0"
      />
    </div>
    <div class="container">
      <div
        class="d-none start-earning nb3-bg cus-rounded-2 d-flex align-items-center p-4 p-sm-6 p-md-10 p-lg-15 p-xl-20 pe-lg-6 pe-xl-16 overflow-hidden position-relative"
      >
        <div
          class="vector_effect position-absolute d-center justify-content-end end-0 d-flex gap-20"
        >
          <img
            src="{{url('website')}}/assets/images/star2.png"
            alt="vector"
            class="d-none d-xxl-flex push_animat"
          />
          <img
            src="{{url('website')}}/assets/images/star_focus.png"
            alt="vector"
            class="d-none d-sm-flex rotate time_dur ms-auto ms-lg-0 me-md-5"
          />
        </div>
        <div
          class="row gy-6 w-100 text-center text-sm-start align-items-center justify-content-sm-between"
        >
          <div class="col-sm-8">
            <h2>Start earning with only $20</h2>
            <p class="fs-six-up fw_500 mt-5">
              Try our super easy portal for free
            </p>
          </div>
          <div class="col-sm-4 text-sm-end">
            <a
              href="signup.html"
              class="cmn-btn secondary-alt ms-auto fs-five nb4-xxl-bg gap-2 align-items-center py-2 px-4 py-lg-3 px-lg-5"
              >Register <i class="ti ti-arrow-right fs-four"></i
            ></a>
          </div>
        </div>
      </div>

      <div class="row gy-8 gy-sm-12 gy-lg-0 pt-120 pb-120">
        <div class="col-6 col-lg-3">
          <div class="footer__part">
            <h4 class="mb-6 mb-lg-8">Quick Link</h4>
            <ul
              class="footer_list d-flex flex-column gap-2 gap-sm-3 gap-md-4"
            >
              <li>
                <a
                  class="n2-color d-flex align-items-center"
                  href="index.html"
                >
                  Home</a
                >
              </li>
              <li>
                <a class="n2-color" href="/about-us">About Us</a>
              </li>
              <li>
                <a class="n2-color" href="/services">Services</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="footer__part">
            <h4 class="mb-6 mb-lg-8">Company</h4>
            <ul
              class="footer_list d-flex flex-column gap-2 gap-sm-3 gap-md-4"
            >
              <li>
                <a class="n2-color" href="/blog">Blog</a>
              </li>
              <li>
                <a class="n2-color" href="/pricing">Invest Now</a>
              </li>
              <li>
                <a class="n2-color" href="/roadmap">Road Map</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="footer__part">
            <h4 class="mb-6 mb-lg-8">Legal</h4>
            <ul
              class="footer_list d-flex flex-column gap-2 gap-sm-3 gap-md-4"
            >
              <li>
                <a class="n2-color" href="/terms-and-conditions"
                  >Terms & Conditions</a
                >
              </li>
              <li>
                <a class="n2-color" href="/privacy-policy"
                  >Privacy & Policy</a
                >
              </li>
              <li>
                <a class="n2-color" href="/contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="footer__part">
            <h4 class="mb-6 mb-lg-8">Contact Us</h4>
            <div class="d-flex flex-column gap-2 gap-sm-3 gap-md-4">
              <a href=""><span><?=$row->email ?></span></a>
              <a href="tel:+<?=$row->phone ?>">+<?=$row->phone ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 border-top border-color opac-20 py-7 py-xxl-8">
          <div
            class="footer__copyright d-center gap-15 flex-wrap justify-content-md-between"
          >
            <p class="fs-six order-2 order-md-0 text-center text-md-start">
              Copyright ©<span class="currentYear"></span> Tradez
              <span>|</span> All Rights Reserved
            </p>
            <ul class="social-area d-center gap-2 gap-md-3">
              <li>
                <a class="d-center cus-rounded-1 fs-four" href="#"
                  ><i class="ti ti-brand-facebook"></i
                ></a>
              </li>
              <li>
                <a class="d-center cus-rounded-1 fs-four" href="#"
                  ><i class="ti ti-brand-instagram"></i
                ></a>
              </li>
              <li>
                <a class="d-center cus-rounded-1 fs-four" href="#"
                  ><i class="ti ti-brand-twitter"></i
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
    </div>
  </footer>
  <!-- Footer Section Ends -->
  <!-- ==== js dependencies start ==== -->
  <script
    data-cfasync="false"
    src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
  ></script>
  <script src="{{url('website')}}/assets/js/plugins/plugins.js"></script>
  <script src="{{url('website')}}/assets/js/plugins/plugin-custom.js"></script>
  <script src="{{url('website')}}/assets/js/main.js"></script>
  <script src="{{ url('external') }}/jquery-3.6.0.min.js"></script>
  <script src="{{ url('external') }}/sweetalert2@11.js"></script>


  @yield('footer')

  @if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: '{{ session('success') }}',
      });
  </script>
@endif

@if(session('error'))
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: '{{ session('error') }}',
      });
  </script>
@endif


</body>
</html>
