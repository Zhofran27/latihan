<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi siswa</title>
    <style>
      h2 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
      }

      table {
        border-collapse: collapse;
        width: 100%;
      }

      .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
      }

      .table td {
        padding: 3px 3px;
        border: 1px solid #000000;
      }

      .text-center {
        text-align: center;
      }

      img {
        border-radius: 10%;
      }
    </style>
  </head>
  <body>
    <center>
      <h2>Data Pelanggaran Tata Tertib</h2>
    </center> @if ($data->isNotEmpty()) <table class='table'>
      <thead>
        <tr bgcolor="#b6b2b2">
          <th class="text-center">No</th>
          <th>Foto</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Tanggal</th>
          <th>Pelanggaran</th>
        </tr>
      </thead>
      <tbody> <?php $no=1;?> @foreach ($data as $dt) <tr>
          <td class="text-center">{{ $no++ }}</td>
          <td><img src="{{ public_path('foto/'.$dt->foto) }}" style="width:100px"></td>
          <td class="text-center">{{$dt->nis}}</td>
          <td>{{$dt->siswa->nama}}</td>
          <td>{{$dt->siswa->kelas}}</td>
          <td> @if ($dt->tgl_pelanggaran) {{$dt->tgl_pelanggaran}} @else N/A @endif </td>
          <td>{{$dt->isi_pelanggaran}}</td>
        </tr>
      </tbody> @endforeach
    </table> @else <p>Tidak ada Data</p> @endif <p align="right">Ttd, Guru BK <br><br><br><br> ( .............. ) </p>
  </body>
</html>