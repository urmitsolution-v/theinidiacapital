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
      content="boot, Bootstrap, Forex and Stock Broker HTML Template"
    />
    <!-- #description -->
    <meta name="description" content="Forex and Stock Broker HTML Template" />
    <!-- #title -->
    <title>Stock Market</title>
    <!-- #favicon -->
    <link
      rel="shortcut icon"
      href="{{url('website')}}/assets/images/fav.png"
      type="image/x-icon"
    />
    <!-- ==== css dependencies start ==== -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.36.0/tabler-icons.min.css"
    />
    <link rel="stylesheet" href="{{url('website')}}/assets/css/style.min.css" />
  </head>

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

    <!-- Contact start -->
    <section
      class="sign nb4-bg h-100 d-flex align-items-center position-relative z-0"
    >
      <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
        <img
          src="{{url('website')}}/assets/images/star.png"
          alt="vector"
          class="position-absolute push_animat"
        />
      </div>
      <div class="container">
        <div
          class="row align-items-center justify-content-center justify-content-xl-start"
        >
          <div class="col-12 col-sm-10 col-md-6">
            <div
              class="welcome alt-color text-center text-md-start pt-120 pb-120 position-relative z-0"
            >
              <h1 class="display-one">Welcome Back!</h1>
            </div>
          </div>
          <div
            class="col-12 col-md-6 col-lg-5 col-xxl-5 offset-xxl-1 text-center ms-xl-auto mx-auto"
          >
            <div class="sign__content ms-md-5 ms-xxl-0 pt-120 pb-120">
              <div class="head_part">
                <a href="index.html">
                  <img src="{{url('website')}}/assets/images/logo.png" alt="Logo"
                /></a>
                <h5 class="mt-5 mt-lg-6">Forgot Password</h5>
              </div>
              <form
                method=""
                autocomplete="off"
                id=""
                class="contact__form mt-8 mt-lg-10 text-start"
              >
                <div class="d-flex flex-column gap-5 gap-lg-6">
                  <div class="single-input">
                    <label class="mb-2 nw1-color" for="lname"
                      >Email Address</label
                    >
                    <input
                      type="email"
                      class="fs-six-up bg_transparent"
                      name="uname"
                      id="uname"
                      placeholder="Enter Your Email"
                      required
                    />
                  </div>
                </div>

                <div class="mt-7 mt-lg-8">
                  <button
                    type="submit"
                    class="cmn-btn py-3 px-5 px-lg-6 mt-7 mt-lg-8 w-100 d-center"
                    name="submit"
                    id="submit"
                  >
                    Submit
                  </button>
                </div>
              </form>
              <span
                class="or-option d-center w-100 mt-7 mt-lg-8 position-relative z-0"
                ><span class="px-3 nb4-bg">Or sign in with</span></span
              >
              <div class="d-center gap-5 mt-7 mt-lg-8">
                <a href="#"
                  ><img src="{{url('website')}}/assets/images/google.png" alt="Google logo"
                /></a>
                <a href="#">
                  <img src="{{url('website')}}/assets/images/facebook.png" alt="FB logo"
                /></a>
              </div>
              <div class="mt-8 mt-lg-10">
                <p>
                  Don’t have an account? <a href="signup.html">Register Here</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact end -->

    <!-- ==== js dependencies start ==== -->
    <script src="{{url('website')}}/assets/js/plugins/plugins.js"></script>
    <script src="{{url('website')}}/assets/js/plugins/plugin-custom.js"></script>
    <script src="{{url('website')}}/assets/js/main.js"></script>
  </body>
</html>
