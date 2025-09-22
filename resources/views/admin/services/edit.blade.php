@extends('layout.admin')

@section('title', 'Edit Service')

@section('content')

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Service</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Service</li>
                    </ol>
                </div>
            </div>

            <!-- General Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Service Details</h5>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('services-update', $service->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- Category Selection -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Title</label>
                                            <input type="text" id="simpleinput" name="title"
                                                value="{{$service->title}}" class="form-control">
                                            @error('title')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Sub Title</label>
                                            <input type="text" id="simpleinput" name="description"
                                                value="{{$service->description}}" class="form-control">
                                            @error('description')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Select Category</label>
                                            <select name="category" class="form-select">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category', $service->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                            @error('category')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderrors
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">icon</label>
                                            <input type="file" accept="image/*" id="simpleinput" name="icon"
                                                value="{{ old('icon') }}" class="form-control">
                                            @error('icon')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                             <!-- Show current image -->
                                             @if($service->icon)
                                             <div class="mt-2">
                                                 <img src="{{ asset('Service-image/' . $service->icon) }}" alt="Image" style="width: 100px;">
                                             </div>
                                         @endif
                                        </div>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Post Image</label>
                                            <input type="file" accept="image/*" id="image" name="image" class="form-control">
                                            @error('image')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror

                                            <!-- Show current image -->
                                            @if($service->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('Service-image/' . $service->image) }}" alt="Image" style="width: 100px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Banner Image</label>
                                            <input type="file" accept="image/*" id="baner_img" name="baner_img" class="form-control">
                                            @error('baner_img')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror

                                            <!-- Show current baner_img -->
                                            @if($service->baner_img)
                                                <div class="mt-2">
                                                    <img src="{{ asset('Service-Banner-image/' . $service->baner_img) }}" alt="Image" style="width: 100px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <!-- Short Description -->
                                    {{-- <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Short Description</label>
                                            <textarea name="description" class="form-control" cols="30" rows="3">{{ old('description', $service->description) }}</textarea>
                                            @error('description')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <!-- Long Description (Summernote Editor) -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="long_description" class="form-label">Description</label>
                                            <textarea name="long_description" id="summernote" class="form-control" cols="30" rows="3">{{ old('long_description', $service->long_description) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <h4 class="bg-light p-3">Seo Details</h4>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Meta Title</label>
                                            <input type="text" id="simpleinput" name="meta_title"
                                                value="{{ old('meta_title' , $service->meta_title ) }}" class="form-control">
                                            @error('meta_title')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Meta Tags</label>
                                            <input type="text" id="simpleinput" name="meta_tags"
                                                value="{{ old('meta_tags' , $service->meta_tags ) }}" class="form-control">
                                            @error('meta_tags')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="l_desc" class="form-label">Meta Description</label>
                                            <textarea name="meta_description" class="form-control" cols="30" rows="3">{{ $service->meta_description  }}</textarea>
                                            @error('meta_description')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Status</label>
                                            <div class="d-flex">
                                                <!-- Active Option -->
                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input" 
                                                        type="radio" 
                                                        value="Y" 
                                                        name="status" 
                                                        id="gridRadios1" 
                                                        {{ old('status', $service->status) == 'Y' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Active
                                                    </label>
                                                </div>
                                    
                                                <!-- Inactive Option -->
                                                <div class="form-check ms-3">
                                                    <input 
                                                        class="form-check-input" 
                                                        type="radio" 
                                                        value="N" 
                                                        name="status" 
                                                        id="gridRadios2" 
                                                        {{ old('status', $service->status) == 'N' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Inactive
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    


                                    <!-- Submit Button -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Update Service</button>
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
</div> <!-- content-page -->

@section('header')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            fontSizes: ['8', '10', '12', '14', '16', '18', '20', '24', '28', '36', '48', '64', '82', '150'],
        });
    </script>
@endsection

@endsection
