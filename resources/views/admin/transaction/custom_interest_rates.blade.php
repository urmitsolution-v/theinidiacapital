@section('title', 'Custom Interest Rates - Stock-Market')
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
    <link href="{{ url('admin') }}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-primary alert-dismissible fade show" style="margin-top: 20px;" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Custom Interest Rates</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Custom Interest Rates</li>
                    </ol>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Custom Interest Rates</h5>
                        </div>

                        <div class="card-body">
                            <div class="">
                                <div class="filter-card bg-light p-3">
                                    <h4 class="text-center mb-3">Search Filter</h4>
                                    <form id="filterForm" class="row">
                                        <div class="mb-3 col-sm-4">
                                            <label for="userId" class="form-label">User</label>
                                            <select class="form-control select2" id="userId" name="user_id">
                                                <option value="">All Users</option>
                                                @foreach (App\Models\User::where('role', 'user')->where('status', 'approved')->get() as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3 col-sm-4">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="">All Status</option>
                                                <option value="active">Active</option>
                                                <option value="expired">Expired</option>
                                                <option value="cancelled">Cancelled</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3 col-sm-4">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="form-label">From</label>
                                                    <input type="date" class="form-control" id="fromDate" name="from_date">
                                                </div>
                                                <div class="col">
                                                    <label class="form-label">To</label>
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
                            
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('new.custom.interest.rate') }}" class="btn btn-primary my-3">Add New Custom Interest Rate</a>
                            </div>
                            
                            <div class="d-flex align-items-center mb-4">
                                                                <p class="mb-0">Total Records: {{ $totalRecords }}</p>
                                <p class="mb-0 ms-3">Active Records: {{ $activeRecords }}</p>
                            </div>
                            
                            <table id="custom-rates-table" class="table table-striped dt-responsive nowrap table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Order Number</th>
                                        <th>User</th>
                                        {{-- <th>Package Details</th> --}}
                                        {{-- <th>Investment Amount</th> --}}
                                        {{-- <th>Original Rate</th> --}}
                                        <th>Percantage</th>
                                        <th>Date</th>
                                        {{-- <th>End Date</th> --}}
                                        {{-- <th>Status</th> --}}
                                        {{-- <th>Action</th> --}}
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

<!-- Edit Modal -->
<div class="modal fade" id="editRateModal" tabindex="-1" aria-labelledby="editRateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editRateForm" method="post">
                @csrf
                <input type="hidden" name="rate_id" id="edit_rate_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRateModalLabel">Edit Custom Interest Rate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_custom_rate" class="form-label">Custom Interest Rate (%)</label>
                        <input type="number" step="0.01" class="form-control" id="edit_custom_rate" name="custom_interest_rate" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="edit_end_date" name="end_date">
                    </div>
                    <div class="mb-3">
                        <label for="edit_notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="edit_notes" name="notes" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('footer')
    <!-- Datatables js -->
    <script src="{{ url('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            var table = $('#custom-rates-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("custom.interest.rates") }}',
                    data: function(d) {
                        d.user_id = $('#userId').val();
                        d.status = $('#status').val();
                        d.from_date = $('#fromDate').val();
                        d.to_date = $('#toDate').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'id', name: 'id' },
                    { data: 'user_name', name: 'user_name' },
                    // { data: 'investment_amount', name: 'investment_amount' },
                    // { data: 'original_interest_rate', name: 'original_interest_rate' },
                    { data: 'custom_interest_rate', name: 'custom_interest_rate' },
                    { data: 'effective_date', name: 'effective_date' },
                    // { data: 'end_date', name: 'end_date' },
                    // { data: 'status', name: 'status' },
                    // { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
            
            // Filter Form Submission
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                table.ajax.reload();
            });
            
            // Reset Filter Form
            $('#resetFilter').on('click', function() {
                $('#filterForm')[0].reset();
                table.ajax.reload();
            });
        });
        
        function editRate(id) {
            // Fetch rate details and populate the form
            $.ajax({
                url: '/admin/get-custom-rate/' + id,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        $('#edit_rate_id').val(id);
                        $('#edit_custom_rate').val(response.data.custom_interest_rate);
                        $('#edit_end_date').val(response.data.end_date);
                        $('#edit_notes').val(response.data.notes);
                        $('#editRateModal').modal('show');
                    } else {
                        alert('Failed to load rate details');
                    }
                },
                error: function() {
                    alert('An error occurred while fetching rate details');
                }
            });
        }
        
        function cancelRate(id) {
            if (confirm('Are you sure you want to cancel this custom interest rate?')) {
                $.ajax({
                    url: '/admin/cancel-custom-interest-rate/' + id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            $('#custom-rates-table').DataTable().ajax.reload();
                        } else {
                            alert('Failed to cancel rate');
                        }
                    },
                    error: function() {
                        alert('An error occurred');
                    }
                });
            }
        }
        
        // Handle edit form submission
        $('#editRateForm').on('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '/admin/update-custom-interest-rate',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#editRateModal').modal('hide');
                        alert(response.message);
                        $('#custom-rates-table').DataTable().ajax.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    
                    for (var key in errors) {
                        errorMessage += errors[key][0] + '\n';
                    }
                    
                    alert(errorMessage);
                }
            });
        });
    </script>
@endsection

@endsection
