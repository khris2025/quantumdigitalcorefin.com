<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Crystal Gloabl Fin. </title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, sans-serif;">

<div style="max-width:600px; margin:40px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08); border-left:6px solid #007bff;">

    <div style="padding:30px;">

        <!-- Logo -->
        <div style="text-align:center;">
            <img src="https://redwoodglobalbk.com/logo.png" width="140" alt="Company Logo">
        </div>

        <!-- Heading -->
        <h2 style="color:#007bff; margin-top:25px;">Welcome to Crystal Gloabl Fin. </h2>

        <!-- Greeting -->
        <p style="color:#555;">Hello <strong>{{ $user->fullname }}</strong>,</p>

        <!-- Message -->
        <p style="color:#555; line-height:1.7;">
            We are delighted to welcome you to our secure financial platform. 
            Your account has been successfully created, and you are now part of a trusted banking network designed to provide reliability, security, and seamless transactions.
        </p>

        <p style="color:#555; line-height:1.7;">
            To activate your account and begin enjoying our full range of services, please verify your email address by clicking the button below.
        </p>

        <!-- Button -->
        <div style="text-align:center; margin:30px 0;">
            <a href="{{ route('verify_email', ['token' => $token]) }}"
               style="background-color:#007bff; color:#ffffff; padding:14px 28px; text-decoration:none; border-radius:6px; font-weight:bold; display:inline-block;">
                Verify Email Address
            </a>
        </div>

        <!-- Fallback Link -->
        <p style="color:#777; font-size:14px; line-height:1.6;">
            If the button above does not work, copy and paste the link below into your browser:
        </p>

        <p style="word-break:break-all; font-size:13px; color:#007bff;">
            {{ route('verify_email', ['token' => $token]) }}
        </p>

        <!-- Security Note -->
        <p style="color:#777; font-size:14px; margin-top:20px;">
            If you did not create this account, please ignore this email or contact our support team immediately.
        </p>

        <!-- Closing -->
        <p style="margin-top:30px; color:#555;">
            We look forward to serving you.<br>
            <strong>Crystal Gloabl Fin. </strong>
        </p>

        <!-- Divider -->
        <hr style="margin:30px 0; border:none; border-top:1px solid #eee;">

        <!-- Footer -->
        <p style="font-size:13px; color:#999; text-align:center;">
            © {{ date('Y') }} Crystal Gloabl Fin. . All rights reserved.<br>
            For support, contact us at support@quantumdigitalcorefin.com
        </p>

    </div>

</div>

</body>
</html>
