<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Withdrawal Approved</title>
</head>
<body style="margin:0; padding:0; background-color:#f8f9fa; font-family: Arial, sans-serif;">
  <div style="max-width:600px; margin:30px auto; background:#ffffff; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.1); overflow:hidden;">

    <!-- Header -->
    <div style="background:#007bff; color:#ffffff; padding:20px; font-size:22px; font-weight:bold; text-align:center;">
      Withdrawal Successful
    </div>

    <!-- Content -->
    <div style="padding:25px; color:#333; font-size:15px; line-height:1.6;">
      <p style="margin:0 0 15px;">Hello <strong>{{ $user->name }}</strong>,</p>
      <p style="margin:0 0 25px;">We are pleased to inform you that your withdrawal request has been <span style="color:#28a745; font-weight:bold;">approved & processed</span>.</p>

      <!-- Transaction Card -->
      <div style="border:1px solid #e0e0e0; border-radius:10px; padding:20px; background:#fdfdfd;">
        <h3 style="margin-top:0; font-size:18px; border-bottom:1px solid #eee; padding-bottom:10px; color:#007bff;">Transaction Details</h3>
        
        <table style="width:100%; border-collapse:collapse; font-size:15px;">
          <tr>
            <td style="padding:8px 5px; font-weight:bold; color:#555;">Amount</td>
            <td style="padding:8px 5px; text-align:right; font-weight:bold; color:#28a745;">
              ₹{{ number_format($payment->amount, 2) }}
            </td>
          </tr>
          <tr style="background:#fafafa;">
            <td style="padding:8px 5px; font-weight:bold; color:#555;">Remark</td>
            <td style="padding:8px 5px; text-align:right; color:#333;">
              {{ $payment->remark ?? 'N/A' }}
            </td>
          </tr>
          <tr>
            <td style="padding:8px 5px; font-weight:bold; color:#555;">UTR / Ref No.</td>
            <td style="padding:8px 5px; text-align:right; color:#333;">
              {{ $payment->utr ?? 'N/A' }}
            </td>
          </tr>
          <tr style="background:#fafafa;">
            <td style="padding:8px 5px; font-weight:bold; color:#555;">Date & Time</td>
            <td style="padding:8px 5px; text-align:right; color:#333;">
              {{ $payment->updated_at->format('d M Y, h:i A') }}
            </td>
          </tr>
        </table>
      </div>

      <p style="margin-top:25px;">Thank you for trusting <strong>{{ config('app.name') ?? 'Our Platform' }}</strong>.  
      If you face any issue regarding this transaction, please contact our support team.</p>
    </div>

    <!-- Footer -->
    <div style="margin-top:0; padding:15px; font-size:13px; color:#777; text-align:center; border-top:1px solid #eee; background:#f9f9f9;">
      &copy; {{ date('Y') }} Tic. All rights reserved.
    </div>
  </div>
</body>
</html>
