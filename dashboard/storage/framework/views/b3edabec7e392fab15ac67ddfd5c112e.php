<?php $__env->startSection('content'); ?>
<div class="row">
   
   <div class="col-xl-12 col-md-12">
      <!-- Card -->
      
   
   <hr>
   <style>
      .card {
      border: none; /* Removes border */
      box-shadow: none; /* Removes shadow, if any */
      }
      .icon-box {
      background-color: #354e42; /* Purple background */
      color: white; /* White text */
      border-radius: 10px; /* Makes it circular */
      width: 60px; /* Adjust width */
      height: 60px; /* Adjust height */
      display: flex;
      align-items: center; /* Center icon vertically */
      justify-content: center; /* Center icon horizontally */
      margin: 0 auto 15px; /* Center the box and add bottom margin */
      }
     
   </style>
   <div class="container mt-5">
      <div class="row fixed-row">
         <!-- First Row -->
         <div class="col-4">
            <a href="<?php echo e(route('wire_transfer')); ?>" class="card mb-2">
               <div class="card-body text-center">
                  <!-- Added text-center here -->
                  <div class="icon-box">
                     <i class="fas fa-share" style="font-size: 24px;"></i>
                  </div>
                  <!--<p class="card-text">Wire Transfer</p>-->
                  <text>wire transfer</text>
                  <!-- This will be centered -->
               </div>
            </a>
         </div>
         <div class="col-4">
            <a href="<?php echo e(route('local_transfer')); ?>" class="card mb-2">
               <div class="card-body text-center">
                  <!-- Added text-center here -->
                  <div class="icon-box">
                     <i class="fas fa-share" style="font-size: 24px;"></i>
                  </div>
                  <!--<p class="card-text">Local Transfer</p>-->
                  <text>local transfer</text>
               </div>
            </a>
         </div>
         <div class="col-4">
            <div class="card mb-2">
               <div class="card-body text-center">
                  <!-- Added text-center here -->
                  <div class="icon-box">
                     <i class="fas fa-share" style="font-size: 24px;"></i>
                  </div>
                  <!--<p class="card-text">Internal Transfer</p>-->
                  <text>internal transfer</text>
               </div>
            </div>
         </div>
      </div>
      <!-- Additional Rows can follow the same structure -->
      <div class="row fixed-row">
         <!-- First Row -->
         <div class="col-4">
            <div class="card mb-2">
               <div class="card-body text-center">
                  <!-- Added text-center here -->
                  <div class="icon-box">
                     <i class="fab fa-bitcoin fa-2x"></i>
                  </div>
                  <p class="card-text">Buy Crypto</p>
                  <!-- This will be centered -->
               </div>
            </div>
         </div>
         <div class="col-4">
            <a href="<?php echo e(route('grants')); ?>" class="card mb-2">
               <div class="card-body text-center">
                  <!-- Added text-center here -->
                  <div class="icon-box">
                     <i class="fas fa-hand-holding-usd fa-2x"></i>
                  </div>
                  <p class="card-text">Grants</p>
               </div>
            </a>
         </div>
         <div class="col-4">
            <a href="<?php echo e(route('request_money')); ?>" class="card mb-2">
               <div class="card-body text-center">
                  <!-- Added text-center here -->
                  <div class="icon-box">
                     <i class="fas fa-download fa-2x"></i>
                  </div>
                  <!--<p class="card-text">Request Money</p>-->
                  <text>request money</text>
               </div>
            </a>
         </div>
      </div>
      <div class="row fixed-row">
         <!-- First Row -->
         <div class="col-4">
            <a href="<?php echo e(route('card_deposit')); ?>" class="card mb-2">
               <div class="card-body text-center">
                  <!-- Added text-center here -->
                  <div class="icon-box">
                     <i class="fas fa-credit-card fa-2x"></i>
                  </div>
                  <p class="card-text">Card Deposit</p>
                  <!-- This will be centered -->
               </div>
            </a>
         </div>

         <div class="col-4">
            <a href="<?php echo e(route('crypto_deposit')); ?>" class="card mb-2">
               <div class="card-body text-center">
                  <!-- Added text-center here -->
                  <div class="icon-box">
                     <i class="fab fa-bitcoin fa-2x"></i>
                  </div>
                  <p class="card-text">Crypto Deposit</p>
               </div>
            </a>
         </div>

         <div class="col-4">
            <a href="<?php echo e(route('cheque_deposit')); ?>" class="card mb-2">
               <div class="card-body text-center">
                  <!-- Added text-center here -->
                  <div class="icon-box">
                     <i class="fas fa-credit-card fa-2x"></i>
                  </div>
                  <p class="card-text">cheque deposit</p>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u575956124/domains/globalunityaidfoundation.com/public_html/grant/resources/views/Userview/dashboard.blade.php ENDPATH**/ ?>