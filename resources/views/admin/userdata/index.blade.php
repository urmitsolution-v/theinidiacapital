@section('title', 'Dashboard - Stock-Market')
@extends('layout.admin')
@section('content')

<style>
    .dyanamic_image {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        object-fit: cover;
    }
</style>

@section('header')
<!-- Datatables css -->
<link href="{{ url('admin') }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            @if (session()->has('success'))
            <div class="alert alert-primary alert-dismissible fade show" style="margin-top: 20px;" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Users</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-success shadow-lg">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Approved</h5>
                            <h3><?php echo DB::table('users')->where('status','approved')->count(); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning shadow-lg">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Pending</h5>
                            <h3><?php echo DB::table('users')->where('status','pending')->count(); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger shadow-lg">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Holding / Rejected</h5>
                            <h3><?php echo DB::table('users')->where('status','rejected')->count(); ?></h3>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="fixed-header-datatable" class="table table-striped dt-responsive nowrap table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>S/o</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Referral Id</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <a href="/admin/viewuser/{{ $item->id }}">{{ $item->name }}</a>
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <form action="{{ route('updateStatus', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                    <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>pending</option>
                                                    <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>approved</option>
                                                    <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>rejected</option>
                                                </select>
                                                <input type="text" name="reason" class="form-control" placeholder="Reason" value="{{ $item->reason ?? "" }}">
                                            </form>
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <?php
                                            if (isset($item->image)) {
                                                $image = $item->image;
                                            } else {
                                                $image = 'no_image';
                                            } ?>

                                            <a onclick="return confirm('Are you sure !')" href="{{ route('deleterownew', ['table' => 'users', 'id' => $item->id, 'image' => $image]) }}" class="text-danger">
                                                <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('footer')
<script src="{{ url('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('admin') }}/assets/js/pages/datatable.init.js"></script>
@endsection
@endsection
