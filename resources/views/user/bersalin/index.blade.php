@extends('layouts.dashboard')

@section('title')
    PMB | Rekam Medis
@endsection

@section('container')
    <!-- Page Heading -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <h2 class="fas fa-table">Tabel Rekam Medis Bersalin</h2>
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
                <a href="/user/rekam_medis/bersalin/create" class="btn btn-primary mb-3">Tambah Rekam Medis</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <th>Berat Bayi</th>
                            <th>Diagnosa</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bersalins as $bersalin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bersalin->pasien->nama_pasien }}</td>
                                <td>{{ $bersalin->berat_badan }}</td>
                                <td>{{ $bersalin->tinggi_badan }}</td>
                                <td>{{ $bersalin->tekanan_darah }}</td>
                                <td>{{ $bersalin->uk }}</td>
                                <td>{{ $bersalin->prest }}</td>
                                <td>{{ date('d-m-Y', $bersalin->tp) }}</td>
                                <td>{{ date('d-m-Y', $bersalin->hppt) }}</td>
                                <td>{{ $bersalin->gravida }}</td>
                                <td>{{ $bersalin->lila }}</td>
                                <td>{{ $bersalin->djj }}</td>
                                <td>{{ $bersalin->tfu }}</td>
                                <td>{{ $bersalin->berat_bayi }}</td>
                                <td>{{ $bersalin->diagnosa }}</td>
                                <td>{{ $bersalin->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
