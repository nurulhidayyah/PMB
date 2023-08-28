@extends('layouts.dashboard')

@section('title')
    PMB | Rekam Medis
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">TABEL REKAM MEDIS</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            @can('admin')
                <a href="/admin/laporan/umum" class="btn btn-primary mb-3" target="blank">Generate Laporan</a>
            @endcan
            @can('kepala')
                <a href="/kepala/laporan/umum" class="btn btn-primary mb-3" target="blank">Generate Laporan</a>
            @endcan
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Tekanan Darah</th>
                            <th>Diagnosa</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($umums as $umum)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $umum->pasien->nama_pasien }}</td>
                                <td>{{ $umum->berat_badan }}</td>
                                <td>{{ $umum->tinggi_badan }}</td>
                                <td>{{ $umum->tekanan_darah }}</td>
                                <td>{{ $umum->diagnosa }}</td>
                                <td>{{ $umum->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
