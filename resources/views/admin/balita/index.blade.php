@extends('layouts.dashboard')

@section('title')
    PMB | Rekam Medis
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">TABEL REKAM MEDIS</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <a href="/admin/laporan/balita" class="btn btn-primary mb-3" target="blank">Generate Laporan</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Nama Orang Tua</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Tekanan Darah</th>
                            <th>Diagnosa</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($balitas as $balita)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $balita->pasien->nama_pasien }}</td>
                                <td>{{ $balita->nama_ortu }}</td>
                                <td>{{ $balita->berat_badan }}</td>
                                <td>{{ $balita->tinggi_badan }}</td>
                                <td>{{ $balita->tekanan_darah }}</td>
                                <td>{{ $balita->diagnosa }}</td>
                                <td>{{ $balita->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
