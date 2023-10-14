<!DOCTYPE html>
<html>
<head>
    <title>Raport Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tr:hover {
            background-color: #ddd;
        }

        .header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Rapor Kelas {{$kelas->namaKelas}}</h1>
        </div>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Penilaian</th>
            </tr>
            <tbody>
                @foreach($nilaiCollection as $index => $siswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $siswa['siswa']->nama }}</td>
                    <td>{{ $siswa['rataTugas'] }}</td>
                    <td>{{ $siswa['rataUTS'] }}</td>
                    <td>{{ $siswa['rataUAS'] }}</td>
                    <td>{{ $siswa['grade'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
