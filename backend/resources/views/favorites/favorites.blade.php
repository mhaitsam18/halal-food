@extends('layouts.main')

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Favorite</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Favorite Saya</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="col-lg-9">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @if (count($favorites) == 0)
                        <div class="col-lg-8" style="width: 100%; display: flex; justify-content: center;">
                            <div>
                                <img src="assets/images/ilus-empty-search.png" alt="" width="300px" height="250px" style="align-items: center;">
                                <p style="color: #670075;">Anda belum memiliki restoran favorit </p>
                            </div>
                        </div>
                        @endif
                        @foreach ($favorites as $item)
                        <div class="col d-flex align-items-stretch">
                            <div class=" card">
                                @if ($item->Restaurant->Image->first())
                                <a class="text-black" href="/restaurant/{{str_replace(' ', '-', $item->Restaurant->Area->name)}}/{{str_replace(' ', '-', $item->Restaurant->name)}}/{{$item->Restaurant->id}}">
                                    <img src="{{ asset('/storage/images/' . $item->Restaurant->Image->first()->name) }}" onerror="this.src='{{ asset('/images/' . $item->Restaurant->Image->first()->name) }}'" class="card-img-top" alt="..." height="300px" style="object-fit:cover;">
                                </a>
                                @else
                                <a class="text-black" href="/restaurant/{{str_replace(' ', '-', $item->Restaurant->Area->name)}}/{{str_replace(' ', '-', $item->Restaurant->name)}}/{{$item->Restaurant->id}}">
                                    <img src="{{ asset('/images/Resto-Default.jpg') }}" class="card-img-top" alt="..." height="300px" style="object-fit:cover;">
                                </a>
                                @endif
                                <div class="">
                                    <div class="position-absolute top-0 end-0 product-discount"><span class="">Belum Tersertifikasi</span></div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-grow-1 bd-highlight">
                                            <h6 class="card-title cursor-pointer"><b><a class="text-black" href="/restaurant/{{str_replace(' ', '-', $item->Restaurant->Area->name)}}/{{str_replace(' ', '-', $item->Restaurant->name)}}/{{$item->Restaurant->id}}">{{$item->Restaurant->name}}</a></b></h6>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            @if($item->where('user_id', auth()->user()->id)->where('restaurant_id', $item->Restaurant->id)->exists())
                                            <p class="mb-0 float-start"><a href="/remove-favorite/{{$item->Restaurant->id}}"><span><i data-feather="heart" class="heart-filled"></i></span></a></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <p class="mb-0 float-start text-secondary"><span><i data-feather="map-pin" style="color: #670075;"></i></span> &nbsp{{$item->Restaurant->full_address}}</p>
                                    </div>
                                    <div class="d-flex align-items-center mt-3 fs-6">
                                        <div class="cursor-pointer">
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-secondary'></i>
                                        </div>
                                        <p class="mb-0 ms-auto text-black">4.2(182)</p>
                                    </div>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-grow-1 bd-highlight text-black">
                                            <p><b>Range Harga</b></p>
                                        </div>
                                        <div class="p-2 bd-highlight text-black">
                                            <p class="mb-0 float-start"><b>{{'Rp ' . number_format($item->Restaurant->Menu->min('price'), 0, ',', '.') . ' - ' . 'Rp ' . number_format($item->Restaurant->Menu->max('price'), 0, ',', '.')}}</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
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
@endsection