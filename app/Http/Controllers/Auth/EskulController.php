<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use Ekskul;
use Sekolah;

class EskulController extends Controller
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

     public function Eskul()
     {

     	$data['sekolahan'] = Sekolah::all();
        $data['eskul'] = Ekskul::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.eskul')->with($data);
    }

    public function addEskul(Request $request)
    {
        $table = new Ekskul;//daftarin table desa dengan variable modle
        $table->jenis = $request->input('jenis');//inputan table
        $table->nama = $request->input('nama');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Ekskul berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editEskul(Request $request)
    {
        $table = Ekskul::find($request->input('id'));//manggil desa sesuai id
        $table->jenis = $request->input('jenis');//inputan table
        $table->nama = $request->input('nama');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Ekskul berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function deleteEskul(Request $request)
    {
    	$table = Ekskul::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Fasilitas berhasil dihapus.");
        return back();
    }


}
