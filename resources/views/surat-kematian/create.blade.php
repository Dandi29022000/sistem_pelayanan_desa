@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Surat Kematian</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data kematian</strong></h3>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Perhatian!</strong> Ada masalah dengan inputan anda<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('surat-kematian.store') }}">
                        @csrf
                            <div class="form-group">
                                <label for="nik">NIK Wafat :</label>
                                <select class="form-control" name="nik" id="nik">
                                    <option disabled selected>Pilih NIK</option>
                                    @foreach ($anggota as $agt)
                                        <option value="{{ $agt->nik }}">{{ $agt->nik }} | {{ $agt->keluarga->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_kk">Nomor KK :</label>
                                @foreach ($anggota as $agt)
                                    @if ($loop->iteration == 1)
                                    <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $agt->no_kk }}" readonly>
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="tanggal_meninggal">Tanggal Wafat:</label>
                                <input type="date" class="form-control" id="tanggal_meninggal" name="tanggal_meninggal" placeholder="Pilih Tanggal Wafat">
                            </div>
                            <div class="form-group">
                                <label for="penyebab_meninggal">Sebab Wafat :</label>
                                <textarea class="form-control" id="penyebab_meninggal" name="penyebab_meninggal" placeholder="Masukkan Penyebab Wafat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tempat_meninggal">Tempat Wafat :</label>
                                <input type="text" class="form-control" id="tempat_meninggal" name="tempat_meninggal" placeholder="Masukkan Kota">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('surat-kematian.index') }}" class="btn btn-danger">CANCEL</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
