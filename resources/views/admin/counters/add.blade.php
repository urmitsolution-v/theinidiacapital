@section('title', 'Dashboard - Stock-Markect')
@extends('layout.admin')
@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">counters</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">counters</li>
                    </ol>
                </div>
            </div>

            <!-- General Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">All Details</h5>
                        </div><!-- end card header -->

                        <div class="card-body bg-light ">
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-12">
                                        <h5>counters</h5>
                                    </div>

                                    <!-- Title Field -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Number 1</label>
                                            <input type="text" id="title" name="number1" value="<?=$row1233->number1 ?>" class="form-control">
                                            @error('number1')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Number 2</label>
                                            <input type="text" id="title" name="number2" value="<?=$row1233->number2 ?>" class="form-control">
                                            @error('number2')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Number 3</label>
                                            <input type="text" id="title" name="number3" value="<?=$row1233->number3 ?>" class="form-control">
                                            @error('number3')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Number 4</label>
                                            <input type="text" id="title" name="number4" value="<?=$row1233->number4 ?>" class="form-control">
                                            @error('number4')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                   

                                   
                                    <div class="col-12">
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
