@extends('layouts.dashboard')

@section('title')
    PMB | Obat
@endsection

@section('container')
    <!-- Page Heading -->
    <h2 class="fas fa-table">TABEL OBAT</h2>
    <!-- DataTales Example -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @error('nama_obat')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('jenis_obat')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('harga')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('stok')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('expire_date')
        <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Tambah form pencarian di atas tabel -->
            <form class="row g-3 col-md-3" action="{{ route('obat.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari obat...">
                    <div class="input-group-append">
                        <button class="btn btn-secondary mb-3" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">Tambah Obat</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Expire</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obats as $obat)
                        @php
                        // Hitung nomor yang sesungguhnya berdasarkan halaman dan nomor iterasi
                        $realNumber = ($obats->currentPage() - 1) * $obats->perPage() + $loop->iteration;
                    @endphp
                            <tr>
                                <td>{{ $realNumber}}</td>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $obat->nama_obat }}</td>
                                <td>{{ $obat->jenis_obat }}</td>
                                <td>{{ $obat->harga }}</td>
                                <td>{{ $obat->stok }}</td>
                                <td>{{ date('d-m-Y', $obat->expire_date) }}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#updateObat{{ $obat->id }}"
                                        class="badge badge-warning">Edit</a>
                                    <form action="/admin/obat/{{ $obat->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge badge-danger border-0"
                                            onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $obats->links() }}
            </div>
        </div>

    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/obat" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat"
                                placeholder="Nama Obat" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jenis_obat" name="jenis_obat"
                                placeholder="Jenis Obat" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="harga" name="harga"
                                placeholder="Harga" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="expire_date" name="expire_date"
                                placeholder="Expire" required>
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
    @foreach ($obats as $obat)
        <div class="modal fade" id="updateObat{{ $obat->id }}" tabindex="-1" role="dialog"
            aria-labelledby="updateObatLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateObatLabel">Update Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/admin/obat/{{ $obat->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="{{ $obat->id }}">
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat"
                                    value="{{ $obat->nama_obat }}" placeholder="Nama Obat" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jenis_obat" name="jenis_obat"
                                    value="{{ $obat->jenis_obat }}" placeholder="Jenis Obat" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="harga" name="harga"
                                    value="{{ $obat->harga }}" placeholder="harga" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="stok" name="stok"
                                    value="{{ $obat->stok }}" placeholder="Stok" required>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="expire_date" name="expire_date"
                                    value="{{ date('Y-m-d', $obat->expire_date) }}" placeholder="Expire" required>
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
