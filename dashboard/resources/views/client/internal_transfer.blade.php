@extends('client.layouts.app')
@section('content')
@error('message')
<script>
   Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: @json($message),
   });
</script>
@enderror
@if(session('success'))
<script>
   Swal.fire({
      icon: 'success',
      title: 'Success',
      text: @json(session('success')),
   });
</script>
@endif
<div class="card-body">
    <form action="{{ route('local_transfer_add') }}" method="POST" class="p-4 border rounded shadow-sm bg-white">
        @csrf
        <h5 class="mb-4 text-primary">Same Bank Transfer</h5>

        <div class="row">
            <!-- From Account -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label text-success" for="from_account">From Account</label>
                    <select class="form-control" id="from_account" name="from_account" required>
                        <option value="checking">Checking - {{ Auth::user()->account_number_checking }} - (${{ number_format(Auth::user()->accbalance_checking) }})</option>
                        <option value="savings">Savings - {{ Auth::user()->account_number_savings }} - (${{ number_format(Auth::user()->accbalance_savings) }})</option>
                    </select>
                </div>
            </div>

            <!-- To Account -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label text-success" for="to_account">To Account</label>
                    <input type="number" class="form-control" id="account" name="account" placeholder="Enter account" min="1" step="0.01" required>
                </div>
            </div>
        </div>

        <!-- Amount -->
        <div class="mb-3">
            <label class="form-label text-success" for="amount">Amount ($)</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" min="1" step="0.01" required>
        </div>

        <!-- Description / Notes -->
        <div class="mb-3">
            <label class="form-label text-success" for="description">Description / Notes</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Optional notes for the transfer"></textarea>
        </div>

        <!-- Transfer PIN -->
        <div class="mb-3">
            <label class="form-label text-success" for="amount">PIN</label>
            <input type="number" class="form-control" id="pin" name="pin" placeholder="Enter Transfer PIN"  required>
        </div>

        <!-- Submit Button -->
        <div class="text-end">
            <button type="submit" class="btn btn-success">Send Transfer</button>
        </div>
    </form>
</div>
@endsection