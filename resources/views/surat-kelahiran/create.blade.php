@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Surat Kelahiran</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data kelahiran</strong></h3>
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
                        <form method="POST" action="{{ route('surat-kelahiran.store') }}" id="surat_kelahiran">
                            @csrf
                            <div class="form-group">
                                <label for="waktu">Waktu Lahir :</label>
                                <input type="date" class="form-control" name="waktu_lahir" id="waktu_lahir"
                                    placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31"
                                    placeholder="Pilih Tanggal">
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat Lahir :</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                    placeholder="Masukkan Kota">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Anak :</label>
                                <input type="text" class="form-control" name="nama_anak" id="nama_anak"
                                    placeholder="Masukkan Nama Lengkap">
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
                                <label for="goldar">Golongan Darah :</label>
                                <div class="row">
                                    <div class="col-sm">
                                        <input type="radio" class="form-control" id="A" value="A" name="golongan_darah">
                                        <label for="A">A</label>
                                    </div>
                                    <div class="col-sm">
                                        <input type="radio" class="form-control" id="B" value="B" name="golongan_darah">
                                        <label for="B">B</label>
                                    </div>
                                    <div class="col-sm">
                                        <input type="radio" class="form-control" id="O" value="O" name="golongan_darah">
                                        <label for="O">O</label>
                                    </div>
                                    <div class="col-sm">
                                        <input type="radio" class="form-control" id="AB" value="AB"
                                            name="golongan_darah">
                                        <label for="AB">AB</label>
                                    </div>
                                </div>
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
                                <label for="anak_ke">Anak Ke : </label>
                                <input type="number" value="1" id="anak_ke" name="anak_ke" min="1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nik-ayah">NIK Ayah : </label>
                                <select name="nik_ayah" id="nik_ayah" class="form-control">
                                    <option disabled selected>Pilih NIK Ayah</option>
                                    @foreach ($anggota as $agt)
                                    <option value="{{ $agt->nik }}">{{ $agt->nik }} | {{ $agt->keluarga->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nik-ibu">NIK Ibu : </label>
                                <select name="nik_ibu" id="nik_ibu" class="form-control">
                                    <option disabled selected>Pilih NIK Ibu</option>
                                    @foreach ($anggota as $agt)
                                    <option value="{{ $agt->nik }}">{{ $agt->nik }} | {{ $agt->keluarga->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('surat-kelahiran.index') }}" class="btn btn-danger">CANCEL</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
