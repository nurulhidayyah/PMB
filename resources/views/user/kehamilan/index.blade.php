@extends('layouts.dashboard')

@section('title')
    PMB | Rekam Medis
@endsection

@section('container')
    <!-- Page Heading -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <h2 class="fas fa-table">Tabel Rekam Medis Kehamilan</h2>
    <!-- DataTales Example -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @error('nama_obat')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <a href="/user/rekam_medis/kehamilan/create" class="btn btn-primary mb-3">Tambah Rekam Medis</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Berat Badan</th>
                                <th>Tinggi Badan</th>
                                <th>Tekanan Darah</th>
                                <th>UK</th>
                                <th>Prest</th>
                                <th>TP</th>
                                <th>HPPT</th>
                                <th>Gravida</th>
                                <th>Lila</th>
                                <th>DJJ</th>
                                <th>TFU</th>
                                <th>Diagnosa</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kehamilans as $kehamilan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kehamilan->pasien->nama_pasien }}</td>
                                    <td>{{ $kehamilan->berat_badan }}</td>
                                    <td>{{ $kehamilan->tinggi_badan }}</td>
                                    <td>{{ $kehamilan->tekanan_darah }}</td>
                                    <td>{{ $kehamilan->uk }}</td>
                                    <td>{{ $kehamilan->prest }}</td>
                                    <td>{{ date('d-m-Y', $kehamilan->tp) }}</td>
                                    <td>{{ date('d-m-Y', $kehamilan->hppt) }}</td>
                                    <td>{{ $kehamilan->gravida }}</td>
                                    <td>{{ $kehamilan->lila }}</td>
                                    <td>{{ $kehamilan->djj }}</td>
                                    <td>{{ $kehamilan->tfu }}</td>
                                    <td>{{ $kehamilan->diagnosa }}</td>
                                    <td>{{ $kehamilan->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
