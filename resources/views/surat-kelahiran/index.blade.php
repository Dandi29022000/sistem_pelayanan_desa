@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Pengajuan Surat Kelahiran</h1>
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
                <a class="btn btn-success" href="{{ route('surat-kelahiran.create') }}">Ajukan Surat Kelahiran</a>
            </div>
            <div class="col-md-12">
                <div class="default-table">
                    <table>
                        <caption></caption>
                        <thead>
                            <tr>
                                <th scope="">No.</th>
                                <th scope="">Nama Anak</th>
                                <th scope="">Jenis Kelamin</th>
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
                                <td>{{ $srt->nama_anak }}</td>
                                <td>@if($srt->jenis_kelamin == "L")
                                Laki-laki
                                @else
                                Perempuan
                                @endif</td>
                                <td>{{ $srt->tempat_lahir }}</td>
                                <td>{{ $srt->waktu_lahir }}</td>
                                <td>@if ($srt->status == 0)
                                        Dalam proses persetujuan
                                    @else
                                        Disetujui
                                    @endif</td>
                                <td>
                                    <form action="{{ route('surat-kelahiran.destroy', $srt->id ) }}" method="POST">
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
