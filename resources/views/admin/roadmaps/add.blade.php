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
                        <h4 class="fs-18 fw-semibold m-0">Roadmap</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Roadmap</li>
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
                                            <h5 class="btn btn-info px-4">RoadMaps First Step</h5>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Years</label>
                                                <input type="text" id="simpleinput" name="year"
                                                    value="{{$row->year}}" class="form-control">
                                                @error('year')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Title</label>
                                                <input type="text" id="simpleinput" name="title"
                                                    value="{{$row->title}}" class="form-control">
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Sub Title</label>
                                                <input type="text" id="simpleinput" name="sub_title"
                                                    value="{{$row->sub_title}}" class="form-control">
                                                @error('sub_title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <h5 class="btn btn-info px-3">RoadMaps Second Step</h5>
                                        </div>
                                      
                                       
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Years 2</label>
                                                <input type="text" id="simpleinput" name="year_2"
                                                    value="{{$row->year_2}}" class="form-control">
                                                @error('year_2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Title 2</label>
                                                <input type="text" id="simpleinput" name="title_2"
                                                    value="{{$row->title_2}}" class="form-control">
                                                @error('title_2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Sub Title 2</label>
                                                <input type="text" id="simpleinput" name="sub_title_2"
                                                    value="{{$row->sub_title_2}}" class="form-control">
                                                @error('sub_title_2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <h5 class="btn btn-info px-4">RoadMaps Third Step</h5>
                                        </div>
                                      
                                       
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Years 3</label>
                                                <input type="text" id="simpleinput" name="year_3"
                                                    value="{{$row->year_3}}" class="form-control">
                                                @error('year_3')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Title 3</label>
                                                <input type="text" id="simpleinput" name="title_3"
                                                    value="{{$row->title_3}}" class="form-control">
                                                @error('title_3')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Sub Title 3</label>
                                                <input type="text" id="simpleinput" name="sub_title_3"
                                                    value="{{$row->sub_title_3}}" class="form-control">
                                                @error('sub_title_3')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <h5 class="btn btn-info px-4">RoadMaps Fourth Step</h5>
                                        </div>
                                      
                                       
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Years 4</label>
                                                <input type="text" id="simpleinput" name="year_4"
                                                    value="{{$row->year_4}}" class="form-control">
                                                @error('year_4')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Title 4</label>
                                                <input type="text" id="simpleinput" name="title_4"
                                                    value="{{$row->title_4}}" class="form-control">
                                                @error('title_4')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Sub Title 4</label>
                                                <input type="text" id="simpleinput" name="sub_title_4"
                                                    value="{{$row->sub_title_4}}" class="form-control">
                                                @error('sub_title_4')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <h5 class="btn btn-info px-4">RoadMaps Fifth Step</h5>
                                        </div>
                                      
                                       
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Years 5</label>
                                                <input type="text" id="simpleinput" name="year_5"
                                                    value="{{$row->year_5}}" class="form-control">
                                                @error('year_5')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Title 5</label>
                                                <input type="text" id="simpleinput" name="title_5"
                                                    value="{{$row->title_5}}" class="form-control">
                                                @error('title_5')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Sub Title 5</label>
                                                <input type="text" id="simpleinput" name="sub_title_5"
                                                    value="{{$row->sub_title_5}}" class="form-control">
                                                @error('sub_title_5')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <h5 class="btn btn-info px-4">RoadMaps Six Step</h5>
                                        </div>
                                      
                                       
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Years 6</label>
                                                <input type="text" id="simpleinput" name="year_6"
                                                    value="{{$row->year_6}}" class="form-control">
                                                @error('year_6')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Title 6</label>
                                                <input type="text" id="simpleinput" name="title_6"
                                                    value="{{$row->title_6}}" class="form-control">
                                                @error('title_6')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Sub Title 6</label>
                                                <input type="text" id="simpleinput" name="sub_title_6"
                                                    value="{{$row->sub_title_6}}" class="form-control">
                                                @error('sub_title_6')
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
