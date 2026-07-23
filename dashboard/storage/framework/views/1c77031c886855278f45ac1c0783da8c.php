<!DOCTYPE html>
<html>
<head>
    <title>Crypto Withdrawal Declined</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, sans-serif;">

<div style="max-width:600px; margin:40px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08); border-left:6px solid #dc3545;">

    <div style="padding:30px;">

        <!-- Logo -->
        <div style="text-align:center;">
            <img src="https://redwoodglobalbk.com/logo.png" width="140" alt="Company Logo">
        </div>

        <!-- Heading -->
        <h2 style="color:#dc3545; margin-top:25px;">Crypto Withdrawal Declined</h2>

        <!-- Greeting -->
        <p style="color:#555;">Hello <strong><?php echo e($user->fullname); ?></strong>,</p>

        <p style="color:#555; line-height:1.7;">
            Unfortunately, your recent cryptocurrency withdrawal request could not be processed.
        </p>

        <!-- Transaction Details -->
        <div style="background:#f3fff6; padding:20px; border-radius:6px; margin-top:20px;">
            <p><strong>Transaction ID:</strong> <?php echo e($transactionData->transid); ?></p>
            <p><strong>Currency:</strong> USD</p>
            <p><strong>Network:</strong> <?php echo e($transactionData->coin_type); ?></p>
            <p><strong>Amount:</strong>$<?php echo e(number_format($transactionData->amount)); ?></p>
            <p><strong>Wallet Address:</strong> ****<?php echo e(substr($transactionData->wallet_address, -6)); ?></p>
            <p><strong>Status:</strong> <span style="color:#ee170f;">Declined</span></p>
        </div>


        <p style="margin-top:20px; color:#777;">
            If you believe this was an error or need assistance, please contact our support team immediately.
        </p>

        <p style="margin-top:30px; color:#555;">
            Sincerely,<br>
            <strong>Crystal Gloabl Fin. </strong>
        </p>

    </div>

</div>

</body>
</html>
<?php /**PATH /Users/gibsonjohn/workspace/grant/resources/views/emails/crypto-withdrawal_declined.blade.php ENDPATH**/ ?>