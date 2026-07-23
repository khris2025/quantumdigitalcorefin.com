<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Request Loan</h5>
        </div>
        <div class="card-body">
            <form action="#" method="POST" class="p-4 border rounded bg-light">
                <?php echo csrf_field(); ?>
                <h5 class="mb-4 text-primary">Request a Loan</h5>

                <!-- Choose Account -->
                <div class="mb-3">
                    <label class="form-label text-success" for="from_account">From Account</label>
                    <select class="form-control" id="from_account" name="from_account" required>
                        <option value="checking">Checking</option>
                        <option value="savings">Savings</option>
                    </select>
                </div>

                <!-- Loan Type -->
                <div class="mb-3">
                    <label class="form-label text-success" for="loan_type">Loan Type</label>
                    <select class="form-control" id="loan_type" name="loan_type" required>
                        <option value="personal">Personal Loan</option>
                        <option value="business">Business Loan</option>
                        <option value="mortgage">Mortgage Loan</option>
                        <option value="education">Education Loan</option>
                    </select>
                </div>

                <!-- Loan Amount -->
                <div class="mb-3">
                    <label class="form-label text-success" for="loan_amount">Loan Amount</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="loan_amount" name="loan_amount" placeholder="Enter Loan Amount" required>
                </div>

                <!-- Loan Term -->
                <div class="mb-3">
                    <label class="form-label text-success" for="loan_term">Loan Term (Months)</label>
                    <input type="number" min="1" class="form-control" id="loan_term" name="loan_term" placeholder="Enter Loan Term in Months" required>
                </div>

                <!-- Purpose / Notes -->
                <div class="mb-3">
                    <label class="form-label text-success" for="loan_purpose">Purpose / Notes</label>
                    <textarea class="form-control" id="loan_purpose" name="loan_purpose" rows="3" placeholder="Enter purpose of the loan or additional notes"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Loan Request</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/bank_j/resources/views/client/request_loans.blade.php ENDPATH**/ ?>