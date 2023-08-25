@extends('layouts.dashboard')

@section('title')
    PMB | Rekam Medis
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">TABEL REKAM MEDIS KB</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <a href="/admin/laporan/kb" class="btn btn-primary mb-3" target="blank">Generate Laporan</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Nama Pasangan</th>
                            <th>Jenis KB</th>
                            <th>Tanggal Ulang KB</th>
                            <th>Jumlah Anak</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kbs as $kb)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kb->pasien->nama_pasien }}</td>
                                <td>{{ $kb->nama_pasangan }}</td>
                                <td>{{ $kb->jenis_kb }}</td>
                                <td>{{ date('d-m-Y', $kb->tanggal_pemasangan) }}</td>
                                <td>{{ $kb->jumlah_anak }}</td>
                                <td>{{ $kb->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
