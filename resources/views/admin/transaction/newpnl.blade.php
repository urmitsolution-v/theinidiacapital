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

        /* span.select2-dropdown.select2-dropdown--below {
    z-index: 111111111111111111111;
    position: relative;
} */

</style>


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
                    <h4 class="fs-18 fw-semibold m-0">New PNL</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">New PNL</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">New PNL</h5>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                            @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 20px;" role="alert">
                                {{ session()->get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif
                        <form method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Select User</label>
                                        <select name="user" id="user-select" class="form-control">
                                            <option value="">Select User</option>
                                            @foreach (App\Models\User::where('role', 'user')->where('status', 'approved')->latest()->get() as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div id="user-data" class="col-lg-6 row w-100 m-auto"></div>


                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Amount</label>
                                       <input type="number" name="amount" class="form-control" value="0">
                                    </div>
                                </div>


                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Profit Amount</label>
                                       <input type="number" name="profit_amount" class="form-control" value="0">
                                    </div>
                                </div>


                                <div class="col-sm-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Percantage</label>
                                       <input type="text" name="percantage" class="form-control" value="0">
                                    </div>
                                </div>



                            <div class="col-12">
                                <button class="btn btn-primary">Save</button>
                            </div>


                            </div>


                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('header')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection
   
@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


<script>
$(document).ready(function() {
    $('#user-select').on('change', function() {
        var userId = $(this).val(); // Get selected user ID
        console.log("Selected User ID:", userId); // Debugging

        if (userId) {
            $.ajax({
                url: `{!! route('getpurchaedpackages') !!}`, // Correct Laravel route syntax
                type: "GET",
                data: { user_id: userId },
                dataType: "json", // Expecting JSON response
                success: function(response) {
                    console.log("AJAX Success:", response);
                    $('#user-data').html(response.html); // Append the received HTML
                },
                error: function(xhr, status, error) {
                    console.log("AJAX Error:", xhr.responseText);
                }
            });
        } else {
            $('#user-data').html('');
        }
    });
});
</script>


    <script>
        $(document).ready(function() {
            $('#user-select').select2({
                placeholder: "Search and select a user",
                allowClear: true
            });
        });
    </script>
    
@endsection

@endsection
