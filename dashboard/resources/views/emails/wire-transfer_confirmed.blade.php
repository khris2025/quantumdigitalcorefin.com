<!DOCTYPE html>
<html>
<head>
    <title>Wire Transfer Approved</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, sans-serif;">

<div style="max-width:600px; margin:40px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08); border-left:6px solid #28a745;">

    <div style="padding:30px;">
        <div style="text-align:center;">
            <img src="https://redwoodglobalbk.com/logo.png" width="140">
        </div>

        <h2 style="color:#28a745; margin-top:25px;">Transfer Approved</h2>

        <p style="color:#555;">Hello <strong>{{ $user->fullname }}</strong>,</p>

        <p style="color:#555; line-height:1.6;">
            We are pleased to inform you that your  transfer request has been successfully approved and processed.
        </p>

        <div style="background:#f3fff6; padding:20px; border-radius:6px; margin-top:20px;">
            <p><strong>Transaction ID:</strong> {{ $withdrawal->transid }}</p>
            <p><strong>Amount Sent:</strong> ${{ number_format($withdrawal->amount,2) }}</p>
            <p><strong>Status:</strong> <span style="color:#28a745;">Approved</span></p>
        </div>

        <p style="margin-top:20px; color:#777;">
            Funds should reflect in the recipient's account within 1–5 business days depending on the receiving bank.
        </p>

        <p style="margin-top:30px; color:#555;">
            Thank you for banking with us.<br>
            <strong>Crystal Gloabl Fin. </strong>
        </p>
    </div>

</div>

</body>
</html>
