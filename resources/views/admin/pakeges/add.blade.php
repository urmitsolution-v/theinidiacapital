@section('title', 'Dashboard - stock-Markect')
@extends('layout.admin')
@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Create Packages</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Packages</li>
                        </ol>
                    </div>
                </div>

                <!-- General Form -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-0">Packages Details</h5>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                       
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Select Category</label>
                                                <select class="form-select" name="category" id="example-select">
                                                    <?php
                                                    $categories = DB::table('category')
                                                        ->where('status', 'Y')->where('type', 'pricing')
                                                        ->get(['id', 'title']);
                                                    foreach ($categories as $key => $value) {
                                                    ?>
                                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                    <?php } ?>
                                                </select> @error('category')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Currency($,₹)</label>
                                                <select class="form-select" name="currency" id="example-select">
                                                    <option>select currency</option>
                                                    <option>₹</option>
                                                    <option>$</option>
                                                </select> @error('category')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Min Amount</label>
                                                <input type="text" id="simpleinput" name="ammount"
                                                    value="" class="form-control">
                                                @error('ammount')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                         <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Max Amount</label>
                                                <input type="text" id="simpleinput" name="max_amount"
                                                    value="" class="form-control">
                                                @error('ammount')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Format(year,month)</label>
                                                <select class="form-select" name="formate" id="example-select">
                                                    <option>select Format</option>
                                                    <option>Years</option>
                                                    <option>Months</option>
                                                    <option>Weeks</option>
                                                    <option>Days</option>
                                                </select> @error('category')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        



                                     

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="l_desc" class="form-label">Description</label>
                                                <textarea name="deac" id="summernote" class="form-control" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>


                                        
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Fix Interest(Per Month in %)</label>
                                               <input type="number" class="form-control" name="interest_rate">
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Clint Criteria</label>
                                               <input type="text" class="form-control" name="clint_criteria">
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Benefit</label>
                                               <input type="text" class="form-control" name="benefit">
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Business Account Type</label>
                                                <input type="text" class="form-control" name="ac_type">
                                                @error('type')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Status</label>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="Y" name="status"
                                                            type="radio" name="gridRadios" id="gridRadios1"
                                                            value="option1" checked="">
                                                        <label class="form-check-label" for="gridRadios1">
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input" value="N" name="status"
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

            @section('header')
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
            @endsection
            @section('footer')


                <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


                {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}

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
                        fontSizes: ['8', '10', '12', '14', '16', '18', '20', '24', '28', '36', '48', '64', '82',
                            '150'
                        ], // Custom font sizes
                    });
                </script>
            @endsection


        </div> <!-- container-fluid -->

    </div> <!-- content -->


</div>

@endsection
