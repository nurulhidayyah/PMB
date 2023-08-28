@extends('layouts.dashboard')

@section('title')
    PMB | Rekam Medis
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">TABEL REKAM MEDIS IMUNISASI</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                @can('admin')
                    <a href="/admin/laporan/imunisasi" class="btn btn-primary mb-3" target="blank">Generate Laporan</a>
                @endcan
                @can('kepala')
                    <a href="/kepala/laporan/imunisasi" class="btn btn-primary mb-3" target="blank">Generate Laporan</a>
                @endcan
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Orang Tua</th>
                            <th>Nama Anak</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Tekanan Darah</th>
                            <th>Jenis Imunisasi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imunisasis as $imunisasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $imunisasi->pasien->nama_pasien }}</td>
                                <td>{{ $imunisasi->nama_anak }}</td>
                                <td>{{ $imunisasi->berat_badan }}</td>
                                <td>{{ $imunisasi->tinggi_badan }}</td>
                                <td>{{ $imunisasi->tekanan_darah }}</td>
                                <td>{{ $imunisasi->jenis_imunisasi }}</td>
                                <td>{{ $imunisasi->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
