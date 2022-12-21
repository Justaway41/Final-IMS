<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            color: black;
        }

        .toprow {
            background-color: #0F5288;
        }
    </style>
</head>

<body>
    <p style="color: black;">This is the todays worklog of interns of {{ $department->department_name }}</p>
    <table>
        <tr class="toprow">
            <th>
                <font color="white">Name</font>
            </th>
            <th>
                <font color="white">Work Done</font>
            </th>
            <th>
                <font color="white">Hours Worked</font>
            </th>
        </tr>
        </thead>
        <tbody>
            @foreach ($work_logs as $worklog)
            <tr>
                <td>{{ $worklog->user->full_name }}</td>
                <td>{{ $worklog->work }}</td>
                <td>{{ $worklog->hours_worked }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</body>

</html>