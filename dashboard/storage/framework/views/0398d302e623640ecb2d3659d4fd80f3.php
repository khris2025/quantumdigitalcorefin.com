<?php $__env->startSection('content'); ?>
<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<script>
   Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: <?php echo json_encode($message, 15, 512) ?>,
   });
</script>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php if(session('success')): ?>
<script>
   Swal.fire({
      icon: 'success',
      title: 'Success',
      text: <?php echo json_encode(session('success'), 15, 512) ?>,
   });
</script>
<?php endif; ?>
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
                    <form id="kycForm" method="POST" action="<?php echo e(route('kyc_upload_id')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/bank_j/resources/views/client/kyc.blade.php ENDPATH**/ ?>