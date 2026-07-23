@extends('client.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Request Payment</h5>
        </div>
        <div class="card-body">
            <form action="#" method="POST" class="p-4 border rounded shadow-sm bg-white">
                @csrf
                <h5 class="mb-4 text-primary">Request Payment</h5>

                <div class="row">
                    <!-- Request From (Recipient) -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-success" for="recipient_name">Request From</label>
                            <input type="text" class="form-control" id="amount" name="email" placeholder="Enter email" required>
                        </div>
                    </div>

                    <!-- Amount -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-success" for="amount">Amount ($)</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" min="1" step="0.01" required>
                        </div>
                    </div>
                </div>

                <!-- Reason / Notes -->
                <div class="mb-3">
                    <label class="form-label text-success" for="notes">Reason / Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Optional notes for the request"></textarea>
                </div>

                <!-- Due Date -->
                <div class="mb-3">
                    <label class="form-label text-success" for="due_date">Due Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" required>
                </div>

                <!-- Submit Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Send Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection