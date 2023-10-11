@extends('layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Laporan Review Sertifikasi</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="review_sertifikasi.html"><i class="bx bx-home-alt" style="color: #670075"></i></a>
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
                            @php
                                use Carbon\Carbon;
                            @endphp
                            <div class="row g-0">
                                <div class="col-md-4">
                                    @if ($resto->Image->first())
                                        <img src="{{ asset('/storage/images/' . $resto->Image->first()->name) }}"
                                            onerror="this.src='{{ asset('/images/' . $resto->Image->first()->name) }}'"
                                            class="card-img-top image-detail cursor-pointer" alt="..." height="400px"
                                            data-bs-toggle="modal"
                                            data-bs-target="#RestoPhoto{{ $resto->Image->first()->id }}"
                                            style="object-fit:cover;">
                                    @else
                                        <img src="{{ asset('/images/Resto-Default.jpg') }}"
                                            class="card-img-top image-detail cursor-pointer" alt="..." height="400px"
                                            style="object-fit:cover;">
                                    @endif
                                    <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                                        @foreach ($resto->image->skip(1) as $image)
                                            <div class="col">
                                                <img src="{{ asset('/storage/images/' . $image->name) }}" height="70"
                                                    width="98px" class="image-detail border cursor-pointer" alt=""
                                                    data-bs-toggle="modal" data-bs-target="#RestoPhoto{{ $image->id }}"
                                                    style="object-fit: cover">
                                            </div>
                                            <!-- Modal Lihat Others-->
                                            <div class=" modal fade" id="RestoPhoto{{ $image->id }}"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-block" style="border: none">
                                                            <div class="d-flex">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto
                                                                    Restoran
                                                                </h1><br>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('/storage/images/' . $image->name) }}"
                                                                width="100%">
                                                        </div>
                                                        <div class="modal-footer" style="border: none">
                                                            <button type="button" class="btn btn-primary mx-auto d-block"
                                                                style="width:90%;" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-5">
                                        <h2 class="card-title"><b>{{ $resto->name }}</b></h2>
                                        <div class="mb-3">
                                            <h5>{{ $resto->area->name }}</h5>
                                        </div>
                                        <div class="mb-3">
                                            <h5>
                                                <span><i data-feather="map-pin" style="color: #670075;"></i></span>
                                                {{ $resto->full_address }}
                                            </h5>
                                        </div>
                                        <div class="mb-3">
                                            <h6 style="margin-top: 2rem">
                                                <span>Nama Pemilik: </span>
                                                {{ $resto->owner_name }}
                                            </h6>
                                            <h6 style="margin-top: 2rem">
                                                <span style="font-weight: bolder;">Tanggal Pengajuan: </span>
                                                {{ ucfirst(Carbon::parse($resto->created_at)->format('d F Y')) }}
                                            </h6>
                                            <h6>
                                                <span style="font-weight: bolder;">Deadline Sertifikasi: </span>
                                                {{ ucfirst(Carbon::parse($resto->deadline)->format('d F Y')) }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="/review_saya/laporan_sertifikasi/tambah_laporan_sertifikasi" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <h6 class="mb-0">Laporan Review Sertifikasi Resto</h6>
                                <hr />

                                @php
                                    $i = 1;
                                @endphp

                                @foreach ($resto->menu as $menu)
                                    <div class="row mb-3">
                                        <div class="d-flex align-items-center mt-3">
                                            @if ($menu->type == 'Makanan')
                                                <img src="{{ asset('assets/images/makanan.png') }}" alt="" />
                                            @else
                                                <img src="{{ asset('assets/images/minuman.png') }}" alt="" />
                                            @endif
                                            <div class="flex-grow-1 ms-2">
                                                <h6 class="mb-0">{{ $menu->name }}</h6>
                                                @if ($menu->type == 'Makanan')
                                                    <p class="mb-0 text-secondary">Makanan</p>
                                                @else
                                                    <p class="mb-0 text-secondary">Minuman</p>
                                                @endif
                                            </div>
                                            <h6 class="mb-0" style="color: #202020;">Rp. {{ $menu->price }}</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pemilik" class="col-sm-3 col-form-label">Bahan Baku</label>
                                        <div class="col-sm-9">
                                            <div class="col-sm-12" style="padding-top: 12px ;">
                                                <select
                                                    class="form-control js-example-basic-multiple @error('bahan_baku') is-invalid @enderror"
                                                    multiple="multiple"
                                                    name="{{ 'newitem[' . $i . '][bahan_kritis][]' }}">
                                                    @foreach ($ingredients as $ingredient)
                                                        <option
                                                            {{ old('bahan_baku') == $ingredient->name ? 'selected' : ' ' }}
                                                            value="{{ $ingredient->name }}">
                                                            {{ $ingredient->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bahan_baku')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pemilik" class="col-sm-3 col-form-label">Bahan Olahan</label>
                                        <div class="col-sm-9">
                                            <div class="col-sm-12" style="padding-top: 12px ;">
                                                <select
                                                    class="form-control js-example-basic-multiple @error('bahan_olahan') is-invalid @enderror"
                                                    multiple="multiple"
                                                    name="{{ 'newitem[' . $i . '][bahan_olahan][]' }}">
                                                    @foreach ($ingredients as $ingredient)
                                                        <option
                                                            {{ old('bahan_olahan') == $ingredient->name ? 'selected' : ' ' }}
                                                            value="{{ $ingredient->name }}">
                                                            {{ $ingredient->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bahan_olahan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pemilik" class="col-sm-3 col-form-label">Bahan Tambahan</label>
                                        <div class="col-sm-9">
                                            <div class="col-sm-12" style="padding-top: 12px ;">
                                                <select
                                                    class="form-control js-example-basic-multiple @error('bahan_tambahan') is-invalid @enderror"
                                                    multiple="multiple"
                                                    name="{{ 'newitem[' . $i . '][bahan_tambahan][]' }}">
                                                    @foreach ($ingredients as $ingredient)
                                                        <option
                                                            {{ old('bahan_tambahan') == $ingredient->name ? 'selected' : ' ' }}
                                                            value="{{ $ingredient->name }}">
                                                            {{ $ingredient->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bahan_tambahan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pemilik" class="col-sm-3 col-form-label">Bahan Penolong</label>
                                        <div class="col-sm-9">
                                            <div class="col-sm-12" style="padding-top: 12px ;">
                                                <select
                                                    class="form-control js-example-basic-multiple @error('bahan_penolong') is-invalid @enderror"
                                                    multiple="multiple"
                                                    name="{{ 'newitem[' . $i . '][bahan_penolong][]' }}">
                                                    @foreach ($ingredients as $ingredient)
                                                        <option
                                                            {{ old('bahan_penolong') == $ingredient->name ? 'selected' : ' ' }}
                                                            value="{{ $ingredient->name }}">
                                                            {{ $ingredient->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bahan_penolong')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <input type="text" value="{{ $menu->id }}"
                                        name="{{ 'newitem[' . $i . '][menu_id]' }}">

                                    @php
                                        $i += 1;
                                    @endphp
                                @endforeach

                                <div class="row mb-3">
                                    <label for="pemilik" class="col-sm-3 col-form-label">Status Menu</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="Halal" id="flexRadioDefault1" />
                                                    <label class="form-check-label" for="flexRadioDefault1">Halal</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input @error('status_menu') is-invalid @enderror"
                                                type="radio" name="status" value="Non Halal"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1">Non Halal</label>
                                        </div>
                                    </div>
                                    @error('status_menu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="nama_makanan" class="col-sm-3 col-form-label">Alasan
                                        Halal/Non-Halal</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment"
                                            placeholder="Alasan halal atau non-halal menu"></textarea>
                                    </div>
                                    @error('comment')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <input type="text" value="{{ $resto->id }}" name="resto_id" hidden>
                                <input type="text" value="{{ $reviewer->id }}" name="reviewer_id" hidden>

                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal"
                                        data-bs-target="#confirmationModal">Kirim</button>
                                </div>

                                <!-- Modal -->
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
        </div>
    </div>
@endsection
