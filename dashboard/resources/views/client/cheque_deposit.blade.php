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
<main>
   <div class="row">
      <div class="col-lg-8 offset-lg-2">
         <!-- Alert Message -->
         <div class="alert alert-success alert-dismissible" id="main_alert" role="alert" style="display: none;">
            <button type="button" id="close_alert" class="close">
            <span aria-hidden="true"><i class="icofont-close-line-squared-alt"></i></span>
            </button>
            <span class="msg"></span>
         </div>
      </div>
   </div>
   <div class="row mt-4">
      <div class="col-lg-8 offset-lg-2">
         <div class="card">
            <div class="card-header text-center">
               Cheque Deposit
            </div>
            <div class="card-body">
               @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
               <form id="chequeForm" method="POST" action="{{ route('cheque_deposit_store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mt-3">
                     <label for="cheque_image">Upload Cheque Image</label>
                     <input type="file" id="cheque_image" name="cheque_image" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                  </div>
                  <!-- From Account -->
                  <div class="form-group mt-3">
                     <label class="form-label text-success" for="from_account">Fund Account</label>
                     <select class="form-control" id="to_account" name="to_account" required>
                        <option value="">Select Account</option>
                        <option value="checking">Checking - {{ Auth::user()->account_number_checking }} (${{ number_format(Auth::user()->accbalance_checking) }})</option>
                        <option value="savings">Savings - {{ Auth::user()->account_number_savings }} (${{ number_format(Auth::user()->accbalance_savings) }})</option>
                     </select>
                  </div>
                  <div class="form-group mt-3">
                     <label for="amount">Cheque Amount</label>
                     <input type="number" id="amount" name="amount" class="form-control" step="0.01" placeholder="Enter amount" required>
                  </div>
                  <div class="form-group mt-3">
                     <label for="notes">Notes (Optional)</label>
                     <textarea id="description" name="description" class="form-control" rows="3" placeholder="Add any notes"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block mt-4">Submit Cheque</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection