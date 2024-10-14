<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lowongan Kerja PDF | BKK SIGMA</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data Lowongan Kerja BKK SIGMA SMKN 1 BOJONEGORO</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Posisi</th>
                <th>Perusahaan</th>
                <th>Lokasi</th>
                <th>Batas Lamar</th>
                <th>Penerbit</th>
                <th>Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($occupations as $occupation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $occupation->title }}</td>
                    <td>{{ $occupation->company }}</td>
                    <td>{{ $occupation->location }}</td>
                    <td>{{ $occupation->deadline }}</td>
                    <td>{{ $occupation->admin->is_partner == 0 ? 'Admin' : $occupation->admin->name }}</td>
                    <td>{{ $occupation->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

