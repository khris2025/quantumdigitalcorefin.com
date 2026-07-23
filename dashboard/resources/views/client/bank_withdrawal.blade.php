@extends('client.layouts.app')
@section('content')
<div class="card-body">
    <form action="#" method="POST" class="p-4 border rounded bg-light">
        @csrf
        <h5 class="mb-4 text-primary">External Bank Withdrawal</h5>

        <!-- Choose Account -->
        <div class="mb-3">
            <label class="form-label text-success" for="from_account">From Account</label>
            <select class="form-control" id="from_account" name="from_account" required>
                <option value="checking">Checking </option>
                <option value="savings">Savings </option>
            </select>
        </div>

        <!-- Bank Name -->
        <div class="mb-3">
            <label class="form-label text-success" for="bank_name">Bank Name</label>
            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name" required>
        </div>

        <!-- Account Number -->
        <div class="mb-3">
            <label class="form-label text-success" for="account_number">Bank Account Number</label>
            <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Enter Account Number" required>
        </div>

        <!-- Amount -->
        <div class="mb-3">
            <label class="form-label text-success" for="amount">Amount</label>
            <input type="number" step="0.01" min="1" class="form-control" id="amount" name="amount" placeholder="Enter Amount to Withdraw" required>
        </div>

        <!-- Transfer PIN -->
        <div class="mb-3">
            <label class="form-label text-success" for="amount">PIN</label>
            <input type="number"  min="1" class="form-control" id="pin" name="pin" placeholder="Enter PIN to Withdraw" required>
        </div>

        

        <!-- Notes -->
        <div class="mb-3">
            <label class="form-label text-success" for="notes">Notes (Optional)</label>
            <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Add any note about this withdrawal"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Withdrawal</button>
    </form>
</div>
@endsection