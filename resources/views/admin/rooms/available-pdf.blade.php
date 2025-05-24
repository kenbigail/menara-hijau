<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        .title {
            text-align: center;
            color: #017B48;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            margin-bottom: 20px;
        }
        .date {
            margin-bottom: 20px;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #017B48;
            color: white;
            padding: 8px;
            text-align: left;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .count-section {
            margin-top: 30px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1 class="title">{{ $title }}</h1>
    <p class="subtitle">{{ $subtitle }}</p>

    <div class="date">Exported at: {{ $date }}</div>

    <table>
        <thead>
            <tr>
                <th>Lantai</th>
                <th>Ruangan</th>
                <th>Category</th>
                <th>Corner</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->floor->num_floor ?? 'N/A' }}</td>
                <td>{{ $room->name_room }}</td>
                <td>{{ $room->categories }}</td>
                <td>{{ $room->corner ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="count-section">
        <p><strong>Room Count:</strong></p>
        <p>Ballroom: {{ $counts['ballroom'] }}</p>
        <p>Office Room: {{ $counts['office room'] }}</p>
        <p>Working Space: {{ $counts['working space'] }}</p>
        <p><strong>Total Available Rooms:</strong> {{ $counts['total'] }}</p>
    </div>
</body>
</html>
