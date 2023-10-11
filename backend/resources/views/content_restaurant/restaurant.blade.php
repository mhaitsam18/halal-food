@extends('layouts.main')

@section('content')

@include('layouts.flash-message')

<div class="page-wrapper wrapper-resto">
  <div class="page-content-resto" style="background: linear-gradient(88.9deg, #802A8C 34.44%, rgba(132, 42, 145, 0.953075) 51.13%, rgba(149, 44, 164, 0.772641) 64.42%, rgba(192, 48, 210, 0.322917) 97.55%, rgba(204, 39, 226, 0.104167) 118.42%, rgba(112, 13, 125, 0.0383772) 124.25%, rgba(209, 34, 234, 0) 127.65%);">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a class="text-white" href="javascript:;"><i class="bx bx-home-alt"></i>Beranda</a></li>
          <li class="breadcrumb-item" style="color: white;"></i>Resto</a></li>
          <li class="breadcrumb-item" style="color: white;"></i>Cari Resto</a></li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="d-flex justify-content-center">
    <form action="/search" method="GET" class="search-form">
      <input class="search-input" name="keyword" type="search" placeholder="Cari Resto">
      <button type="submit">Cari</button>
    </form>
  </div>
</div>
</div>
<!--end header wrapper-->
<!-- Bagian Filter -->
<div class="list-resto-wrap">
  <div class="row">
    <!-- Bagian filter -->
    <div class="col-lg-3">
      <h4 class="mb-0" style="color: #670075;">Pilih Berdasarkan</h4>
      <br>
      <form action="/filter" method="GET">
        {{-- Nama Daerah --}}
        <h6 class="mb-0" style="color: #670075;">Kategori Daerah</h6>
        <select class="form-control js-example-basic-multiple" name="area">
          @foreach ($areas as $area)
          <option value="{{ $area->id }}">
            {{ $area->name }}
          </option>
          @endforeach
        </select>
        <button class="btn btn-primary mt-3" type="submit">Terapkan</button>
        <a class="btn btn-primary mt-3">Reset Filter</a>
      </form>
      <br>
      <h6 class="mb-0" style="color: #670075;">Kategori Halal</h6>
      <div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Halal Tersertifikasi
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
          <label class="form-check-label" for="flexCheckChecked">
            Belum Tersertifikasi
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
          <label class="form-check-label" for="flexCheckChecked">
            Non-Halal
          </label>
        </div>
        <br>
        <h6 class="mb-0" style="color: #670075;">Kategori Rating</h6>
        <div class="d-flex gap-3">
          <div class="cursor-pointer">
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-warning'></i>
          </div>
          <p>(3)</p>
        </div>
        <div class="d-flex gap-3">
          <div class="cursor-pointer">
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-secondary'></i>
          </div>
          <p>(4)</p>
        </div>
        <div class="d-flex gap-3">
          <div class="cursor-pointer">
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-warning'></i>
            <i class='bx bxs-star text-secondary'></i>
            <i class='bx bxs-star text-secondary'></i>
          </div>
          <p>(6)</p>
        </div>
      </div>
    </div>
    <!-- Bagian search result -->
    <div class="col-lg-9">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @if (count($restaurants) == 0)
        <div class="col-lg-8" style="width: 100%; display: flex; justify-content: center;">
          <div>
            <img src="assets/images/ilus-empty-search.png" alt="" width="300px" height="250px" style="align-items: center;">
            <p style="color: #670075;">Cari dengan masukan kata kunci yang dimaksud </p>
          </div>
        </div>
        @endif
        <!-- Column -->
        @foreach ($restaurants as $item)
        <div class="col d-flex align-items-stretch">
          <div class=" card">
            @if ($item->Image->first())
            <a class="text-black" href="/restaurant/{{str_replace(' ', '-', $item->Area->name)}}/{{str_replace(' ', '-', $item->name)}}/{{$item->id}}">
              <img src="{{ asset('/storage/images/' . $item->Image->first()->name) }}" onerror="this.src='{{ asset('/images/' . $item->Image->first()->name) }}'" class="card-img-top" alt="..." height="300px" style="object-fit:cover;">
            </a>
            @else
            <a class="text-black" href="/restaurant/{{str_replace(' ', '-', $item->Area->name)}}/{{str_replace(' ', '-', $item->name)}}/{{$item->id}}">
              <img src="{{ asset('/images/Resto-Default.jpg') }}" class="card-img-top" alt="..." height="300px" style="object-fit:cover;">
            </a>
            @endif
            <div class="">
              <div class="position-absolute top-0 end-0 product-discount"><span class="">Belum Tersertifikasi</span></div>
            </div>
            <div class="card-body p-3">
              <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                  <h6 class="card-title cursor-pointer"><b><a class="text-black" href="/restaurant/{{str_replace(' ', '-', $item->Area->name)}}/{{str_replace(' ', '-', $item->name)}}/{{$item->id}}">{{$item->name}}</a></b></h6>
                </div>
                <div class="p-2 bd-highlight">
                  @if(auth()->check())
                  @if($item->favorite()->where('user_id', auth()->user()->id)->where('restaurant_id', $item->id)->exists())
                  <p class="mb-0 float-start"><a data-bs-toggle="modal" data-bs-target="#RemoveFavorite"><span><i data-feather="heart" class="heart-filled"></i></span></a></p>
                  @else
                  <p class="mb-0 float-start"><a href="/add-favorite/{{$item->id}}"><span><i data-feather="heart" class="heart"></i></span></a></p>
                  @endif
                  @else
                  <p class="mb-0 float-start"><a href="/add-favorite/{{$item->id}}"><span><i data-feather="heart" class="heart"></i></span></a></p>
                  @endif
                </div>
              </div>
              <div class="clearfix">
                <p class="mb-0 float-start text-secondary"><span><i data-feather="map-pin" style="color: #670075;"></i></span> &nbsp{{$item->full_address}}</p>
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
                  <p class="mb-0 float-start"><b>{{'Rp ' . number_format($item->Menu->min('price'), 0, ',', '.') . ' - ' . 'Rp ' . number_format($item->Menu->max('price'), 0, ',', '.')}}</b></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="RemoveFavorite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Favorit?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Apakah anda yakin untuk menghapus restoran ini sebagai favorit?
              </div>
              <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Tidak</button>
                <a href="/remove-favorite/{{$item->id}}" type=" button" class="btn btn-primary">Ya</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection