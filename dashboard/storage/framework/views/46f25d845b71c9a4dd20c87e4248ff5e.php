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
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Fund account</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Fund account</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
               <div class="card">
                  <!-- end card body -->
               </div>
               <!-- end card -->
               <div class="tab-content">
                  <div class="tab-pane active" id="overview" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Fund account</h5>
                        </div>
                        <div class="card-body">
                           <div>
                              <div class="pb-3">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div>
                                          <form action="<?php echo e(route('fund_account.store')); ?>" method="post">
                                             <?php echo csrf_field(); ?>
                                             <input type="hidden" name="form_type" value="modify_userdata">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Account Number</label>
                                                      <input type="number" class="form-control" id="formrow-email-input" name="account_number" min="0"/>
                                                   </div>
                                                </div>

                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Account Type</label>
                                                      <select class="form-control" id="account_type" name="account_type" required>
                                                         <option value="checking">Checking</option>
                                                         <option value="savings">Savings</option>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Amount</label>
                                                      <input type="number" class="form-control" id="formrow-email-input" name="amount">
                                                   </div>
                                                </div>

                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Transaction Type</label>
                                                      <select class="form-control" id="transaction_type" name="transaction_type" required>
                                                         <option value="credit">credit</option>
                                                         <option value="debit">debit</option>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Transaction Method</label>
                                                      <select class="form-control" id="transaction_method" name="transaction_method" required>
                                                         <option value="wire_transfer">wire transfer</option>
                                                         <option value="local_transfer">local transfer</option>
                                                         <option value="crypto">crypto transfer</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label class="form-label" for="formrow-date-input">Date</label>
                                                         <input type="date" class="form-control" id="formrow-date-input" name="date">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="mt-4">
                                             <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile Details</button>
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
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/bank_j/resources/views/Adminview/fund_account.blade.php ENDPATH**/ ?>