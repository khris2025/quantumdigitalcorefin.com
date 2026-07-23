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
            <h4 class="mb-sm-0 font-size-18">Request Money</h4>
         </div>
         
         <!-- Request Money Form -->
         <form action="#" method="POST">
            @csrf <!-- Laravel CSRF protection token -->

            <!-- Recipient Information -->
            <div class="mb-3">
               <label for="recipient-email" class="form-label">Recipient Email</label>
               <input type="email" class="form-control" id="recipient-email" name="recipient_email" placeholder="Enter recipient's email" required>
            </div>

            <!-- Amount to Request -->
            <div class="mb-3">
               <label for="amount" class="form-label">Amount</label>
               <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount to request" required>
            </div>

            <!-- Currency Selection -->
            {{-- <div class="mb-3">
               <label for="currency" class="form-label">Currency</label>
               <select class="form-select" id="currency" name="currency" required>
                  <option value="USD">USD - US Dollars</option>
                  <option value="EUR">EUR - Euro</option>
                  <option value="GBP">GBP - British Pound</option>
                  <!-- Add more currencies if needed -->
               </select>
            </div> --}}

            <!-- Optional Message -->
            <div class="mb-3">
               <label for="message" class="form-label">Message (Optional)</label>
               <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter a message for the recipient"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
               <button type="submit" class="btn btn-primary" disabled>Request Money</button>
            </div>

         </form>
      </div>
   </div>
</div>

@endsection
