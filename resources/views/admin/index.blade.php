<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aplikasi siswa</title>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
@include('layouts.headadmin')
<div class="container mt-4">
    <p class="col-md-12 mb-0 text-muted">
    <h3>Selamat data Admin</h3> 
    <br>
    Silahkan Anda lakukan proses untuk administrasi data yang diperlukan untuk data pelanggaran siswa

    </p>
</div>
<div class="container border-top">

    <h3 class="mt-4">History Data Input Pelanggaran (trigger)</h3>
    @if ($data->isNotEmpty())
    <table class="table table-striped table-bordered">
    <tr>
    <th>No</th>
    <th>NIS</th>
    <th>ID_Pelanggaran</th>
    <th>Waktu</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1;?>
    @foreach ($data as $dt)
    <tr>
    <td>{{ $no++ }}</td>
    <td>{{$dt->nis}}</td>
    <td>{{$dt->id_pelanggaran}}</td>
    <td>{{$dt->tanggal}}</td>
    </tr>
    @endforeach
    </tbody>
    
    </table>
    
    </div>
    @else
    <p>Tidak ada Data</p>
    
    @endif
@include('layouts.footer')