<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your OTP Code</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">
  <div style="max-width:600px; margin:20px auto; background:#ffffff; border-radius:12px; box-shadow:0 4px 14px rgba(0,0,0,0.08); overflow:hidden;">
    
    <!-- Header -->
    <div style="background:#0b5ed7; color:#ffffff; padding:18px 24px; font-size:18px; font-weight:bold;">
      Your OTP Code
    </div>

    <!-- Content -->
    <div style="padding:24px; font-size:15px; color:#374151; line-height:1.6;">
      <p style="margin:0 0 14px 0;">Hello {{ $user ?? 'User' }},</p>
      <p style="margin:0 0 20px 0;">
        We received a request for Withdraw Request.<br>
        Please use the following One-Time Password (OTP) to proceed:
      </p>

      <!-- OTP Box -->
      <div style="margin:20px auto; padding:15px 20px; border:2px dashed #0b5ed7; border-radius:8px; font-size:24px; font-weight:bold; color:#0b5ed7; text-align:center; letter-spacing:3px; max-width:300px;">
        {{ $otp }}
      </div>

      <p style="margin:20px 0 0 0;">
        This OTP is valid for <strong>10 minutes</strong>.<br>
        Please do not share it with anyone for security reasons.
      </p>
    </div>

    <!-- Footer -->
    <div style="padding:16px 24px; font-size:13px; color:#6b7280; text-align:center; border-top:1px solid #eef2f7;">
      © {{ date('Y') }} {{ config('app.name') ?? 'Your Company' }}. All rights reserved.
    </div>
  </div>
</body>
</html>
