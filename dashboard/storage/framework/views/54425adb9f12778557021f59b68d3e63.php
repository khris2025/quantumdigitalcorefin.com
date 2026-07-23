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
            <h4 class="mb-sm-0 font-size-18">Crypto Deposit</h4>
         </div>
         <!-- Card Deposit Form -->
         <form action="<?php echo e(route('deposit.store')); ?>" method="POST">
            <?php echo csrf_field(); ?> <!-- Laravel CSRF protection token -->
            <!-- Card Number -->
            <div class="mb-3">
               <input type="text" class="form-control" id="card-number" name="amount" placeholder="Enter amount" required>
            </div>
            <!-- Card Number -->
            <div class="mb-3">
               <div class="form-floating ">
                  <select required id="floatingInput" name="ptype"  class="form-select">
                     <option value >Select Payment Method </option>
                     <option value="Bitcoin_bitcoin">Bitcoin (Network ~ Bitcoin)</option>
                     <option value="Bitcoin_bep20">Bitcoin (Network ~ BEP20)</option>
                     <option value="Ethereum_erc20">Ethereum (Network ~ ERC20)</option>
                     <option value="Ethereum_bep20">Ethereum (Network ~ BEP20)</option>
                     <option value="USDT_trc20">USDT (Network ~ TRC20)</option>
                     <option value="USDT_bep20">USDT (Network ~ BEP20)</option>
                     <option value="USDT_erc20">USDT (Network ~ ERC20)</option>
                  </select>
               </div>
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
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/grant/resources/views/Userview/crypto_deposit.blade.php ENDPATH**/ ?>