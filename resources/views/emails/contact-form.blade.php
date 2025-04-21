<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>

<body style="background-color: #f8f9fa; font-family: Arial, sans-serif; padding: 20px;">

    <div
        style="max-width: 600px; margin: auto; background-color: white; border-radius: 6px; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #0d6efd; border-bottom: 1px solid #dee2e6; padding-bottom: 10px;">New Contact Form Submission
        </h2>

        <p style="margin-top: 20px;">
            <strong>Name:</strong> {{ $data['name'] }}
        </p>
        <p>
            <strong>Email:</strong> {{ $data['email'] }}
        </p>
        <p>
            <strong>Phone:</strong> {{ $data['phone'] }}
        </p>
        <p>
            <strong>Message:</strong>
        </p>
        <div style="background-color: #f1f1f1; padding: 15px; border-radius: 5px;">
            {{ $data['message'] }}
        </div>

    </div>

</body>

</html>
