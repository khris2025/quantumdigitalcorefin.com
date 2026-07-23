<!DOCTYPE html>
<html>
<head>
    <title>Crypto Withdrawal Approved</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, sans-serif;">

<div style="max-width:600px; margin:40px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08); border-left:6px solid #28a745;">

    <div style="padding:30px;">

        <!-- Logo -->
        <div style="text-align:center;">
            <img src="https://redwoodglobalbk.com/logo.png" width="140" alt="Company Logo">
        </div>

        <!-- Heading -->
        <h2 style="color:#28a745; margin-top:25px;">Crypto Withdrawal Approved</h2>

        <!-- Greeting -->
        <p style="color:#555;">Hello <strong><?php echo e($user->fullname); ?></strong>,</p>

        <p style="color:#555; line-height:1.7;">
            We are pleased to inform you that your cryptocurrency withdrawal request has been successfully approved and processed.
        </p>

        <!-- Transaction Details -->
        <div style="background:#f3fff6; padding:20px; border-radius:6px; margin-top:20px;">
            <p><strong>Transaction ID:</strong> <?php echo e($transactionData->transid); ?></p>
            <p><strong>Currency:</strong> USD</p>
            <p><strong>Network:</strong> <?php echo e($transactionData->coin_type); ?></p>
            <p><strong>Amount:</strong>$<?php echo e(number_format($transactionData->amount)); ?></p>
            <p><strong>Wallet Address:</strong> ****<?php echo e(substr($transactionData->wallet_address, -6)); ?></p>
            <p><strong>Status:</strong> <span style="color:#28a745;">Approved</span></p>
        </div>

        <p style="margin-top:20px; color:#777;">
            The transaction has been submitted to the blockchain network. 
            Please allow time for confirmations depending on network congestion.
        </p>

        <p style="margin-top:30px; color:#555;">
            Thank you for choosing us for your digital asset transactions.<br>
            <strong>Crystal Gloabl Fin. </strong>
        </p>

    </div>

</div>

</body>
</html>
<?php /**PATH /Users/gibsonjohn/workspace/grant/resources/views/emails/crypto-withdrawal_confirmed.blade.php ENDPATH**/ ?>