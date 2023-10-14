<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rapor Siswa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .school-logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .student-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .student-photo {
            max-width: 100px;
            border: 2px solid #000;
            border-radius: 50%;
        }

        .student-details {
            text-align: left;
        }

        .subject-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .subject-table th, .subject-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .subject-table th {
            background-color: #f0f0f0;
        }

        .remarks {
            margin-top: 20px;
            text-align: left;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
        }

        /* Additional Styles */
        .grade-A {
            background-color: green;
        }

        .grade-B {
            background-color: yellow;
        }

        .grade-C {
            background-color: red;
        }

        .grade-D {
            background-color: black;
        }

        .grade-F {
            background-color: #ffcccc;
        }

        .interactive-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('dist/img/logo-sekolah.png') }}" alt="School Logo" class="school-logo">
            <h1>Laporan Rapor Siswa</h1>
        </div>
        <div class="student-info">
            <h3>Nama Siswa: {{ $siswa->nama }}</h3>
            <p>NIS: {{ $siswa->nis }}</p>
            <p>Kelas: {{ $siswa->kelas->namaKelas }}</p>
            <p>Tahun Ajaran: 2023-2024</p>
        </div>
        <table class="subject-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama Pelajaran</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai UAS</th>
                    <th>Nilai UTS</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $index => $score)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $score->mapel->code }}</td>
                        <td>{{ $score->mapel->mataPelajaran }}</td>
                        <td>{{ $score->tugas }}</td>
                        <td>{{ $score->uas }}</td>
                        <td>{{ $score->uts }}</td>
                        <td>{{ $score->grade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Tanggal: {{ now()->format('d F Y') }}</p>
            <p>Tanda Tangan Guru</p>
        </div>
        <!-- Interactive Button (for demonstration) -->
    </div>
    
</body>
</html>
