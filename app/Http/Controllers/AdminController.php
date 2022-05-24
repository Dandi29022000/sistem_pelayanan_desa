<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\AnggotaKK;
use App\Models\SuratKelahiran;
use App\Models\SuratKematian;
use App\Models\SuratPenduduk;
use App\Models\SuratPindah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function suratKelahiran(Request $request){
        if($request->has('search')){
            $surat = SuratKelahiran::where('nama_anak', 'like', "%".$request->search."%")->get();
        } else {
            $surat = SuratKelahiran::all();   
        }
        return view('admin.surat-kelahiran', compact('surat'));
    }

    public function suratKematian(Request $request){
        if($request->has('search')){
            $surat = SuratKematian::where('nama', 'like', "%".$request->search."%")->get();
        } else {
            $surat = SuratKematian::all();   
        }
        return view('admin.surat-kematian', compact('surat'));
    }

    public function suratPenduduk(Request $request){
        if($request->has('search')){
            $surat = SuratPenduduk::where('nama', 'like', "%".$request->search."%")->get();
        } else {
            $surat = SuratPenduduk::all();   
        }
        return view('admin.surat-penduduk', compact('surat'));
    }

    public function suratPindah(Request $request){
        if($request->has('search')){
            $surat = SuratPindah::where('nama', 'like', "%".$request->search."%")->get();
        } else {
            $surat = SuratPindah::all();   
        }
        return view('admin.surat-pindah', compact('surat'));
    }

    public function accSuratKelahiran($id){
        $surat = SuratKelahiran::find($id);

        $nik = AnggotaKeluarga::max('nik');
        $nik_ayah = $surat->nik_ayah;
        $kk = AnggotaKK::where('nik', $nik_ayah)->first();
        $no_kk = $kk->no_kk;

        $anggotaKeluarga = new AnggotaKeluarga;
        $anggotaKeluarga->nik = $nik+1;
        $anggotaKeluarga->nama = $surat->nama_anak;
        $anggotaKeluarga->jenis_kelamin = $surat->jenis_kelamin;
        $anggotaKeluarga->tempat_lahir = $surat->tempat_lahir;
        $anggotaKeluarga->tanggal_lahir = $surat->waktu_lahir;
        $anggotaKeluarga->agama = $surat->agama;
        $anggotaKeluarga->pendidikan = 'Tidak ada';
        $anggotaKeluarga->jenis_pekerjaan = 'Belum bekerja';
        $anggotaKeluarga->status_pernikahan = 'Belum Kawin';
        $anggotaKeluarga->kewarganegaraan = 'Indonesia';
        $anggotaKeluarga->foto = '/images/user.jpg';
        $anggotaKeluarga->save();

        $anggotaKK = new AnggotaKK;
        $anggotaKK->no_kk = $no_kk;
        $anggotaKK->nik = $nik+1;
        $anggotaKK->save();

        $surat->status = 1;
        $surat->save();

        return redirect()->route('admin.surat-kelahiran')
            ->with('success', 'Surat Kelahiran Berhasil Disetujui!');
    }
    public function accSuratKematian($id){
        $surat = SuratKematian::find($id);
        $surat->status = 1;
        $surat->save();

        return redirect()->route('admin.surat-kematian')
            ->with('success', 'Surat Kematian Berhasil Disetujui!');
    }
    public function accSuratPindah($id){
        $surat = SuratPindah::find($id);
        $surat->status = 1;
        $surat->save();

        return redirect()->route('admin.surat-pindah')
            ->with('success', 'Surat Pindah Berhasil Disetujui!');
    }

    public function accSuratPenduduk($id){
        $surat = SuratPenduduk::find($id);
        $surat->status = 1;
        $surat->save();

        return redirect()->route('admin.surat-penduduk')
            ->with('success', 'Surat Menjadi Penduduk Berhasil Disetujui!');
    }
}
