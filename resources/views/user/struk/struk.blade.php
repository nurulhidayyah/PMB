<!DOCTYPE html>
<html>

<head>
    <title>Struk Pelayanan Kesehatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .receipt {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .receipt h2 {
            margin: 0;
            text-align: center;
        }

        .receipt p {
            margin: 10px 0;
            text-align: left;
        }

        .label {
            display: inline-block;
            width: 120px;
        }

        .tengah {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="receipt">
        <h2>Struk Transaksi</h2>
        <p><span class="tengah"><strong>PMB EKA MERDEKAWATI</strong></span></p>
        <p><span class="tengah"><strong>Kp. rego pasar, ds. Padasuka, Kec. Serang, Kab.
                    Petir Serang-Banten </strong></span></p>
        <hr>
        <p><span class="label"><strong>No Transaksi</strong></span><span class="label">:{{ $transaksi->id }}</span></p>
        <p><span class="label"><strong>Tanggal</strong></span><span
                class="label">:{{ $transaksi->created_at->format('d-m-Y') }}</span>
        </p>
        <p><span class="label"><strong>Nama Pasien</strong></span><span
                class="label">:{{ $transaksi->pasien->nama_pasien }}</span>
        </p>
        <p><span class="label"><strong>NIK Pasien</strong></span><span
                class="label">:{{ $transaksi->pasien->nik }}</span></p>
        <p><span class="label"><strong>Alamat Pasien</strong></span><span
                class="label">:{{ $transaksi->pasien->alamat }}</span></p>
        <p><span class="label"><strong>Layanan</strong></span><span
                class="label">:{{ $transaksi->penanganan->nama_layanan }}</span></p>
        <p><span class="label"><strong>Uang Bayar</strong></span><span class="label">:Rp.
                {{ $transaksi->pembayaran }}</span></p>
        <p><span class="label"><strong>Kembalian</strong></span><span class="label">:Rp.
                {{ $transaksi->kembalian }}</span></p>
    </div>
</body>

</html>
