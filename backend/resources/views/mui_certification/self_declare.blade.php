@extends('layouts.main')

@section('content')
@include('layouts.flash-message')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="menu-title" style="font-size: 24px; ">Sertifikasi MUI - Self Declare</div>
            <div class="ms-auto d-flex gap-5">
                <!-- <div class="date-group d-flex gap-3" style="align-items: center">

                    @if (isset($filter_dateStart) && isset($filter_dateEnd))
                    <label>Mulai</label>
                    <input type="date" class="form-control" id="filter_dateStart" name="filter_dateStart" value="{{ $filter_dateStart }}" />
                    <label>Akhir</label>
                    <input type="date" class="form-control" id="filter_dateEnd" name="filter_dateEnd" value="{{ $filter_dateEnd }}" />
                    @else
                    <label>Mulai</label>
                    <input type="date" class="form-control" id="filter_dateStart" name="filter_dateStart" value="{{ old('filter_dateStart') }}" />
                    <label>Akhir</label>
                    <input type="date" class="form-control" id="filter_dateEnd" name="filter_dateEnd" value="{{ old('filter_dateEnd') }}" />
                    @endif
                </div> -->
                <!-- <div class="btn-group">
                    <select class="form-control js-example-basic-multiple" id="mySelect" name="area" style="width: 12rem">
                        @if (isset($area))
                        <option {{ $area_id == 'Semua Daerah' ? 'selected' : ' ' }} value="all-reviews">Semua Daerah</option>
                        <option {{ $area_id == 'Menunggu Kontributor' ? 'selected' : ' ' }} value="Menunggu Kontributor">Menunggu Kontributor</option>
                        @endif
                    </select>
                </div> -->
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
                                <th>No. Sertifikat Halal</th>
                                <th>Tanggal Dikeluarkan</th>
                                <th>Tanggal Kedaluwarsa</th>
                                <th>Nama Perusahaan</th>
                                <th>Daerah</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restos as $resto)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $resto->name }}</td>
                                <td>{{ $resto->RestaurantHalalCertificate->certificate_number }}</td>
                                <td>{{ $resto->RestaurantHalalCertificate->issued_date }}</td>
                                <td>{{ $resto->RestaurantHalalCertificate->expired_date }}</td>
                                <td>{{ $resto->RestaurantHalalCertificate->company_name }}</td>
                                <td>{{ $resto->Area->name }}</td>
                                <td>{{ $resto->full_address }}</td>
                                <td>
                                    <a href="/certified_restaurant/detail_resto/{{ encrypt($resto->id) }}"><i data-feather="eye" class="icon-action" style="color: #434D56"></i></a>
                                </td>
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