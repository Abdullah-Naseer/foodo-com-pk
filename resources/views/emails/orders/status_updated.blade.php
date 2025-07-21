<!DOCTYPE html>
<html>
<head>
    <title>Order Status Update</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; line-height: 1.6;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #0056b3; color: #ffffff; padding: 20px; text-align: center; font-size: 22px; font-weight: bold;">
                            {{ $recipientType === 'admin' ? 'Admin Notification' : 'Order Status Update' }}
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding: 20px;">
                            <p style="margin: 10px 0; font-size: 16px;">
                                Dear {{ $recipientType === 'admin' ? 'Admin' : $order->customer->name }},
                            </p>
                            <p style="margin: 10px 0; font-size: 16px;">
                                The status of your order with ID <strong>#{{ $order->id }}</strong> has been updated to <strong>{{ ucfirst($order->status) }}</strong>.
                            </p>
                            @if ($recipientType === 'admin')
                                <p style="margin: 10px 0; font-size: 16px;">Order Details:</p>
                                <table width="100%" cellpadding="0" cellspacing="0" style="font-size: 16px; margin: 15px 0;">
                                    <tr>
                                        <td style="padding: 5px 0;"><strong>Customer:</strong></td>
                                        <td style="padding: 5px 0;">{{ $order->customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 0;"><strong>Email:</strong></td>
                                        <td style="padding: 5px 0;">{{ $order->customer->email }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 0;"><strong>Menu Type:</strong></td>
                                        <td style="padding: 5px 0;">{{ $order->menuType->type ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 0;"><strong>Number of Persons:</strong></td>
                                        <td style="padding: 5px 0;">{{ $order->persons }}</td>
                                    </tr>
                                </table>
                            @endif
                            <p style="margin: 10px 0; font-size: 16px;">
                                Thank you for your attention.
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f8f8; color: #777; text-align: center; padding: 15px; font-size: 14px; border-top: 1px solid #e0e0e0;">
                            &copy; {{ date('Y') }} Your Foodo. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
