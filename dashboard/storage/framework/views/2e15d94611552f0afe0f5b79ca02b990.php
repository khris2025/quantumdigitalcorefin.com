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
                  
                  <div class="page-title-right">
                     
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Pending Local Transfer</h4>
                     <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                           <li class="nav-item">
                              
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
                              





                              <table class="table table-bordered">
                                 <thead>
                                       <tr>
                                          <th>ID</th>
                                          <th>Date</th>
                                          <th>senders name</th>
                                          <th>Senders email</th>
                                          <th>Transaction ID</th>
                                          <th>Recipient name</th>
                                          <th>Account number</th>
                                          <th>Bank name</th>
                                          <th>Routing number</th>
                                          <th>amount</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                       </tr>
                                 </thead>
                                 <tbody>

                                       <?php if($pending_localtrf->isEmpty()): ?>
                                          <tr>
                                             <td colspan="8" class="text-center">No Pending Local Transfers found.</td>
                                          </tr>
                                          <?php else: ?>
                                          <?php $__currentLoopData = $pending_localtrf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pending_localtrf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                             <td><?php echo e($pending_localtrf->id); ?></td>
                                             <td><?php echo e($pending_localtrf->created_at->format('F j, Y')); ?></td>
                                             <td><?php echo e($pending_localtrf->senders_name); ?></td>
                                             <td><?php echo e($pending_localtrf->senders_email); ?></td>
                                             <td><?php echo e($pending_localtrf->transid); ?></td>
                                             <td><?php echo e($pending_localtrf->recipient_name); ?></td>
                                             <td><?php echo e($pending_localtrf->recipient_account_number); ?></td>
                                             <td><?php echo e($pending_localtrf->recipient_bank_name); ?></td>
                                             <td><?php echo e($pending_localtrf->recipient_routing_number); ?></td>
                                             <td>$<?php echo e(number_format($pending_localtrf->amount)); ?></td>
                                             <td><?php echo e($pending_localtrf->status); ?></td>
                                             <td><a href="<?php echo e(route('deposit_action', ['action' => 'confirm','id' => $pending_localtrf->id])); ?>" class="btn btn-rounded btn-success">Approve</a>
                                                <br>
                                                <br>
                                                <a href="<?php echo e(route('deposit_action', ['action' => 'decline','id' => $pending_localtrf->id])); ?>" class="btn btn-rounded btn-danger">Decline</a>
                                             </td>
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
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u340040325/domains/redwoodglobalbk.com/public_html/dash/resources/views/Adminview/pending_localtrf.blade.php ENDPATH**/ ?>