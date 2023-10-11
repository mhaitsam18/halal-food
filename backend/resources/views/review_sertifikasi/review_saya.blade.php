@extends('layouts.main')

@section('content')
    @include('layouts.flash-message')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="menu-title" style="font-size: 24px; ">List Review Saya</div>
                <div class="ms-auto d-flex gap-5">
                    <div class="date-group d-flex gap-3" style="align-items: center">

                        @if (isset($filter_dateStart) && isset($filter_dateEnd))
                            <label>Mulai</label>
                            <input type="date" class="form-control" id="filter_dateStart" name="filter_dateStart"
                                value="{{ $filter_dateStart }}" />
                            <label>Akhir</label>
                            <input type="date" class="form-control" id="filter_dateEnd" name="filter_dateEnd"
                                value="{{ $filter_dateEnd }}" />
                        @else
                            <label>Mulai</label>
                            <input type="date" class="form-control" id="filter_dateStart" name="filter_dateStart"
                                value="{{ old('filter_dateStart') }}" />
                            <label>Akhir</label>
                            <input type="date" class="form-control" id="filter_dateEnd" name="filter_dateEnd"
                                value="{{ old('filter_dateEnd') }}" />
                        @endif
                    </div>
                    <div class="btn-group">
                        <select class="form-control js-example-basic-multiple" id="mySelect" name="area"
                            style="width: 12rem">
                            @if (isset($status))
                                <option {{ $status == 'Semua' ? 'selected' : ' ' }} value="all-reviews">Semua</option>
                                <option {{ $status == 'Menunggu Kontributor' ? 'selected' : ' ' }}
                                    value="Menunggu Kontributor">Menunggu Kontributor</option>
                                <option {{ $status == 'Dalam Review' ? 'selected' : ' ' }} value="Dalam Review">Dalam Review
                                </option>
                                <option {{ $status == 'Selesai' ? 'selected' : ' ' }} value="Selesai">Selesai</option>
                                <option {{ $status == 'Proses Superadmin' ? 'selected' : ' ' }} value="Proses Superadmin">
                                    Proses Superadmin</option>
                                <option {{ $status == 'Ditolak' ? 'selected' : ' ' }} value="Ditolak">Ditolak</option>
                            @endif
                        </select>
                    </div>
                    <div class="btn-group">
                        <a href="/review-saya/create-resto" type="button" class="btn btn-primary"><i
                                class='bx bx-plus mr-1'></i>Tambah Resto</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Resto</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Deadline</th>
                                    <th>Alamat</th>
                                    <th>Nomor HP</th>
                                    <th>Kuota Kontributor</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restos as $resto)
                                    @php
                                        
                                        $reviewer_count = $resto->reviewer()->count();
                                        $check_report = \App\Models\Reviewer::where('user_id', auth()->id())
                                            ->where('restaurant_id', $resto->id)
                                            ->whereHas('review')
                                            ->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $resto->name }}</td>
                                        <td>{{ $resto->created_at }}</td>
                                        <td>{{ $resto->deadline }}</td>
                                        <td>{{ $resto->full_address }}</td>
                                        <td>{{ $resto->phone_number }}</td>
                                        <td>
                                            {{ $reviewer_count . '/2' }}
                                        </td>
                                        <td>
                                            @if ($reviewer_count <= '1')
                                                <span class="badge bg-secondary text-light">Menunggu Kontributor</span>
                                            @elseif ($resto->status == 'Dalam Review' && $reviewer_count == '2')
                                                <span class="badge bg-warning text-dark">Dalam Review</span>
                                            @elseif ($resto->status == 'Selesai')
                                                <span class="badge bg-success text-light">Selesai</span>
                                            @elseif ($resto->status == 'Proses Superadmin')
                                                <span class="badge bg-primary text-light">Proses Superadmin</span>
                                            @elseif ($resto->status == 'Ditolak')
                                                <span class="badge bg-error text-light">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Menunggu Kontributor --}}
                                            @if ($reviewer_count <= '1' && $resto->status == 'Menunggu Kontributor')
                                                <a href="/review_saya/detail_resto/{{ encrypt($resto->id) }}"><i
                                                        data-feather="eye" class="icon-action"
                                                        style="color: #434D56"></i></a>
                                                @if ($resto->user_id == auth()->id())
                                                    <a href="/review_saya/edit_resto/{{ encrypt($resto->id) }}"><i
                                                            data-feather="edit" class="icon-action"
                                                            style="color: #2B89EB"></i></a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#confirmationModal-{{ $resto->id }}"><i
                                                            data-feather="trash-2" class="icon-action"
                                                            style="color: #CA4E4E"></i></a>
                                                @endif
                                            @elseif ($resto->status == 'Dalam Review' && $reviewer_count == '2')
                                                <a href="/review_saya/detail_resto/{{ encrypt($resto->id) }}"><i
                                                        data-feather="eye" class="icon-action"
                                                        style="color: #434D56"></i></a>
                                                @if ($check_report == null)
                                                    <a href="/review_saya/laporan_sertifikasi/{{ encrypt($resto->id) }}">
                                                        <i data-feather="file-text" class="icon-action"
                                                            style="color: #9A55A3"></i>
                                                    </a>
                                                @endif
                                            @elseif ($resto->status == 'Selesai')
                                                <a href="/review_saya/detail_resto/{{ encrypt($resto->id) }}"><i
                                                        data-feather="eye" class="icon-action"
                                                        style="color: #434D56"></i></a>
                                            @elseif ($resto->status == 'Proses Superadmin')
                                                <a href=""><i data-feather="eye" class="icon-action"
                                                        style="color: #434D56"></i></a>
                                            @elseif ($resto->status == 'Ditolak')
                                                <a href="/review_saya/detail_resto/{{ encrypt($resto->id) }}"><i
                                                        data-feather="eye" class="icon-action"
                                                        style="color: #434D56"></i></a>
                                                <a href=""><i data-feather="edit" class="icon-action"
                                                        style="color: #2B89EB"></i></a>
                                                <a href=""><i data-feather="trash-2" class="icon-action"
                                                        style="color: #CA4E4E"></i></a>
                                            @endif
                                        </td>

                                        <!-- Confirmation Modal -->
                                        <div class="modal fade" id="confirmationModal-{{ $resto->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin
                                                            Akan
                                                            Menambah Resto?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-wrap">
                                                        Resto akan secara otomatis ditambah sesuai dengan input yang
                                                        telah Anda
                                                        lakukan.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tidak</button>
                                                        <form action="/review_saya/delete_resto/{{ encrypt($resto->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-content')
    <script>
        function convertSlug(value) {
            return value.toLowerCase().replace(/ /g, "-")
        }

        var isDate1 = false;
        var isDate2 = false;

        function checkBothDatesSelected() {
            if (isDate1 && isDate2 || valDateStart !== '' && valDateEnd !== '') {
                var valStatus = $('#mySelect').val();
                var valDateStart = $('#filter_dateStart').val();
                var valDateEnd = $('#filter_dateEnd').val();

                var slugStatus = convertSlug(valStatus);
                var slugDateStart = convertSlug(valDateStart);
                var slugDateEnd = convertSlug(valDateEnd);
                if (isDate1 && isDate2 || valDateStart !== '' && valDateEnd !== '') {
                    window.location.href = '/review_saya/' + slugStatus + '?start=' + slugDateStart +
                        '&end=' + slugDateEnd;
                }
            }
        }

        $('#filter_dateStart').on('change', function() {
            isDate1 = true;
            checkBothDatesSelected();
        });
        $('#filter_dateEnd').on('change', function() {
            isDate2 = true;
            checkBothDatesSelected();
        });

        $(document).ready(function() {
            $('#mySelect').on('change', function() {
                var valStatus = $('#mySelect').val();
                var valDateStart = $('#filter_dateStart').val();
                var valDateEnd = $('#filter_dateEnd').val();

                var slugStatus = convertSlug(valStatus);
                var slugDateStart = convertSlug(valDateStart);
                var slugDateEnd = convertSlug(valDateEnd);

                if (valStatus !== '') {
                    if (valDateStart !== '' && valDateEnd !== '') {
                        window.location.href = '/review_saya/' + slugStatus + '?start=' + slugDateStart +
                            '&end=' + slugDateEnd;
                    } else {
                        window.location.href = '/review_saya/' + slugStatus;
                    }
                }
            });
        });
    </script>
@endsection
