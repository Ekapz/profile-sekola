<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Galeri;
use Sekolah;
use Session;

class GaleriController extends Controller
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

    public function galeri()
    {
    	$data['semuagaleri'] = Galeri::all();
        $data['sekolahan'] = Sekolah::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.galeri')->with($data);
    }

    public function addGaleri(Request $request)
    {        
    	if($request->hasFile('image'))
    	{
    		$files = $request->file('image');
    		foreach ($files as $file) {    			
        		$table = new Galeri;//daftarin table desa dengan variable model
        		$table->judul = $request->input('judul');
        		$table->deskripsi = $request->input('deskripsi');

        		$image = $file;
        		$name = str_random().'.'.$image->getClientOriginalExtension();
        		$destinationPath = public_path('/uploads');
        		$imagePath = $destinationPath. "/".  $name;
        		$image->move($destinationPath, $name);

        		$table->sekolah_id = $request->input('sekolah_id');
        		$table->image = $name;
        		$table->save();//eksekusi data
        	}
        }        
        Session::flash('message', "Desa berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editGaleri(Request $request)
    {
        $table = Desa::find($request->input('id'));//manggil desa sesuai id
        $table->kode = $request->input('kode');//merubah isian tabel
        $table->desa = $request->input('desa');//merubah isian tabel
        $table->kecamatan_id = $request->input('kecamatan_id');//merubah isian tabel
        $table->save();
        Session::flash('message', "Desa berhasil diedit.");
        return back();
    }

    public function deleteGaleri(Request $request)
    {
    	$table = Desa::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Desa berhasil dihapus.");
        return back();
    }
}
