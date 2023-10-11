@extends('layouts.main')

@section('content')

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
											<a type="button" class="btn btn-secondary"><i data-feather="edit-3"></i> Edit Profile</a>
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
								<h4 style="color: #670075;">Edit Profil User Member</h4>
								<input hidden type="text" value="{{$user->id}}" id="user_id" name="user_id">
								<form class="row" id="form" action="/profile/edit/{{Crypt::encryptString(Auth::user()->id)}}" method="post" enctype="multipart/form-data">
									@csrf
									<div class="row mb-3 mt-3">
										<div class="col-sm-3">
											<h6 class="mb-0"><b>Nama Depan</b><span class="text-danger"> *</span></h6>

										</div>
										<div class="col-sm-9 text-secondary">
											<input type="text" name="first_name" class="form-control form-input @error('first_name') is-invalid @enderror" value="{{$user->first_name}}" />
											@error('first_name')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0"><b>Nama Belakang</b><span class="text-danger"> *</span></h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input type="text" name="last_name" class="form-control form-input @error('last_name') is-invalid @enderror" value="{{$user->last_name}}" />
											@error('last_name')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0"><b>Alamat Email</b><span class="text-danger"> *</span></h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input disabled type="text" name="email" class="form-control form-input @error('email') is-invalid @enderror" value="{{$user->email}}" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0"><b>No. Hp</b></h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input name="phone_number" type="number" class="form-control" value="{{$user->phone_number}}" />
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0"><b>Alamat</b></h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<textarea name="address" class="form-control" id="exampleFormControlTextarea1" value="" rows="3">{{$user->address}}</textarea>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0"><b>Foto Profil</b></h6>
											<sub>(Foto harus dalam format gambar (JPEG, PNG, atau JPG))</sub>
										</div>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-text" style="background-color:#E1CCE3"><i data-feather="camera" style="color: #670075;"></i></span>
												<label tabindex="0" class="form-control form-input @error('profile_picture') is-invalid @enderror" for="profile-picture">
													Ubah Foto Profil
													<input name="profile_picture" id="profile-picture" type="file" class="invisible" onchange="previewImage(event)">
												</label>
												@error('profile_picture')
												<div class="invalid-feedback">
													{{ $message }}
												</div>
												@enderror
											</div>
											<img id="preview" src="#" alt="Preview">
											<p id="file-name"></p>
										</div>
									</div>
									@if (auth()->user()->role == 'user'|| auth()->user()->role == 'superadmin')
									<div class="row">
										<div class="col-sm-3"></div>
										<div class="col-sm-9 text-secondary">
											<input type="submit" class="btn btn-primary px-4" value="Simpan" />
										</div>
									</div>
								</form>
								@else
								<div class="row">
								</div>
								@endif
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
										<textarea name="experience" class="form-control">{{Auth::user()->experience}}</textarea>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"><b>Sertifikat Kompetensi Halal</b></h6>
										<sub>(Sertifikat harus dalam format gambar (JPEG, PNG, atau JPG))</sub>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<span class="input-group-text" style="background-color:#E1CCE3"><i data-feather="camera" style="color: #670075;"></i></span>
											<label tabindex="0" class="form-control form-input @error('certificate') is-invalid @enderror" for="certificate">
												Ubah File Sertifikat
												<input name="certificate" id="certificate" type="file" class="invisible" onchange="previewImageCertificate(event)">
											</label>
											@error('certificate')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
										<img id="preview-certificate" src="#" alt="Preview">
										<p id="file-name-certificate"></p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3"></div>
									<div class="col-sm-9 text-secondary">
										<input type="submit" class="btn btn-primary px-4" value="Simpan" />
									</div>
								</div>
								</form>
							</div>
						</div>
						@endif
					</div>
				</div>
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