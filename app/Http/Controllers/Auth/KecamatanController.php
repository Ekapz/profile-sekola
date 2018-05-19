<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kecamatan;
use Kabupaten;
use Session;

class KecamatanController extends Controller
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

     public function kecamatan()
    {
        $data['semuakabupaten'] = Kabupaten::all();
        $data['kecamatan'] = Kecamatan::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.kecamatan')->with($data);
    }

    public function addKecamatan(Request $request)
    {
        $table = new Kecamatan;//daftarin table desa dengan variable modle
        $table->kode = $request->input('kode');//inputan table
        $table->kecamatan = $request->input('kecamatan');//inputan table
        $table->kabupaten_id = $request->input('kabupaten_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Kecamatan berhasil ditambahkan.");//session buat alert
        return back();
    }

     public function editKecamatan(Request $request)
    {
        $table = Kecamatan::find($request->input('id'));//manggil desa sesuai id
        $table->kode = $request->input('kode');//merubah isian tabel
        $table->kecamatan = $request->input('kecamatan');//merubah isian tabel
        $table->kabupaten_id = $request->input('kabupaten_id');//merubah isian tabel
        $table->save();
        Session::flash('message', "Kecamatan berhasil diedit.");
        return back();
    }

    public function deleteKecamatan(Request $request)
    {
        $table = Kecamatan::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Kecamatan berhasil dihapus.");
        return back();
    }
}
