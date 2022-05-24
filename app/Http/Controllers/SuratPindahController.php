<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKK;
use App\Models\SuratPindah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratPindahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepala = AnggotaKK::where('nik', Auth::user()->nik)->first();
        $no_kk = $kepala->no_kk;
        $surat = SuratPindah::with('keluarga')->with('kartukeluarga')->where('no_kk', $no_kk)->get();
        return view('surat-pindah.index', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kepala = AnggotaKK::with('keluarga')->where('nik', Auth::user()->nik)->first();
        $no_kk = $kepala->no_kk;
        $anggota = AnggotaKK::with('keluarga')->where('no_kk', $no_kk)->get();
        return view('surat-pindah.create', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'no_kk' => 'required',
            'alamat_tujuan' => 'required',
            'rt_tujuan' => 'required',
            'rw_tujuan' => 'required',
            'desa_tujuan' => 'required',
            'kecamatan_tujuan' => 'required',
            'kabupaten_tujuan' => 'required',
            'provinsi_tujuan' => 'required',
            'kode_pos_tujuan' => 'required',
        ]);

        SuratPindah::create($request->all());

        return redirect()->route('surat-pindah.index')
            ->with('success', 'Surat Kepindahan Berhasil Diajukan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SuratPindah::find($id)->delete();
        return redirect()->route('surat-pindah.index')
            ->with('success', 'Data Surat Pindah Berhasil Dihapus');
    }
}
