@section('title', 'Dashboard - Yug Parivartan Samiti')
@extends('layout.admin')
@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Working</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Working</li>
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
                                        <h5>Working Us</h5>
                                    </div>

                                    <!-- Title Field -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" id="title" name="title" value="{{ old('title', $row12->title ?? '') }}" class="form-control">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Subtitle Field -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="subtitle" class="form-label">Subtitle</label>
                                            <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $row12->subtitle ?? '') }}" class="form-control">
                                            @error('subtitle')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Description Field -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="desc" class="form-label">Description</label>
                                            <textarea name="desc" class="form-control" id="desc" cols="30" rows="5">{{ old('desc', $row12->desc ?? '') }}</textarea>
                                            @error('desc')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Image Field -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" id="image" name="image" class="form-control">
                                            
                                            @if($work_data && $work_data->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('uploads/'.$work_data->image) }}" alt="Current Image" style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                                </div>
                                            @endif
                                            
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <h5>Home Box</h5>
                                    </div>

                                    <!-- Home Box Title -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title1" class="form-label">Title</label>
                                            <input type="text" id="title1" name="title1" value="{{ old('title1', $row12->title1 ?? '') }}" class="form-control">
                                            @error('title1')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Home Box Description -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="desc1" class="form-label">Description</label>
                                            <input type="text" id="desc1" name="desc1" value="{{ old('desc1', $row12->desc1 ?? '') }}" class="form-control">
                                            @error('desc1')
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
