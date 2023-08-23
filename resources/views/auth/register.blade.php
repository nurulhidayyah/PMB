@extends('layouts.main')
@section('title')
    PMB - Registrasi
@endsection

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg my-5">
                <div class="card-body p-0 ">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" method="post" action="/register">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col mb-3 mb-sm-0">
                                            <input type="text"
                                                class="form-control form-control-user @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" placeholder="Full Name" value="{{ old('nama') }}" required>
                                            @error('nama')
                                                <small class="text-danger pl-3">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col mb-3 mb-sm-0">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                                            @error('email')
                                                <small class="text-danger pl-3">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col mb-3 mb-sm-0">
                                            <input type="text"
                                                class="form-control form-control-user @error('phone') is-invalid @enderror"
                                                id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <small class="text-danger pl-3">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col mb-3 mb-sm-0">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password" name="password" placeholder="Password" required>
                                            @error('password')
                                                <small class="text-danger pl-3">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="/">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
