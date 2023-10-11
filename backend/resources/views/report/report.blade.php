@extends('layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="menu-title" style="font-size: 24px; ">Pengaduan Sertifikasi</div>
                <div class="ms-auto">
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
                                    <th>Tanggal Review</th>
                                    <th>Diadukan Oleh</th>
                                    <th>Bukti Pengaduan</th>
                                    <th>Alasan Report</th>
                                    <th>Status Halal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use Carbon\Carbon;
                                @endphp
                                @foreach ($restos as $resto)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $resto->name }}</td>
                                        <td>
                                            {{ ucfirst(Carbon::parse($resto->updated_at)->format('d F Y')) }}
                                        </td>
                                        <td>{{ $resto->report->first()->user->username }}</td>
                                        <td>
                                            <a href="">
                                                <i data-feather="eye" class="icon-action" style="color:#434D56 ;"></i>
                                            </a>
                                        </td>
                                        <td>{{ $resto->report->first()->comment }}</td>
                                        <td>Self Declare</td>
                                        <td>
                                            <span
                                                class="badge bg-warning text-dark">{{ $resto->report->first()->status }}</span>
                                        </td>
                                        <td>
                                            <a
                                                href="/report-restaurant/detail-report/{{ base64_encode($resto->report->first()->id) }}">
                                                <i data-feather="eye" class="icon-action" style="color:#434D56 ;"></i>
                                            </a>
                                            <a
                                                href="/report-restaurant/edit-certificate-report/{{ encrypt($resto->report->first()->id) }}">
                                                <i data-feather="edit" class="icon-action" style="color: #2B89EB"></i>
                                            </a>
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
