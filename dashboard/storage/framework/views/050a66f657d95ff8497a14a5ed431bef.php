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
                <div class="card-header text-center">
                    Cheque Deposit
                </div>
                <div class="card-body">
                     <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                           <ul>
                              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><?php echo e($error); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                        </div>
                        <?php endif; ?>

                    <form id="chequeForm" method="POST" action="<?php echo e(route('cheque_deposit_store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group mt-3">
                            <label for="cheque_image">Upload Cheque Image</label>
                            <input type="file" id="cheque_image" name="cheque_image" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                        </div>

                        <!-- From Account -->
                        <div class="form-group mt-3">
                            <label class="form-label text-success" for="from_account">Fund Account</label>
                            <select class="form-control" id="to_account" name="to_account" required>
                                <option value="">Select Account</option>
                                <option value="checking">Checking - <?php echo e(Auth::user()->account_number_checking); ?> ($<?php echo e(number_format(Auth::user()->accbalance_checking)); ?>)</option>
                                <option value="savings">Savings - <?php echo e(Auth::user()->account_number_savings); ?> ($<?php echo e(number_format(Auth::user()->accbalance_savings)); ?>)</option>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/B-dash/resources/views/client/cheque_deposit.blade.php ENDPATH**/ ?>