<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rekam Medis Balita</title>
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
        <div class="title">Laporan Rekam Medis Balita</div>
        <div class="subtitle">PMB EKA MERDEKAWATI</div>
    </div>

    <div class="corps">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Orang Tua</th>
                    <th>Nama balita</th>
                    <th>Berat Badan</th>
                    <th>Tinggi Badan</th>
                    <th>Tekanan Darah</th>
                    <th>Diagnosa</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($balitas as $balita)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $balita->pasien->nama_pasien }}</td>
                        <td>{{ $balita->nama_balita }}</td>
                        <td>{{ $balita->berat_badan }}</td>
                        <td>{{ $balita->tinggi_badan }}</td>
                        <td>{{ $balita->tekanan_darah }}</td>
                        <td>{{ $balita->diagnosa }}</td>
                        <td>{{ $balita->keterangan }}</td>
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
