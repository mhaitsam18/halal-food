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
                                    <h3 class="">Masuk Akun</h3>
                                    <p>Belum punya akun? <a href="/register">Register</a></p>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" action="/login" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Alamat Email</label>
                                            <input name="email" type="email"
                                                class="form-control form-input @error('email') is-invalid @enderror"
                                                id="inputEmailAddress" value="{{ old('email') }}"
                                                placeholder="Masukkan Alamat Email" />
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Kata Sandi</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input name="password" type="password"
                                                    class="form-control border-end-0 form-input @error('password') is-invalid @enderror"
                                                    id="inputChoosePassword" value="{{ old('password') }}"
                                                    placeholder="Masukkan Kata Sandi" />
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class="bx bx-hide"></i></a>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                    name="remember" checked />
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Ingat
                                                    Saya</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-end"><a href="authentication-forgot-password.html">Lupa
                                                Kata Sandi ?</a></div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Masuk</button>
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
