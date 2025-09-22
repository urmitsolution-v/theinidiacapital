@if($row->status == "pending")
    <input type="hidden" name="transaction_id" value="{{ $row->id }}">

    <label for="statusSelector">Select Status</label>
    <select name="status" id="statusSelector" class="form-select">
        <option value="pending" {{ $row->status == "pending" ? "selected" : "" }}>Pending</option>
        <option value="reject" {{ $row->status == "reject" ? "selected" : "" }}>Reject</option>
        <option value="complete" {{ $row->status == "complete" ? "selected" : "" }}>Accept</option>
    </select>

    <div id="utrInput" style="display: none;" class="mt-3">
        <label for="utr">Payment UTR</label>
        <input type="text" name="utr" id="utr" class="form-control" placeholder="Enter UTR">
    </div>

    <div id="remarkInput" style="display: none;" class="mt-3">
        <label for="remark">Remark</label>
        <textarea name="remark" id="remark" class="form-control" rows="3" placeholder="Enter Remark or Reason"></textarea>
    </div>
@else
    <h3>Now can not update</h3>
@endif
