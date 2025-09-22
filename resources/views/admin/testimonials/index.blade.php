@section('title', 'Dashboard - Stock-Markect')
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
<link href="{{ url('admin') }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
    rel="stylesheet" type="text/css" />
<link href="{{ url('admin') }}/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
@endsection

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            @if (session()->has('success'))
            <div class="alert alert-primary alert-dismissible fade show" style="margin-top: 20px;" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif



            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">


                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">testimonials</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">testimonials</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Data List</h5>
                            <a class="btn btn-primary" href="/admin/create-testimonials" role="button">Add</a>
                        </div>

                        <div class="card-body">
                            <table id="fixed-header-datatable"
                                class="table table-striped dt-responsive nowrap table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>S/o</th>
                                        <th>Name </th>
                                        <th>title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->destination}}</td>
                                        <td>
                                            <img src="{{ asset('uploads/' . $item->image) }}" class="dynamic_image" loading="lazy" alt="" width="30%" height="50px">
                                        </td>
                                        
                                      
                                        <td>
                                            <?php if ($item->status == "Y") { ?>
                                                <span
                                                    class="badge text-bg-primary"><?= $item->status == 'Y' ? 'Active' : 'Inactive' ?></span>
                                            <?php } else { ?>

                                                <span
                                                    class="badge text-bg-danger"><?= $item->status == 'Y' ? 'Active' : 'Inactive' ?></span>

                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (isset($item->image)) {
                                                $image = $item->image;
                                            } else {
                                                $image = 'no_image';
                                            } ?>

                                            <a onclick="return confirm('Are you sure !')"
                                                href="{{ route('deletetestimonials', ['table' => 'banners', 'id' => $item->id, 'image' => $image]) }}"
                                                class="text-danger">
                                                <svg width="20" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <a href="/admin/edit-testimonials/{{ $item->id }}" class="text-primary">
                                                <svg width="20" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89H6.41421L15.7279 9.57627ZM17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785L17.1421 8.16206ZM7.24264 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L7.24264 20.89Z">
                                                    </path>
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
        <!-- container-fluid -->

    </div>
    <!-- content -->



</div>

@section('footer')


<!-- Datatables js -->
<script src="{{ url('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

<!-- dataTables.bootstrap5 -->
<script src="{{ url('admin') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

<!-- buttons.colVis -->
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

<!-- buttons.bootstrap5 -->
<script src="{{ url('admin') }}/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>

<!-- dataTables.keyTable -->
<script src="{{ url('admin') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js"></script>

<!-- dataTable.responsive -->
<script src="{{ url('admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

<!-- dataTables.select -->
<script src="{{ url('admin') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{ url('admin') }}/assets/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js"></script>

<!-- Datatable Demo App Js -->
<script src="{{ url('admin') }}/assets/js/pages/datatable.init.js"></script>

@endsection

@endsection