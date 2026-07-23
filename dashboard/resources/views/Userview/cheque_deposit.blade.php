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
            <h4 class="mb-sm-0 font-size-18">Cheque Deposit</h4>
         </div>
         
         <!-- Cheque Deposit Form -->
         <form action="{{ route('cheque_deposit_store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Laravel CSRF protection token -->

            <!-- Account Holder Name -->
           

            <!-- Deposit Amount -->
            <div class="mb-3">
               <label for="amount" class="form-label">Deposit Amount</label>
               <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter the amount on the cheque" required>
            </div>

            <!-- Upload Cheque Image -->
            <div class="mb-3">
               <label for="cheque-image" class="form-label">Upload Cheque Image</label>
               <input type="file" class="form-control" id="cheque-image" name="proof_image" accept="image/*" required>
               <small class="form-text text-muted">Please upload a clear image of the cheque.</small>
            </div>

            <!-- Optional Note -->
            <div class="mb-3">
               <label for="note" class="form-label">Note (Optional)</label>
               <textarea class="form-control" id="note" name="note" rows="3" placeholder="Enter a note for the transaction"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
               <button type="submit" class="btn btn-primary">Deposit Cheque</button>
            </div>

         </form>
      </div>
   </div>
</div>

@endsection
