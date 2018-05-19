<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Prestasi;
use Sekolah;

class PrestasiController extends Controller
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

    public function prestasi()
    {
    	$data['semuasekolah'] = Sekolah::all();
        $data['prestasi'] = Prestasi::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.prestasi')->with($data);
    }

    public function addPrestasi(Request $request)
    {
        $table = new Prestasi;//daftarin table desa dengan variable modle
        $table->nama = $request->input('nama');//inputan table
        $table->jenis_prestasi = $request->input('jenis_prestasi');//inputan table
        $table->tingkat = $request->input('tingkat');//inputan table
        $table->keterangan = $request->input('keterangan');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Prestasi berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editPrestasi(Request $request)
    {
        $table = Prestasi::find($request->input('id'));//manggil desa sesuai id
        $table->nama = $request->input('nama');//inputan table
        $table->jenis_prestasi = $request->input('jenis_prestasi');//inputan table
        $table->tingkat = $request->input('tingkat');//inputan table
        $table->keterangan = $request->input('keterangan');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Prestasi berhasil Diubah.");//session buat alert
        return back();
    }

    public function deletePrestasi(Request $request)
    {
    	$table = Prestasi::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Prestasi berhasil dihapus.");
        return back();
    }
}
