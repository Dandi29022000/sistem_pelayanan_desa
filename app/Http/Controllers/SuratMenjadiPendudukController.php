<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKK;
use App\Models\SuratPenduduk;
use App\Models\SuratPindah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMenjadiPendudukController extends Controller
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
        $surat = SuratPenduduk::with('keluarga')->where('no_kk', $no_kk)->get();
        return view('surat-penduduk.index', compact('surat'));
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
        return view('surat-penduduk.create', compact('anggota'));
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'jenis_pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);

        SuratPenduduk::create($request->all());

        return redirect()->route('surat-penduduk.index')
            ->with('success', 'Surat Menjadi Penduduk Berhasil Diajukan!');
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
        SuratPenduduk::find($id)->delete();
        return redirect()->route('surat-penduduk.index')
            ->with('success', 'Data Surat Menjadi Penduduk Berhasil Dihapus');
    }
}
