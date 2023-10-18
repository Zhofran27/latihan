@extends('layouts.app')

@section('content')
<div class="px-3 py-2 border-bottom mb-3">
    <div class="container d-flex flex-wrap justify-content-center">
        <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search" method="get" action="/">
            <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan NIS Siswa">
        </form>
        <div class="text-end">
            <a class="btn btn-primary btn-md" href="/login">Login</a>
        </div>
    </div>
</div>

<div class="container">
<h3 class="mt-4">Data Pelanggaran Siswa</h3>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>

                <th>NIS</th>
                <th>Nama</th>

                <th>Kelas</th>

                <th>Tanggal</th>
                <th>Pelanggaran</th>
        </thead>
    <tbody>
    <?php $no=1;?>
    @foreach ($data as $dt)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $dt->nis }}</td>
        <td>{{ $dt->siswa->nama }}</td>
        <td>{{ $dt->siswa->kelas }}</td>
        <td>{{ $dt->tgl_pelanggaran }}</td>
        <td>{{ $dt->isi_pelanggaran }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection