<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AnggotaKeluargaLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'keluarga';
    
    public function __construct()
    {
        $this->middleware('guest:anggota_keluarga')->except('logout')->except('index');
    }
    
    public function index(){
        return view('auth.login');
    }
    
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    
    public function username()
    {
        return 'nik';
    }
    
    protected function guard()
    {
        return Auth::guard('anggota_keluarga');
    }
}
