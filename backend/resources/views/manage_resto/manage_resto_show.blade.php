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
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>Beranda</a></li>
                        <li class="breadcrumb-item"></i>Resto</a></li>
                        <li class="breadcrumb-item"></i>Cari Resto</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Resto</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="card p-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if ($images->first())
                        <img src="{{ asset('/storage/images/' . $images->first()->name) }}" onerror="this.src='{{ asset('/images/' . $images->first()->name) }}'" class="card-img-top image-detail cursor-pointer" alt="..." height="500px" data-bs-toggle="modal" data-bs-target="#RestoPhoto{{ $images->first()->id }}" style="object-fit:cover;">
                        <!-- Modal Lihat Main -->
                        <div class=" modal fade" id="RestoPhoto{{ $images->first()->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header d-block" style="border: none">
                                        <div class="d-flex">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Restoran</h1>
                                            <br>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('/storage/images/' . $images->first()->name) }}" width="100%">
                                    </div>
                                    <div class="modal-footer" style="border: none">
                                        <button type="button" class="btn btn-primary mx-auto d-block" style="width:90%;" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <img src="{{ asset('/images/Resto-Default.jpg') }}" class="card-img-top image-detail cursor-pointer" alt="..." height="500px" style="object-fit:cover;">
                        @endif
                        <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                            @foreach ($images->skip(1) as $image)
                            <div class="col"><img src="{{ asset('/storage/images/' . $image->name) }}" height="70" width="98px" class="image-detail border cursor-pointer" alt="" data-bs-toggle="modal" data-bs-target="#RestoPhoto{{ $image->id }}"></div>
                            <!-- Modal Lihat Others-->
                            <div class=" modal fade" id="RestoPhoto{{ $image->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header d-block" style="border: none">
                                            <div class="d-flex">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Restoran
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
                            <div class="d-flex flex-row-reverse">
                                <a href="/restaurant/edit/{{str_replace(' ', '-', $claimed_resto->Restaurant->Area->name)}}/{{str_replace(' ', '-', $claimed_resto->Restaurant->name)}}/{{$claimed_resto->Restaurant->id}}" type="button" class="btn btn-primary"><i data-feather="edit-3"></i> Edit Resto</a>
                            </div>
                            <h2 class="card-title"><b>{{ $claimed_resto->Restaurant->name }}</b></h2>
                            <div class="d-flex gap-3 py-3 fs-5">
                                <p>Rating</p>
                                <div class="cursor-pointer">
                                    <i class='bx bxs-star text-warning'></i>
                                    <i class='bx bxs-star text-warning'></i>
                                    <i class='bx bxs-star text-warning'></i>
                                    <i class='bx bxs-star text-warning'></i>
                                    <i class='bx bxs-star text-secondary'></i>
                                </div>
                                <div>142 reviews</div>
                            </div>
                            <div class="mb-3">
                                <h4><b>Rentang Harga
                                        <br><span class="price h4"><b>{{ 'Rp ' . number_format($claimed_resto->Restaurant->Menu->min('price'), 0, ',', '.') . ' - ' . 'Rp ' . number_format($claimed_resto->Restaurant->Menu->max('price'), 0, ',', '.') }}</b></span></b>
                                </h4>
                            </div>
                            <div class="clearfix">
                                <p class="mb-0 float-start fs-6">
                                    <span><i data-feather="map-pin" style="color: #670075;"></i></span> {{ $claimed_resto->Restaurant->full_address }}
                                </p>
                            </div>
                            <br>
                            <a href="lihatMenu.html" type="button" class="btn btn-lihatresto"></i>Lihat Menu</a>
                            <a href="lihatReview.html" type="button" class="btn btn-warning"></i>Lihat Review</a>
                            <br><br>
                            <div class="col">
                                <label class="form-label"><strong>Review Kontributor : </strong> - </label><br>
                                <label class="form-label"><strong>Sertifikasi Regular Expired : 18 Juni 2023 </strong>
                                    - </label>
                            </div>
                            <br>
                            <a href="#" class="btn btn-secondary" disabled></i>Claim Resto Saya</a>
                            <a href="#" class="btn btn-secondary" disabled></i>Report Resto</a>
                        </div>
                    </div>
                    <div class="modal fade" id="modalClaim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Masukkan Claim bukti Resto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/claim-restoran/create-claim" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        Claim resto anda untuk melakukan edit resto lebih lanjut
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nomor Induk
                                                Usaha</label>
                                            <input type="text" class="form-control" id="business_number" placeholder="Masukkan Nomor Induk Usaha" name="business_number">
                                            <div class="invalid-feedback"></div>
                                            <input type="text" value="{{ $claimed_resto->id }}" name="resto_id" hidden>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn-submitClaim" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Report Resto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Report resto anda untuk melakukan edit resto lebih lanjut
                                    <hr>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Resto</label>
                                        <input type="text" class="form-control" placeholder="Masukkan nama resto">
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Pemilik Resto</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Sertifikasi Halal</label>
                                        <select class="form-select">
                                            <option>Tersertifikasi </option>
                                        </select>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Tersertifikasi</a></li>
                                            <li><a class="dropdown-item active" href="#" aria-current="true">Belum Tersertifikasi</a></li>
                                            <li><a class="dropdown-item" href="#">Non-Halal</a></li>
                                        </ul>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sertifikat Halal Resto</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tulis ulasan alasan mereport resto</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Tulis ulasan report resto</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>
</div>
<!--end header wrapper-->
@endsection

@section('script-content')
<script>
    $(document).ready(function() {
        $('#modalClaim').on('submit', 'form', function(e) {

            var input_businessNumber = $('#business_number');
            var val_businessNumber = $('#business_number').val();

            if (valNIB === '') {
                $('#text-error').remove();
                input_businessNumber.addClass(
                    'is-invalid');
                $('.invalid-feedback').append(
                    `<p id="text-error">Nomor Induk Usaha harus diisi</p>`)
                return false;
            } else {
                var regex = /^\d{2}\.\d{2}\.\d{2}\.\d{4}\.\d{4}$/;
                if (regex.test(val_businessNumber)) {
                    input_businessNumber.removeClass('is-invalid');
                } else {
                    $('#text-error').remove();
                    input_businessNumber.addClass(
                        'is-invalid');
                    $('.invalid-feedback').append(
                        `<p id="text-error">Nomor Induk Usaha harus diisi dengan benar</p>`)
                    return false;
                }
            }
        });

        $('#modalClaim').on('focus', 'input', function() {
            $(this).removeClass('is-invalid');
        });
    });
</script>
@endsection