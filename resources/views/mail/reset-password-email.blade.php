<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">

        </div>
        <div class="content">
            <p>Dear User,</p>
            <p>To ensure the security of your account, please use the following One-Time Password (OTP) to complete your verification process.</p>
            <p class="otp">Your OTP is: {{$otp}}</p>

            <p>If you did not request this OTP or have any concerns regarding your account’s security, please contact our support team immediately at <a href="tel:[+8801628224514]">Whatsapp</a>.</p>
            <p>Thank you for your attention to this important security measure.</p>
            <p>Best regards,<br>

        </div>

    </div>
</body>
</html>

