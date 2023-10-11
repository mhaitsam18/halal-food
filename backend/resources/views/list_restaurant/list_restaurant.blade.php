@extends('layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pb-3">List Resto yang Dapat Dipilih</div>
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
                </div>
            </div>
            <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table" style="width:100%">
                                <thead hidden>
                                    <tr>
                                        <th>Nama Resto</th>
                                        <th>Tanggal Deadline</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    @foreach ($restos as $resto)
                                        @if ($resto->status != null)
                                            @php
                                                $result = uniqid($resto->id);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="image-container" style="width: 50px; height: 50px;">
                                                            <img src="{{ asset('/storage/images/' . $resto->image->first()->name) }}"
                                                                class="rounded-circle" alt="" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <p class="font-weight-bold mb-0">{{ 'Resto ' . $result }}
                                                            </p>
                                                            <p class="text-secondary mb-0">{{ $resto->area->name }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex-grow-1">
                                                        <p class="font-weight-bold mb-0">
                                                            {{ ucfirst(Carbon::parse($resto->deadline)->format('d F Y')) }}
                                                        </p>
                                                        <p class="text-secondary mb-0 text-success">Deadline Sertifikasi</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>Kuota {{ count($resto->reviewer) . '/2' }}</span>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#confirmationModal-{{ $resto->id }}"
                                                        class="btn btn-sm btn-outline-primary">Ambil</a>
                                                </td>
                                            </tr>

                                            <!-- Confirmation Modal -->
                                            <div class="modal fade" id="confirmationModal-{{ $resto->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin
                                                                Akan
                                                                Ambil Resto {{ $no }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-wrap">
                                                            Resto akan secara otomatis ditambah sesuai dengan input yang
                                                            telah
                                                            Anda
                                                            lakukan.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tidak</button>
                                                            <form action="/list_restoran/tambah_reviewer" method="POST">
                                                                @csrf
                                                                <input type="text" value="{{ $resto->id }}" hidden
                                                                    name="resto_id">
                                                                <input type="text" value="{{ auth()->user()->id }}"
                                                                    hidden name="user_id">
                                                                <button type="submit" class="btn btn-primary">Ya</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                var valDateStart = $('#filter_dateStart').val();
                var valDateEnd = $('#filter_dateEnd').val();

                var slugDateStart = convertSlug(valDateStart);
                var slugDateEnd = convertSlug(valDateEnd);
                if (isDate1 && isDate2 || valDateStart !== '' && valDateEnd !== '') {
                    window.location.href = '/list_restoran/filter/' + '?start=' + slugDateStart +
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
    </script>
@endsection
