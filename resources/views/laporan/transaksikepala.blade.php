<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* CSS untuk mengatur gaya teks dalam sel tabel */
        .table-responsive table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* CSS untuk menghilangkan border-collapse pada sel tabel responsif */
        .table-responsive table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .table-responsive table th,
        .table-responsive table td {
            padding: 8px;
            text-align: center;
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            /* padding-left: 15px;
            padding-right: 15px; */
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 14px;
        }

        th {
            background-color: #ffb300;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="title">Laporan Transaksi</div>
        <div class="subtitle">PMB EKA MERDEKAWATI</div>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Bidan</th>
                    <th>Layanan</th>
                    <th>Bayar</th>
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
                        <td>{{ $transaksi->transaksi->pasien->nama_pasien }}</td>
                        <td>{{ $transaksi->transaksi->user->nama}}</td>
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
    </div>
    <div class="footer">
        Laporan dihasilkan pada: <?php echo date('d-m-Y H:i:s'); ?>
    </div>
</body>

</html>
