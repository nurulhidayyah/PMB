@extends('layouts.dashboard')

@section('title')
    PMB | Pasien
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">TABEL PASIEN</h2>
    <!-- DataTales Example -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @error('nik')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('nama_pasien')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('umur')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('jenis_kelamin')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('no_hp')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('alamat')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="row g-3 col-md-3" action="" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari pasien...">
                    <div class="input-group-append">
                        <button class="btn btn-secondary mb-3" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">Tambah Pasien</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Identitas</th>
                            <th>Nama Pasien</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasiens as $pasien)
                            @php
                                // Hitung nomor yang sesungguhnya berdasarkan halaman dan nomor iterasi
                                $realNumber = ($pasiens->currentPage() - 1) * $pasiens->perPage() + $loop->iteration;
                            @endphp
                            <tr>
                                <td>{{ $realNumber }}</td>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $pasien->nik }}</td>
                                <td>{{ $pasien->nama_pasien }}</td>
                                <td>{{ $pasien->umur }}</td>
                                <td>{{ $pasien->jenis_kelamin }}</td>
                                <td>{{ $pasien->no_hp }}</td>
                                <td>{{ $pasien->alamat }}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#updatePasien{{ $pasien->id }}"
                                        class="badge badge-warning">Edit</a>
                                    <form action="/admin/pasien/{{ $pasien->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge badge-danger border-0"
                                            onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                    <a href="{{ url('/admin/cetak_kartu/' . $pasien->id) }}" class="badge badge-primary"
                                        target="_blank">Cetak Kartu</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pasiens->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/pasien" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="number" class="form-control" id="nik" name="nik"
                                placeholder="No Identitas" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien"
                                placeholder="Nama Pasien" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur"
                                required>
                        </div>
                        <div class="form-group">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_hp" name="no_hp"
                                placeholder="No Hp" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Alamat" required>
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

    <!-- Modal Edit-->
    @foreach ($pasiens as $pasien)
        <div class="modal fade" id="updatePasien{{ $pasien->id }}" tabindex="-1" role="dialog"
            aria-labelledby="updatePasienLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updatePasienLabel">Update Pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/admin/pasien/{{ $pasien->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="number" class="form-control" id="nik" name="nik"
                                    value="{{ $pasien->nik }}" placeholder="No Identitas" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien"
                                    value="{{ $pasien->nama_pasien }}" placeholder="Nama Pasien" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="umur" name="umur"
                                    value="{{ $pasien->umur }}" placeholder="Umur" required>
                            </div>
                            <div class="form-group">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">Jenis Kelamin</option>
                                    <option value="Laki-laki"
                                        {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    value="{{ $pasien->no_hp }}" placeholder="No Hp" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $pasien->alamat }}" placeholder="Alamat" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
