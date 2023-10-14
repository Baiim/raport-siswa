<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Guru</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 100%;
      max-width: 841.89px; /* A3 width in pixels */
      margin: 0 auto;
      padding: 20px;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .school-info {
      text-align: center;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    th, td {
      border: 1px solid #dddddd;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .header {
      text-align: center;
      background: #007bff;
      color: #fff;
      padding: 20px;
    }
    .logo {
      width: 100px;
      height: 100px;
    }
  </style>
</head>
<body>
  <!-- Header Section -->
  <div class="header">
    <img src="{{ asset('dist/img/logo-sekolah.png') }}" alt="School Logo" class="logo">
    <h2>SMK DEWANTARA BEKASI</h2>
  </div>

  <!-- Content Section -->
  <div class="container">
    <h1>Daftar Guru</h1>
    <div class="school-info">
      <p>Tahun Ajaran: 2023/2024</p>
    </div>
    <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Induk</th>
            <th>Nama Guru</th>
            <th>Nomor Telepon</th>
            <th>Photo</th>
          </tr>
        </thead>
        <tbody>
          @foreach($guruData as $index => $guru)
          <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $guru->nip }}</td>
              <td>{{ $guru->nama }}</td>
              <td>{{ $guru->phone }}</td>
              <td>
                <img src="{{ storage_path('app/public/' . $guru->photo) }}" alt="Photo" style="width: 80px; height: 80px;">
            </td>            
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</body>
</html>
