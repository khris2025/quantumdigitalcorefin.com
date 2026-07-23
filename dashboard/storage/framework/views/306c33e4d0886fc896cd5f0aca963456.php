<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Apply for Fixed Deposit (FDR)</h5>
        </div>
        <div class="card-body">
            <div class="card p-4">
                
                <form action="#" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <!-- Select Account -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-success" for="account_type">Select Account</label>
                                <select class="form-control" id="account_type" name="account_type" required>
                                    <option value="" disabled selected>-- Choose Account --</option>
                                    <option value="checking">Checking - 20221053</option>
                                    <option value="savings">Savings - 20212288</option>
                                </select>
                            </div>
                        </div>

                        <!-- Deposit Amount -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-success" for="amount">Deposit Amount ($)</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" min="100" step="0.01" required>
                            </div>
                        </div>

                        <!-- Tenure -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-success" for="tenure">Tenure</label>
                                <select class="form-control" id="tenure" name="tenure" required>
                                    <option value="" disabled selected>-- Choose Tenure --</option>
                                    <option value="1_month">1 Month</option>
                                    <option value="3_months">3 Months</option>
                                    <option value="6_months">6 Months</option>
                                    <option value="12_months">12 Months</option>
                                    <option value="24_months">24 Months</option>
                                </select>
                            </div>
                        </div>

                        <!-- Interest Payout -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-success" for="interest_payout">Interest Payout</label>
                                <select class="form-control" id="interest_payout" name="interest_payout" required>
                                    <option value="" disabled selected>-- Choose Option --</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="quarterly">Quarterly</option>
                                    <option value="at_maturity">At Maturity</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-success w-100">Apply for FDR</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/B-dash/resources/views/client/fixed_deposit.blade.php ENDPATH**/ ?>