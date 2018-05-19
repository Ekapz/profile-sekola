<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Provinsi;

class ProvinsiController extends Controller
{
   	/**
     * Create a new controller instance.
     *
     * @return void
     */
   	public function __construct()
   	{
   		$this->middleware('auth');
   	}

   	public function provinsi()
   	{
        $data['provinsi'] = Provinsi::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.provinsi')->with($data);
    }

    public function addProvinsi(Request $request)
    {
        $table = new Desa;//daftarin table desa dengan variable modle
        $table->kode = $request->input('kode');//inputan table
        $table->provinsi = $request->input('provinsi');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Provinsi berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editProvinsi(Request $request)
    {
        $table = Provinsi::find($request->input('id'));//manggil desa sesuai id
        $table->kode = $request->input('kode');//merubah isian tabel
        $table->provinsi = $request->input('provinsi');//merubah isian tabel
        $table->save();
        Session::flash('message', "Provinsi berhasil diedit.");
        return back();
    }

    public function deleteProvinsi(Request $request)
    {
    	$table = Provinsi::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "provinsi berhasil dihapus.");
        return back();
    }
}
