<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .footer {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            border-radius: 0 0 10px 10px;
            text-align: center;
        }
        .btn-primary {
            color: #ffffff;
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body style="background-color: #f4f4f4; margin: 0; padding: 0;">
    <div class="container">
        <div class="header">
            <h1>Appointment Confirmation</h1>
        </div>
        <div class="content" style="padding: 20px; line-height: 1.6;">
            <h2>Dear {{ $appointment->user->name }},</h2>
            <p>Your appointment is confirmed for <strong>{{ \Carbon\Carbon::parse($appointment->date)->format('F j, Y') }}</strong> at {{ $appointment->time }}.</p>
            <p>Contact us at <strong>0766276588</strong> for any clarification or changes on your appointment.</p>
            <p><em>Note: For any change in appointments, please contact us at least 48 hours before the scheduled time.</em></p>
            <p>Thank you!</p>
            <br>
            <p>Best Regards, <br>
                <strong>Shirona Salon</strong><br>
                Negombo</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Shirona Salon. All rights reserved.</p>
            <a href="http://127.0.0.1:8000/homepage" class="btn btn-primary">Visit Our Website</a>
        </div>
    </div>
</body>
</html>
