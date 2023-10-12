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
    }
    th, td {
      border: 1px solid #dddddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Daftar Guru</h1>
    <div class="school-info">
      <p>SMK DEWANTARA BEKASI</p>
      <p>2023/2024</p>
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
