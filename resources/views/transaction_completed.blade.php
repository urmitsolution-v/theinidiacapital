<!DOCTYPE html>
<html lang="en" style="margin:0; padding:0;">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Transaction Successful</title>
    <!-- Preheader (hidden preview text in inbox) -->
    <meta name="x-preheader" content="Your payment was successful. Receipt and transaction details inside.">
  </head>
  <body style="margin:0; padding:0; background-color:#f4f6f8;">
    <center style="width:100%; background-color:#f4f6f8;">
      <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width:640px; margin:0 auto;">
        <tr>
          <td style="padding:24px 16px;">
            <!-- Card -->
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:separate; background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 14px rgba(0,0,0,0.08);">
              <!-- Header / Brand Bar -->
              <tr>
                <td style="background:#0b5ed7; padding:18px 24px;">
                  <table role="presentation" width="100%">
                    <tr>
                      <td style="font-family:Arial,Helvetica,sans-serif; font-size:18px; font-weight:bold; color:#ffffff; letter-spacing:0.2px;">
                        {{ config('app.name') ?? 'Your Company' }}
                      </td>
                      <td align="right" style="font-family:Arial,Helvetica,sans-serif; font-size:14px; color:#cfe2ff;">
                        Transaction Receipt
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- Success Banner -->
              <tr>
                <td style="padding:20px 24px 8px 24px; text-align:center;">
                  <span style="display:inline-block; background:#e8f5e9; color:#1e7e34; font-family:Arial,Helvetica,sans-serif; font-size:12px; font-weight:bold; letter-spacing:0.5px; text-transform:uppercase; padding:8px 12px; border-radius:999px;">
                    Transaction Successful
                  </span>
                </td>
              </tr>

              <!-- Greeting + Summary line -->
              <tr>
                <td style="padding:8px 24px 0 24px; font-family:Arial,Helvetica,sans-serif; color:#111827;">
                  <h2 style="margin:12px 0 8px 0; font-size:20px; line-height:1.35; font-weight:700;">Hello {{ $user->name ?? 'Customer' }},</h2>
                  <p style="margin:0 0 14px 0; font-size:14px; line-height:1.7; color:#374151;">
                    We’re happy to confirm that your payment has been processed successfully. Below is a quick summary of your transaction.
                  </p>
                </td>
              </tr>

              <!-- Amount highlight -->
              <tr>
                <td style="padding:0 24px 8px 24px;">
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #eef2f7; border-radius:10px;">
                    <tr>
                      <td style="padding:14px 16px; font-family:Arial,Helvetica,sans-serif;">
                        <div style="font-size:12px; color:#6b7280; text-transform:uppercase; letter-spacing:0.4px; margin-bottom:4px;">Amount Paid</div>
                        <div style="font-size:22px; font-weight:800; color:#0b5ed7;">
                          ₹{{ number_format((float)($payment->amount ?? ($paymetn->amount ?? 0)), 2) }}
                        </div>
                      </td>
                      <td align="right" style="padding:14px 16px; font-family:Arial,Helvetica,sans-serif;">
                        <div style="font-size:12px; color:#6b7280; text-transform:uppercase; letter-spacing:0.4px; margin-bottom:4px;">Status</div>
                        <div style="font-size:14px; font-weight:700; color:#1e7e34;">Success</div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- Details table -->
              <tr>
                <td style="padding:8px 24px 0 24px;">
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                    <tr>
                      <td style="padding:10px 0; font-family:Arial,Helvetica,sans-serif; font-size:14px; color:#374151; width:40%;">Transaction ID</td>
                      <td style="padding:10px 0; font-family:Arial,Helvetica,sans-serif; font-size:14px; color:#111827; font-weight:600;">
                        {{ $payment->transaction_id ?? $payment->txn_id ?? $paymetn->transaction_id ?? '—' }}
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:10px 0; font-family:Arial,Helvetica,sans-serif; font-size:14px; color:#374151;">Date &amp; Time</td>
                      <td style="padding:10px 0; font-family:Arial,Helvetica,sans-serif; font-size:14px; color:#111827; font-weight:600;">
                        {{ ($payment->created_at ?? $paymetn->created_at ?? now())->timezone(config('app.timezone','Asia/Kolkata'))->format('d M Y, h:i A') }}
                      </td>
                    </tr>
                    
                    <tr>
                      <td style="padding:10px 0; font-family:Arial,Helvetica,sans-serif; font-size:14px; color:#374151;">Description</td>
                      <td style="padding:10px 0; font-family:Arial,Helvetica,sans-serif; font-size:14px; color:#111827;">
                        {{ $payment->description ?? $paymetn->description ?? 'Payment received' }}
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- CTA -->
             