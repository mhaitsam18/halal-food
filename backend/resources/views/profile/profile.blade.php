@extends('layouts.main')

@section('content')
@include('layouts.flash-message')

@if (Auth::check())
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">User Profile</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>Beranda</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Profil User Member</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->
		<div class="container">
			<div class="main-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-row-reverse">
									<button type="button" class="btn btn-outline-danger">Hapus Akun</button>
								</div>
								<div class="d-flex flex-column align-items-center text-center">
									<div class="image-container">
										<img src="{{ asset('storage/images/' . Auth::user()->profile_picture) }}" onerror="this.src='{{asset('/images/' . Auth::user()->profile_picture)}}'" class="rounded-circle p-1 bg-primary" width="110">
									</div>
									<div class="mt-3">
										<h4>{{Auth::user()->first_name . " " . Auth::user()->last_name}}</h4>
										<p class="text-secondary mb-1">{{Auth::user()->username}}</p>
										<div>
											<a href="/profile/edit/{{Crypt::encryptString(Auth::user()->id)}}" type="button" class="btn btn-primary"><i data-feather="edit-3"></i> Edit Profile</a>
											<!-- <a href="/profile/edit/{{md5(Auth::user()->id)}}" type="button" class="btn btn-primary"><i data-feather="edit-3"></i> Edit Profile</a> -->
											@if (auth()->user()->role == 'user')
											<button class="btn btn-success">User Member</button>
											@elseif (auth()->user()->role == 'kontributor')
											<button class="btn btn-info">Kontributor</button>
											@else
											<button class="btn btn-warning">Super Admin</button>
											@endif
										</div>
									</div>

								</div>
								<hr class="my-4" />
								<ul class="list-group list-group-flush">
									@if($claim->where('status', 'Disetujui')->where('user_id', auth()->id())->count() > 0)
									<li class="list-group-item">
										<a href="/my-resto" class="d-flex justify-content-between align-items-center flex-wrap">
											<i data-feather="shopping-bag" style="color: #670075;"></i></span>
											<h6>Kelola Resto Saya</h6>
											<i data-feather="chevron-right" style="color:#670075"></i>
										</a>
									</li>
									@else
									<li class="list-group-item">
										<a href="/restaurant" class="d-flex justify-content-between align-items-center flex-wrap">
											<i data-feather="shopping-bag" style="color: #670075;"></i></span>
											<h6>Cari Resto saya</h6>
											<i data-feather="chevron-right" style="color:#670075"></i>
										</a>
									</li>
									@endif
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<i data-feather="users" style="color:#670075"></i></span>
										<h6>Kontributor</h6>
										<i data-feather="chevron-right" style="color:#670075"></i>
									</li>
									<li class="list-group-item">
										<a href="/profile/edit-password/{{Crypt::encryptString(Auth::user()->id)}}" class="d-flex justify-content-between align-items-center flex-wrap">
											<i data-feather="shield" style="color:#670075"></i></span>
											<h6>Ganti Kata Sandi</h6>
											<i data-feather="chevron-right" style="color:#670075"></i>
										</a>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">
										<i data-feather="log-out" style="color: #670075;"></i></span>
										<h6>Keluar</h6>
										<i data-feather="chevron-right" style="color:#670075"></i>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar?</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									Dengan keluar anda memutus akses pada halalfood website
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
									<form name="logout" action="/logout" method="post">
										@csrf
										<button type="submit" class="btn btn-primary">Ya</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<h4 style="color: #670075;">Profil User Member</h4>
								<div class="row mb-3 mt-4">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>Nama Depan</b></h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" disabled class="form-control" value="{{Auth::user()->first_name}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>Nama Belakang</b></h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" disabled class="form-control" value="{{Auth::user()->last_name}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>Alamat Email</b></h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" disabled class="form-control" value="{{Auth::user()->email}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>No. Hp</b></h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" disabled class="form-control" value="{{Auth::user()->phone_number}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>Alamat</b></h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<textarea class="form-control" disabled id="exampleFormControlTextarea1" value="" rows="3">{{Auth::user()->address}}</textarea>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>Foto Profil</b></h6>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<span class="input-group-text" style="background-color:#E1CCE3"><i data-feather="camera" style="color: #670075;"></i></span>
											<label tabindex="0" id="label-pp" class="form-control" for="profile-picture">
												{{Auth::user()->profile_picture}}
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						@if (auth()->user()->role == 'kontributor')
						<div class="card">
							<div class="card-body">
								<h4 style="color: #670075;">Profil Kontributor</h4>
								<div class="row mb-3 mt-4">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>Nama Kontributor</b></h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<input type="text" disabled class="form-control" value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>Pengalaman</b></h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<textarea disabled class="form-control">{{Auth::user()->experience}}</textarea>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>Sertifikat Kompetensi Halal</b></h6>
										<sub class="text-primary" style="cursor:pointer"><a data-bs-toggle="modal" data-bs-target="#certificate">Lihat Sertifikat </a></sub>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<span class="input-group-text" style="background-color:#E1CCE3"><i data-feather="camera" style="color: #670075;"></i></span>
											<label tabindex="0" id="label-pp" class="form-control" for="profile-picture">
												{{Auth::user()->certificate}}
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="certificate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sertifikat Kompetensi Halal</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img width=100% src="{{ asset('storage/certificate/' . Auth::user()->certificate) }}" onerror="this.src='{{asset('/images/' . Auth::user()->profile_picture)}}'">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
@endif
@endsection