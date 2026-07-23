<?php $__env->startSection('content'); ?>
<main>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible" id="main_alert" role="alert">
                <button type="button" id="close_alert" class="close">
                    <span aria-hidden="true"><i class="icofont-close-line-squared-alt"></i></span>
                </button>
                <span class="msg"></span>
            </div>
        </div>
    </div>

    <?php if(Auth::user()->kyc_verify == "no"): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    <i class="fa fa-bell"></i>  Your account is not verified. Please
                        submit all necessary documents. <strong><a
                            href="<?php echo e(route('kyc_upload_page')); ?>">Submit
                            Documents </a></strong>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(Auth::user()->account_status == "RESTRICTED"): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    <i class="fa fa-bell"></i>  Your account is currently restricted. Please
                        contact support for rectification.
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row align-items-center mb-4">
        <div class="col-12 d-flex align-items-center">
            <img src="https://account.starbasefinancebanking.com/public/uploads/profile/default.png"
                alt="user-image" height="50" class="rounded-circle shadow-sm mr-2">
            <div class="text-dark">
                <div style="text-transform: uppercase; font-size:0.7rem; font-weight:500; opacity:0.7"
                    class="text-white">Hello, Welcome Back!</div>
                <div class="text-white"><?php echo e(Auth::user()->fullname); ?></div>
            </div>
        </div>
    </div>

    <div class="row flex-row no-gutters" style="flex-wrap: nowrap; overflow-x:auto; ">
        <div class="col-12 col-md-6 pr-2" style="flex:none; width:95%">
            <div class="card mb-3"
                style="background-image: linear-gradient(to bottom, #03519B, #004076); border: 1px solid #2A94D4">
                <div class="card-body">
                    <h6 class="text-white"
                        style="text-transform: uppercase; font-size:0.7rem; font-weight:500; opacity:0.7">
                        Checking</h6>
                    <h5 class="text-white" style="font-size:1.5rem; font-weight:500">$<?php echo e(number_format(Auth::user()->accbalance_checking)); ?></h5>

                    <h6 class="text-white mt-4"
                        style="text-transform: uppercase; color:#3D73DD; font-size:0.7rem; font-weight:500; opacity:0.7">
                        Account Number</h6>
                    <h5 class="text-white mb-0" style="font-size:0.8rem; font-weight:500"><?php echo e(Auth::user()->account_number_checking); ?></h5>

                    <!--<div class="row">-->
                    <!--    <div class="col-6">-->
                    <!--        <h6 class="text-white mt-4"-->
                    <!--            style="text-transform: uppercase; color:#3D73DD; font-size:0.7rem; font-weight:500; opacity:0.7">-->
                    <!--            Total Credits</h6>-->
                    <!--        <h5 class="text-white" style="font-size:0.8rem; font-weight:500">$0.00</h5>-->
                    <!--    </div>-->
                    <!--    <div class="col-6">-->
                    <!--        <h6 class="text-white mt-4"-->
                    <!--            style="text-transform: uppercase; color:#3D73DD; font-size:0.7rem; font-weight:500; opacity:0.7">-->
                    <!--            Total Debits</h6>-->
                    <!--        <h5 class="text-white" style="font-size:0.8rem; font-weight:500">$0.00</h5>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 pr-2" style="flex:none; width:95%">
            <div class="card mb-3"
                style="background-image: linear-gradient(to bottom, #03519B, #004076); border: 1px solid #2A94D4">
                <div class="card-body">
                    <h6 class="text-white"
                        style="text-transform: uppercase; font-size:0.7rem; font-weight:500; opacity:0.7">
                        Savings</h6>
                    <h5 class="text-white" style="font-size:1.5rem; font-weight:500">$<?php echo e(number_format(Auth::user()->accbalance_savings)); ?></h5>

                    <h6 class="text-white mt-4"
                        style="text-transform: uppercase; color:#3D73DD; font-size:0.7rem; font-weight:500; opacity:0.7">
                        Account Number</h6>
                    <!--<h5 class="text-white mb-0" style="font-size:1rem; font-weight:500">**** 2288</h5>-->
                    <h5 class="text-white mb-0" style="font-size:0.8rem; font-weight:500"><?php echo e(Auth::user()->account_number_savings); ?></h5>

                    <!--<div class="row">-->
                    <!--    <div class="col-6">-->
                    <!--        <h6 class="text-white mt-4"-->
                    <!--            style="text-transform: uppercase; color:#3D73DD; font-size:0.7rem; font-weight:500; opacity:0.7">-->
                    <!--            Total Credits</h6>-->
                    <!--        <h5 class="text-white" style="font-size:0.8rem; font-weight:500">$0.00</h5>-->
                    <!--    </div>-->
                    <!--    <div class="col-6">-->
                    <!--        <h6 class="text-white mt-4"-->
                    <!--            style="text-transform: uppercase; color:#3D73DD; font-size:0.7rem; font-weight:500; opacity:0.7">-->
                    <!--            Total Debits</h6>-->
                    <!--        <h5 class="text-white" style="font-size:0.8rem; font-weight:500">$0.00</h5>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <div class="card px-3">
                <div class="row py-3 px-3 icon-button-row">
                    <div class="col-4 text-center px-3">
                        <a class="icon-btn-link"
                            href="<?php echo e(route('wire_transfer')); ?>">
                            <i class="fa fa-share icon-button"></i>
                            <div class="icon-button-text">Wire Transfer</div>
                        </a>
                    </div>
                    <div class="col-4 text-center px-3">
                        <a class="icon-btn-link"
                            href="<?php echo e(route('internal_transfer')); ?>">
                            <i class="fa fa-share-alt icon-button"></i>
                            <div class="icon-button-text">Local Transfer</div>
                        </a>
                    </div>
                    <div class="col-4 text-center px-3">
                        <a class="icon-btn-link"
                            href="<?php echo e(route('account_history')); ?>">
                            <i class="fa fa-list icon-button"></i>
                            <div class="icon-button-text">Account History</div>
                        </a>
                    </div>
                </div>
                <div class="row py-3 px-3 icon-button-row border-bottom-0">
                    <div class="col-4 text-center px-3">
                        <a class="icon-btn-link"
                            href="<?php echo e(route('request_loan')); ?>">
                            <i class="fa fa-sack-dollar icon-button"></i>
                            <div class="icon-button-text">Integrated Loans</div>
                        </a>
                    </div>
                    <div class="col-4 text-center px-3">
                        <a class="icon-btn-link"
                            href="<?php echo e(route('fixed_deposit')); ?>">
                            <i class="fa fa-coins icon-button"></i>
                            <div class="icon-button-text">Fixed Deposit</div>
                        </a>
                    </div>
                    <div class="col-4 text-center px-3">
                        <a class="icon-btn-link"
                            href="<?php echo e(route('support_ticket')); ?>">
                            <i class="fa fa-lightbulb icon-button"></i>
                            <div class="icon-button-text">Support Ticket</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    Recent Transactions
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="font-size:0.8rem">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount ($)</th>
                                    <th>Account</th>
                                    <th>Type</th>
                                    <th>Debit/Credit</th>
                                    <th>Status</th>
                                    <th>Transaction id</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if($transactions->isEmpty()): ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No Transactions</td>
                                    </tr>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transactions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($transactions->dateadd->format('F j, Y')); ?></td>
                                        <td>$<?php echo e(number_format($transactions->amount)); ?></td>
                                        <td><?php echo e($transactions->account); ?></td>
                                        <td><?php echo e($transactions->transaction_name); ?></td>
                                        <td>
                                            <span style="color: <?php echo e($transactions->transaction_type == 'debit' ? 'red' : 'green'); ?>">
                                                <?php echo e(ucfirst($transactions->transaction_type)); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($transactions->status); ?></td>
                                        <td><?php echo e($transactions->transaction_id); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u318400810/domains/crystalglobalfin.com/public_html/B-dash/resources/views/client/dashboard.blade.php ENDPATH**/ ?>