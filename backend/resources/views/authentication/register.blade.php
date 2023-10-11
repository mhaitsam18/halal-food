@extends('layouts.main')

@section('content')
<div class="wrapper">
    <div class="authentication-header"></div>
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="card mt-5 mt-lg-0">
                        <div class="card-body">
                            <div class="p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Register Akun</h3>
                                    <p>
                                        Sudah punya akun?
                                        <a href="/login">Masuk</a>
                                    </p>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" action="/register/create-new-user" method="post">
                                        @csrf
                                        <input type="text" id="role" name="role" value="user" hidden>
                                        <input type="text" id="profile_picture" name="profile_picture"
                                            value="avatar-1.png" hidden>
                                        <div class="col-sm-12">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                id="username" placeholder="Masukkan username" name="username"
                                                value="{{ old('username') }}" />
                                            @error('username')
                                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="inputFirstName" class="form-label">Nama Depan</label>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="inputFirstName" placeholder="Masukkan nama depan" name="first_name"
                                                value="{{ old('first_name') }}" />
                                            @error('first_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="inputLastName" class="form-label">Nama Belakang</label>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                id="inputLastName" placeholder="Masukkan nama belakang" name="last_name"
                                                value="{{ old('last_name') }}" />
                                            @error('last_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Alamat Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmailAddress" placeholder="Masukkan Alamat Email"
                                                name="email" value="{{ old('email') }}" />
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Kata Sandi</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="inputChoosePassword" placeholder="Masukkan Kata Sandi"
                                                    name="password" />
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class="bx bx-hide"></i></a>
                                                <div class="text-secondary">Minimal 8 karakter kombinasi huruf besar, huruf kecil, dan angka.</div>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Konfirmasi Kata
                                                Sandi</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password"
                                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                                    id="inputChoosePassword"
                                                    placeholder="Masukkan Konfirmasi Kata Sandi"
                                                    name="confirm_password" />
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class="bx bx-hide"></i></a>
                                                @error('confirm_password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">
                                                    Sign up
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
