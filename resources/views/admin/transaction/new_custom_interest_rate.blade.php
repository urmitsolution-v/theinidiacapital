@section('title', 'New Custom Interest Rate - Stock-Market')
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
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
                    <h4 class="fs-18 fw-semibold m-0">New Custom Interest Rate</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('custom.interest.rates') }}">Custom Interest Rates</a></li>
                        <li class="breadcrumb-item active">New Custom Interest Rate</li>
                    </ol>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Set Custom Interest Rate</h5>
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
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            <form method="post">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="user-select" class="form-label">Select User</label>
                                            <select name="user" id="user-select" class="form-control">
                                                <option value="">Select User</option>
                                                @foreach (App\Models\User::where('role', 'user')->where('status', 'approved')->latest()->get() as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="invest-select" class="form-label">Select Investment</label>
                                            <select name="invest" id="invest-select" class="form-control">
                                                <option value="">Select User First</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    
                                    {{-- <div class="col-lg-12">
                                        <div class="card bg-light p-3 mb-3">
                                            <h5>Investment Details</h5>
                                            <div class="row" id="investment-details">
                                                <div class="col-md-3">
                                                    <p><strong>Amount:</strong> <span id="investment-amount">-</span></p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p><strong>Current Interest Rate:</strong> <span id="current-interest-rate">-</span></p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p><strong>Package:</strong> <span id="package-name">-</span></p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p><strong>Investment Date:</strong> <span id="investment-date">-</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="mb-3">
                                            <label for="custom_interest_rate" class="form-label">Custom Interest Rate (%)</label>
                                            <input type="number" step="0.01" name="custom_interest_rate" id="custom_interest_rate" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="mb-3">
                                            <label for="effective_date" class="form-label">Effective Date</label>
                                            <input type="date" name="effective_date" id="effective_date" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">End Date (Optional)</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="notes" class="form-label">Notes</label>
                                            <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Save Custom Interest Rate</button>
                                        <a href="{{ route('custom.interest.rates') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('#user-select').select2({
                placeholder: "Search and select a user",
                allowClear: true
            });
            
            // Set today as the default effective date
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;
            $('#effective_date').val(today);
            
            // When user is selected, load their investments
            $('#user-select').on('change', function() {
                var userId = $(this).val();
                if (userId) {
                    // Clear investment details
                    $('#investment-amount').text('-');
                    $('#current-interest-rate').text('-');
                    $('#package-name').text('-');
                    $('#investment-date').text('-');
                    
                    // Fetch investments for this user
                    $.ajax({
                        url: '{{ route("get.investment.details") }}',
                        type: 'GET',
                        data: { user_id: userId },
                        success: function(response) {
                            if (response.success) {
                                $('#invest-select').html(response.options);
                            } else {
                                $('#invest-select').html('<option value="">No investments found</option>');
                            }
                        },
                        error: function() {
                            alert('Failed to load investments');
                            $('#invest-select').html('<option value="">Error loading investments</option>');
                        }
                    });
                } else {
                    $('#invest-select').html('<option value="">Select User First</option>');
                }
            });
            
            // When investment is selected, load its details
            $('#invest-select').on('change', function() {
                var investId = $(this).val();
                if (investId) {
                    $.ajax({
                        url: '{{ route("get.investment.details") }}',
                        type: 'GET',
                        data: { invest_id: investId },
                        success: function(response) {
                            if (response.success) {
                                $('#investment-amount').text('₹' + response.data.amount.toLocaleString());
                                $('#current-interest-rate').text(response.data.current_interest_rate + '%');
                                $('#package-name').text(response.data.package_name + ' - ' + response.data.package_benefit);
                                $('#investment-date').text(response.data.investment_date);
                                
                                // Set the current interest rate as the default custom rate
                                $('#custom_interest_rate').val(response.data.current_interest_rate);
                            }
                        },
                        error: function() {
                            alert('Failed to load investment details');
                        }
                    });
                } else {
                    // Clear investment details
                    $('#investment-amount').text('-');
                    $('#current-interest-rate').text('-');
                    $('#package-name').text('-');
                    $('#investment-date').text('-');
                }
            });
            
            // Validate end date is after effective date
            $('#end_date').on('change', function() {
                var effectiveDate = new Date($('#effective_date').val());
                var endDate = new Date($(this).val());
                
                if (endDate < effectiveDate) {
                    alert('End date must be after effective date');
                    $(this).val('');
                }
            });
            
            // Validate effective date change
            $('#effective_date').on('change', function() {
                var endDateInput = $('#end_date');
                if (endDateInput.val()) {
                    var effectiveDate = new Date($(this).val());
                    var endDate = new Date(endDateInput.val());
                    
                    if (endDate < effectiveDate) {
                        alert('End date must be after effective date');
                        endDateInput.val('');
                    }
                }
            });
        });
    </script>
@endsection

@endsection
