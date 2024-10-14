<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User PDF | BKK SIGMA</title>
    
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
    <h1>Data User BKK SIGMA SMKN 1 BOJONEGORO</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>NIS</th>
                <th>Gender</th>
                <th>Tahun Lulus</th>
                <th>Jurusan</th>
                <th>Status Alumni</th>
                <th>Perusahaan</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>No. Telp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->NIS }}</td>
                    <td>{{ $user->gender == 'male' ? 'Laki - Laki' : 'Perempuan' }}</td>
                    <td>{{ $user->graduation_year }}</td>
                    <td>{{ optional($user->major)->name ?? '-' }}</td>
                    <td>{{ $user->is_alumni ? 'Alumni' : 'Umum' }}</td>
                    <td>{{ $user->company }}</td>
                    <td>{{ $user->position }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table></body>
</html>

