<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rekam Medis KB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .logo {
            max-width: 100px;
            height: auto;
        }

        .title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 16px;
        }

        .corps {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
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
        <div class="title">Laporan Rekam Medis KB</div>
        <div class="subtitle">PMB EKA MERDEKAWATI</div>
    </div>

    <div class="corps">
        <table>
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
    <div class="footer">
        Laporan dihasilkan pada: <?php echo date('d-m-Y H:i:s'); ?>
    </div>
</body>

</html>
