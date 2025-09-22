@section('title', 'Dashboard - Create Access')
@extends('layout.admin')
@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Create Access</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Access</li>
                        </ol>
                    </div>
                </div>

                <!-- General Form -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-0">Fill User Details</h5>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Full Name</label>
                                                <input type="text" id="simpleinput" name="name"
                                                    value="{{ old('name') }}" placeholder="Full Name" required class="form-control">
                                                @error('name')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Mobile Number</label>
                                                <input type="text" id="simpleinput" name="phone"
                                                    value="{{ old('phone') }}" placeholder="Mobile Number"  class="form-control">
                                                @error('phone')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Email Address</label>
                                                <input type="text" id="simpleinput" name="email"
                                                    value="{{ old('email') }}" placeholder="Email Address" required class="form-control">
                                                @error('email')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div> --}}


                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Password</label>
                                                <input type="password" id="simpleinput" name="password"
                                                    value="{{ old('password') }}" placeholder="Password" required class="form-control">
                                                @error('password')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Access Type</label>
                                                <select class="form-select" name="role_type" id="example-select">
                                                    <option value="receptionist">Sales</option>
                                                    <option value="billing">Billing Counter</option>
                                                    <option value="cutting_master">Cutting Master</option>
                                                    <option value="workshop">Workshop</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                                @error('role_type')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Status</label>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="N" name="status"
                                                            type="radio" name="gridRadios" id="gridRadios1"
                                                            value="option1" checked="">
                                                        <label class="form-check-label" for="gridRadios1">
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input" value="Y" name="status"
                                                            type="radio" name="gridRadios" id="gridRadios2"
                                                            value="option2">
                                                        <label class="form-check-label" for="gridRadios2">
                                                            Inactive
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

        </div> <!-- container-fluid -->

    </div> <!-- content -->


</div>

@endsection
