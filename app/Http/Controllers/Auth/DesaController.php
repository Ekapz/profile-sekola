<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Kecamatan;
Use Desa;
use Session;

class DesaController extends Controller
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

    public function desa()
    {
    	$data['semuakecamatan'] = Kecamatan::all();
        $data['pedesaan'] = Desa::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.desa')->with($data);
    }

    public function addDesa(Request $request)
    {
        $table = new Desa;//daftarin table desa dengan variable modle
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
}
