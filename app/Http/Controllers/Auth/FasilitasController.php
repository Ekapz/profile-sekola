<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Sekolah;
use Fasilitas;

class FasilitasController extends Controller
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

     public function kabupaten()
     {

     	$data['semuaprovinsi'] = Provinsi::all();
        $data['kabupaten'] = Kabupaten::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.kabupaten')->with($data);
    }

    public function addKabupaten(Request $request)
    {
        $table = new Kabupaten;//daftarin table desa dengan variable modle
        $table->kode = $request->input('kode');//inputan table
        $table->kabupaten = $request->input('kabupaten');//inputan table
        $table->provinsi_id = $request->input('provinsi_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Kabupaten berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editKabupaten(Request $request)
    {
        $table = Kabupaten::find($request->input('id'));//manggil desa sesuai id
        $table->kode = $request->input('kode');//merubah isian tabel
        $table->kabupaten = $request->input('kabupaten');//inputan table
        $table->provinsi_id = $request->input('provinsi_id');//inputan table
        $table->save();
        Session::flash('message', "Kecamatan berhasil diedit.");
        return back();
    }

    public function deleteKabupaten(Request $request)
    {
    	$table = Kabupaten::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Kabupaten berhasil dihapus.");
        return back();
    }


}

