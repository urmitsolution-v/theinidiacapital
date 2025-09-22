@section('title', 'Profile - Stock-Markect')
@extends('layout.admin')
@section('content')


    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Profile</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <img src="assets/images/small/user-image.jpg" class="rounded-top-2 img-fluid" alt="image data">

                            <div class="card-body">
                                <div class="align-items-center">

                                    <div class="silva-main-sections">
                                        <div class="silva-profile-main">
                                            <img src="assets/images/users/user-11.jpg"
                                                class="rounded-circle img-fluid avatar-xxl img-thumbnail float-start"
                                                alt="image profile">

                                            <span class="sil-profile_main-pic-change img-thumbnail">
                                                <i class="mdi mdi-camera text-white"></i>
                                            </span>
                                        </div>

                                        <div class="overflow-hidden ms-md-4 ms-0">
                                            <h4 class="m-0 text-dark fs-20 mt-2 mt-md-0">John Smith</h4>
                                            <p class="my-1 text-muted fs-16">Passionate Software Engineer Crafting
                                                Innovative Solutions</p>
                                            <span class="fs-15"><i class="mdi mdi-message me-2 align-middle"></i>Speaks:
                                                <span>English <span
                                                        class="badge bg-primary-subtle text-primary px-2 py-1 fs-13 fw-normal">native</span>
                                                    , Canada, Alberta </span></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="text-danger">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                @if (session()->has('success'))
                                    <div class="alert alert-primary">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif


                                <div class="row">

                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="card border">

                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h4 class="card-title mb-0">Personal Information</h4>
                                                        </div><!--end col-->
                                                    </div>
                                                </div>





                                                <form action="{{ route('updateprofileadmin') }}" method="post">
                                                    @csrf
                                                    <div class="card-body">








                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Name</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" placeholder="Name"
                                                                    type="text" value="{{ Auth::user()->name }}"
                                                                    name="name">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Phone</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="mdi mdi-phone-outline"></i></span>
                                                                    <input class="form-control "
                                                                        value="{{ Auth::user()->phone }}" type="text"
                                                                        placeholder="Phone" name="phone"
                                                                        aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Email Address</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                            class="mdi mdi-email"></i></span>
                                                                    <input type="text" name="email"
                                                                        class="form-control"
                                                                        value="{{ Auth::user()->email }}"
                                                                        placeholder="Email" aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Destination</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="input-group">
                                                                    <input type="text" name="destination"
                                                                        value="{{ Auth::user()->destination }}"
                                                                        class="form-control" placeholder="destination"
                                                                        aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary mb-2 mb-md-0">Save
                                                        </button>


                                                    </div><!--end card-body-->
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xl-6">
                                            <form action="/admin/change-password" method="post">
                                                @csrf
                                                <div class="card border mb-0">

                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h4 class="card-title mb-0">Change Password</h4>
                                                            </div><!--end col-->
                                                        </div>
                                                    </div>

                                                    <div class="card-body mb-0">
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Currunt Password</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" name="currunt_password"
                                                                    type="password" placeholder="Currunt Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">New Password</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" name="new_password"
                                                                    type="password" placeholder="New Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Confirm Password</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control"
                                                                    name="new_password_confirmation" type="password"
                                                                    placeholder="Confirm Password">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <button type="submit"
                                                                    class="btn btn-primary mb-2 mb-md-0">Change
                                                                    Password</button>
                                                                <button type="button"
                                                                    class="btn btn-danger">Cancel</button>
                                                            </div>
                                                        </div>

                                                    </div><!--end card-body-->
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- content -->



    </div>


@endsection
