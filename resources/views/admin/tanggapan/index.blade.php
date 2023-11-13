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
      <h3 class="mt-4">Data Tanggapan 
        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</a>
    </h3> @if ($data->isNotEmpty()) 
    <table class="table table-striped table-bordered">
        <tr>
          <th>No</th>
          <th>id_tanggapan</th>
          <th>id_pelanggaran</th>
          <th>id_petugas</th>
          <th>Tanggal</th>
          <th>Isi Tanggapan</th>
          <th>Proses Data</th>
        </tr>
        </thead>
        <tbody> <?php $no=1;?> @foreach ($data as $dt) <tr>
            <td>{{ $no++ }}</td>
            <td>{{$dt->id_tanggapan}}</td>
            <td>{{$dt->id_pelanggaran}}</td>
            <td>{{$dt->id_petugas}}</td>
            <td>{{$dt->tgl_tanggapan}}</td>
            <td>{{$dt->isi_tanggapan}}</td>
            <td>
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah{{$dt->id}}"> Ubah</button>
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus{{$dt->id}}"> hapus</button>
          </tr> 
		  @endforeach 
		</tbody>
      </table>
    </div>
    {{-- <div class="d-flex justify-content-right">

{{!! $dt->links() !!}}
    </div> --}}
     @else
      <p>Tidak ada Data
        </p> 
        
        @endif


        <!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Tanggapan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="create-depot-form" action="/admin/tanggapan" method="POST"> 
                @csrf
					<div class="row g-1">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="id_tang" placeholder="id tanggapan">
								<label for="floatingInputGrid">ID Tanggapan</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-2">
						<div class="col-md">
							<div class="form-floating">
								<select class="form-select" name="id_pel">
									<option selected>ID Pelanggaran</option>
									@foreach ($datapel as $pel)
									<option value="{{ $pel->id_pelanggaran }}">{{ $pel->id_pelanggaran }}</option>
									@endforeach
								</select>
								<label for="floatingInputGrid">ID Pelanggaran</label>
							</div>
						</div>
                        <div class="col-md">
							<div class="form-floating">
								<select class="form-select" name="id_pet">
									<option selected>ID Petugas</option>
									@foreach ($datapet as $pet)
									<option value="{{ $pet->id_petugas }}">{{ $pet->id_petugas }}</option>
									@endforeach
								</select>
								<label for="floatingInputGrid">ID Petugas</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-2">
						<div class="col-md">
							<div class="form-floating">
								<input type="date" class="form-control" name="tgl_tang" placeholder="Tanggal Pelanggaran">
								<label for="floatingInputGrid">Tanggal Tanggapan</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-1">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="isi_tang" placeholder="isi tanggapan">
								<label for="floatingInp++utGrid">Isi Tanggapan</label>
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

{{-- modal hapus --}}
@foreach($data as $dt)
<div class="modal fade" id="hapus{{$dt->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
		  <div class="modal-header bg-danger text-white">
			<h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Tanggapan</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<h4 class="text-center">Apakah anda yakin menghapus petugas <span>
				<font color="blue">{{$dt->nama}} </font>
			  </span>
			</h4>
		  </div>
		  <div class="modal-footer">
			<form action="/admin/tanggapan/{{$dt->id}}" method="POST"> 
		@csrf 
		@method('delete') 
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak Jadi</button>
			  <button type="submit" class="btn btn-danger">Hapus!</button>
			</form>
		  </div>
		</div>
	  </div>
	</div> 
	@endforeach

	<!-- Modal Ubah-->
	@foreach($data as $dt) 
<div class="modal fade" id="ubah{{$dt->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Data Tanggapan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="create-depot-form" action="/admin/tanggapan/{{$dt->id}}" method="POST"> 
                @csrf
				@method('PUT') 
				<input type="hidden" name="id" value="{{$dt->id}}">
					<div class="row g-1">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="id_tang" value="{{$dt->id_tanggapan}}">
								<label for="floatingInputGrid">ID Tanggapan</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-2">
						<div class="col-md">
							<div class="form-floating">
								<select class="form-select" name="id_pel" value="{{$dt->pelanggaran}}">
									<option selected>ID Pelanggaran</option>
									@foreach ($datapel as $pel)
									<option value="{{ $pel->id_pelanggaran }}">{{ $pel->id_pelanggaran }}</option>
									@endforeach
								</select>
								<label for="floatingInputGrid">ID Pelanggaran</label>
							</div>
						</div>
                        <div class="col-md">
							<div class="form-floating">
								<select class="form-select" name="id_pet" value="{{$dt->id_petugas}}">
									<option selected>ID Petugas</option>
									@foreach ($datapet as $pet)
									<option value="{{ $pet->id_petugas }}">{{ $pet->id_petugas }}</option>
									@endforeach
								</select>
								<label for="floatingInputGrid">ID Petugas</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-2">
						<div class="col-md">
							<div class="form-floating">
								<input type="date" class="form-control" name="tgl_tang" value="{{$dt->tgl_tanggapan}}">
								<label for="floatingInputGrid">Tanggal Tanggapan</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-1">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="isi_tang" value="{{$dt->isi_tanggapan}}">
								<label for="floatingInp++utGrid">Isi Tanggapan</label>
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
@endforeach

         @include('layouts.footer')