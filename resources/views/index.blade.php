@extends('layouts.landing')

@section('title')
    PMB EKA - Beranda
@endsection

@section('content')
    <!-- Header -->
    <section class="header">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-5">
                    <h1>lebih praktis <br> dengan <span>PMB EKA</span></h1>
                    <p>menjadi standarisasi pelayanan kebidanan Praktik Mandiri Bidan di Indonesia..</p>

                    <div class="row justify-content-xl-start justify-content-center">
                        <div class="col-md-3"></div>
                        <div class="col-6 col-sm-5">
                            <a href="/login" class="btn btn-primary btn-block">Masuk</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 d-none d-lg-block">
                    <img src="/img/hero.jpg" class="img-fluid" alt="Hero Image">
                </div>
            </div>
        </div>
    </section>
    
    <!-- footer -->
    <footer class="border-top p-5">
        <div class="container">
            <div class="row text-center mt-3">
                <div class="col text-light">
                    <p>Copyright &copy; 2023 &mdash; PMB Eka Merdekawati | All right reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
@endsection
