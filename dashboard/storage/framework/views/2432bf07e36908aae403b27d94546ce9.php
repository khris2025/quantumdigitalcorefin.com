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
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Crypto withdrawal</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('crypto_withdrawal_add')); ?>" method="POST" class="p-4 border rounded bg-light">
                <?php echo csrf_field(); ?>
                <h5 class="mb-4 text-primary">Crypto Withdrawal</h5>

                <!-- Choose Account -->
                <div class="mb-3">
                    <label class="form-label text-success" for="from_account">From Account</label>
                    <select class="form-control" id="from_account" name="from_account" required>
                        <option value="checking">Checking - <?php echo e(Auth::user()->account_number_checking); ?> ($<?php echo e(number_format(Auth::user()->accbalance_checking)); ?>)  </option>
                        <option value="savings">Savings - <?php echo e(Auth::user()->account_number_savings); ?> ($<?php echo e(number_format(Auth::user()->accbalance_savings)); ?>) </option>
                    </select>
                </div>

                <!-- Crypto Type -->
                <div class="mb-3">
                    <label class="form-label text-success" for="crypto_type">Select Crypto</label>
                    <select class="form-control" id="crypto_type" name="crypto_type" required>
                        <option value="BTC">Bitcoin (BTC)</option>
                        <option value="ETH">Ethereum (ETH)</option>
                        <option value="USDT">Tether (USDT)</option>
                        <option value="BNB">Binance Coin (BNB)</option>
                    </select>
                </div>

                <!-- Wallet Address -->
                <div class="mb-3">
                    <label class="form-label text-success" for="wallet_address">Wallet Address</label>
                    <input type="text" class="form-control" id="wallet_address" name="wallet_address" placeholder="Enter Wallet Address" required>
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label class="form-label text-success" for="amount">Amount</label>
                    <input type="number" step="0.0001" min="0.0001" class="form-control" id="amount" name="amount" placeholder="Enter Amount to Withdraw" required>
                </div>

                <!-- Transaction PIN -->
                <div class="mb-3">
                    <label class="form-label text-success" for="amount">PIN</label>
                    <input type="number"  class="form-control" id="pin" name="pin" placeholder="Enter PIN to Withdraw" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit Crypto Withdrawal</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/bank_j/resources/views/client/crypto_withdrawal.blade.php ENDPATH**/ ?>