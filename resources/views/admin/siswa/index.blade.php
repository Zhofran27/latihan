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
      <h3 class="mt-4">Data Siswa 
        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">Tambah 
        </a>
      </h3> 
      @if ($data->isNotEmpty()) 
      <table class="table table-striped table-bordered">
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Proses Data</th>
        </tr>
        </thead>
        <?php $no=1;?> 
        <tbody> 
          @foreach($data as $dt) 
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{$dt->nis}}</td>
            <td>{{$dt->nama}}</td>
            <td>{{$dt->kelas}}</td>
            <td>
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah{{$dt->id}}"> Ubah</button>
              <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus{{$dt->id}}"> Hapus</a>
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

    <!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="create-depot-form" action="/admin/siswa" method="POST"> 
          @csrf
					<div class="row g-1">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="ns" placeholder="nis">
								<label for="floatingInputGrid">NIS</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-2">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="nm" placeholder="nama">
								<label for="floatingInputGrid">Nama</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-2">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="kls" placeholder="kelas">
								<label for="floatingInputGrid">Kelas</label>
							</div>
						</div>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script> --}}

    <!-- Modal Hapus -->
@foreach ($data as $dt)
   <div class="modal fade" id="hapus{{$dt->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
			<form action="/admin/siswa/{{$dt->id}}" method="POST"> 
        @csrf 
        @method('delete') 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak Jadi</button>
			  <button type="submit" class="btn btn-danger">Hapus!</button>
			</form>
		  </div>
		</div>
	  </div>
	</div> 

 {{-- Modal Ubah  --}}
<div class="modal fade" id="ubah{{$dt->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
		  <div class="modal-header bg-success text-white">
			<h5 class="modal-title" id="exampleModalLabel">Ubah Data Siswa</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<form id="create-depot-form" action="/admin/siswa/{{$dt->id}}" method="POST"> 
				@csrf 
				@method('PUT') 
				<input type="hidden" name="id" value="{{$dt->id}}">
			  <div class="row g-1">
				<div class="col-md">
				  <div class="form-floating">
					<input type="text" class="form-control" name="ns" value="{{$dt->nis}}">
					<label for="floatingInputGrid">NIS</label>
				  </div>
				</div>
			  </div>
			  <br>
			  <div class="row g-2">
				<div class="col-md">
				  <div class="form-floating">
					<input type="text" class="form-control" name="nama" value="{{$dt->nama}}"" >
					<label for=" floatingInputGrid">Nama</label>
				  </div>
				</div>
				</div>
			  <br>
			  <div class="row g-2">
				<div class="col-md">
				  <div class="form-floating">
					<input type="text" class="form-control" name="kelas" value="{{$dt->kelas}}">
					<label for="floatingInputGrid">Kelas</label>
				  </div>
				</div>
			  <br>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	</div> 
  @endforeach
