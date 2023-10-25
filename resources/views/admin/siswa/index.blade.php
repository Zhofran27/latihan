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
     @include('sweetalert::alert')
     <div class="container">
      <h3 class="mt-4">Data Siswa <a class="btn btn-primary btn-sm" href="#">Tambah </a></h3> @if ($data->isNotEmpty()) <table class="table table-striped table-bordered">
        <tr>
          <th>No</th>
          <th>Foto</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Proses Data</th>
        </tr>
        </thead>
        <tbody> <?php $no=1;?> @foreach ($data as $dt) <tr>
            <td>{{ $no++ }}</td>
            <td>foto</td>
            <td>{{$dt->nis}}</td>
            <td>{{$dt->nama}}</td>
            <td>{{$dt->kelas}}</td>
            <td><a class="btn btn-warning btn-sm" href="/admin/siswa/edit/{{$dt->id}}"> Ubah </a>
                <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus{{$dt->id}}"> Hapus</a></td>
          </tr> @endforeach </tbody>
      </table>
    </div>
    {{-- <div class="d-flex justify-content-right">

{{!! $dt->links() !!}}
    </div> --}} 
    @else 
    <p>Tidak ada Data</p> 
    @endif 

    <!-- Modal Hapus -->
 @foreach($data as $dt) 
 <div class="modal fade" id="hapus{{$dt->id}}" tabindex="-1" data-bs- backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
		  <div class="modal-header bg-danger text-white">
			<h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Siswa</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<h4 class="text-center">Apakah anda yakin menghapus petugas <span>
				<font color="blue">{{$dt->nama}} </font>
			  </span>
			</h4>
		  </div>
		  <div class="modal-footer">
			<form action="/admin/siswa/{{$dt->id}}" method="POST"> @csrf @method('delete') <button type="button" class="btn btn-secondary" data-bs- dismiss="modal">Tidak Jadi</button>
			  <button type="submit" class="btn btn-danger">Hapus!</button>
			</form>
		  </div>
		</div>
	  </div>
	</div> 
	@endforeach

    @include('layouts.footer')