@extends('layouts.dashboard')

@section('title')
    PMB | Rekam Medis
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">Tabel Rekam Medis KB</h2>
    <!-- DataTales Example -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @error('nama_pasangan')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('jenis_kb')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('tanggal_pemasangan')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('jumlah_anak')
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
                <form action="/user/rekam_medis/kb" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pasien_id">NIK Pasien</label>
                            <select name="pasien_id" id="pasien_id"
                                class="form-control @error('berat_badan') is-invalid @enderror" required>
                                <option value="">NIK Pasien</option>
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

                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan"
                                placeholder="Nama Pasangan" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jenis_kb" name="jenis_kb" placeholder="Jenis KB"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_pemasangan" name="tanggal_pemasangan"
                                placeholder="Tanggal Ulang KB" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jumlah_anak" name="jumlah_anak"
                                placeholder="Jumlah Anak" required>
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
