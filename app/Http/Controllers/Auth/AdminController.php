<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Desa;//manggil model desa
use Kecamatan;

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
        $data['semuakecamatan'] = Kecamatan::all();
        $data['pedesaan'] = Desa::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.desa')->with($data);
    }

    public function addDesa(Request $request)
    {
        $table = new Desa;//daftarin table desa dengan variable
        $table->kode = $request->input('kode');//inputan table
        $table->desa = $request->input('desa');//inputan table
        $table->kecamatan_id = $request->input('kecamatan_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Desa berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editDesa(Request $request)
    {
        $table = Desa::find($request->input('id'));//manggil desa sesuai id
        $table->kode = $request->input('kode');//merubah isian tabel
        $table->desa = $request->input('desa');//merubah isian tabel
        $table->kecamatan_id = $request->input('kecamatan_id');//merubah isian tabel
        $table->save();
        Session::flash('message', "Desa berhasil diedit.");
        return back();
    }

    public function deleteDesa(Request $request)
    {
        $table = Desa::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Desa berhasil dihapus.");
        return back();
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
