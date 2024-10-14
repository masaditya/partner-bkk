<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelamar PDF | BKK SIGMA</title>
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
    <h1>Data Pelamar BKK SIGMA SMKN 1 BOJONEGORO</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Tahun Lulus</th>
                <th>Jurusan</th>
                <th>Status Alumni</th>
                <th>No. Telepon</th>
                <th>Posisi Lowongan</th>
                <th>Perusahaan Lowongan</th>
                <th>Lokasi Lowongan</th>
                <th>Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applicants as $applicant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $applicant->user->name }}</td>
                    <td>{{ $applicant->user->email }}</td>
                    <td>{{ $applicant->user->gender == 'male' ? 'Laki - Laki' : 'Perempuan' }}</td>
                    <td>{{ $applicant->user->graduation_year }}</td>
                    <td>{{ $applicant->user->major->name }}</td>
                    <td>{{ $applicant->user->is_alumni ? 'Alumni' : 'Umum' }}</td>
                    <td>{{ $applicant->user->phone }}</td>
                    <td>{{ $applicant->occupation->title }}</td>
                    <td>{{ $applicant->occupation->company }}</td>
                    <td>{{ $applicant->occupation->location }}</td>
                    <td>{{ $applicant->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

