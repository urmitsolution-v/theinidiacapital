@section('title', 'Dashboard - Stock-Markect')
@extends('layout.admin')
@section('content')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">About</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">About</li>
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


    @if(session()->has('success'))
            <div class="alert alert-primary alert-dismissible fade show" style="margin-top: 20px;" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif



                                    <div class="row">
                                        <div class="col-12">
                                            <h5>About us</h5>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Title</label>
                                                <input type="text" id="simpleinput" name="title"
                                                    value="{{$row->title}}" class="form-control">
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Sub Title</label>
                                                <input type="text" id="simpleinput" name="sub_title"
                                                    value="{{$row->sub_title}}" class="form-control">
                                                @error('sub_title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Link</label>
                                                <input type="text" id="simpleinput" name="link"
                                                    value="{{$row->link}}" class="form-control">
                                                @error('link')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Image</label>
                                                <input type="file" id="simpleinput" name="image"
                                                    value="" class="form-control">
                                                    @if($data->image)
                                                    <div class="mt-2">
                                                   
                                                        <img src="{{ asset('uploads/'.$data->image) }}" alt="Current Image" style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                                    </div>
                                                @endif
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Description </label>
                                                <textarea name="desc" id="summernote" class="form-control" cols="30" rows="5">{{$row->desc}}</textarea>
                                                @error('desc ')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                

                                     

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Banner</label>
                                                <input type="file" id="simpleinput" name="banner"
                                                    value="" class="form-control">
                                                  
                                                @error('banner')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                @if($data->banner)
                                                <div class="mt-2">
                                                    <img src="{{ asset('uploads/'.$data->banner) }}" alt="Current Image" style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                                </div>
                                            @endif
                                            </div>
                                        </div>

                                        
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Our mission</label>
                                                <textarea name="Our_mission" id="summernote" class="form-control" cols="30" rows="5">{{$row->Our_mission}}</textarea>
                                                @error('Our_mission')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">our vision</label>
                                                <textarea name="our_vision" id="summernote" class="form-control" cols="30" rows="5">{{$row->our_vision}}</textarea>
                                                @error('our_vision')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">our value</label>
                                                <textarea name="core_value" id="summernote" class="form-control" cols="30" rows="5">{{$row->core_value}}</textarea>
                                                @error('core_value')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                                                                
                                        <div class="col-12">
                                            <h5 class="bg-dark text-white py-3 px-3">About  Seo</h5>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Meta Title</label>
                                                <input type="text" id="simpleinput" name="meta_title"
                                                    value="{{$row->meta_title}}" class="form-control">
                                                @error('meta_title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Meta Tags</label>
                                                <input type="text" id="simpleinput" name="meta_tags"
                                                    value="{{$row->meta_tags}}" class="form-control">
                                                @error('meta_tags')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Meta Description</label>
                                                <textarea class="form-control" id="example-textarea" name="meta_description" rows="5" spellcheck="false">{{$row->meta_description}}</textarea>

                                                @error('meta_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
    <script>
        $('#summernote').summernote({
          placeholder: 'Hello stand alone ui',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
      </script>
@endsection
