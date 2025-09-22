<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8" />
    <title>Tic Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('uploads/'.weblogo() )}}">

    <!-- App css -->
    <link href="{{ url('admin') }}/assets/css/app.min.css?v3.12dd" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ url('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    @yield('header')

    <style>
        .fs-18.fw-semibold.m-0 {
            text-transform: capitalize;
        }
    </style>
</head>

<!-- body start -->

<body data-menu-color="light" data-sidebar="default">

    <div id="app-layout">


        <!-- Topbar Start -->
        <div class="topbar-custom">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <li>
                            <button class="button-toggle-menu nav-link">
                                <i data-feather="menu" class="noti-icon"></i>
                            </button>
                        </li>
                        <li class="d-none d-lg-block">
                            <li>
                                <button class="button-toggle-menu nav-link" onclick="location.reload();">
                                    <svg width="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM16.8201 17.0761C18.1628 15.8007 19 13.9981 19 12C19 8.13401 15.866 5 12 5C10.9391 5 9.9334 5.23599 9.03241 5.65834L10.0072 7.41292C10.6177 7.14729 11.2917 7 12 7C14.7614 7 17 9.23858 17 12H14L16.8201 17.0761ZM14.9676 18.3417L13.9928 16.5871C13.3823 16.8527 12.7083 17 12 17C9.23858 17 7 14.7614 7 12H10L7.17993 6.92387C5.83719 8.19929 5 10.0019 5 12C5 15.866 8.13401 19 12 19C13.0609 19 14.0666 18.764 14.9676 18.3417Z"></path>
                                    </svg>
                                </button>
                            </li>
                            
                        <li class="d-none d-lg-block">
                            <h5 class="mb-0 text-white">Hello {{ Auth::user()->name }}</h5>
                        </li>
                    </ul>

                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                        <!--<li class="d-none d-lg-block">-->
                        <!--    <div class="position-relative topbar-search">-->
                        <!--        <input type="text" class="form-control bg-light bg-opacity-75 border-light ps-4"-->
                        <!--            placeholder="Search...">-->
                        <!--        <i-->
                        <!--            class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>-->
                        <!--    </div>-->
                        <!--</li>-->





                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('uploads/'.weblogo() )}}" alt="user-image"
                                    class="rounded-circle img-thumbnail">
                                <span class="pro-user-name ms-1">
                                    {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='/admin/profile'>
                                    <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                    <span>My Account</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='/logout'>
                                    <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>
                </div>

            </div>

        </div>
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        <div class="app-sidebar-menu">
            <div class="h-100" data-simplebar>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <div class="logo-box">
                        <a class='logo logo-light' href='/admin/dashboard'>
                            <span class="logo-sm">
                                <img src="{{ asset('uploads/'.weblogo() )}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('uploads/'.weblogo() )}}" alt=""
                                    height="24">
                            </span>
                        </a>
                        <a class='logo logo-dark' href='index.html'>
                            <span class="logo-sm">
                                <img src="{{ asset('uploads/'.weblogo() )}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('uploads/'.weblogo() )}}" alt=""
                                    height="24">
                            </span>
                        </a>
                    </div>

                    <ul id="side-menu">

                        <!--<li class="menu-title">Menu</li>-->

                        <li>
                            <a href="/admin/dashboard">
                                <i data-feather="home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        {{-- <li>
                            <a href="/crm/dashboard">
                                <i data-feather="home"></i>
                                <span>CRM</span>
                            </a>
                        </li> --}}

                        {{-- <li class="menu-title">Pages</li> --}}

                        {{-- <li>
                            <a href="#sidebarAuth" data-bs-toggle="collapse">
                                <i data-feather="users"></i>
                                <span> Admin Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarAuth">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='/admin/profile'>Profile</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/genral-setting'>Genral Setting</a>
                                    </li>

                                </ul>
                            </div>
                        </li> --}}



                        {{-- <li>
                            <a href="#sdhlkjg_____111" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>Seo Management</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sdhlkjg_____111">
                                <ul class="nav-second-level">

                                    <li>
                                        <a class='tp-link' href=/admin/seo-management>Manage Page & Seo</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}

                        {{-- <li>
                            <a href="#sidebarExpages" data-bs-toggle="collapse">
                                <i data-feather="file-text"></i>
                                <span> My Pages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarExpages">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='/admin/home-banners'>Home Banners</a>
                                    </li>

                                    <li>
                                        <a class='tp-link' href="{{url('admin/about-us')}}">About</a>
                                    </li>
                                     <li>
                                        <a class='tp-link' href='/admin/homeadd'>Welcome box</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/skillsadd'>Skills</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/workingadd'>Home Working</a>
                                    </li>

                                </ul>
                            </div>
                        </li> --}}


                        <li>
                            <a href="/admin/transactions?type=pending" >
                                <svg class="text-dark" style="fill:#000" widtth="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M8 4H21V6H8V4ZM5 3V6H6V7H3V6H4V4H3V3H5ZM3 14V11.5H5V11H3V10H6V12.5H4V13H6V14H3ZM5 19.5H3V18.5H5V18H3V17H6V21H3V20H5V19.5ZM8 11H21V13H8V11ZM8 18H21V20H8V18Z"></path></svg>
                                <span>Deposits</span>
                                {{-- <span class="menu-arrow"></span> --}}
                            </a>
                        </li>


                        <li>
                            <a href="/admin/pnl-history" >
                                <svg class="text-dark" style="fill:#000" widtth="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M8 4H21V6H8V4ZM5 3V6H6V7H3V6H4V4H3V3H5ZM3 14V11.5H5V11H3V10H6V12.5H4V13H6V14H3ZM5 19.5H3V18.5H5V18H3V17H6V21H3V20H5V19.5ZM8 11H21V13H8V11ZM8 18H21V20H8V18Z"></path></svg>
                                <span>PNL History</span>
                                {{-- <span class="menu-arrow"></span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="/admin/custom-interest-rates" >
                                <svg class="text-dark" style="fill:#000" widtth="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M8 4H21V6H8V4ZM5 3V6H6V7H3V6H4V4H3V3H5ZM3 14V11.5H5V11H3V10H6V12.5H4V13H6V14H3ZM5 19.5H3V18.5H5V18H3V17H6V21H3V20H5V19.5ZM8 11H21V13H8V11ZM8 18H21V20H8V18Z"></path></svg>
                                <span>Custom Interest</span>
                                {{-- <span class="menu-arrow"></span> --}}
                            </a>
                        </li>



                        <li>
                            <a href="/admin/withdraw?type=pending">
                                <svg class="text-dark" style="fill:#000" widtth="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M8 4H21V6H8V4ZM5 3V6H6V7H3V6H4V4H3V3H5ZM3 14V11.5H5V11H3V10H6V12.5H4V13H6V14H3ZM5 19.5H3V18.5H5V18H3V17H6V21H3V20H5V19.5ZM8 11H21V13H8V11ZM8 18H21V20H8V18Z"></path></svg>
                                <span>Withdraw</span>
                                {{-- <span class="menu-arrow"></span> --}}
                            </a>
                            {{-- <div class="collapse" id="transactiondrop">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='/admin/transactions?type=pending'>Deposit Requests</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/transactions?type=complete'>Verify Payment</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/transactions?type=reject'>Rejected Payment</a>
                                    </li>
                                </ul>
                            </div> --}}
                        </li>
                      
                      
                        {{-- <li>
                            <a href="#withdrawdrop" data-bs-toggle="collapse">
                                <svg class="text-dark" style="fill:#000" widtth="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M5.75024 3.5H4.71733L3.25 3.89317V5.44582L4.25002 5.17782L4.25018 8.5H3V10H7V8.5H5.75024V3.5ZM10 4H21V6H10V4ZM10 11H21V13H10V11ZM10 18H21V20H10V18ZM2.875 15.625C2.875 14.4514 3.82639 13.5 5 13.5C6.17361 13.5 7.125 14.4514 7.125 15.625C7.125 16.1106 6.96183 16.5587 6.68747 16.9167L6.68271 16.9229L5.31587 18.5H7V20H3.00012L2.99959 18.8786L5.4717 16.035C5.5673 15.9252 5.625 15.7821 5.625 15.625C5.625 15.2798 5.34518 15 5 15C4.67378 15 4.40573 15.2501 4.37747 15.5688L4.3651 15.875H2.875V15.625Z"></path></svg>
                                 <span>Withdraw</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="withdrawdrop">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='/admin/withdraw?type=pending'>Withdraw Requests</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/withdraw?type=complete'>Verify Payment</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/withdraw?type=reject'>Rejected Payment</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        --}}
                       
                       
                        <li>
                            <a href="#sdkjggjf" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>Blogs</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sdkjggjf">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='/admin/categories?type=blogs'>Categories</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/create-blog'>Create Blog</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/blogs'>Blogs Lists</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#xyz" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>Web Pages</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="xyz">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='/admin/home-banner'>Home Banner</a>
                                    </li>

                                    {{-- <li>
                                        <a class='tp-link' href='/admin/clients'>Clients</a>
                                    </li> --}}


                                    <li>
                                        <a class='tp-link' href='/admin/about-us'>About Us</a>
                                    </li>


                                    {{-- <li>
                                        <a class='tp-link' href='/admin/process'>Process</a>
                                    </li> --}}

{{-- 
                                    <li>
                                        <a class='tp-link' href='/admin/counter-add'>Counter</a>
                                    </li> --}}

                                    {{-- <li>
                                        <a class='tp-link' href='/admin/gallery'>Gallery</a>
                                    </li> --}}


                                    <li>
                                        <a class='tp-link' href='/admin/platform'>Platform</a>
                                    </li> 

                                    <li>
                                        <a class='tp-link' href='/admin/testimonials'>Testimonials</a>
                                    </li>

                                    <li>
                                        <a class='tp-link' href='/admin/people-trust'>Peoples Trust</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/roadmaps'>RoadMaps</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/faq'>faq</a>
                                    </li>

                                    <li>
                                        <a class='tp-link' href='/admin/privacy-policy'>Privacy Policy</a>
                                    </li> 


                                    <li>
                                        <a class='tp-link' href='/admin/terms-condition'>Terms Condition</a>
                                    </li>
                                   
                                </ul>
                                
                            </div>
                        </li>


                        {{-- <li>
                            <a href="#sidebarBaseui1iuyig" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>Teams</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui1iuyig">
                                <ul class="nav-second-level">

                                    <li>
                                        <a class='tp-link' href={{url('admin/create-team')}}>Create Team</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='{{url('admin/team')}}'>Team List</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        {{-- <li>
                            <a href="#sidebarBaseui1" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>Works</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui1">
                                <ul class="nav-second-level">

                                    <li>
                                        <a class='tp-link' href={{url('admin/create-work')}}>Create Work</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='{{url('admin/work')}}'>Work List</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}


                        {{-- <li>
                            <a href="#sidebarBaseui2" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>Projects</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui2">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='/admin/categories?type=project'>Categories</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='{{url('admin/add-project')}}'>Create Project</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='{{url('admin/projects-list')}}'>Projects List</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}



                        <li>
                            <a href="#sidebarBaseui3" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>services</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui3">
                                <ul class="nav-second-level">
                                    {{-- <li>
                                        <a class='tp-link' href='/admin/categories?type=service'>Categories</a>
                                    </li> --}}
                                    <li>
                                        <a class='tp-link' href='{{url('/admin/add-services')}}'>Create services</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='{{url('admin/services-list')}}'>Services List</a>
                                    </li>

                                    {{-- <li>
                                        <a class='tp-link' href='{{url('admin/best-services')}}'>Our Best Services</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>



                        {{-- <li>
                            <a href="#sidebarBaseui100" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>Access Management</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui100">
                                <ul class="nav-second-level">

                                    <li>
                                        <a class='tp-link' href='{{url('/admin/new-access')}}'>Create Access</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='{{url('admin/access-management')}}'>Access List</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}


                        {{-- <li>
                            <a href="#sidebarBaseui2" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>FAQ</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui2">
                                <ul class="nav-second-level">

                                    <li>
                                        <a class='tp-link' href='{{url('admin/create-faq')}}'>Create Faq</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='{{url('admin/faq')}}'>Faq List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#sidebarBaseui3" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>Testimonials</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui3">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='/admin/create-testimonials/'>Testimonials</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='/admin/testimonials'>Testimonials List</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}


                        <li>
                            <a href="#sidebarBaseui32" data-bs-toggle="collapse">
                                <i data-feather="package"></i>
                                <span>Pricing</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseui32">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='/admin/categories?type=pricing'>Categories</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='{{url('/admin/add-pricing')}}'>Create Pricing</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='{{url('admin/pricing-list')}}'>Pricing List</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li>
                            <a class='tp-link' href='{{url('admin/contact-list')}}'>
                                <i data-feather="columns"></i>
                                <span> Contact  </span>
                            </a>
                        </li>
                      
                        <li>
                            <a class='tp-link' href='{{url('admin/genral-setting')}}'>
                                <i data-feather="columns"></i>
                                <span>Genral Setting</span>
                            </a>
                        </li>

                        <li>
                            <a class='tp-link' href='{{url('admin/users')}}'>
                                <i data-feather="users"></i>
                                <span>All Users</span>
                            </a>
                        </li>
                      
                        <li>
                            <a class='tp-link' href='{{url('admin/kyc')}}'>
                                <i data-feather="users"></i>
                                <span>Users Kyc Request</span>
                            </a>
                        </li>


                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Left Sidebar End -->

        @yield('content')
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ url('admin') }}/assets/libs/jquery/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="{{ url('admin') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/feather-icons/feather.min.js"></script>

    <!-- Apexcharts JS -->
    <script src="{{ url('admin') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- for basic area chart -->
    <script src="../../../apexcharts.com/samples/{{ url('admin') }}/assets/stock-prices.js"></script>

    <!-- Widgets Init Js -->
    <script src="{{ url('admin') }}/assets/js/pages/crm-dashboard.init.js"></script>


    @yield('footer')
    <!-- App js-->
    <script src="{{ url('admin') }}/assets/js/app.js"></script>


</body>

</html>
