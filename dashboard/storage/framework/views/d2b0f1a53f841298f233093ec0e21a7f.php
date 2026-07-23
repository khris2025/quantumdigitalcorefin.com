 <?php $__env->startSection('content'); ?> <?php $__errorArgs = ['message'];
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
unset($__errorArgs, $__bag); ?> <?php if(session('success')): ?>
<script>
    Swal.fire({
       icon: 'success',
       title: 'Success',
       text: <?php echo json_encode(session('success'), 15, 512) ?>,
    });
</script>
<?php endif; ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        
                        <div class="page-title-right">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Pending Crypto Deposit</h4>
                            <div class="flex-shrink-0">
                                <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                                    <li class="nav-item">
                                        
                                    </li>
                                </ul>
                                <!-- end nav tabs -->
                            </div>
                        </div>
                        <!-- end card header -->
                        <div class="card-body px-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date Added</th>
                                                    <th>Amount</th>
                                                    <th>Payment-Type</th>
                                                    <th>Transaction-ID</th>
                                                    <th>Coin Type</th>
                                                    <th>proof</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($crypto_deposit_action->isEmpty()): ?>
                                                <tr>
                                                    <td colspan="8" class="text-center">No pending Crypto Deposit found.</td>
                                                </tr>
                                                <?php else: ?> <?php $__currentLoopData = $crypto_deposit_action; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crypto_deposit_action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    
                                                    <td style="font-size: 16px;" class="font-w400"><?php echo e($crypto_deposit_action->id); ?></td>
                                                    <td style="font-size: 16px;" class="font-w400"><?php echo e($crypto_deposit_action->dateadd->format('F j, Y g:i A')); ?></td>
                                                    <td style="font-size: 16px;" class="font-w400">$<?php echo e(number_format($crypto_deposit_action->amount)); ?></td>
                                                    <td style="font-size: 16px;" class="font-w400"><?php echo e($crypto_deposit_action->ptype); ?></td>
                                                    <td style="font-size: 16px;" class="font-w400"><?php echo e($crypto_deposit_action->transid); ?></td>
                                                    <td style="font-size: 16px;" class="font-w400"><?php echo e($crypto_deposit_action->ptype); ?></td>
                                                    <td>
                                                        <img id="blah" src="<?php echo e(url('storage/proof_images/' .$crypto_deposit_action->proof)); ?>" style="border-radius: 10%; height: 150px;" alt="Uploaded Image" />
                                                    </td>
                                                    <td><a href="<?php echo e(route('deposit_action', ['action' => 'confirm','id' => $crypto_deposit_action->id])); ?>" class="btn btn-rounded btn-success">Approve</a>
                                                        <br>
                                                        <br>
                                                        <a href="<?php echo e(route('deposit_action', ['action' => 'decline','id' => $crypto_deposit_action->id])); ?>" class="btn btn-rounded btn-danger">Decline</a>
                                                    </td>

                                                    
                                                    
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/grant/resources/views/Adminview/crypto_deposit_action.blade.php ENDPATH**/ ?>