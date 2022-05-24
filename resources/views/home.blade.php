@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Banner -->
    <section class="main-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner-caption">
                                    <h4>Selamat Datang di website <em>Sistem Pelayanan Publik</em> Desa Nongkojajar</h4>
                                    <span>DESA NONGKOJAJAR, KAB. PASURUAN</span>
                                    @guest
                                    <p>Silahkan gunakan tombol <strong>Login</strong> untuk melihat data keluarga anda!
                                    </p>
                                    <div class="primary-button">
                                        <a href="{{ route('login') }}">LOGIN</a>
                                    </div>
                                    @else 
                                    <p>Silahkan gunakan tombol <strong>Keluarga</strong> untuk melihat data keluarga anda!
                                    </p>
                                    <div class="primary-button">
                                        <a href="{{ route('keluarga.index') }}">Keluarga</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Image -->
    <section class="top-image">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('images/top-image.jpg') }}" alt="">
                    <div class="down-content">
                        <h4>Menuju Desa Maju</h4>
                        <p>Melayani masyarakat secara cepat, akurat, dan transparan adalah komitmen
                        kami dalam memajukan <strong><em>Desa Contro</em></strong>. Maka website untuk desa ini kami
                        hadirkan untuk mewujudkan <strong><em>Desa Maju dan Mandiri</em></strong>.</p>
                        <div class="primary-button">
                            <a href="#">#MenujuDesaMaju</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
