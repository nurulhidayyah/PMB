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
                <a href="/admin/laporan/kehamilan" class="btn btn-primary mb-3" target="blank">Generate Laporan</a>
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
                                <td>{{ $kehamilan->tp }}</td>
                                <td>{{ $kehamilan->hppt }}</td>
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

@endsection
