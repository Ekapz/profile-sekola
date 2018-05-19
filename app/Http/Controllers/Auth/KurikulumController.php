<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Kurikulum;
use Sekolah;

class KurikulumController extends Controller
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

    public function kurikulum()
    {
    	$data['semuasekolah'] = Sekolah::all();
        $data['kurikulum'] = Kurikulum::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.kurikulum')->with($data);
    }

    public function addKurikulum(Request $request)
    {
        $table = new Kurikulum;//daftarin table Kurikulum dengan variable modle
        $table->kurikulum = $request->input('kurikulum');//inputan table
        $table->keterangan = $request->input('keterangan');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Kurikulum berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editKurikulum(Request $request)
    {
        $table = Kurikulum::find($request->input('id'));//manggil desa sesuai id
		$table->kurikulum = $request->input('kurikulum');//inputan table
        $table->keterangan = $request->input('keterangan');//inputan table
        $table->save();//eksekusi data
        Session::flash('message', "Kurikulum berhasil Diubah.");//session buat alert
        return back();
    }

    public function deleteKurikulum(Request $request)
    {
    	$table = Kurikulum::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Kurikulum berhasil dihapus.");
        return back();
    }
}

