<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaKK;
use App\Models\SuratKelahiran;
use Illuminate\Support\Facades\Auth;

class SuratKelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $surat = SuratKelahiran::where('nik_ayah', Auth::user()->nik)->orWhere('nik_ibu', Auth::user()->nik)->get();
        return view('surat-kelahiran.index', compact('surat'));
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
        return view('surat-kelahiran.create', compact('anggota'));
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
            'waktu_lahir' => 'required',
            'tempat_lahir' => 'required',
            'nama_anak' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'agama' => 'required',
            'anak_ke' => 'required',
            'nik_ibu' => 'required',
            'nik_ayah' => 'required',
        ]);

        SuratKelahiran::create($request->all());

        return redirect()->route('surat-kelahiran.index')
            ->with('success', 'Surat Kelahiran Berhasil Diajukan!');
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
        SuratKelahiran::find($id)->delete();
        return redirect()->route('surat-kelahiran.index')
            ->with('success', 'Data Surat Berhasil Dihapus');
    }
}
