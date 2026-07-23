<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Grant Declined</title>
</head>
<body style="background-color:#f3f4f6; font-family: Arial, sans-serif; margin:0; padding:0;">

  <table 
    cellpadding="0" 
    cellspacing="0" 
    width="100%" 
    style="max-width:600px; margin:40px auto; background-color:#ffffff; border-radius:12px; box-shadow:0 4px 8px rgba(0,0,0,0.1); padding:24px;"
  >
    <tr>
      <td style="text-align:center; padding-bottom:24px;">
        <h1 style="font-size:28px; font-weight:bold; color:#dc2626; margin:0;">
          Grant Declined ❌
        </h1>
      </td>
    </tr>

    <tr>
      <td style="color:#1f2937; font-size:18px; padding-bottom:16px;">
        <p style="margin:0;">Hi <strong><?php echo e($user->name); ?></strong>,</p>
      </td>
    </tr>

    <tr>
      <td style="color:#4b5563; font-size:16px; padding-bottom:24px; line-height:1.5;">
        <p style="margin:0 0 8px 0;">
          We regret to inform you that your grant request has been 
          <span style="font-weight:600; color:#dc2626;">declined</span>.
        </p>
        <p style="margin:0 0 4px 0;">
          Please contact support if you have any questions or require further assistance.
        </p>
      </td>
    </tr>

    <tr>
      <td style="color:#6b7280; font-size:14px; border-top:1px solid #e5e7eb; padding-top:16px;">
        Best regards,<br />
        <span style="font-weight:600;">Digital Truepath Alliance</span>
      </td>
    </tr>
  </table>

</body>
</html>
<?php /**PATH /home/u575956124/domains/globalunityaidfoundation.com/public_html/grant/resources/views/emails/grant_declined.blade.php ENDPATH**/ ?>