<?php $__env->startSection('content'); ?>

<!-- Display Error Message -->
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

<!-- Display Success Message -->
<?php if(session('success')): ?>
<script>
   Swal.fire({
      icon: 'success',
      title: 'Success',
      text: <?php echo json_encode(session('success'), 15, 512) ?>,
   });
</script>
<?php endif; ?>

<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Cheque Deposit</h4>
         </div>
         
         <!-- Cheque Deposit Form -->
         <form action="<?php echo e(route('cheque_deposit_store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?> <!-- Laravel CSRF protection token -->

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/grant/resources/views/Userview/cheque_deposit.blade.php ENDPATH**/ ?>