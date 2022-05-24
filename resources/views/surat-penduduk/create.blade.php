@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Surat Menjadi Penduduk</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Silahkan masukkan data menjadi penduduk</h3>
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
                        <form method="POST" action="{{ route('surat-penduduk.store') }}">
                        @csrf
                            <div class="form-group">
                                <label for="nik">NIK :</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK">
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
                                <label for="nama">Nama :</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="jenis-kelamin">Jenis Kelamin :</label>
                                <div class="row">
                                    <div class="col-sm">
                                        <input type="radio" class="form-control" id="L" value="L" name="jenis_kelamin">
                                        <label for="L">Laki-laki</label>
                                    </div>
                                    <div class="col-sm">
                                        <input type="radio" class="form-control" id="P" value="P" name="jenis_kelamin">
                                        <label for="P">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat Lahir :</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                    placeholder="Masukkan Kota">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir :</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                    placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31"
                                    placeholder="Pilih Tanggal">
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama :</label>
                                <select class="form-control" name="agama" id="agama">
                                    <option disabled selected>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Kong Hu Chu">Kong Hu Chu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_pekerjaan">Jenis Pekerjaan :</label>
                                <input type="text" class="form-control" name="jenis_pekerjaan" id="jenis_pekerjaan" placeholder="Masukkan Pekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="kewarganegaraan">Kewarganegaraan :</label>
                                <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" placeholder="Masukkan Kewarganegaraan">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat :</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="rt">RT :</label>
                                        <input type="text" class="form-control" id="rt" name="rt" placeholder="000">
                                    </div>
                                    <div class="col-sm">
                                        <label for="rw">RW :</label>
                                        <input type="text" class="form-control" id="rw" name="rw" placeholder="000">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desa">Desa :</label>
                                <input type="text" class="form-control" id="desa" name="desa" placeholder="Masukkan Desa">
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan :</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukkan Kecamatan">
                            </div>
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten :</label>
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Masukkan Kabupaten ">
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi :</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Masukkan Provinsi ">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('surat-penduduk.index') }}" class="btn btn-danger">CANCEL</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
