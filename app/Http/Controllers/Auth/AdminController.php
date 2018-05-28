<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Desa;//manggil model desa
use Kecamatan;
use Kabupaten;
use App\Config;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function adminform()
    {
        return view('admin.admin');
    }

    public function adminTheme(Request $request)
    {
        $theme = Config::where('config', '=', 'theme')->value('id');
        $table = Config::find($theme);
        $table->value = $request->input('theme');
        $table->save();
        return back();
    }

    public function provinsi()
    {
        return view('admin.provinsi');
    }

    public function sekolah()
    {
        return view('admin.sekolah');
    }

    public function guru()
    {
        return view('admin.guru');
    }

    public function siswa()
    {
        return view('admin.siswa');
    }

    public function kurikulum()
    {
        return view('admin.kurikulum');
    }

    public function jurusan()
    {
        return view('admin.jurusan');
    }

    public function prestasi()
    {
        return view('admin.prestasi');
    }

    public function fasilitas()
    {
        return view('admin.fasilitas');
    }

    public function eskul()
    {
        return view('admin.eskul');
    }

    public function galeri()
    {
        return view('admin.galeri');
    }
}
