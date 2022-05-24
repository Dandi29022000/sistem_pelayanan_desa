@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Anggota Keluarga</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Kepala Keluarga</strong></h3>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nama Lengkap</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $kepala->keluarga->nama }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">NIK</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $kepala->nik }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($kepala->keluarga->jenis_kelamin == "L")
                                Laki-laki
                                @else
                                Perempuan
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Tempat Lahir</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $kepala->keluarga->tempat_lahir }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Tanggal Lahir</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $kepala->keluarga->tanggal_lahir }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Pendidikan Terakhir</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $kepala->keluarga->pendidikan }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Anggota Keluarga</h2>
                </div>
                <div class="default-table">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $agt)
                            @if($agt->nik != $kepala->nik)
                            <tr>
                                <td>{{ ($loop->iteration)-1 }}</td>
                                <td>{{ $agt->nik }}</td>
                                <td>{{ $agt->keluarga->nama}}</td>
                                <td>@if($agt->keluarga->jenis_kelamin == "L") Laki-laki
                                    @else Perempuan @endif</td>
                                <td>{{ $agt->keluarga->tempat_lahir }}</td>
                                <td>{{ $agt->keluarga->tanggal_lahir }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
