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
            <h4 class="mb-sm-0 font-size-18">Request Money</h4>
         </div>
         
         <!-- Request Money Form -->
         <form action="#" method="POST">
            <?php echo csrf_field(); ?> <!-- Laravel CSRF protection token -->

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u575956124/domains/globalunityaidfoundation.com/public_html/grant/resources/views/Userview/request_money.blade.php ENDPATH**/ ?>