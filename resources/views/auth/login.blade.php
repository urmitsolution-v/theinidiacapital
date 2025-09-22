<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8" />
    <title>Admin -login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('uploads/'.favicon() )}}">

    <!-- App css -->
    <link href="{{ url('admin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ url('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary-subtle">
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center justify-content-center">

                <div class="col-xl-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8 mx-auto">
                            <div class="card p-3 mb-0">
                                <div class="card-body">

                                    <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                        <div class="mb-4 p-0 text-center">
                                            <a class='auth-logo' href='/'>
                                                <img src="{{ asset('uploads/'.weblogo() )}}" alt="logo-dark" class="mx-auto"
                                                    style="    width: 124px;
    height: 100px;
    object-fit: contain;" />
                                            </a>
                                        </div>

                                        <div class="auth-title-section mb-3 text-center">
                                            <h3 class="text-dark fs-20 fw-medium mb-2">Welcome back</h3>
                                            <p class="text-dark text-capitalize fs-14 mb-0">Sign in to continue to Tic</p>
                                        </div>



                                        <div class="pt-0">

                                            @if ($errors->any())
                                                <div class="text-danger">
                                                    <ul class="list-unstyled">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                            @if (session()->has('error'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('error') }}
                                                </div>
                                            @endif

                                            @if (session()->has('success'))
                                                <div class="alert alert-primary">
                                                    {{ session()->get('success') }}
                                                </div>
                                            @endif


                                            <form class="my-4" action="/admin-login" method="post">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="emailaddress" class="form-label">Email address Or Login Id</label>
                                                    <input class="form-control" name="email" type="text"
                                                        id="emailaddress" required="" placeholder="Enter your email">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input class="form-control" name="password" type="password"
                                                        required="" id="password" placeholder="Enter your password">
                                                </div>

                                                <div class="form-group d-flex mb-3">
                                                    <div class="col-sm-12 text-end">
                                                        <a class='text-muted fs-14' href='/forgot-password'>Forgot
                                                            password?</a>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button onclick="this.innerHTML = 'Trying to Login...'"
                                                                class="btn btn-primary" type="submit"> Log In </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--<div class="col-xl-7">-->
                <!--    <div class="account-page-bg p-md-5 p-4">-->
                <!--        <div class="text-center">-->
                <!--            <div class="auth-image">-->
                <!--                <img src="{{ url('admin') }}/assets/images/auth-images.svg" class="mx-auto img-fluid"-->
                <!--                    alt="images">-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

            </div>
        </div>
    </div>

    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ url('admin') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js-->
    <script src="{{ url('admin') }}/assets/js/app.js"></script>

</body>

<!-- Mirrored from zoyothemes.com/silva/html/auth-login by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Oct 2024 12:17:16 GMT -->

</html>
