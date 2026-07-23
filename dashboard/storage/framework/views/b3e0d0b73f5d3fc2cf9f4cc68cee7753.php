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

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header text-center">
                    Update Password
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
                    <form id="passwordForm" method="POST" action="<?php echo e(route('update_password')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" id="old_password" name="old_password" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="newPassword">New Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="confirmPassword">Confirm New Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-4">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/bank_j/resources/views/client/update_password.blade.php ENDPATH**/ ?>