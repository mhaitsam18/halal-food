@extends('layouts.main')

@section('content')
@include('layouts.flash-message')
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
        <div class="card p-4">
            <div class="row g-0">
                <div class="col-md-4">
                    @if ($restaurant->Image->first())
                    <img src="{{ asset('/storage/images/' . $restaurant->Image->first()->name) }}" onerror="this.src='{{ asset('/images/' . $restaurant->Image->first()->name) }}'" class="card-img-top image-detail cursor-pointer" alt="..." height="500px" data-bs-toggle="modal" data-bs-target="#RestoPhoto{{ $restaurant->Image->first()->id }}" style="object-fit:cover;">
                    <!-- Modal Lihat Main -->
                    <div class=" modal fade" id="RestoPhoto{{ $restaurant->Image->first()->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <img src="{{ asset('/storage/images/' . $restaurant->Image->first()->name) }}" width="100%">
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
                        <h2 class="card-title"><b>{{ $restaurant->name }}</b></h2>
                        <div class="d-flex gap-3 py-3 fs-5">
                            <p>Rating</p>
                            <div class="rating-css">
                                <div class="icon-star">
                                    @for ($i =1; $i<= $feedback->avg('rating'); $i++) <input disabled type="radio" value="{{$i}}" name="rating" checked id="rating{{$i}}">
                                        <label for="rating{{$i}}" class="bx bxs-star"></label>
                                        @endfor
                                </div>
                            </div>
                            <div>{{$feedback->count()}} Ulasan</div>
                        </div>
                        <div class="mb-3">
                            <h4><b>Rentang Harga
                                    <br><span class="price h4"><b>{{ 'Rp ' . number_format($restaurant->Menu->min('price'), 0, ',', '.') . ' - ' . 'Rp ' . number_format($restaurant->Menu->max('price'), 0, ',', '.') }}</b></span></b>
                            </h4>
                        </div>
                        <div class="clearfix">
                            <p class="mb-0 float-start fs-6"><span><i data-feather="map-pin" style="color: #670075;"></i></span> {{ $restaurant->full_address }}</p>
                        </div>
                        <br>
                        <a href="lihatMenu.html" type="button" class="btn btn-lihatresto"></i>Lihat Menu</a>
                        <a href="" type="button" class="btn btn-second"></i>Lihat Sertifikasi</a>
                        <br><br>
                        <div class="col">
                            <label class="form-label"><strong>Review Kontributor : </strong> - </label><br>
                            <label class="form-label"><strong>Sertifikasi Regular Expired : 18 Juni 2023 </strong>
                                - </label>
                        </div>
                        <br>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalClaim"></i>Claim Resto Saya</a>
                        <a href="" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalComplaint"></i>Report Resto</a>
                    </div>
                </div>

                {{-- Modal Claim --}}
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
                                        <label class="form-label">Nomor Induk Usaha</label>
                                        <input type="text" class="form-control" id="business_number" placeholder="Masukkan Nomor Induk Usaha" name="business_number">
                                        <div class="invalid-feedback"></div>
                                        <input type="text" value="{{ $restaurant->id }}" name="resto_id" hidden>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="btn-submitClaim" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal Report --}}
                <div class="modal fade" id="modalComplaint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Report Resto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/report-restoran/create-report" method="POST">
                                    @csrf
                                    Report resto anda untuk melakukan edit resto lebih lanjut
                                    <hr>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Resto</label>
                                        <input type="text" class="form-control" placeholder="Masukkan nama resto" value="{{ $restaurant->name }}" readonly name="resto_name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Bukti Halal/Non Halal</label>
                                        <input id="image" type="file" name="image" multiple data-allow-reorder="true" data-max-file-size="10MB" data-max-files="3" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tulis ulasan alasan mereport resto</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" style="height: 100px" name="comment"></textarea>
                                        </div>
                                    </div>
                                    <input type="text" value="{{ $restaurant->id }}" hidden name="resto_id">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="card-body">
                <h2>Komentar</h2>
                <h5 style="color:#670075">Tambahkan Komentar</h5>
                @if (Auth::check())
                @if($user_feedback)
                <div class="comment-user-avater">
                    <img src="{{ asset('storage/images/' . $user->profile_picture) }}" onerror="this.src='{{ asset('/images/' . $user->profile_picture) }}'" alt="">
                </div>
                <div class="comment-text-body">
                    <h4>{{$user->first_name . " " . $user->last_name}} <span class="comment-date">{{$user_feedback->updated_at->format('d F, Y')}}</span> <a data-bs-toggle="modal" href="#feedback-edit" style=" cursor:pointer">Edit</a></span>
                        <form action="/delete-comment/{{$user_feedback->id}}" method="post">
                            @csrf
                            <button><i data-feather="trash-2" class="icon-action" style="color: #CA4E4E"></i></button>
                        </form>
                    </h4>
                </div>
                <!-- Modal Edit -->
                <div class="modal fade" id="feedback-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Komentar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/update-comment/{{$user_feedback->id}}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    {{$restaurant->name}}
                                    <div class="rating-css">
                                        <div class="icon-star">
                                            @for ($i = 1; $i <= 5; $i++) <input type="radio" value="{{ $i }}" name="rating" id="rating{{ $i }}" {{ $i == $user_feedback->rating ? 'checked' : '' }}>
                                                <label for="rating{{ $i }}" class="bx bxs-star" onclick="updateRating({{ $i }})"></label>
                                                @endfor
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" name="comment" id="comment" rows="3">{{$user_feedback->comment}}</textarea>
                                        <div class="invalid-feedback"></div>
                                        <input type="hidden" value="{{ $restaurant->id }}" name="resto_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="btn-submitClaim" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    function updateRating(rating) {
                        var radioButtons = document.getElementsByName('rating');
                        for (var i = 0; i < radioButtons.length; i++) {
                            if (radioButtons[i].value <= rating) {
                                radioButtons[i].checked = true;
                            } else {
                                radioButtons[i].checked = false;
                            }
                        }
                    }
                </script>
                <div class="rating-css">
                    <div class="icon-star">
                        <?php
                        $rating = $user_feedback->rating;
                        ?>
                        @for ($i = 1; $i <= $rating; $i++) <input disabled type="radio" value="{{$i}}" name="rating" checked id="rating{{$i}}">
                            <label for="rating{{$i}}" class="bx bxs-star"></label>
                            @endfor
                    </div>
                </div>
                <p>{{$user_feedback->comment}}</p>
            </div>
            @else
            <div>Beri rating</div>
            <form action="/add-comment/{{ $restaurant->id }}" method="post">
                @csrf
                <div class="d-flex gap-3 py-3">
                    <div class="cursor-pointer">
                        <div class="rating-css">
                            <div class="star-icon">
                                <input type="radio" value="1" name="rating" checked id="rating1">
                                <label for="rating1" class="bx bxs-star"></label>
                                <input type="radio" value="2" name="rating" id="rating2">
                                <label for="rating2" class="bx bxs-star"></label>
                                <input type="radio" value="3" name="rating" id="rating3">
                                <label for="rating3" class="bx bxs-star"></label>
                                <input type="radio" value="4" name="rating" id="rating4">
                                <label for="rating4" class="bx bxs-star"></label>
                                <input type="radio" value="5" name="rating" id="rating5">
                                <label for="rating5" class="bx bxs-star"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-floating">
                        <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Komentar</label>
                        <br>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <button type="submit" class="btn btn-primary"></i>Kirim</button>
                        </div>
                    </div>
                </div>
            </form>
            @endif
            @else
            <div class="col-lg-8">
                <div class="form-floating">
                    <div class="card" style="height: 100px">
                        <div class="align-self-center pt-3">Untuk memberikan komentar, silakan masuk terlebih dahulu.</div>
                        <div class="d-inline-flex align-self-center pt-2">
                            <button type="button" onclick="location.href='/login'" class="btn btn-primary">Masuk</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user_feedback)
            <h5 style="color:#670075">Komentar Pengguna Lainnya</h5>
            <div class="comments-list-wrap">
                <h5 class="comment-count-title">{{$feedback->count()-1}} Komentar</h5>
                <div class="comment-list">
                    @foreach ($feedback as $comment)
                    @if ($comment->user_id !== auth()->user()->id)
                    <div class="single-comment-body">
                        <div class="comment-user-avater">
                            <img src="{{ asset('storage/images/' . $comment->User->profile_picture) }}" onerror="this.src='{{ asset('/images/' . $comment->User->profile_picture) }}'" class="user-img" alt="user avatar">
                        </div>
                        <div class="comment-text-body">
                            <h4>{{$comment->User->first_name . " " . $comment->User->last_name}}<span class="comment-date">{{$comment->updated_at->format('d F, Y')}}</span></h4>
                            <div class="rating-css">
                                <div class="icon-star">
                                    <?php
                                    $rating = $comment->rating;
                                    ?>
                                    @for ($i = 1; $i <= $rating; $i++) <input disabled type="radio" value="{{$i}}" name="rating" checked id="rating{{$i}}">
                                        <label for="rating{{$i}}" class="bx bxs-star"></label>
                                        @endfor
                                </div>
                            </div>
                            <p>{{$comment->comment}}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @else
            <h5 style="color:#670075">Komentar Pengguna Lainnya</h5>
            <div class="comments-list-wrap">
                <h5 class="comment-count-title">{{$feedback->count()}} Komentar</h5>
                <div class="comment-list">
                    @foreach ($feedback as $comment)
                    @if ($comment->user_id !== auth()->user()->id)
                    <div class="single-comment-body">
                        <div class="comment-user-avater">
                            <img src="{{ asset('storage/images/' . $comment->User->profile_picture) }}" onerror="this.src='{{ asset('/images/' . $comment->User->profile_picture) }}'" class="user-img" alt="user avatar">
                        </div>
                        <div class="comment-text-body">
                            <h4>{{$comment->User->first_name . " " . $comment->User->last_name}}</h4>
                            <div class="rating-css">
                                <div class="icon-star">
                                    <?php
                                    $rating = $comment->rating;
                                    ?>
                                    @for ($i = 1; $i <= $rating; $i++) <input disabled type="radio" value="{{$i}}" name="rating" checked id="rating{{$i}}">
                                        <label for="rating{{$i}}" class="bx bxs-star"></label>
                                        @endfor
                                </div>
                            </div>
                            <p>{{$comment->comment}}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            <!-- <div class="comment-list"> -->
            <!-- @foreach ($feedback as $comment) -->
            <!-- <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/images/avatars/avatar 2.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>{$feedback->User->first_name} <span class="comment-date">Aprl 26, 2020</span> <a href="#">reply</a></h4>
                                    <p>{$comment->comment}</p>
                                </div> -->
            <!-- <div class="single-comment-body child">
                                    <div class="comment-user-avater">
                                        <img src="assets/images/avatars/avatar 2.png" alt="">
                                    </div>
                                    <div class="comment-text-body">
                                        <h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a href="#">reply</a></h4>
                                        <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna,
                                            maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros
                                            porttitor, in interdum ante faucibus.</p>
                                    </div>
                                </div> -->
            <!-- </div> -->
            <!-- @endforeach -->
        </div>
    </div>
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

            if (val_businessNumber === '') {
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

        $('#alertModal').on('hidden.bs.modal', function() {
            $(this).remove();
        });
    });
</script>
@endsection