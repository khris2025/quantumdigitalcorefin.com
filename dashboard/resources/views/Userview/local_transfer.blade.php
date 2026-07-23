@extends('Userview.layouts.app')
@section('content')

<!-- Display Error Message -->
@error('message')
<script>
   Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: @json($message),
   });
</script>
@enderror

<!-- Display Success Message -->
@if(session('success'))
<script>
   Swal.fire({
      icon: 'success',
      title: 'Success',
      text: @json(session('success')),
   });
</script>
@endif

<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Local Wire Transfer</h4>
         </div>
         
         <!-- Wire Transfer Form -->
         <form action="{{ route('local_transfer_add') }}" method="POST">
            @csrf <!-- Laravel CSRF protection token -->

            <!-- Sender Information (Pre-filled from user account) -->
            {{-- <div class="mb-3">
               <label for="sender-name" class="form-label">Sender Name</label>
               <input type="text" class="form-control" id="sender-name" name="sender_name" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div class="mb-3">
               <label for="account-number" class="form-label">Account Number</label>
               <input type="text" class="form-control" id="account-number" name="account_number" value="{{ Auth::user()->account_number }}" readonly>
            </div> --}}

            <!-- Recipient Information -->
            <div class="mb-3">
               <label for="recipient-name" class="form-label">Recipient Name</label>
               <input type="text" class="form-control" id="recipient-name" name="recipient_name" placeholder="Enter recipient's full name" required>
            </div>
            <div class="mb-3">
               <label for="recipient-account-number" class="form-label">Recipient Account Number</label>
               <input type="text" class="form-control" id="recipient-account-number" name="recipient_account_number" placeholder="Enter recipient's account number" required>
            </div>
            <div class="mb-3">
               <label for="recipient-bank-name" class="form-label">Recipient Bank Name</label>
               <input type="text" class="form-control" id="recipient-bank-name" name="recipient_bank_name" placeholder="Enter recipient's bank name" required>
            </div>
            <div class="mb-3">
               <label for="recipient-routing-number" class="form-label">Routing Number</label>
               <input type="text" class="form-control" id="recipient-routing-number" name="recipient_routing_number" placeholder="Enter routing number" required>
            </div>

            <!-- Transfer Details -->
            <div class="mb-3">
               <label for="amount" class="form-label">Transfer Amount</label>
               <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
            </div>
            {{-- <div class="mb-3">
               <label for="currency" class="form-label">Currency</label>
               <select class="form-select" id="currency" name="currency" required>
                  <option value="USD">USD - US Dollars</option>
                  <option value="EUR">EUR - Euro</option>
                  <option value="GBP">GBP - British Pound</option>
                  <!-- Add local currencies if needed -->
               </select>
            </div> --}}
            <div class="mb-3">
               <label for="transfer-note" class="form-label">Transfer Note (Optional)</label>
               <textarea class="form-control" id="transfer-note" name="transfer_note" rows="3" placeholder="Enter a reference or note for the recipient"></textarea>
            </div>

            <!-- Security Section -->
            <div class="mb-3">
               <label for="transfer-pin" class="form-label">Transfer PIN</label>
               <input type="password" class="form-control" id="transfer-pin" name="transfer_pin" placeholder="Enter your transfer PIN" required>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
               <button type="submit" class="btn btn-primary">Submit Transfer</button>
            </div>

         </form>
      </div>
   </div>
</div>
@endsection
