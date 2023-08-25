<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rekam Medis Kehamilan</title>
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
        <div class="title">Laporan Rekam Medis Kehamilan</div>
        <div class="subtitle">PMB EKA MERDEKAWATI</div>
    </div>

    <div class="corps">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Berat Badan</th>
                    <th>Tinggi Badan</th>
                    <th>Tekanan Darah</th>
                    <th>UK</th>
                    <th>Prest</th>
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

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="corps">
        <table>
            <thead>
                <tr>
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

                        <td>{{ date('d-m-Y', $kehamilan->tp) }}</td>
                        <td>{{ date('d-m-Y', $kehamilan->hppt) }}</td>
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

    <div class="footer">
        Laporan dihasilkan pada: <?php echo date('d-m-Y H:i:s'); ?>
    </div>
</body>

</html>
