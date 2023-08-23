<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Heading -->
    <h2 class="fas fa-table">TABEL REKAM MEDIS</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Tekanan Darah</th>
                        <th>Diagnosa</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($umums as $umum)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $umum->pasien->nama_pasien }}</td>
                            <td>{{ $umum->berat_badan }}</td>
                            <td>{{ $umum->tinggi_badan }}</td>
                            <td>{{ $umum->tekanan_darah }}</td>
                            <td>{{ $umum->diagnosa }}</td>
                            <td>{{ $umum->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>