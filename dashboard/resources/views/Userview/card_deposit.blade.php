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
            <h4 class="mb-sm-0 font-size-18">Card Deposit</h4>
         </div>
         
         <!-- Card Deposit Form -->
         <form action="{{ route('card_deposit_store') }}" method="POST">
            @csrf <!-- Laravel CSRF protection token -->

            <!-- Card Holder Name -->
            <div class="mb-3">
               <label for="card-holder-name" class="form-label">Card Holder Name</label>
               <input type="text" class="form-control" id="card-holder-name" name="card_holder_name" placeholder="Enter the name on the card" required>
            </div>

            <!-- Card Number -->
            <div class="mb-3">
               <label for="card-number" class="form-label">Card Number</label>
               <input type="text" class="form-control" id="card-number" name="card_number" placeholder="Enter your card number" required>
            </div>

            <!-- Expiration Date -->
            <div class="mb-3">
               <label for="expiration-date" class="form-label">Expiration Date (MM/YY)</label>
               <input type="date" class="form-control" id="expiration-date" name="expiration_date" placeholder="MM/YY" required>
            </div>

            <!-- CVV -->
            <div class="mb-3">
               <label for="cvv" class="form-label">CVV</label>
               <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Enter CVV" required>
            </div>

            <!-- Amount to Deposit -->
            <div class="mb-3">
               <label for="amount" class="form-label">Deposit Amount</label>
               <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount to deposit" required>
            </div>

            <!-- Optional Note -->
            <div class="mb-3">
               <label for="note" class="form-label">Note (Optional)</label>
               <textarea class="form-control" id="note" name="note" rows="3" placeholder="Enter a note for the transaction"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
               <button type="submit" class="btn btn-primary">Deposit Funds</button>
            </div>

         </form>
      </div>
   </div>
</div>

@endsection
