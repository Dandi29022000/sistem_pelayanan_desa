@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Pengajuan Surat Kematian</h1>
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
        <div class="row">
            <div class="col-sm">
                <a class="btn btn-success" href="{{ route('surat-kematian.create') }}">Ajukan Surat Kematian</a>
            </div>
            <div class="col-md-12">
                <div class="default-table">
                <table>
                <caption></caption>
                        <thead>
                            <tr>
                                <th scope="">No.</th>
                                <th scope="">Waktu Pengajuan</th>
                                <th scope="">Nama</th>
                                <th scope="">Tanggal Lahir</th>
                                <th scope="">Tanggal Wafat</th>
                                <th scope="">Status</th>
                                <th scope="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($surat as $srt)
                        <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $srt->created_at }}</td>
                                <td>{{ $srt->keluarga->nama }}</td>
                                <td>{{ $srt->keluarga->tanggal_lahir }}</td>
                                <td>{{ $srt->tanggal_meninggal }}</td>
                                <td>@if ($srt->status == 0)
                                        Dalam proses persetujuan
                                    @else
                                        Disetujui
                                    @endif</td>
                                <td>
                                    <form action="{{ route('surat-kematian.destroy', $srt->id ) }}" method="POST">
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
