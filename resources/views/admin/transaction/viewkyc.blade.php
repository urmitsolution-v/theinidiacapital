<div class="table-responsive">
    <table class="table table-bordered">
        <tbody>



            <tr>
                <th class="table-dark">Bank Name</th>
                <td>{{ $row->bank_name ?? 'N/A' }}</td>
            </tr>
           
            <tr>
                <th class="table-dark">Account Holder Name</th>
                <td>{{ $row->account_holder_name ?? 'N/A' }}</td>
            </tr>
           
           
            <tr>
                <th class="table-dark">Username</th>
                <td>{{ $row->name ?? 'N/A' }}</td>
            </tr>

            <tr>
                <th class="table-dark">Account Number</th>
                <td>{{ $row->account_number ?? 'N/A' }}</td>
            </tr>


            <tr>
                <th class="table-dark">IFSC Code</th>
                <td>{{ $row->ifsc_code ?? 'N/A' }}</td>
            </tr>

            {{-- <tr>
                <th class="table-dark">Account Holder Name</th>
                <td>{{ $row->account_holder_name ?? 'N/A' }}</td>
            </tr> --}}
            <tr>
                <th class="table-dark">Branch Name</th>
                <td>{{ $row->branch_name ?? 'N/A' }}</td>
            </tr>
            <tr>
    <th class="table-dark">Aadhar Front</th>
    <td>
        @if(isset($row->aadhar_card))
            <a href="{{ url($row->aadhar_card) }}" target="_blank">
                <img src="{{ url($row->aadhar_card) }}" class="img-thumbnail" width="100px" height="80px">
            </a>
        @else
            N/A
        @endif
    </td>
</tr>
<tr>
    <th class="table-dark">Aadhar Back</th>
    <td>
        @if(isset($row->aadhar_card_back))
            <a href="{{ url($row->aadhar_card_back) }}" target="_blank">
                <img src="{{ url($row->aadhar_card_back) }}" class="img-thumbnail" width="100px" height="80px">
            </a>
        @else
            N/A
        @endif
    </td>
</tr>
<tr>
    <th class="table-dark">Bank Passbook</th>
    <td>
        @if(isset($row->cancel_chaque))
            <a href="{{ url($row->cancel_chaque) }}" target="_blank">
                <img src="{{ url($row->cancel_chaque) }}" class="img-thumbnail" width="100px" height="80px">
            </a>
        @else
            N/A
        @endif
    </td>
</tr>
<tr>
    <th class="table-dark">PAN Number</th>
    <td>{{ $row->pan_number ?? 'N/A' }}</td>
</tr>
<tr>
    <th class="table-dark">PAN Card</th>
    <td>
        @if(isset($row->pan_card))
            <a href="{{ url($row->pan_card) }}" target="_blank">
                <img src="{{ url($row->pan_card) }}" class="img-thumbnail" width="100px" height="80px">
            </a>
        @else
            N/A
        @endif
    </td>
</tr>



<tr>
    <th class="table-dark">Bank Passbook/ Cancel Chque photo</th>
    <td>
        @if(isset($row->bank_identity))
            <a href="{{ url($row->bank_identity) }}" target="_blank">
                <img src="{{ url($row->bank_identity) }}" class="img-thumbnail" width="100px" height="80px">
            </a>
        @else
            N/A
        @endif
    </td>
</tr>


         

        </tbody>
    </table>


    <h4>Update Status & Reason</h4>

    <form method="post" action="{{ url('admin/viewkyc/' . $row->id) }}">
        @csrf
        <div class="row p-0 w-100 m-auto">
            <div class="col-12">
                <select name="kyc_status" class="form-select w-100 mb-3">
                    <option value="apply" {{ $row->kyc_status == 'apply' ? 'selected' : '' }}>Pending</option>
                    <option value="reject" {{ $row->kyc_status == 'reject' ? 'selected' : '' }}>Reject</option>
                    <option value="complete" {{ $row->kyc_status == 'complete' ? 'selected' : '' }}>Complete</option>
                </select>
            </div>
            <div>
            <textarea name="kyc_reason" id="" placeholder="Reason" cols="30" rows="3" class="form-control  mb-3">{{ $row->kyc_reason }}</textarea>
        </div>
        <div class="col-12">
        <button type="submit" class="btn btn-primary">Save</button>

        </div>
        </div>
    </form>

</div>
