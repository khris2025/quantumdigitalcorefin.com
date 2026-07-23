<?php $__env->startSection('content'); ?>
<main>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
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
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header text-center">
                    My Loans
                </div>
                <div class="card-body">
                    <!-- Responsive Table Wrapper -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Loan ID</th>
                                    <th>Amount</th>
                                    <th>Interest Rate</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/bank_j/resources/views/client/loan_history.blade.php ENDPATH**/ ?>