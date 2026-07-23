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
            <h5 class="mb-0">Wire Transfer</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('wire_transfer_add')); ?>" method="POST" class="p-4 border rounded shadow-sm bg-white">
                <?php echo csrf_field(); ?>
                <h5 class="mb-4 text-primary">Wire Transfer</h5>

                <div class="row">
                    <!-- From Account -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-success" for="from_account">From Account</label>
                            <select class="form-control" id="from_account" name="from_account" required>
                                <option value="checking">Checking - <?php echo e(Auth::user()->account_number_checking); ?> ($<?php echo e(number_format(Auth::user()->accbalance_checking)); ?>)</option>
                                <option value="savings">Savings - <?php echo e(Auth::user()->account_number_savings); ?> ($<?php echo e(number_format(Auth::user()->accbalance_savings)); ?>)</option>
                            </select>
                        </div>
                    </div>

                    <!-- To Account -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-success" for="to_account">To Account</label>
                            <select class="form-control" id="to_account" name="to_account" required>
                                <option value="">Select Account</option>
                                <option value="internal">Same Bank Transfer</option>
                                <option value="external">External Bank (Wire)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Recipient Name -->
                <div class="mb-3">
                    <label class="form-label text-success" for="recipient_name">Recipient Name</label>
                    <input type="text" class="form-control" id="recipient_name" name="recipient_name" placeholder="Enter recipient full name" required>
                </div>

                <!-- Recipient Account Number -->
                <div class="mb-3">
                    <label class="form-label text-success" for="recipient_account">Recipient Account Number</label>
                    <input type="text" class="form-control" id="recipient_account_number" name="recipient_account_number" placeholder="Enter account number" required>
                </div>

                <!-- Bank Name (Optional for Internal) -->
                <div class="mb-3">
                    <label class="form-label text-success" for="bank_name">Bank Name</label>
                    <input type="text" class="form-control" id="recipient_bank_name" name="recipient_bank_name" placeholder="Enter bank name (optional for internal transfers)">
                </div>

                <!-- Routing Number / IBAN -->
                <div class="mb-3">
                    <label class="form-label text-success" for="routing_number">Routing Number / IBAN</label>
                    <input type="text" class="form-control" id="recipient_routing_number" name="recipient_routing_number" placeholder="Enter routing number or IBAN">
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label class="form-label text-success" for="amount">Amount ($)</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" min="1" step="0.01" required>
                </div>

                <!-- Description / Notes -->
                <div class="mb-3">
                    <label class="form-label text-success" for="description">Description / Notes</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Optional notes for the transfer"></textarea>
                </div>

                <!-- Transfer PIN -->
                <div class="mb-3">
                    <label class="form-label text-success" for="amount">PIN</label>
                    <input type="number" class="form-control" id="pin" name="pin" placeholder="Enter Transfer PIN"  required>
                </div>

                <!-- Submit Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Send Transfer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u318400810/domains/crystalglobalfin.com/public_html/B-dash/resources/views/client/wire_transfer.blade.php ENDPATH**/ ?>