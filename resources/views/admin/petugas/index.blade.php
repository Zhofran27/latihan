<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi siswa</title>
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> </head>

<body> 
	@include('layouts.headadmin')
	{{-- @include('layouts.flash-message') --}}
	@include('sweetalert::alert')
	<div class="container">
		<h3 class="mt-4">Data Petugas
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#regis">tambah</button>
</h3> @if ($data->isNotEmpty())
		<table class="table table-striped table-bordered">
			<tr>
				<th>No</th>
				<th>id_petugas</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Telp</th>
				<th>level</th>
				<th>Proses Data</th>
			</tr>
			</thead>
			<tbody>
				<?php $no=1;?> @foreach ($data as $dt)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{$dt->id_petugas}}</td>
						<td>{{$dt->nama}}</td>
						<td>{{$dt->username}}</td>
						<td>{{$dt->telp}}</td>
						<td>{{$dt->level}}</td>
						<td> <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
							data-bs-target="#ubah{{$dt->id}}">Ubah
						    </button> 
							<a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus{{$dt->id}}">
                            Hapus</a> 
						</td>
					</tr> @endforeach </tbody>
		</table>
	</div> {{--
	<div class="d-flex justify-content-right"> {{!! $dt->links() !!}} </div> --}} @else
	<p>Tidak ada Data</p> 
	@endif
	 

    <!-- Modal -->
<div class="modal fade" id="regis" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="exampleModalLabel">Register Petugas</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="create-depot-form" action="/admin/petugas" method="POST"> @csrf
					<div class="row g-1">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="id_pet" placeholder="id petugas">
								<label for="floatingInputGrid">ID Petugas</label>
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
						<div class="col-md">
							<div class="form-floating">
								<select class="form-select" name="lvl">
									<option selected>Pilih level user</option>
									<option value="admin">Admin</option>
									<option value="gurubk">Guru BK</option>
								</select>
								<label for="floatingSelectGrid">Level</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-2">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="usernm" placeholder="username">
								<label for="floatingInputGrid">Username</label>
							</div>
						</div>
						<div class="col-md">
							<div class="form-floating">
								<input type="password" class="form-control" name="passwd" placeholder="password">
								<label for="floatingInputGrid">Password</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row g-1">
						<div class="col-md">
							<div class="form-floating">
								<input type="text" class="form-control" name="tlp" placeholder="No. Telp/HP">
								<label for="floatingInputGrid">No Telp/HP</label>
							</div>
						</div>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs- dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<!-- Modal Hapus -->
 @foreach($data as $dt) 
 <div class="modal fade" id="hapus{{$dt->id}}" tabindex="-1" data-bs- backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
		  <div class="modal-header bg-danger text-white">
			<h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Petugas</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<h4 class="text-center">Apakah anda yakin menghapus petugas <span>
				<font color="blue">{{$dt->nama}} </font>
			  </span>
			</h4>
		  </div>
		  <div class="modal-footer">
			<form action="/admin/petugas/{{$dt->id}}" method="POST"> @csrf @method('delete') <button type="button" class="btn btn-secondary" data-bs- dismiss="modal">Tidak Jadi</button>
			  <button type="submit" class="btn btn-danger">Hapus!</button>
			</form>
		  </div>
		</div>
	  </div>
	</div> 
	@endforeach

<!-- Modal ubah --> @foreach($data as $dt) <div class="modal fade" id="ubah{{$dt->id}}" tabindex="-1" data-bs- backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
		  <div class="modal-header bg-success text-white">
			<h5 class="modal-title" id="exampleModalLabel">Ubah Data Petugas</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<form id="create-depot-form" action="/admin/petugas/{{$dt->id}}" method="POST"> @csrf @method('PUT') <input type="hidden" name="id" value="{{$dt->id}}">
			  <div class="row g-1">
				<div class="col-md">
				  <div class="form-floating">
					<input type="text" class="form-control" name="id_petugas" value="{{$dt->id_petugas}}">
					<label for="floatingInputGrid">ID Petugas</label>
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
				<div class="col-md">
				  <div class="form-floating">
					<select class="form-select" name="level">
					  <option value="{{ $dt->level }}"">
	{{ $dt->level }}
	</option>
														<hr>
															<option value=" admin">Admin</option>
					  <option value="gurubk">Guru BK</option>
					</select>
					<label for="floatingSelectGrid">Level</label>
				  </div>
				</div>
			  </div>
			  <br>
			  <div class="row g-2">
				<div class="col-md">
				  <div class="form-floating">
					<input type="text" class="form-control" name="username" value="{{$dt->username}}">
					<label for="floatingInputGrid">Username</label>
				  </div>
				</div>
				<div class="col-md">
				  <div class="form-floating">
					<input type="password" class="form-control" name="password" placeholder="password">
					<label for="floatingInputGrid">Password</label>
				  </div>
				</div>
			  </div>
			  <br>
			  <div class="row g-1">
				<div class="col-md">
				  <div class="form-floating">
					<input type="text" class="form-control" name="telp" value="{{$dt->telp}}"">
																			<label for=" floatingInputGrid">No Telp/HP</label>
				  </div>
				</div>
			  </div>
			  <br>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs- dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	</div> 
	@endforeach
@include('layouts.footer')