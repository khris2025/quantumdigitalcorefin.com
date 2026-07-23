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
            <h4 class="mb-sm-0 font-size-18">Local Wire Transfer</h4>
         </div>
         
         <!-- Wire Transfer Form -->
         <form action="<?php echo e(route('local_transfer_add')); ?>" method="POST">
            <?php echo csrf_field(); ?> <!-- Laravel CSRF protection token -->

            <!-- Sender Information (Pre-filled from user account) -->
            

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u340040325/domains/redwoodglobalbk.com/public_html/dash/resources/views/Userview/local_transfer.blade.php ENDPATH**/ ?>