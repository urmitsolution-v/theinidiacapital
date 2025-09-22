@if($row->status == "pending")

<input type="hidden" value="{{ $row->id }}" name="transaction_id">

<label for="">Select Status</label>
<select name="status" id="status-select" class="form-select">
    <option value="pending" {{ $row->status == "pending" ? 'selected' : '' }}>Pending</option>
    <option value="reject" {{ $row->status == "reject" ? 'selected' : '' }}>Reject</option>
    <option value="complete" {{ $row->status == "complete" ? 'selected' : '' }}>Accept</option>
</select>

<!-- Hidden Input for Rejection Reason -->
<div id="rejection-reason-container" style="display: none; margin-top: 10px;">
    <label for="rejection_reason">Reason for Rejection</label>
    <input type="text" name="rejection_reason" id="rejection_reason" class="form-control" placeholder="Enter reason">
</div>

@else

<h3>Now cannot update</h3>

@endif

