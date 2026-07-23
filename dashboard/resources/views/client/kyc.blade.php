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
                <div class="card-header text-center bg-primary text-white">
                    Upload KYC Documents
                </div>
                <div class="card-body">
                    <form id="kycForm" method="POST" action="{{ route('kyc_upload_id') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mt-3">
                            <label for="id_proof">ID Proof (Passport / National ID / Driving License)</label>
                            <input type="file" id="id_proof" name="id_proof" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="address_proof">Address Proof (Utility Bill / Bank Statement)</label>
                            <input type="file" id="address_proof" name="address_proof" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-4">Upload Documents</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection