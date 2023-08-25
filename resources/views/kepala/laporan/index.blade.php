@extends('layouts.dashboard')

@section('title')
    PMB | Laporan Transaksi
@endsection

@section('container')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <h2 class="fas fa-table">Lapora Transaksi</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="col-lg-12 table-responsive">
                <form class="row g-3 col-md-6" action="{{ route('laporan.transaksikepala') }}" method="GET">
                    <div class="input-group">
                        <input type="date" class="form-control" name="start_date" placeholder="tanggal">
                        <input type="date" class="form-control" name="end_date" placeholder=" tanggal">
                        <input type="text" class="form-control" name="search" placeholder="Cari Transaksi...">
                        <div class="input-group-append">
                            <button class="btn btn-secondary mb-3" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('laporan.transaksikepala', [
                    'print' => 1,
                    'page' => $transaksis->currentPage(),
                    'search' => request('search'),
                    'start_date' => request('start_date'),
                    'end_date' => request('end_date'),
                ]) }}"
                    class="btn btn-primary mb-3" target="_blank">Generate Laporan</a>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nama Bidan</th>
                            <th>Nama Pasien</th>
                            <th>Nama Layanan</th>
                            <th>Pembayaran</th>
                            <th>Kembalian</th>
                            <th>ID Obat</th>
                            <th>Nama Obat</th>
                            <th>Harga Obat</th>
                            <th>Quantity</th>
                            <th>Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $transaksi->transaksi_id }}</td>
                                <td>{{ date('d-m-Y', strtotime($transaksi->transaksi->tanggal)) }}</td>
                                <td>{{ $transaksi->transaksi->user->nama }}</td>
                                <td>{{ $transaksi->transaksi->pasien->nama_pasien }}</td>
                                <td>{{ $transaksi->transaksi->penanganan->nama_layanan }}:
                                    {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                                <td>{{ number_format($transaksi->transaksi->pembayaran, 0, ',', '.') }}</td>
                                <td>{{ number_format($transaksi->transaksi->kembalian, 0, ',', '.') }}</td>
                                <td>{{ $transaksi->obat->id }}</td>
                                <td>{{ $transaksi->obat->nama_obat }}</td>
                                <td>{{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                                <td>{{ $transaksi->quantity }}</td>
                                <td>{{ number_format($transaksi->transaksi->total_biaya, 0, ',', '.') }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $transaksis->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
