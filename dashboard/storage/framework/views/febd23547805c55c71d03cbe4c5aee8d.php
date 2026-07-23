<!DOCTYPE html>
<html>
<head>
    <title>Wire Transfer Pending</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, sans-serif;">

<div style="max-width:600px; margin:40px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08);">

    <!-- Status Color Bar -->
   <div style="max-width:600px; margin:40px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08); border-left:6px solid #f4b400;">


    <div style="padding:30px; margin-left:6px;">
        <div style="text-align:center;">
            <img src="https://redwoodglobalbk.com/logo.png" width="140">
        </div>

        <h2 style="color:#f4b400; margin-top:25px;">Wire Transfer Pending</h2>

        <p style="color:#555;">Hello <strong><?php echo e($user->fullname); ?></strong>,</p>

        <p style="color:#555; line-height:1.6;">
            Your wire transfer request has been successfully received and is currently under review.
            Our finance team is processing your transaction.
        </p>

        <!-- Transaction Box -->
        <div style="background:#fafafa; padding:20px; border-radius:6px; margin-top:20px;">
            <p><strong>Transaction ID:</strong> <?php echo e($transid); ?></p>
            <p><strong>Amount:</strong> $<?php echo e(number_format($withdrawal_amount,2)); ?></p>
            <p><strong>Bank Name:</strong> <?php echo e($recipient_bank_name); ?></p>
            <p><strong>Account Name:</strong> <?php echo e($recipient_name); ?></p>
            <p><strong>Account Number:</strong> ****<?php echo e(substr($recipient_account_number, -4)); ?></p>
            <p><strong>Status:</strong> <span style="color:#f4b400;">Pending</span></p>
        </div>

        <p style="margin-top:20px; color:#777;">
            Processing time: 1–3 business days. You will receive another notification once completed.
        </p>

        <p style="margin-top:30px; color:#555;">
            Sincerely,<br>
            <strong>Crystal Gloabl Fin. </strong>
        </p>
    </div>
</div>

</body>
</html>
<?php /**PATH /Users/gibsonjohn/workspace/bank_j/resources/views/emails/wire-transfer_pending.blade.php ENDPATH**/ ?>