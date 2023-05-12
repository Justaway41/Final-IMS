<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leave Status</title>
    <style>
        body {
            /* max-width: 100%; */
            max-height: fit-content;
        }

        .logo img {
            padding: 2px 10px;
            height: 40px;
        }

        .text {
            color: #172d4b;
        }

        h1 {
            margin: auto;
            text-align: center;
        }
    </style>
</head>

<body>


    <div class="text">

        <h1>Leave Status</h1>

        <p>
        <h3>Dear {{ $mailStatus['name'] }},</h3>
        </p>

        <p>
            Your leave request for {{ $mailStatus['total_days'] }} days
            {{ $mailStatus['status'] == 'rejected' ? 'is declined. Please contact your manager for further details.' : 'is accepted.' }}
        </p>

        <p>Regards,<br>
            Intern Manager</p>
</body>
