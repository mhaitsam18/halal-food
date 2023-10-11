@extends('layouts.main')

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"></i>Profil</a></li>
                        <li class="breadcrumb-item"></i>Profil User Member</a></li>
                        <li class="breadcrumb-item"></i>Resto Saya</a></li>
                        <li class="breadcrumb-item"></i>Manage Resto Saya</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profil Resto</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <!-- Card Edit Resto -->
        <div class="card col-6">
            <div class="card-body">
                <h4 style="color: #670075;">Edit Profil Resto</h4>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nama Resto</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="{{$claimed_resto->Restaurant->name}}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Deskripsi Resto</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea class="form-control" id="exampleFormControlTextarea1" value="" rows="3"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Jam Buka</h6>
                    </div>
                    <div class="col-sm-4 text-secondary">
                        <div class="cs-form">
                            <input type="time" class="form-control" value="10:05 AM" />
                        </div>
                    </div>
                    -
                    <div class="col-sm-4 text-secondary">
                        <div class="cs-form">
                            <input type="time" class="form-control" value="10:05 AM" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">No.Telp Resto</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="{{$claimed_resto->Restaurant->phone_number}}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Alamat Resto</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea class="form-control" id="exampleFormControlTextarea1" value="{{$claimed_resto->Restaurant->full_address}}" rows="3">{{$claimed_resto->Restaurant->full_address}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Jenis Sertifikasi</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <div class="col-sm-12">
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Cari Lokasi...">
                            <datalist id="datalistOptions">
                                <option value="Bojongsoang">
                                <option value="Cileunyi">
                                <option value="Margahayu">
                                <option value="Banjaran">
                                <option value="Ciparay">
                                <option value="Majalaya">
                                <option value="Soreang">
                            </datalist>
                            <br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Foto Resto</h6>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Sertifikat Halal Resto</h6>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Foto Menu</h6>
                        </div>
                        <div class="container mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 text-center" id="uploadArea">
                                        <i data-feather="upload-cloud" style="color: #0072E7;"></i>
                                        <br>
                                        <label for="fileInput" class="form-label">Unggah foto menu anda baik makanan dan minuman</label>
                                        <input type="file" class="form-control" id="fileInput" multiple hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <button type="button" class="btn btn-primary" id="uploadButton">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end header wrapper-->

    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    @endsection