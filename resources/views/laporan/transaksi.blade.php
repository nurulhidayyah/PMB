@extends('layouts.dashboard')

@section('title')
    PMB | Laporan Transaksi
@endsection

@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Laporan Transaksi</h1>
        <div class="row">
            <div class="col-lg-12 table-responsive">
                <a href="/admin/laporan/transaksi" target="blank" class="btn btn-primary mb-3">Generate Laporan</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nama Pasien</th>
                            <th>Harga Obat</th>
                            <th>Pembayaran</th>
                            <th>Kembalian</th>
                            <th>ID Obat</th>
                            <th>Nama Obat</th>
                            <th>Quantity</th>
                            <th>Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $transaksi->transaksi_id }}</td>
                                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                                <td>{{ $transaksi->transaksi->pasien->nama_pasien }}</td>
                                <td>{{ $transaksi->harga}}</td>
                                <td>{{ $transaksi->transaksi->pembayaran }}</td>
                                <td>{{ $transaksi->transaksi->kembalian }}</td>
                                <td>{{ $transaksi->obat->id }}</td>
                                <td>{{ $transaksi->obat->nama_obat }}</td>
                                <td>{{ $transaksi->quantity }}</td>
                                <td>{{ $transaksi->transaksi->total_biaya }}</td>
                            </tr>
                            {{-- <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ count($transaksi->detailTransaksis) }}">{{ $transaksi->id }}</td>
                                    <td rowspan="{{ count($transaksi->detailTransaksis) }}">
                                        {{ $transaksi->created_at->format('d-m-Y') }}</td>
                                    <td rowspan="{{ count($transaksi->detailTransaksis) }}">
                                        {{ $transaksi->pasien->nama_pasien }}</td>
                                    <td rowspan="{{ count($transaksi->detailTransaksis) }}">Rp.
                                        {{ number_format($transaksi->total_biaya) }}</td>
                                    <td rowspan="{{ count($transaksi->detailTransaksis) }}">Rp.
                                        {{ number_format($transaksi->pembayaran) }}</td>
                                    <td rowspan="{{ count($transaksi->detailTransaksis) }}">Rp.
                                        {{ number_format($transaksi->kembalian) }}</td>
                                @endif
                                <td>{{ $detail->obat_id }}</td>
                                <td>{{ $detail->nama_obat }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>Rp. {{ number_format($detail->harga) }}</td>
                            </tr> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
