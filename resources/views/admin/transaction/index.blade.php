@section('title', 'Dashboard - Tic')
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
                    <h4 class="fs-18 fw-semibold m-0">Transaction</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Transaction</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">@if (isset($_GET['type']) && !empty($_GET['type']))
                                @if ($_GET['type'] == 'pending')
                                    Deposit Request
                                    @elseif($_GET['type'] == 'reject')
                                    Rejected Requests
                                    @else 
                                    Accepted Requests
                                @endif
                            @endif</h5>
                        </div>

                        <div class="card-body">


                            <div class="">
                                <div class="filter-card bg-light p-3">
                                    <h4 class="text-center mb-3">Search Filter</h4>
                                    <form id="filterForm" class="row">
                                        <!-- Request No -->
                                        <div class="mb-3 col-6 col-sm-4 col-lg-4">
                                            <label for="requestNo" class="form-label">Request No.</label>
                                            <input type="text" class="form-control" id="requestNo" name="request_no" placeholder="Enter Request No.">
                                        </div>
                                      
                                        <div class="mb-3 col-6 col-sm-4 col-lg-4">
                                            <label for="username" class="form-label">UserName.</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username ">
                                        </div>

                                        {{-- <!-- Request Status -->
                                        <div class="mb-3 col-6 col-sm-4 col-lg-4">
                                            <label for="requestStatus" class="form-label">Select User</label>
                                            <select class="form-select" id="requestStatus" name="customer_id">
                                                <option value="">Select Status</option>
                                                <option value="pending">Pending</option>
                                                <option value="complete">Complete</option>
                                                <option value="reject">Rejected</option>
                                            </select>
                                        </div> --}}
                                        
                                        
                                        <div class="mb-3 col-6 col-sm-4 col-lg-4">
                                            <label for="requestStatus" class="form-label">Request Status</label>
                                            <select class="form-select" id="requestStatus" name="status">
                                                <option value="">Select Status</option>
                                                <option value="pending">Pending</option>
                                                <option value="complete">Complete</option>
                                                <option value="reject">Rejected</option>
                                            </select>
                                        </div>
                            
                                        <!-- Request Date / Verified Date -->
                                        <div class="mb-3 col-sm-3 col-md-3">
                                            <label class="form-label">Filter By</label>
                                            <div class="d-flex">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio" name="dateFilter" id="requestDate" value="request" checked>
                                                    <label class="form-check-label" for="requestDate">Request Date</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="dateFilter" id="verifiedDate" value="verified">
                                                    <label class="form-check-label" for="verifiedDate">Verified Date</label>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Date Range -->
                                        <div class="mb-3 col-sm-4 col-md-5">
                                            <label class="form-label" id="dateLabel">Request Date Range</label>
                                            <div class="row">
                                                <div class="col">
                                                    <label>From</label>
                                                    <input type="date" class="form-control" id="fromDate" name="from_date">
                                                </div>
                                                <div class="col">
                                                    <label>To</label>
                                                    <input type="date" class="form-control" id="toDate" name="to_date">
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Submit Buttons -->
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">Search</button>
                                            <button type="reset" class="btn btn-danger" id="resetFilter">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <table id="example"
                                class="table table-striped dt-responsive nowrap table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Request Id</th>
                                        <th>User Name</th>
                                        <th>Amount</th>
                                        <th>Utr / Transaction Id</th>
                                        <th>Screenshot</th>
                                        <th>Created At</th>
                                        <th>Verified At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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


    <script>
        $(document).ready(function() {
            function loadDataTable() {
                $('#example').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,  // Destroy previous instance before reloading
                    ajax: {
                        url: "{{ route('transactions') }}",  // Laravel Route
                        data: function(d) {
                            d.request_no = $('#requestNo').val();
                            d.status = $('#requestStatus').val();
                            d.username = $('#username').val();
                            d.date_filter = $("input[name='dateFilter']:checked").val();
                            d.from_date = $('#fromDate').val();
                            d.to_date = $('#toDate').val();
                        }
                    },
                    order: [], // Disable default ordering
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'id', name: 'id' },
                        { data: 'customer_id', name: 'customer_id', orderable: false, searchable: true },

                        { data: 'amount', name: 'amount' },
                        { data: 'utr', name: 'utr' },
                        { data: 'screenshot', name: 'screenshot', orderable: false, searchable: false },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'updated_at', name: 'updated_at' },
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            }
    
            // Load DataTable initially
            loadDataTable();
    
            // Submit Search Form
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                loadDataTable();
            });
    
            // Reset Filter
            $('#resetFilter').on('click', function() {
                $('#filterForm')[0].reset();
                loadDataTable();
            });
    
            // Change label dynamically
            $("input[name='dateFilter']").change(function(){
                let selected = $("input[name='dateFilter']:checked").val();
                $("#dateLabel").text(selected === "request" ? "Request Date Range" : "Verified Date Range");
            });
        });
    </script>


    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="updateForm" action="/admin/updatetransaction" method="post">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Deposit Status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="bodycontent">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="saveBtn" class="btn btn-primary">
  Save changes
</button>
        </div>
      </div>
    </form>
    </div>
  </div>





<script>
document.getElementById('updateForm').addEventListener('submit', function() {
    let btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerText = "Saving..."; // optional: text बदलने के लिए
});
</script>

  <script>
   function openmodel(modelid) {
    console.log(modelid);
    $.ajax({
        url: '/admin/gettransaction/' + modelid, // Update with your Laravel route
        method: 'get',
        success: function(response) {
            // Update the modal body content with the response
            $('#bodycontent').html(response);  // Correct syntax
            // $('#myModal').modal('show');  // Open the modal (you may need to adjust based on your modal structure)
        },
        error: function(xhr) {
            // Handle error response
            var errors = xhr.responseJSON.errors;
            if (errors) {
                $.each(errors, function(key, value) {
                    alert(value[0]); // Show validation error
                });
            }
        }
    });
}

  </script>
<script>
$(document).ready(function () {
    // Status dropdown change handler
    $(document).on('change', '#status-select', function () {
        const selected = $(this).val();
        if (selected === 'reject') {
            $('#rejection-reason-container').slideDown();
        } else {
            $('#rejection-reason-container').slideUp();
        }
    });

    
});
</script>


@endsection

@endsection
