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
        Session::flash('message', "Galeri berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editGaleri(Request $request)
    {
        $table = Galeri::find($request->input('id'));//manggil desa sesuai id
        $table->judul = $request->input('judul');//merubah isian tabel
        $table->deskripsi = $request->input('deskripsi');//merubah isian tabel
        $table->sekolah_id = $request->input('sekolah_id');//merubah isian tabel
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_random().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $table->image = $name;
        }
        $table->save();
        Session::flash('message', "Galeri berhasil diedit.");
        return back();
    }

    public function deleteGaleri(Request $request)
    {
    	$table = Galeri::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Galeri berhasil dihapus.");
        return back();
    }
}
