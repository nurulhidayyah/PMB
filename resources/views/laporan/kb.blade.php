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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Nama Pasangan</th>
                            <th>Jenis KB</th>
                            <th>Tanggal Pemasangan</th>
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
</body>

</html>
