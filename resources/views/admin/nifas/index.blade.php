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
                <a href="/admin/laporan/nifas" target="blank" class="btn btn-primary mb-3">Generate Laporan</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Tekanan Darah</th>
                            <th>Periode</th>
                            <th>Diagnosa</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nifass as $nifas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $nifas->pasien->nama_pasien }}</td>
                                <td>{{ $nifas->berat_badan }}</td>
                                <td>{{ $nifas->tinggi_badan }}</td>
                                <td>{{ $nifas->tekanan_darah }}</td>
                                <td>{{ $nifas->periode }}</td>
                                <td>{{ $nifas->diagnosa }}</td>
                                <td>{{ $nifas->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
