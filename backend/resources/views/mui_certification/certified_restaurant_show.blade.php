@extends('layouts.main')

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Detail Resto</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="review_sertifikasi.html"><i class="bx bx-home-alt" style="color: #670075"></i></a>
                        </li>
                        <li class="breadcrumb-item active" style="color: #202020" aria-current="page">Restoran Tersertifikasi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if ($images->first())
                                <img src="{{ asset('/storage/images/' .  $images->first()->name) }}" onerror="this.src='{{ asset('/images/' .  $images->first()->name) }}'" class="card-img-top image-detail cursor-pointer" alt="..." height="400px" data-bs-toggle="modal" data-bs-target="#RestoPhoto{{  $images->first()->name }}" style="object-fit:cover;">
                                <!-- Modal Lihat Main -->
                                <div class=" modal fade" id="RestoPhoto{{ $images->first()->name }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header d-block" style="border: none">
                                                <div class="d-flex">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Foto
                                                        Restoran</h1>
                                                    <br>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('/storage/images/' . $image->name) }}" width="100%">
                                            </div>
                                            <div class="modal-footer" style="border: none">
                                                <button type="button" class="btn btn-primary mx-auto d-block" style="width:90%;" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <img src="{{ asset('/images/Resto-Default.jpg') }}" class="card-img-top image-detail cursor-pointer" alt="..." height="400px" style="object-fit:cover;">
                                @endif
                                <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                                    @foreach ($images->skip(1) as $image)
                                    <div class="col">
                                        <img src="{{ asset('/storage/images/' . $image->name) }}" height="70" width="98px" class="image-detail border cursor-pointer" alt="" data-bs-toggle="modal" data-bs-target="#RestoPhoto{{ $image->id }}" style="object-fit: cover">
                                    </div>
                                    <!-- Modal Lihat Others-->
                                    <div class=" modal fade" id="RestoPhoto{{ $image->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header d-block" style="border: none">
                                                    <div class="d-flex">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Foto
                                                            Restoran
                                                        </h1><br>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('/storage/images/' . $image->name) }}" width="100%">
                                                </div>
                                                <div class="modal-footer" style="border: none">
                                                    <button type="button" class="btn btn-primary mx-auto d-block" style="width:90%;" data-bs-dismiss="modal">Tutup</button>
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
                                            <span style="font-weight: bolder;">Nomor Sertifikat Halal: </span>
                                            {{ $resto->RestaurantHalalCertificate->certificate_number }}
                                        </h6>
                                        <h6>
                                            <span style="font-weight: bolder;">Tanggal Dikeluarkan: </span>
                                            {{ $resto->RestaurantHalalCertificate->issued_date }}
                                        </h6>
                                        <h6>
                                            <span style="font-weight: bolder;">Tanggal Kedaluwarsa: </span>
                                            {{ $resto->RestaurantHalalCertificate->expired_date }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body border" style="margin: 2rem">
                        <h5 class="mb-0">Keterangan Menu</h5>
                        <hr />
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
                                <h6 class="mb-0" style="color: #202020; text-align: left; width: 5rem">Rp.
                                    {{ $menu->price }}
                                </h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end header wrapper-->
@endsection