@extends('layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tambah Resto</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:;"><i class="bx bx-home-alt" style="color: #670075"></i></a>
                            </li>
                            <li class="breadcrumb-item active" style="color: #202020" aria-current="page">Review Saya</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-0">Keterangan Resto</h6>
                            <hr />

                            <form method="POST" action="/review_saya/edit_resto/{{ encrypt($resto->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- Nama Resto --}}
                                <div class="row mb-3">
                                    <label for="name_resto" class="col-sm-3 col-form-label">Nama Resto</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('name_resto') is-invalid @enderror"
                                            id="name_resto" name="name_resto" placeholder="Nama Resto"
                                            value="{{ $resto->name, old('name_resto') }}" />
                                        @error('name_resto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Nama Daerah --}}
                                <div class="row mb-3">
                                    <label for="area" class="col-sm-3 col-form-label">Daerah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('area') is-invalid @enderror"
                                            id="area" name="area" placeholder="Nama daerah"
                                            value="{{ $resto->area, old('area') }}" />
                                        @error('area')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Alamat Lengkap --}}
                                <div class="row mb-3">
                                    <label for="full_address" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control @error('full_address') is-invalid @enderror" id="full_address" name="full_address"
                                            cols="20" rows="8">{{ $resto->full_address, old('full_address') }}</textarea>
                                        @error('full_address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Nama Pemilik --}}
                                <div class="row mb-3">
                                    <label for="owner_name" class="col-sm-3 col-form-label">Nama Pemilik</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('owner_name') is-invalid @enderror"
                                            id="owner_name" name="owner_name" placeholder="Nama Pemilik"
                                            value="{{ $resto->owner_name, old('owner_name') }}" />
                                        @error('owner_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone_number" class="col-sm-3 col-form-label">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            id="phone_number" name="phone_number" placeholder="Nama Pemilik"
                                            value="{{ $resto->phone_number, old('phone_number') }}" />
                                        @error('phone_number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Foto Resto --}}
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-3 col-form-label">Foto Resto</label>
                                    <div class="col-sm-12">
                                        <input id="image" type="file" name="image"
                                            accept=".jpg, .png, image/jpeg, image/png" multiple data-allow-reorder="true"
                                            data-max-file-size="10MB" data-max-files="4" class="filepond" />
                                    </div>
                                    <div class="existing-files">
                                        <ul class="filepond--list image_uploaded" role="list"
                                            style="position: relative; left: 0; right: 0;">
                                        </ul>
                                    </div>
                                </div>

                                <div id="form-makanan">
                                    {{-- Menu --}}
                                    <div class="row mb-3">
                                        <label for="menu" class="col-sm-3 col-form-label">Makanan atau Minuman</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control @error('menu') is-invalid @enderror"
                                                id="menu" name="menu" placeholder="Nama Makanan"
                                                value="{{ $resto->filename_menu, old('menu') }}">
                                            <p>{{ $resto->filename_menu }}</p>
                                            @error('menu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr />

                                {{-- Deadline --}}
                                <div class="row mb-3">
                                    <label for="deadline" class="col-sm-3 col-form-label">Deadline Sertifikasi</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('deadline') is-invalid @enderror"
                                            id="deadline" name="deadline"
                                            value="{{ $resto->deadline, old('deadline') }}" />
                                        @error('deadline')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#confirmationModal">Ubah Resto</button>
                                </div>

                                {{-- Hidden Input --}}
                                <input type="text" name="resto_id" id="resto_id" value="{{ $resto->id }}"
                                    hidden>

                                <!-- Delete Image Modal -->
                                <div class="modal fade" id="deleteimageModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan
                                                    Menghapus Gambar?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="text_modal">
                                            </div>
                                            <input hidden type="text" id="image_id">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tidak</button>
                                                <button type="button" data-bs-dismiss="modal"
                                                    class="btn btn-primary deleteRecord">Ya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirmation Modal -->
                                <div class="modal fade" id="confirmationModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan
                                                    Menambah Resto?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Resto akan secara otomatis ditambah sesuai dengan input yang telah Anda
                                                lakukan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-primary">Ya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
