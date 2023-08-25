@extends('layouts.dashboard')

@section('title')
    PMB | Rekam Medis
@endsection

@section('container')
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang {{ auth()->user()->nama }}</h1>

    <h4 class="h4 mb-4 text-gray-800">Form Rekam Medis</h4>

    <form action="/user/rekam_medis/kehamilan" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="pasien_id">NIK Pasien</label>
                    <select name="pasien_id" id="pasien_id" class="form-control @error('berat_badan') is-invalid @enderror"
                        required>
                        <option value="">NIK Pasien</option>
                        @php
                            // Mengambil data pasien dari database dan mengurutkannya berdasarkan nama pasien dalam urutan abjad
                            $pasiens = App\Models\Pasien::orderBy('nama_pasien')->get();
                        @endphp

                        @foreach ($pasiens as $pasien)
                            <option value="{{ $pasien->id }}">{{ $pasien->nama_pasien }} - {{ $pasien->nik }}</option>
                        @endforeach
                    </select>
                    @error('berat_badan')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berat_badan">Berat Badan</label>
                    <input type="text"
                        class="form-control @error('berat_badan')
                    is-invalid @enderror" id="berat_badan"
                        name="berat_badan" value="{{ old('berat_badan') }}" required>
                    @error('berat_badan')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="djj">DJJ</label>
                    <input type="text" class="form-control @error('djj')
                    is-invalid @enderror"
                        id="djj" name="djj" value="{{ old('djj') }}" required>
                    @error('djj')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tfu">TFU</label>
                    <input name="tfu" id="tfu" class="form-control @error('tfu') is-invalid @enderror"
                        value="{{ old('tfu') }}" required>
                    @error('tfu')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gravida">Gravida</label>
                    <input name="gravida" id="gravida" class="form-control @error('gravida') is-invalid @enderror"
                        value="{{ old('gravida') }}" required>
                    @error('gravida')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lila">Lila</label>
                    <input name="lila" id="lila" class="form-control @error('lila') is-invalid @enderror"
                        value="{{ old('lila') }}" required>
                    @error('lila')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="diagnosa">Diagnosa</label>
                    <input name="diagnosa" id="diagnosa" class="form-control @error('diagnosa') is-invalid @enderror"
                        value="{{ old('diagnosa') }}" required>
                    @error('diagnosa')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="tinggi_badan">Tinggi Badan</label>
                    <input name="tinggi_badan" id="tinggi_badan"
                        class="form-control @error('tinggi_badan') is-invalid @enderror" value="{{ old('tinggi_badan') }}"
                        required>
                    @error('tinggi_badan')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tekanan_darah">Tekanan Darah</label>
                    <input name="tekanan_darah" id="tekanan_darah"
                        class="form-control @error('tekanan_darah') is-invalid @enderror"
                        value="{{ old('tekanan_darah') }}" required>
                    @error('tekanan_darah')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="uk">UK</label>
                    <input name="uk" id="uk" class="form-control @error('uk') is-invalid @enderror"
                        value="{{ old('uk') }}" required>
                    @error('uk')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="prest">Prest</label>
                    <input name="prest" id="prest" class="form-control @error('prest') is-invalid @enderror"
                        value="{{ old('prest') }}" required>
                    @error('prest')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tp">TP</label>
                    <input type="date" name="tp" id="tp"
                        class="form-control @error('tp') is-invalid @enderror" value="{{ old('tp') }}" required>
                    @error('tp')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hppt">HPPT</label>
                    <input type="date" name="hppt" id="hppt"
                        class="form-control @error('hppt') is-invalid @enderror" value="{{ old('hppt') }}" required>
                    @error('hppt')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input name="keterangan" id="keterangan"
                        class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}"
                        required>
                    @error('keterangan')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Masukan</button>
                </div>
            </div>
        </div>
    </form>
@endsection
