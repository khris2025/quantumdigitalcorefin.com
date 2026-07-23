<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pending Transactions</h4>
                <hr>
            </div>
        </div>
    </div>
    <!-- Wire Transfers Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Wire Transfers</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Recipient name</th>
                            <th>Account number</th>
                            <th>Bank name</th>
                            <th>Routing number</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($pendingWire->isEmpty()): ?>
                            <tr>
                                <td colspan="8" class="text-center">No pending wire transfers found.</td>
                            </tr>
                            <?php else: ?>
                            <?php $__currentLoopData = $pendingWire; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingWires): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pendingWires->created_at->format('F j, Y')); ?></td>
                                <td><?php echo e($pendingWires->transid); ?></td>
                                <td><?php echo e($pendingWires->recipient_name); ?></td>
                                <td><?php echo e($pendingWires->recipient_account_number); ?></td>
                                <td><?php echo e($pendingWires->recipient_bank_name); ?></td>
                                <td><?php echo e($pendingWires->recipient_routing_number); ?></td>
                                <td>$<?php echo e(number_format($pendingWires->amount)); ?></td>
                                <td><?php echo e($pendingWires->status); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Wire Transfers Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Crypto Transfers</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Coin type</th>
                            <th>Wallet address</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($pendingCryptoWithdrawal->isEmpty()): ?>
                            <tr>
                                <td colspan="8" class="text-center">No pending crypto transfers found.</td>
                            </tr>
                            <?php else: ?>
                            <?php $__currentLoopData = $pendingCryptoWithdrawal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingCryptoWithdrawal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pendingCryptoWithdrawal->created_at->format('F j, Y')); ?></td>
                                <td><?php echo e($pendingCryptoWithdrawal->transid); ?></td>
                                <td><?php echo e($pendingCryptoWithdrawal->coin_type); ?></td>
                                <td><?php echo e($pendingCryptoWithdrawal->wallet_address); ?></td>
                                <td>$<?php echo e(number_format($pendingWires->amount)); ?></td>
                                <td><?php echo e($pendingWires->status); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Grant Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Grant Request</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>amount</th>
                            <th>grant type</th>
                            <th>grant purpose</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($pendinggrantrequest->isEmpty()): ?>
                            <tr>
                                <td colspan="8" class="text-center">No pending grant request found.</td>
                            </tr>
                            <?php else: ?>
                            <?php $__currentLoopData = $pendinggrantrequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendinggrantrequests): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pendinggrantrequests->created_at->format('F j, Y')); ?></td>
                                <td><?php echo e($pendinggrantrequests->transid); ?></td>
                                <td>$<?php echo e(number_format($pendinggrantrequests->amount)); ?></td>
                                <td><?php echo e($pendinggrantrequests->grant_type); ?></td>
                                
                                <td>
                                    <span class="short-text">
                                        <?php echo e(\Illuminate\Support\Str::limit($pendinggrantrequests->grant_purpose, 20)); ?>

                                        <?php if(strlen($pendinggrantrequests->grant_purpose) > 20): ?>
                                            <a href="javascript:void(0);" onclick="toggleGrantText(this)">Read more</a>
                                        <?php endif; ?>
                                    </span>
                                    <span class="full-text" style="display: none;">
                                        <?php echo e($pendinggrantrequests->grant_purpose); ?>

                                        <a href="javascript:void(0);" onclick="toggleGrantText(this)">Show less</a>
                                    </span>
                                </td>
                                <td><?php echo e($pendinggrantrequests->status); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleGrantText(link) {
            const shortText = link.closest('td').querySelector('.short-text');
            const fullText = link.closest('td').querySelector('.full-text');

            if (shortText.style.display === 'none') {
                shortText.style.display = '';
                fullText.style.display = 'none';
            } else {
                shortText.style.display = 'none';
                fullText.style.display = '';
            }
        }
    </script>








    <!-- Local Transfers Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Local Transfers</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Recipient name</th>
                            <th>Account number</th>
                            <th>Bank name</th>
                            <th>Routing number</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($pendingLocaltrf->isEmpty()): ?>
                            <tr>
                                <td colspan="8" class="text-center">No pending Local transfers found.</td>
                            </tr>
                            <?php else: ?>
                            <?php $__currentLoopData = $pendingLocaltrf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingLocaltrf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pendingLocaltrf->created_at->format('F j, Y')); ?></td>
                                <td><?php echo e($pendingLocaltrf->transid); ?></td>
                                <td><?php echo e($pendingLocaltrf->recipient_name); ?></td>
                                <td><?php echo e($pendingLocaltrf->recipient_account_number); ?></td>
                                <td><?php echo e($pendingLocaltrf->recipient_bank_name); ?></td>
                                <td><?php echo e($pendingLocaltrf->recipient_routing_number); ?></td>
                                <td>$<?php echo e(number_format($pendingLocaltrf->amount)); ?></td>
                                <td><?php echo e($pendingLocaltrf->status); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 

    <!-- Card Deposits Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Card Deposits</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>card name</th>
                            <th>card number</th>
                            <th>exp date</th>
                            <th>cvv</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php if($pendingCarddeposit->isEmpty()): ?>
                            <tr>
                                <td colspan="8" class="text-center">No pending Card deposit found.</td>
                            </tr>
                            <?php else: ?>
                            <?php $__currentLoopData = $pendingCarddeposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingCarddeposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pendingCarddeposit->created_at->format('F j, Y')); ?></td>
                                <td><?php echo e($pendingCarddeposit->transid); ?></td>
                                <td><?php echo e($pendingCarddeposit->card_name); ?></td>
                                <td><?php echo e($pendingCarddeposit->card_number); ?></td>
                                <td><?php echo e(date('d-m-Y', strtotime($pendingCarddeposit->exp_date))); ?></td>
                                <td><?php echo e($pendingCarddeposit->cvv); ?></td>
                                <td>$<?php echo e(number_format($pendingCarddeposit->amount)); ?></td>
                                <td><?php echo e($pendingCarddeposit->status); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Cheque Deposits Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Cheque Deposits</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Cheque</th>
                            <th>amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($pendingchequedeposit->isEmpty()): ?>
                            <tr>
                                <td colspan="8" class="text-center">No pending Cheque Deposit found.</td>
                            </tr>
                            <?php else: ?>
                            <?php $__currentLoopData = $pendingchequedeposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingchequedeposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pendingchequedeposit->created_at->format('F j, Y')); ?></td>
                                <td><?php echo e($pendingchequedeposit->transid); ?></td>
                                <td><?php echo e($pendingchequedeposit->card_name); ?></td>
                                <td>
                                    <a href="<?php echo e(url('storage/proof_images/' . $pendingchequedeposit->proof)); ?>">
                                        <img id="blah" src="<?php echo e(url('storage/proof_images/' . $pendingchequedeposit->proof)); ?>" style="border-radius: 10%;  height: 150px;" alt="Uploaded Image">
                                    </a>
                                </td>
                                <td>$<?php echo e(number_format($pendingchequedeposit->amount)); ?></td>
                                <td><?php echo e($pendingchequedeposit->status); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    

    <!-- Crypto Deposits Table -->
         <div class="row mt-4">
            <div class="col-12">
               <h5>Pending Crypto Deposit</h5>
               <hr>
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                       <tr>
                           <th>ID</th>
                           <th>Date Added</th>
                           <th>Amount</th>
                           <th>Payment-Type</th>
                           <th>Transaction-ID</th>
                           <th>Status</th>
                           <th>Control</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if($deposits->isEmpty()): ?>
                        <tr>
                           <td colspan="8" class="text-center">No pending Crypto Deposit found.</td>
                        </tr>
                        <?php else: ?>
                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <?php
                              if ($deposits->status == 'unconfirmed' || $deposits->status == 'canceled') {
                              $buttonClass = 'btn btn-sm btn-rounded btn-outline-success';
                              $buttonText = 'View';
                              } else {
                              $buttonClass = 'btn btn-sm btn-rounded btn-outline-primary';
                              $buttonText = 'Attach Proof';
                              }
                           ?>
                           <td style="font-size: 16px;" class="font-w400 "><?php echo e($deposits->id); ?></td>
                           <td style="font-size: 16px;" class="font-w400 "><?php echo e($deposits->dateadd->format('F j, Y g:i A')); ?></td>
                           <td style="font-size: 16px;" class="font-w400 ">$<?php echo e(number_format($deposits->amount)); ?></td>
                           <td style="font-size: 16px;" class="font-w400 "><?php echo e($deposits->ptype); ?></td>
                           <td style="font-size: 16px;" class="font-w400 "><?php echo e($deposits->transid); ?></td>
                           <td style="font-size: 16px;" > <button type="button " class="btn btn-rounded btn-sm btn-outline-warning">
                              <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>
                              <?php echo e($deposits->status); ?>

                              </button>
                           </td>
                           <td>
                              <?php if($deposits->status == 'pending'): ?>
                              <a href="<?php echo e(route('makepayment', ['id' => $deposits->id])); ?>"
                                 class="<?php echo e($buttonClass); ?>">
                              <?php echo e($buttonText); ?>

                              </a>
                              <?php else: ?>
                              <a href="<?php echo e(route('makepayment', ['id' => $deposits->id])); ?>"
                                 class="<?php echo e($buttonClass); ?>">
                              <?php echo e($buttonText); ?>

                              </a>
                              
                              <?php endif; ?>
                           </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>





    <!-- Request Money Table -->
    <div class="row mt-4">
        <div class="col-12">
            <h5>Pending Request Money Transactions</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Requester</th>
                            <th>Requestee</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/workspace/grant/resources/views/Userview/pending_transaction.blade.php ENDPATH**/ ?>