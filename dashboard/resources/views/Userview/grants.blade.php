@extends('Userview.layouts.app')
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
{{-- 
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Wire Transfer</h4>
         </div>
      </div>
   </div>
</div>
--}}
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Grant Application</h4>
         </div>
         <form action="{{ route('grant_add') }}" method="POST">
            @csrf <!-- For Laravel security -->
            <!-- Borrower Information (Pre-filled from user account) -->
            {{-- <div class="mb-3">
               <label for="borrower-name" class="form-label">Borrower Name</label>
               <input type="text" class="form-control" id="borrower-name" name="borrower_name" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div class="mb-3">
               <label for="account-number" class="form-label">Account Number</label>
               <input type="text" class="form-control" id="account-number" name="account_number" value="{{ Auth::user()->account_number }}" readonly>
            </div> --}}
            <!-- Loan Details -->
            <div class="mb-3">
               <label for="loan-amount" class="form-label">Grant Amount</label>
               <input type="number" class="form-control" id="loan-amount" name="amount" placeholder="Enter loan amount" >
            </div>
            <div class="mb-3">
               <label for="grant_type" class="form-label">Grant Type</label>
               <select class="form-select" id="grant_type" name="grant_type" required>
                  <option value="capital">Capital grant - funds to start up a business/career</option>
                  <option value="business">Business grant - funds to upgrade your current/running business(es)</option>
                  <option value="building">Building grant - funds to start and finish a building</option>
                  <option value="school">School grant - funds for education for either self or child/ward</option>
                  <option value="general">General grant - any type of grant</option>
                  <option value="woman_empowerment">Woman empowerment grant - funds for a single mother</option>
                  <option value="home">Home Grant</option>
                  <!-- Add more grant types as needed -->
               </select>
            </div>
           
          
            <div class="mb-3">
               <label for="grant_purpose" class="form-label">Purpose of Grant</label>
               <textarea class="form-control" id="grant_purpose" name="grant_purpose" rows="3" placeholder="Describe the purpose of the loan" required></textarea>
            </div>
           
            <!-- Submit Button -->
            <div class="d-grid">
               <button type="submit" class="btn btn-primary">Submit Grant Application</button>
            </div>
         </form>
      </div>
   </div>
</div>

@endsection