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

<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Grant Application</h4>
         </div>
         <form action="<?php echo e(route('grant_add')); ?>" method="POST">
            <?php echo csrf_field(); ?> <!-- For Laravel security -->
            <!-- Borrower Information (Pre-filled from user account) -->
            
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/grant/resources/views/Userview/grants.blade.php ENDPATH**/ ?>