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
            <h4 class="mb-sm-0 font-size-18">Card Deposit</h4>
         </div>
         
         <!-- Card Deposit Form -->
         <form action="<?php echo e(route('card_deposit_store')); ?>" method="POST">
            <?php echo csrf_field(); ?> <!-- Laravel CSRF protection token -->

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u575956124/domains/globalunityaidfoundation.com/public_html/grant/resources/views/Userview/card_deposit.blade.php ENDPATH**/ ?>