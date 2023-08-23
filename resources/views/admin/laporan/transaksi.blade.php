<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ffb300;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Laporan Transaksi</h1>

    <table id="customers">
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
                    <td>{{ $transaksi->harga }}</td>
                    <td>{{ $transaksi->transaksi->pembayaran }}</td>
                    <td>{{ $transaksi->transaksi->kembalian }}</td>
                    <td>{{ $transaksi->obat->id }}</td>
                    <td>{{ $transaksi->obat->nama_obat }}</td>
                    <td>{{ $transaksi->quantity }}</td>
                    <td>{{ $transaksi->transaksi->total_biaya }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
