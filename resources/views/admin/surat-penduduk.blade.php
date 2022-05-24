@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Pengajuan Surat Menjadi Penduduk</h1>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <form action="{{ route('admin.surat-penduduk') }}" accept-charset="UTF-8" method="get">
                    <div class="input-group">
                        <input type="text" name="search" id="search" placeholder="Cari" class="form-control">
                        <span class="input-group-btn">
                            <input type="submit" value="Cari" class="btn btn-primary">
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="default-table">
                    <table>
                        <caption></caption>
                        <thead>
                            <tr>
                                <th scope="">No.</th>
                                <th scope="">Tanggal Pengajuan</th>
                                <th scope="">Nama</th>
                                <th scope="">Tempat Lahir</th>
                                <th scope="">Tanggal Lahir</th>
                                <th scope="">Status</th>
                                <th scope="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat as $srt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $srt->created_at }}</td>
                                <td>{{ $srt->nama }}</td>
                                <td>{{ $srt->tempat_lahir }}</td>
                                <td>{{ $srt->tanggal_lahir }}</td>
                                <td>@if ($srt->status == 0)
                                        Dalam proses persetujuan
                                    @else
                                        Disetujui
                                    @endif</td>
                                <td>
                                    <form action="{{ route('surat-penduduk.destroy', $srt->id ) }}" method="POST">
                                    <a class="btn btn-primary"
                                            href="{{ route('admin.acc-surat-penduduk',$srt->id) }}"><i
                                                class="bi bi-check2"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
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
