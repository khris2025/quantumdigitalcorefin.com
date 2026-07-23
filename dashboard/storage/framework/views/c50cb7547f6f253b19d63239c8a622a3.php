<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-xl-12 col-lg-12">
   <div class="card">
      <div class="card-body">
         <div class="row">
            <div class="col-sm order-2 order-sm-1">
               <div class="d-flex align-items-start mt-3 mt-sm-0">
                  <div class="flex-shrink-0">
                     <div class="avatar-xl me-3">
                        <img src="assets/images/users/avatar-2.png" alt="" class="img-fluid rounded-circle d-block">
                     </div>
                  </div>
                  <div class="flex-grow-1">
                     <div>
                        <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                           <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?php echo e(Auth::user()->country); ?></div>
                           <?php if(Auth::user()->kyc_verify == 'no'): ?>
                           <a href="<?php echo e(route('kyc_upload')); ?>" class="btn btn-danger waves-effect btn-label waves-light"><i class="bx bx-transfer-alt label-icon"></i> KYC Verification</a>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
            <li class="nav-item">
               <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">Profile</a>
            </li>
            
            <li class="nav-item">
               <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab" aria-selected="false">Security</a>
            </li>
         </ul>
      </div>
   </div>
   <div class="tab-content">
      <div class="tab-pane active" id="overview" role="tabpanel">
         <div class="card">
            <div class="card-header">
               <h5 class="card-title mb-0">Profile</h5>
            </div>
            <div class="card-body">
               <div>
                  <div class="pb-3">
                     <div class="row">
                        <div class="col-lg-12">
                           <div>
                              <form action="" method="post">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label" for="formrow-email-input">Full Name</label>
                                          <input type="tezt" class="form-control" id="formrow-firstname-input" disabled value="<?php echo e(Auth::user()->fullname); ?>" >
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label" for="formrow-email-input">Email</label>
                                          <input type="text" class="form-control" id="formrow-email-input" disabled value="<?php echo e(Auth::user()->email); ?>">
                                       </div>
                                    </div>
                                 </div>
                                 
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label" for="formrow-email-input">country</label>
                                          <input type="text" class="form-control" id="formrow-email-input" name="country" placeholder="Enter your Address" value="<?php echo e(Auth::user()->country); ?>" disabled>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label" for="formrow-email-input">Gender</label>
                                          <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="<?php echo e(Auth::user()->gender); ?>" disabled>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label" for="formrow-email-input">Address</label>
                                          <input type="text" class="form-control" id="formrow-email-input" name="country" placeholder="Enter your Address" value="<?php echo e(Auth::user()->address); ?>" disabled>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label" for="formrow-email-input">Phone Number</label>
                                          <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="<?php echo e(Auth::user()->phone_number); ?>" disabled>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label" for="formrow-email-input">Zip Code</label>
                                          <input type="text" class="form-control" id="formrow-email-input" name="zip_code" placeholder="Enter your Address" value="<?php echo e(Auth::user()->zip_code); ?>" disabled>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label" for="formrow-email-input">Date of Birth</label>
                                          <input type="text" class="form-control" id="formrow-lastname-input" name="date_of_birth"  value="<?php echo e(Auth::user()->date_of_birth); ?>" disabled>
                                       </div>
                                    </div>
                                 </div>

                                 
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php if(session('success')): ?>
      <script>
         Swal.fire({
         icon: 'success',
         title: 'Success',
         text: <?php echo json_encode(session('success'), 15, 512) ?>,
         });
      </script>
      <?php endif; ?>
      
      <div class="tab-pane" id="post" role="tabpanel">
         <div class="card">
            <div class="card-header">
               <h5 class="card-title mb-0">Security</h5>
            </div>
            <div class="card-body">
               <form action="<?php echo e(route('update_password')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label class="form-label" for="formrow-email-input">Old Password</label>
                           <input  type="password" name="old_password" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label class="form-label" for="formrow-email-input">New Password</label>
                           <input  type="password" name="password" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label class="form-label" for="formrow-email-input">Confirm Password</label>
                           <input  type="password"name="password_confirmation" class="form-control" >
                        </div>
                     </div>
                  </div>
                  <div class="mt-4">
                     <button type="submit" name="sub-pass" class="btn btn-secondary w-md">Update Password</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u575956124/domains/globalunityaidfoundation.com/public_html/grant/resources/views/Userview/profile.blade.php ENDPATH**/ ?>