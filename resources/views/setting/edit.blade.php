@extends('layouts.dashboard')

@section('title')
    PMB | Edit Profile
@endsection

@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <form action="/setting/{{ auth()->user()->id }}" enctype="multipart/form-data" method="post">
                @method('put')
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ auth()->user()->email }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text"
                            class="form-control @error('nama')
                            is-invalid
                        @enderror"
                            id="nama" name="nama" value="{{ old('nama', auth()->user()->nama) }}">
                        @error('nama')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ old('tempat_lahir', auth()->user()->tempat_lahir) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ date('Y-m-d', auth()->user()->tanggal_lahir) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="jenis_kelamin">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option name="jenis_kelamin" value="Laki-laki" {{ auth()->user()->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option name="jenis_kelamin" value="Perempuan" {{ auth()->user()->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="agama">
                            <option value="">-- Pilih Agama --</option>
                            <option name="agama" value="Islam" {{ auth()->user()->agama === 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option name="agama" value="Kristen" {{ auth()->user()->agama === 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option name="agama" value="Katolik" {{ auth()->user()->agama === 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option name="agama" value="Budha" {{ auth()->user()->agama === 'Budha' ? 'selected' : '' }}>Budha</option>
                            <option name="agama" value="Hindu" {{ auth()->user()->agama === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                            value="{{ old('pekerjaan', auth()->user()->pekerjaan) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ old('alamat', auth()->user()->alamat) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="nik" name="nik"
                            value="{{ old('nik', auth()->user()->nik) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">Picture</div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                @if (auth()->user()->image == null)
                                    <img src="/assets/img/undraw_profile.svg" class="img-thumbnail img-preview mb-3">
                                @elseif (auth()->user()->image)
                                    <img src="{{ asset('storage/' . auth()->user()->image) }}"
                                        class="img-thumbnail img-preview mb-3">
                                @else
                                    <img class="img-thumbnail img-preview mb-3">
                                @endif
                                <input type="hidden" name="oldImage" id="oldImage" value="{{ auth()->user()->image }}">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input onchange="previewImage()" type="file"
                                        class="custom-file-input @error('image')
                                        is-invalid
                                    @enderror"
                                        id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image')
                                        <small class="text-danger pl-3">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
