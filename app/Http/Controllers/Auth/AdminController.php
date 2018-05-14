<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function provinsi()
    {
        return view('admin.provinsi');
    }

    public function kabupaten()
    {
        return view('admin.kabupaten');
    }

    public function kecamatan()
    {
        return view('admin.kecamatan');
    }

    public function desa()
    {
        return view('admin.desa');
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
