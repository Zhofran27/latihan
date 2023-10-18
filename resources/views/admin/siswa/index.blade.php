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
<div class="container">
<h3 class="mt-4">Data Siswa
<a class="btn btn-primary btn-sm" href="#">Tambah </a>
</h3>
@if ($data->isNotEmpty())
<table class="table table-striped table-bordered">
<tr>
<th>No</th>
<th>Foto</th>
<th>NIS</th>
<th>Nama</th>
<th>Kelas</th>
<th>Proses Data</th>
</tr>
</thead>
<tbody>
<?php $no=1;?>
@foreach ($data as $dt)
<tr>
<td>{{ $no++ }}</td>
<td>foto</td>
<td>{{$dt->nis}}</td>
<td>{{$dt->nama}}</td>
<td>{{$dt->kelas}}</td>
<td>
<a class="btn btn-warning btn-sm"

href="/admin/siswa/edit/{{$dt->id}}">

Ubah
</a>
<a class="btn btn-danger btn-sm"
href="/admin/siswa/delete/{{$dt->id}}">

Hapus</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
{{-- <div class="d-flex justify-content-right">

{{!! $dt->links() !!}}

</div> --}}
@else

<p>Tidak ada Data</p>

@endif
@include('layouts.footer')