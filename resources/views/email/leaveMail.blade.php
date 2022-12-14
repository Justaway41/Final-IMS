<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leave Application</title>
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

        <h1>Leave Application</h1>

        <h2>Dear Manager,</h2>

        <p>
        <h3>{{ $mailData['name'] }} has requested for a {{ $mailData['total_days'] }} days leave.</h3>
        </p>

        <p>
            {{ $mailData['reason'] }}<br>
            From date: {{ $mailData['start_date'] }}<br>
            To date: {{ $mailData['end_date'] }}
        </p>

        <p>Please log into IMS to accept or decline this request.</p>
        <p>Click <a href="{{ route('login') }}" target="_blank" rel="noopener noreferrer">here</a> to login to IMS </p>
    </div>
</body>