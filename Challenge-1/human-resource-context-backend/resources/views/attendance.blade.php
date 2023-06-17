<!DOCTYPE html>
<html>
<head>
    <title>Attendance Information</title>
    <style>
        /* Styles for the table container */
        .table-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Styles for the table */
        table {
            width: 100%;
        }

        th, td {
            background: #f2f2f2;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        /* Styles for the form */
        form {
            margin-bottom: 20px;
        }

        /* Styles for the heading */
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Attendance Information</h1>

<form method="POST" action="{{ route('attendance.upload') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Working Hours</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($attendance as $record)
            @php
                $attendances = $record->attendance;
                $rowCount = count($attendances);
            @endphp
            @if ($rowCount > 0)
                @foreach ($attendances as $index => $attendance)
                    <tr>
                        @if ($index === 0)
                            <td rowspan="{{ $rowCount }}">{{ $record->employee_name }}</td>
                        @endif
                        <td>{{ $attendance->schedule->shift->start_time ?? 'N/A' }}</td>
                        <td>{{ $attendance->schedule->shift->end_time ?? 'N/A' }}</td>
                        @if ($index === 0)
                            <td rowspan="{{ $rowCount }}">{{ $record->total_working_hours }}</td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>{{ $record->employee_name }}</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>{{ $record->total_working_hours }}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
