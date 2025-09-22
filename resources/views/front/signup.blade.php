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
    <title>Tic - Sign Up</title>
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
            class="col-12 col-md-6 col-lg-5 col-xxl-5 offset-xxl-1 text-center ms-xl-auto"
          >
            <div class="sign__content ms-md-5 ms-xxl-0 pt-120 pb-120">
              <div class="head_part">
                <a href="/">
                  <img width="150" src="{{url('uploads')}}/{{ weblogo() ?? "" }}" alt="Logo"
                /></a>
                <h5 class="mt-5 mt-lg-6">Sign up to Your Account</h5>
              </div>
              <form
              method="POST"
              autocomplete="off"
              id="contactForm"
              class="contact__form mt-8 mt-lg-10 text-start"
          >
              @csrf
              <div class="d-flex flex-column gap-5 gap-lg-6">
                  <div class="row g-5 g-lg-6">
                      <div class="col-sm-6 col-md-12 col-xl-6">
                          <div class="single-input">
                              <label class="mb-2 nw1-color" for="fname">First Name</label>
                              <input type="text" class="fs-six-up bg_transparent" name="first_name" id="fname" placeholder="First Name" required />
                              <small class="text-danger error" id="error_first_name"></small>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-12 col-xl-6">
                          <div class="single-input">
                              <label class="mb-2 nw1-color" for="lname">Last Name</label>
                              <input type="text" class="fs-six-up bg_transparent" name="last_name" id="lname" placeholder="Last Name" required />
                              <small class="text-danger error" id="error_last_name"></small>
                          </div>
                      </div>
                  </div>
                  <div class="single-input">
                      <label class="mb-2 nw1-color" for="uname">User Name</label>
                      <input type="text" class="fs-six-up bg_transparent" name="username" id="uname" placeholder="Username" required />
                      <small class="text-danger error" id="error_username"></small>
                  </div>
                  <div class="single-input">
                      <label class="mb-2 nw1-color" for="password">Password</label>
                      <div class="input-pass">
                          <input type="password" class="fs-six-up bg_transparent pe-13" name="password" id="password" placeholder="Password" required />
                          <span class="password-eye-icon"></span>
                      </div>
                      <small class="text-danger error" id="error_password"></small>
                  </div>
                  <div class="single-input">
                      <label class="mb-2 nw1-color" for="cpassword">Confirm Password</label>
                      <div class="input-pass">
                          <input type="password" class="fs-six-up bg_transparent pe-13" name="password_confirmation" id="cpassword" placeholder="Confirm Password" required />
                          <span class="password-eye-icon"></span>
                      </div>
                      <small class="text-danger error" id="error_cpassword"></small>
                  </div>
                  <div class="single-input">
                      <label class="mb-2 nw1-color" for="email">Email</label>
                      <input type="email" class="fs-six-up bg_transparent" name="email" id="email" placeholder="Email Address" required />
                      <small class="text-danger error" id="error_email"></small>
                  </div>

                  <div class="single-input">
                    <label class="mb-2 nw1-color" for="referral_code">Referral Code</label>
                    <input type="text" class="fs-six-up bg_transparent" name="referral_code" id="referral_code" 
                        placeholder="Referral Code" value="{{ request()->get('ref') ?? "" }}" />
                    <small class="text-danger error" id="error_referral_code"></small>
                </div>
                
                
              </div>
              <label class="checkbox-single d-flex align-items-center nw1-color mt-3">
                  <span class="checkbox-area d-center">
                      <input type="checkbox" name="terms" required id="privacy_policy"/>
                      <span class="checkmark d-center"></span>
                  </span>
                  I accept the privacy policy
              </label>
               <small class="text-danger error" id="error_terms"></small>
              <small class="text-danger error" id="error_privacy"></small>
              <div class="mt-7 mt-lg-8">
                  <button type="submit" class="cmn-btn py-3 px-5 px-lg-6 mt-7 mt-lg-8 w-100 d-center" name="submit" id="submit">
                      Sign Up
                  </button>
              </div>
          </form>
          
              <span
                class="or-option d-center w-100 mt-7 mt-lg-8 position-relative z-0"
                ><span class="px-3 nb4-bg">Or sign in with</span></span
              >
              {{-- <div class="d-center gap-5 mt-7 mt-lg-8">
                <a href="#"
                  ><img src="{{url('website')}}/assets/images/google.png" alt="Google logo"
                /></a>
                <a href="#">
                  <img src="{{url('website')}}/assets/images/facebook.png" alt="FB logo"
                /></a>
              </div> --}}
              <div class="mt-8 mt-lg-10">
                <p>Already have an account? <a href="/sign-in">Log in</a></p>
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


<script src="{{ url('external') }}/jquery-3.6.0.min.js"></script>
<script src="{{ url('external') }}/sweetalert2@11.js"></script>

<script>





$(document).ready(function () {
    $("#submit").click(function (e) {
        e.preventDefault();
        $(".error").text(""); // Clear previous error messages
        
        let formData = $("#contactForm").serialize(); // Serialize form data
        let submitButton = $("#submit");

        // Change button text and disable it
        submitButton.prop("disabled", true).text("Registering...");

        $.ajax({
            url: "/register",
            type: "POST",
            data: formData,
            success: function (response) {
                $("#contactForm")[0].reset(); // Reset the form
                
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.success,
                    confirmButtonText: "OK"
                }).then(() => {
                    window.location.href = "{{ route('signin') }}"; // Redirect to sign-in page
                });

                // Reset button text after success
                submitButton.prop("disabled", false).text("Sign Up");
            },
            error: function (xhr) {
                submitButton.prop("disabled", false).text("Sign Up"); // Re-enable button

                if (xhr.status === 422) { // Validation error
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        let errorField = key.replace(".", "_"); // Replace any dots with underscores for nested fields
                        $("#error_" + errorField).text(value[0]); // Display the first error message
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Something went wrong. Please try again."
                    });
                }
            }
        });
    });
});

</script>


{{-- refreal --}}


<script>
  $(document).ready(function () {
    function getQueryParam(param) {
        let urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Check and set referral code from URL
    let refCode = getQueryParam('ref');
    if (refCode) {
        $("#referral_code").val(refCode);
    }
});

</script>


  </body>
</html>
