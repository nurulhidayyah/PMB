<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Kartu Pasien</title>
    <style>
        * {
            margin: 0;
            padding: 0
        }

        @page {
            size: 3.37in 2.12in
        }

        #judul {
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        #halaman {
            width: 3.37in;
            height: auto;
            position: absolute;
            margin-left: 0.5px
        }
    </style>
</head>

<body>
    <div id="halaman">
        <table style="line-height: 24px">
            <tr>
                <td colspan="12" style="background-color: orange; padding-left: 10px; padding-top: 5px" width="700">
                    <img src="img/logo.png" width="40" style="float: left; margin-top: 3px; margin-left: 10px">
                    <center>
                        <font style="line-height: 20px; font-size: 20px; font-style: bold; color: white">Kartu Pasien</font><br>
                        <font style="line-height: 20px; font-size: 20px; font-style: bold; color: white">PMB Eka Merdekawati</font><br>
                    </center>
                </td>
            </tr>
            <br>
            <tr>
                <td></td>
                <td colspan="2">NIK</td>
                {{-- <td></td> --}}
                <td colspan="9">: {{ $data->nik }}</td>
                {{-- <td rowspan="5">
                    <div style="overflow: hidden; height: 100px; padding-right: 10px">
                        <img src="{{ 'storage/' . $data->pas_foto }}" alt="" width="70px">
                    </div>
                </td> --}}
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Nama</td>
                {{-- <td></td> --}}
                <td colspan="9">: {{ $data->nama_pasien }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Alamat</td>
                {{-- <td></td> --}}
                <td colspan="9">: {{ $data->alamat }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" width="300">No. Telepon</td>
                {{-- <td></td> --}}
                <td colspan="9">: {{ $data->no_hp }}</td>
            </tr>
        </table>
    </div>
</body>
