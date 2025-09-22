
<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SP COTTON INDUSTRIES</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/logo.png" />
    <!-- Google Fonts
		========================    ==================== -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900"
      rel="stylesheet"
    />
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/bootstrap.min.css"/>
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/font-awesome.min.css"/>
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/owl.carousel.css"/>
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/owl.theme.css"/>
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/owl.transitions.css"/>
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/meanmenu/meanmenu.min.css" />
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/animate.css" />
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/normalize.css" />
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link
      rel="stylesheet"
      href="{{ url('superadmin') }}/css/scrollbar/jquery.mCustomScrollbar.min.css"
    />
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/jvectormap/jquery-jvectormap-2.0.3.css" />
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/notika-custom-icon.css" />
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/wave/waves.min.css" />
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/main.css" />
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/style.css" />
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('superadmin') }}/css/responsive.css" />
    <!-- modernizr JS
		============================================ -->
    <script src="{{ url('superadmin') }}/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="{{ url('superadmin') }}/js/vendor/jquery-1.12.4.min.js"></script>

  </head>

  <body>



    <style>
        .form-control{
                border-radius: 0px;
        }

        label{
              margin-bottom: 10px;
          }
    </style>    <!-- Start Header Top Area -->



    <div class="header-top-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="logo-area">
              <a href="#"
                ><img src="{{ url('superadmin') }}/img/logo/logo.png" alt="" style="width: 100px"
              /></a>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="header-top-menu">
              <ul class="nav navbar-nav notika-top-nav">
                <li class="nav-item dropdown">
                  <a
                    href="#"
                    data-toggle="dropdown"
                    role="button"
                    aria-expanded="false"
                    class="nav-link dropdown-toggle"
                    ><span><i class="notika-icon notika-search"></i></span
                  ></a>
                  <div
                    role="menu"
                    class="dropdown-menu search-dd animated flipInX"
                  >
                    <div class="search-input">
                      <i class="notika-icon notika-left-arrow"></i>
                      <input type="text" />
                    </div>
                  </div>
                </li>

                <li class="nav-item nc-al">
                  <a
                    href="#"
                    data-toggle="dropdown"
                    role="button"
                    aria-expanded="false"
                    class="nav-link dropdown-toggle"
                    ><span><i class="notika-icon notika-alarm"></i> </span>
                  </a>
                  <div
                    role="menu"
                    class="dropdown-menu message-dd notification-dd animated zoomIn"
                  >
                    <div class="hd-mg-tt">
                      <h2>Notification</h2>
                    </div>
                    <div class="hd-message-info">
                      <a href="#">
                        <div class="hd-message-sn">
                          <div class="hd-message-img">
                            <img src="{{ url('superadmin') }}/img/post/1.jpg" alt="" />
                          </div>
                          <div class="hd-mg-ctn">
                            <h3>David Belle</h3>
                            <p>user@gmail.com</p>
                          </div>
                        </div>
                      </a>
                      <a href="#">
                        <div class="hd-message-sn">
                          <div class="hd-message-img">
                            <img src="{{ url('superadmin') }}/img/post/2.jpg" alt="" />
                          </div>
                          <div class="hd-mg-ctn">
                            <h3>Jonathan Morris</h3>
                            <p>user@gmail.com</p>
                          </div>
                        </div>
                      </a>
                      <a href="#">
                        <div class="hd-message-sn">
                          <div class="hd-message-img">
                            <img src="{{ url('superadmin') }}/img/post/4.jpg" alt="" />
                          </div>
                          <div class="hd-mg-ctn">
                            <h3>Fredric Mitchell</h3>
                            <p>user@gmail.com</p>
                          </div>
                        </div>
                      </a>
                      <a href="#">
                        <div class="hd-message-sn">
                          <div class="hd-message-img">
                            <img src="{{ url('superadmin') }}/img/post/1.jpg" alt="" />
                          </div>
                          <div class="hd-mg-ctn">
                            <h3>David Belle</h3>
                            <p>user@gmail.com</p>
                          </div>
                        </div>
                      </a>
                      <a href="#">
                        <div class="hd-message-sn">
                          <div class="hd-message-img">
                            <img src="{{ url('superadmin') }}/img/post/2.jpg" alt="" />
                          </div>
                          <div class="hd-mg-ctn">
                            <h3>Glenn Jecobs</h3>
                            <p>user@gmail.com</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="hd-mg-va">
                      <a href="notification.html">View All</a>
                    </div>
                  </div>
                </li>

                <li class="nav-item nc-al">
                  <a
                    href="#"
                    data-toggle="dropdown"
                    role="button"
                    aria-expanded="false"
                    class="nav-link dropdown-toggle"
                  >
                    <span
                      ><i class="notika-icon notika-support"></i>
                      <div class="spinner4 spinner-4"></div>
                      <div class="ntd-ctn"><span>2</span></div></span
                    >
                  </a>
                  <div
                    role="menu"
                    class="dropdown-menu message-dd notification-dd animated zoomIn"
                  >
                    <div class="hd-message-info">
                      <a href="profile.html">
                        <div class="hd-message-sn">
                          <div class="hd-message-img">
                            <img src="{{ url('superadmin') }}/img/logo/logo.png" alt="img" />
                          </div>
                          <div class="hd-mg-ctn">
                            <h3>{{ Auth::user()->name }}</h3>
                          </div>
                        </div>
                      </a>
                    </div>
                    <hr />
                    <div class="hd-mg-va">
                      <a href="/logout">Logout</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header Top Area -->

    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="mobile-menu">
              <nav id="dropdown">
                <ul class="mobile-menu-nav">
                  <li>
                    <a href="/crm/dashboard">Home</a>
                  </li>
                  <li>
                    <a href="/crm/add-customers">Add Customers</a>
                  </li>
                  <li>
                    <a href="/crm/customers-list"> Customers List</a>
                  </li>

                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile Menu end -->

    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
              <li class="active">
                <a href="/crm/dashboard"
                  ><i class="notika-icon notika-house"></i> Home</a
                >
              </li>
              <li>
                <a href="/crm/add-customers"
                  ><i class="notika-icon notika-support"></i>Add Customers</a
                >
              </li>
              <li class="">
                <a href="/crm/customers-list"
                  ><i class="notika-icon notika-support"></i> Customers List</a
                >
              </li>

            </ul>

          </div>
        </div>
      </div>
    </div>
    <!-- Main Menu area End-->


    @yield('content')



    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="footer-copy-right">
                <p class="text-danger">
                  Copyright © 2024 . All rights reserved. Design & Developed By
                  <a
                    href="inbox.html"
                    class="text-danger"
                    style="color: red !important"
                    >SP Cotton Industries</a
                  >.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

           <script src="{{ url('superadmin') }}/js/bootstrap.min.js"></script>
      <!-- wow JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/wow.min.js"></script>
      <!-- price-slider JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/jquery-price-slider.js"></script>
      <!-- owl.carousel JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/owl.carousel.min.js"></script>
      <!-- scrollUp JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/jquery.scrollUp.min.js"></script>
      <!-- meanmenu JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/meanmenu/jquery.meanmenu.js"></script>
      <!-- counterup JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/counterup/jquery.counterup.min.js"></script>
      <script src="{{ url('superadmin') }}/js/counterup/waypoints.min.js"></script>
      <script src="{{ url('superadmin') }}/js/counterup/counterup-active.js"></script>
      <!-- mCustomScrollbar JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
      <!-- jvectormap JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
      <script src="{{ url('superadmin') }}/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <script src="{{ url('superadmin') }}/js/jvectormap/jvectormap-active.js"></script>
      <!-- sparkline JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/sparkline/jquery.sparkline.min.js"></script>
      <script src="{{ url('superadmin') }}/js/sparkline/sparkline-active.js"></script>
      <!-- sparkline JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/flot/jquery.flot.js"></script>
      <script src="{{ url('superadmin') }}/js/flot/jquery.flot.resize.js"></script>
      <script src="{{ url('superadmin') }}/js/flot/curvedLines.js"></script>
      <script src="{{ url('superadmin') }}/js/flot/flot-active.js"></script>
      <!-- knob JS
          ============================================ -->
      <script src="{{ url('superadmin') }}/js/knob/jquery.knob.js"></script>
      <script src="{{ url('superadmin') }}/js/knob/jquery.appear.js"></script>
      <script src="{{ url('superadmin') }}/js/knob/knob-active.js"></script>
          <script src="{{ url('superadmin') }}/js/datapicker/bootstrap-datepicker.js"></script>
          <script src="{{ url('superadmin') }}/js/datapicker/datepicker-active.js"></script>


      <script src="{{ url('superadmin') }}/js/wave/waves.min.js"></script>
      <script src="{{ url('superadmin') }}/js/wave/wave-active.js"></script>
      <script src="{{ url('superadmin') }}/js/todo/jquery.todo.js"></script>
      <script src="{{ url('superadmin') }}/js/plugins.js"></script>
      <script src="{{ url('superadmin') }}/js/chat/moment.min.js"></script>
      <script src="{{ url('superadmin') }}/js/chat/jquery.chat.js"></script>
      <script src="{{ url('superadmin') }}/js/main.js"></script>

  </body>
  </html>
