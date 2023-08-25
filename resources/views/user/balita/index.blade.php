@extends('layouts.dashboard')

@section('title')
    PMB | Rekam Medis
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">Tabel Rekam Medis Balita</h2>
    <!-- DataTales Example -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @error('nama_balita')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('berat_badan')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('tinggi_badan')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('tekanan_darah')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('diagnosa')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('keterangan')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">Tambah Rekam
                    Medis</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Nama Orang Tua</th>
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
        </div>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Rekam Medis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/user/rekam_medis/balita" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pasien_id">NIK Orang Tua</label>
                            <select name="pasien_id" id="pasien_id"
                                class="form-control @error('berat_badan') is-invalid @enderror" required>
                                <option value="">NIK Orang Tua</option>
                                @php
                                    // Mengambil data pasien dari database dan mengurutkannya berdasarkan nama pasien dalam urutan abjad
                                    $pasiens = App\Models\Pasien::orderBy('nama_pasien')->get();
                                @endphp

                                @foreach ($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}">{{ $pasien->nama_pasien }} - {{ $pasien->nik }}
                                    </option>
                                @endforeach
                            </select>
                            @error('berat_badan')
                                <small class="text-danger pl-3">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <select name="pasien_id" id="pasien_id" class="form-control" required>
                                <option value="">NIK Pasien</option>
                                @foreach ($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}">{{ $pasien->nik }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_balita" name="nama_balita"
                                placeholder="Nama Balita" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="berat_badan" name="berat_badan"
                                placeholder="Berat Badan" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan"
                                placeholder="Tinggi Badan" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah"
                                placeholder="Tekanan Darah" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="diagnosa" name="diagnosa"
                                placeholder="Diagnosa" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                placeholder="Keterangan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
