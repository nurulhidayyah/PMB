@extends('layouts.dashboard')

@section('title')
    PMB | Ubah Password
@endsection

@section('container')
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="/setting/password/{{ auth()->user()->id }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password"
                        class="form-control @error('current_password')
                        is-invalid
                    @enderror"
                        id="current_password" name="current_password">
                    @error('current_password')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password"
                        class="form-control @error('password')
                    is-invalid
                @enderror"
                        id="password" name="password">
                    @error('password')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>

        </div>
    </div>
@endsection
