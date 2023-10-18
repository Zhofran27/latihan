<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi siswa</title>
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> </head>

<body> 
	@include('layouts.headadmin')
	@include('layouts.flash-message')
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
						<td> <a class="btn btn-warning btn-sm" href="/admin/siswa/edit/{{$dt->id}}">
                            Ubah
                            </a> <a class="btn btn-danger btn-sm" href="/admin/siswa/delete/{{$dt->id}}">
                            Hapus</a> </td>
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
@include('layouts.footer')