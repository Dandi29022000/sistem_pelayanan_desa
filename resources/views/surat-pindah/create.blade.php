@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Surat Kepindahan</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Silahkan masukkan data kepindahan</h3>
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
                        <form method="POST" action="{{ route('surat-pindah.store') }}">
                        @csrf
                            <div class="form-group">
                                <label for="nik">NIK :</label>
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
                                <label for="alamat_tujuan">Alamat Tujuan :</label>
                                <textarea class="form-control" id="alamat_tujuan" name="alamat_tujuan" placeholder="Masukkan Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="rt_tujuan">RT :</label>
                                        <input type="text" class="form-control" id="rt_tujuan" name="rt_tujuan" placeholder="000">
                                    </div>
                                    <div class="col-sm">
                                        <label for="rw_tujuan">RW :</label>
                                        <input type="text" class="form-control" id="rw_tujuan" name="rw_tujuan" placeholder="000">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desa_tujuan">Desa Tujuan :</label>
                                <input type="text" class="form-control" id="desa_tujuan" name="desa_tujuan" placeholder="Masukkan Desa Tujuan">
                            </div>
                            <div class="form-group">
                                <label for="kecamatan_tujuan">Kecamatan Tujuan :</label>
                                <input type="text" class="form-control" id="kecamatan_tujuan" name="kecamatan_tujuan" placeholder="Masukkan Kecamatan Tujuan">
                            </div>
                            <div class="form-group">
                                <label for="kabupaten_tujuan">Kabupaten Tujuan :</label>
                                <input type="text" class="form-control" id="kabupaten_tujuan" name="kabupaten_tujuan" placeholder="Masukkan Kabupaten Tujuan">
                            </div>
                            <div class="form-group">
                                <label for="provinsi_tujuan">Provinsi Tujuan :</label>
                                <input type="text" class="form-control" id="provinsi_tujuan" name="provinsi_tujuan" placeholder="Masukkan Provinsi Tujuan">
                            </div>
                            <div class="form-group">
                                <label for="kode_pos_tujuan">Kode Pos Tujuan :</label>
                                <input type="text" class="form-control" id="kode_pos_tujuan" name="kode_pos_tujuan" placeholder="Masukkan Kode Pos Tujuan">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('surat-pindah.index') }}" class="btn btn-danger">CANCEL</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
