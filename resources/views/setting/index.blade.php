@extends('layouts.dashboard')

@section('title')
    PMB | Profile
@endsection

@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="row">
        <div class="col-lg-8">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->nama }}" class="img-thumbnail">
                @else
                    <img src="/assets/img/undraw_profile.svg">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="Nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nohp" class="col-sm-4 col-form-label">No Handphone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $user->phone }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Temmpat Tanggal Lahir" class="col-sm-4 col-form-label">Tempat,Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="" class="form-control"
                                value="{{ $user->tempat_lahir }}, @if ($user->tempat_lahir !== null) {{ date('d-m-Y', $user->tanggal_lahir) }}
                                @else
                                - @endif"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $user->alamat }}" readonly>
                        </div>
                    </div>
                    <p class="card-text text-center"><small class="text-muted">{{ $user->user_role->role }} Sejak
                            {{ $user->created_at->format('d-m-Y') }}</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
