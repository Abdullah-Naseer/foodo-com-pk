<!DOCTYPE html>
<html>
<head>
    <title>Order Status Update</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #0056b3;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }
        .email-body {
            padding: 20px;
            line-height: 1.6;
        }
        .email-body p {
            margin: 10px 0;
            font-size: 16px;
        }
        .email-body ul {
            margin: 15px 0;
            padding-left: 20px;
            font-size: 16px;
        }
        .email-body ul li {
            margin: 8px 0;
        }
        .email-footer {
            background-color: #f8f8f8;
            color: #777;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            border-top: 1px solid #e0e0e0;
        }
        .email-footer a {
            color: #0056b3;
            text-decoration: none;
        }
        .email-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            {{ $recipientType === 'admin' ? 'Admin Notification' : 'Order Status Update' }}
        </div>
        <div class="email-body">
            <p>Dear {{ $recipientType === 'admin' ? 'Admin' : $order->user->name }},</p>

            <p>The status of your order with ID <strong>#{{ $order->id }}</strong> has been updated to <strong>{{ ucfirst($order->status) }}</strong>.</p>

            @if ($recipientType === 'admin')
                <p>Order Details:</p>
                <ul>
                    <li><strong>User:</strong> {{ $order->user->name }}</li>
                    <li><strong>Email:</strong> {{ $order->user->email }}</li>
                    <li><strong>Menu Type:</strong> {{ $order->menuType->type ?? 'N/A' }}</li>
                    <li><strong>Number of Persons:</strong> {{ $order->persons }}</li>
                </ul>
            @endif

            <p>Thank you for your attention.</p>
        </div>
        <div class="email-footer">
            &copy; {{ date('Y') }} Your Foodo. All rights reserved.
        </div>
    </div>
</body>
</html>
