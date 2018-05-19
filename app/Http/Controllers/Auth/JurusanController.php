<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Sekolah;
use Jurusan;
use Kurikulum
;
class JurusanController extends Controller
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

    public function jurusan()
    {
    	$data['semuasekolah'] = Sekolah::all();
        $data['semuakurikulum'] = Kurikulum::all();
        $data['jurusan'] = Jurusan::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.jurusan')->with($data);
    }

    public function addJurusan(Request $request)
    {
        $table = new Jurusan;//daftarin table desa dengan variable modle
        $table->jurusan = $request->input('jurusan');//inputan table
        $table->keterangan = $request->input('keterangan');//inputan table
        $table->tahun = $request->input('tahun');//inputan table
        $table->kurikulum = $request->input('kurikulum');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Jurusan berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editJurusan(Request $request)
    {
        $table = Jurusan::find($request->input('id'));//manggil desa sesuai id
      $table->jurusan = $request->input('jurusan');//inputan table
        $table->keterangan = $request->input('keterangan');//inputan table
        $table->tahun = $request->input('tahun');//inputan table
        $table->kurikulum = $request->input('kurikulum');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Jurusan berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function deleteJurusan(Request $request)
    {
    	$table = Jurusan::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Jurusan berhasil dihapus.");
        return back();
    }
}
