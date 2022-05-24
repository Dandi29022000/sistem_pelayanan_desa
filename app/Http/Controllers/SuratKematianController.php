<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKK;
use App\Models\SuratKematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratKematianController extends Controller
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
        $surat = SuratKematian::with('keluarga')->where('no_kk', $no_kk)->get();
        return view('surat-kematian.index', compact('surat'));
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
        return view('surat-kematian.create', compact('anggota'));
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
            'nik'=> 'required',
            'tanggal_meninggal' => 'required',
            'penyebab_meninggal' => 'required',
            'tempat_meninggal' => 'required',
        ]);

        SuratKematian::create($request->all());

        return redirect()->route('surat-kematian.index')
            ->with('success', 'Surat Kematian Berhasil Diajukan!');
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
        SuratKematian::find($id)->delete();
        return redirect()->route('surat-kematian.index')
            ->with('success', 'Data Surat Kematian Berhasil Dihapus');
    }
}
