<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif; color: #333; line-height: 1.5;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0"
                    style="background-color: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
                    <!-- Header Section -->
                    <tr>
                        <td align="center" style="padding-bottom: 20px;">
                            <a href="{{ config('app.url') }}" style="text-decoration: none;">
                                <img src="{{ asset('public/assets/images/logo/foodo-logo.png') }}" alt="Company Logo"
                                    style="max-width: 150px;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <h1 style="font-size: 26px; color: #4CAF50; margin: 0;">Order Confirmation</h1>
                            <p style="font-size: 16px; color: #555; margin-top: 5px;">Thank you for your order!</p>
                        </td>
                    </tr>
                  
                    <tr>
                        <td style="padding-top: 20px;">
                            <p style="font-size: 16px; color: #333;">Hello <strong>{{ $customer->name }}</strong>,</p>
                            <p style="font-size: 16px; color: #333;">Your meal plan order has been successfully placed.
                                Below are your order details:</p>
                        </td>
                    </tr>
                    <!-- Order Details -->
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
                                <tr>
                                    <td style="font-size: 16px; color: #333; padding-bottom: 10px;">
                                        <strong>Menu Type:</strong> {{ $mealPlan->menuType->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px; color: #333; padding-bottom: 10px;">
                                        <strong>Persons:</strong> {{ $mealPlan->persons }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px; color: #333; padding-bottom: 10px;">
                                        <strong>Delivery Address:</strong> {{ $mealPlan->delivery_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px; color: #333; padding-bottom: 10px;">
                                        <strong>Start Date:</strong> {{ $mealPlan->start_date }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    @if (count($mealPlan->menuItems) > 0)
                    <tr>
                        <td align="center" style="padding: 20px 0;">
                            <a href="{{ route('order.details', encrypt($mealPlan->id)) }}"
                                style="background-color: #4CAF50; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 5px; font-size: 16px;">View
                                Your Order</a>
                            </td>
                        </tr>
                        @endif

                    <tr>
                        <td align="center" style="font-size: 14px; color: #777; padding-top: 10px;">
                            &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved. |
                            <a href="{{ config('app.url') }}" style="color: #4CAF50; text-decoration: none;">{{ config('app.url') }}</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
