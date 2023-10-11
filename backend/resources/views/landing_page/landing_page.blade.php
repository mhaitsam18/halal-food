@extends('layouts.main')

@section('content')
<div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/jumbotron.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <p>#HalalituBaik</p>
        <h2 style="color: white;">Temukan Makanan Halal, Karena Makanan Halal itu Baik</h2>
        <div>
          <a href="/"><button class="btn btn-second">Coba Sekarang</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Akhir jumbotron -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="container">
      <div class="main-body text-center">
        <h2>Halal Kategori</h2>
        <br>
        <div class="row" data-aos="fade-up" data-aos-duration="2000">
          <div class="col-lg-4 text-center">
            <img src="assets/images/non-halal.png" width="260px" height="260px" alt="">
            <h4>Non-Halal</h4>
            <p>Makanan dengan kategori menggunakan bahan
              yang belum jelas kehalalannya dengan mengandung bahan non halal seperti babi, khamr, mirin-sake, angciu dll</p>
          </div>
          <div class="col-lg-4 text-center">
            <img src="assets/images/self-declare.png" width="260px" height="260px" alt="">
            <h4>Belum Tersertifikasi</h4>
            <p>Makanan dengan kategori masih diidentifikasi oleh reviewer kontributor halal bahwa
              pemrosesan dilakukan secara halal namun belum tersertifikasi resmi oleh MUI</p>
          </div>
          <div class="col-lg-4 text-center">
            <img src="assets/images/halal-mui.png" width="260px" height="260px" alt="">
            <h4>Tersertifikasi</h4>
            <p>Makanan dengan kategori regular dan self declare diidentifikasi secara halal tersertifikasi resmi oleh MUI</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--end page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="container">
      <div class="main-body">
        <div class="d-flex bd-highlight">
          <div class="p-2 flex-grow-1 bd-highlight">
            <h2>Rekomendasi resto halal</h2>
          </div>
          <div class="p-2 bd-highlight">Lihat semua</div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <!-- Column -->
          @foreach ($restaurants->take(3) as $item)
          <div class="col" data-aos="flip-left" data-aos-duration="2000">
            <div class="card">
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
              <div class="card-body">
                <div class="d-flex bd-highlight">
                  <div class="p-2 flex-grow-1 bd-highlight">
                    <h6 class="card-title cursor-pointer"><b><a class="text-black" href="/restaurant/{{str_replace(' ', '-', $item->Area->name)}}/{{str_replace(' ', '-', $item->name)}}/{{$item->id}}">{{$item->name}}</a></b></h6>
                  </div>
                  <div class="p-2 bd-highlight">
                    <p class="mb-0 float-start"><i data-feather="heart" style="color: #670075;"></i></p>
                  </div>
                </div>
                <div class="clearfix">
                  <p class="mb-0 float-start"><span><i data-feather="map-pin" style="color: #670075;"></i></span>&nbsp{{$item->full_address}}</p>
                </div>
                <div class="d-flex align-items-center mt-3 fs-6">
                  <div class="cursor-pointer">
                    <i class='bx bxs-star text-warning'></i>
                    <i class='bx bxs-star text-warning'></i>
                    <i class='bx bxs-star text-warning'></i>
                    <i class='bx bxs-star text-warning'></i>
                    <i class='bx bxs-star text-secondary'></i>
                  </div>
                  <p class="mb-0 ms-auto">4.2(182)</p>
                </div>
                <div class="d-flex bd-highlight">
                  <div class="p-2 flex-grow-1 bd-highlight">
                    <p>Range Harga</p>
                  </div>
                  <div class="p-2 bd-highlight">
                    <p class="mb-0 float-start"> {{'Rp ' . number_format($item->Menu->min('price'), 0, ',', '.') . ' - ' . 'Rp ' . number_format($item->Menu->max('price'), 0, ',', '.')}}</p>
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
<div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <svg width="100%" height="400px">
        <rect width="100%" height="600px" style="fill: #802A8C" />
      </svg>
      <div class="carousel-caption" data-aos="fade-up" data-aos-duration="2000">
        <h4 style="color: white;">Manfaat sebagai kontributor</h4>
        <img src="assets/images/ilus-manfaat.svg" width="160px" height="160px" alt="">
        <p>Berikan dampak positif apabila anda seorang penggiat gaya hidup halal, dengan menjadi kontributor untuk memberikan informasi bermanfaat kepada muslim lainnya terkait review makanan halal</p>
        <div>
          <a href="register.html"><button class="btn btn-second">Coba Review Resto</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-wrapper">
  <div class="page-content">
    <div class="container">
      <div class="main-body">
        <div class="d-flex bd-highlight">
          <div class="p-2 flex-grow-1 bd-highlight">
            <h2>Blog #HalalSeries</h2>
          </div>
          <div class="p-2 bd-highlight">Lihat semua</div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <!-- Column -->
          <div class="col">
            <div class="card">
              <img src="assets/images/artikel-1.png" class="card-img-top" alt="...">
              <div class="card-body">
                <div class="d-flex bd-highlight">
                  <div class="p-2 flex-grow-1 bd-highlight">
                    <h6 class="card-title cursor-pointer"><strong>Halal, Antara Gaya Hidup dan Sadar Halal</strong></h6>
                  </div>
                </div>
                <div class="clearfix">
                  <p class="mb-0 float-start"><span><i data-feather="user" style="color: #670075;"></i></span> Pendamping halal</p>
                </div>
                <br>
                <p>Produk halal telah menjadi bagian dari bisnis dunia yang nilainya sangat besar dan menjanjikan...</p>
                <a href="/"><button class="btn btn-primary">Baca Selengkapnya</button></a>
              </div>
            </div>
          </div>
          <!-- Akhir column -->
          <!-- Awal column -->
          <!-- Column -->
          <div class="col">
            <div class="card">
              <img src="assets/images/artikel-2.png" class="card-img-top" alt="...">
              <div class="card-body">
                <div class="d-flex bd-highlight">
                  <div class="p-2 flex-grow-1 bd-highlight">
                    <h6 class="card-title cursor-pointer"><strong>Mengenal Angciu, Bahan Makanan Haram dalam Nasi Gorengl</strong></h6>
                  </div>
                </div>
                <div class="clearfix">
                  <p class="mb-0 float-start"><span><i data-feather="user" style="color: #670075;"></i></span> Pendamping halal</p>
                </div>
                <br>
                <p>Produk halal telah menjadi bagian dari bisnis dunia yang nilainya sangat besar dan menjanjikan...</p>
                <a href="/"><button class="btn btn-primary">Baca Selengkapnya</button></a>
              </div>
            </div>
          </div>
          <!-- Akhir column -->
        </div>
      </div>
    </div>
  </div>
</div>
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
@endsection