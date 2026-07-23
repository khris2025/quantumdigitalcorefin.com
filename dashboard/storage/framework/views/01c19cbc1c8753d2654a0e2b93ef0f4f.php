<?php $__env->startSection('content'); ?>
<main>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-success alert-dismissible" id="main_alert" role="alert">
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
                    My Profile Overview
                </div>

                <div class="card-body">
                    <table class="table table-bordered" width="100%">
                        <tbody>
                            <tr class="text-center">
                                <td colspan="2"><img class="thumb-image-sm img-thumbnail" src="https://account.starbasefinancebanking.com/public/uploads/profile/default.png"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>test user 10</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>meltudufyi@necub.com</td>
                            </tr>


                            <!--<tr>-->
                            <!--	<td>Account Number</td>-->
                            <!--	<td><b>20221053</b></td>-->
                            <!--</tr>-->
                            <tr>
                                <td>Phone</td>
                                <td>+1234234234234</td>
                            </tr>
                            <!--<tr>-->
                            <!--	<td>Branch</td>-->
                            <!--	<td>Default</td>-->
                            <!--</tr>-->
                            <tr>
                                <td>Email Verified</td>
                                <td><span class='badge badge-primary'>Yes</span></td>
                            </tr>
                            <!--<tr>-->
                            <!--	<td>Mobile Verified</td>-->
                            <!--	<td><span class='badge badge-danger'>No</span></td>-->
                            <!--</tr>-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/bank_j/resources/views/client/profile.blade.php ENDPATH**/ ?>