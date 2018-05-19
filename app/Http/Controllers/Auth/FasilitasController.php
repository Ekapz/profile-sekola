<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Sekolah;
use Session;
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

     public function fasilitas()
     {

     	$data['sekolahan'] = Sekolah::all();
        $data['fasilitas'] = Fasilitas::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.fasilitas')->with($data);
    }

    public function addFasilitas(Request $request)
    {
        $table = new Fasilitas;//daftarin table desa dengan variable modle
        $table->nama = $request->input('nama');//inputan table
        $table->jenis = $request->input('jenis');//inputan table
        $table->keterangan = $request->input('keterangan');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Fasilitas berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editFasilitas(Request $request)
    {
        $table = Fasilitas::find($request->input('id'));//manggil desa sesuai id
        $table->nama = $request->input('nama');//merubah isian tabel
        $table->jenis = $request->input('jenis');//inputan table
        $table->keterangan = $request->input('keterangan');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->save();
        Session::flash('message', "Fasilitas berhasil diedit.");
        return back();
    }

    public function deleteFasilitas(Request $request)
    {
    	$table = Fasilitas::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Fasilitas berhasil dihapus.");
        return back();
    }


}

