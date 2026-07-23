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
                  <h4 class="mb-sm-0 font-size-18">Pending-KYC Verifications</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Pending-KYC Verifications</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Pending-KYC Verifications</h4>
                     <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                              Deposits 
                              </a>
                           </li>
                        </ul>
                        <!-- end nav tabs -->
                     </div>
                  </div>
                  <!-- end card header -->
                  <div class="card-body px-0">
                     <div class="tab-content">
                        <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                           <div class="table-responsive px-3" data-simplebar >
                              <table id="datatable" class="table nowrap w-100">
                                 <thead>
                                    <tr>
                                       <th >Name</th>
                                       <th >Email</th>
                                       <th>Trans ID</th>
                                       <th >Status</th>
                                       <th >ID</th>
                                       <th >Address</th>                                       
                                       <th >Date/Time</th>
                                       <th >Control</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <?php $__currentLoopData = $pending_kyc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pending_kycs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <td style="font-size: 16px;" class="font-w400 "><?php echo e($pending_kycs->fullname); ?></td>
                                       <td style="font-size: 16px;" class="font-w400 "><?php echo e($pending_kycs->email); ?></td>
                                       <td style="font-size: 16px;" class="font-w400 "><?php echo e($pending_kycs->transaction_id); ?></td>
                                       <td style="font-size: 16px;" class="font-w400 "><?php echo e($pending_kycs->status); ?></td>
                                       <td style="font-size: 16px;" class="font-w400 ">
                                          <a href="<?php echo e(url('storage/kyc_id/' . $pending_kycs->id_front)); ?>">
                                             <img id="blah" src="<?php echo e(url('storage/kyc_id/' . $pending_kycs->id_front)); ?>" style="border-radius: 10%;  height: 150px;" alt="Uploaded Image">
                                          </a>
                                       </td>
                                       <td style="font-size: 16px;" class="font-w400 ">
                                          <a href="<?php echo e(url('storage/kyc_id/' . $pending_kycs->id_back)); ?>">
                                             <img id="blah" src="<?php echo e(url('storage/kyc_id/' . $pending_kycs->id_back)); ?>" style="border-radius: 10%;  height: 150px;" alt="Uploaded Image">
                                          </a>
                                       </td>
                                       
                                       <td style="font-size: 16px;" class="font-w400 "><?php echo e($pending_kycs->dateadd->format('F j, Y g:i A')); ?></td>
                                       <td><a href="<?php echo e(route('kyc_action', ['action' => 'confirm','id' => $pending_kycs->id])); ?>" class="btn btn-rounded btn-success">Approve</a>
                                          <br>
                                          <br>
                                          <a href="<?php echo e(route('kyc_action', ['action' => 'decline','id' => $pending_kycs->id])); ?>" class="btn btn-rounded btn-danger">Decline</a>
                                       </td>
                                    
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                 </tbody>
                              </table>
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
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u318400810/domains/crystalglobalfin.com/public_html/B-dash/resources/views/Adminview/pending_kyc.blade.php ENDPATH**/ ?>