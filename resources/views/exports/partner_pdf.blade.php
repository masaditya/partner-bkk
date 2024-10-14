<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner Data PDF | BKK SIGMA</title>
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
    <h1>Data Mitra Industri BKK SIGMA SMKN 1 BOJONEGORO</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Mitra Industri</th>
                <th>Alamat Email</th>
                <th>No Telp</th>
                <th>Alamat</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $partner->company_name }}</td>
                    <td>{{ $partner->companyIndustry->name }}</td>
                    <td>{{ $partner->email }}</td>
                    <td>{{ $partner->phone }}</td>
                    <td>{{ $partner->company_city }}</td>
                    <td>{{ $partner->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
