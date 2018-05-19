<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sekolah;
use Desa;
use Session;
class SekolahController extends Controller
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

     public function sekolah()
     {

     	$data['semuadesa'] = Desa::all();
        $data['sekolah'] = Sekolah::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.sekolah')->with($data);
    }

    public function addSekolah(Request $request)
    {
        $table = new Sekolah;//daftarin table desa dengan variable modle
        $table->nss = $request->input('nss');//inputan table
        $table->nama = $request->input('nama');//inputan table
        $table->alamat = $request->input('alamat');//inputan table
        $table->desa_id = $request->input('desa_id');//inputan table
        $table->rw = $request->input('rw');//inputan table
        $table->rt = $request->input('rt');//inputan table
        $table->no_telp = $request->input('no_telp');//inputan table
        $table->no_fax = $request->input('no_fax');//inputan table
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_random().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $table->image = $name;
        }
        $table->email = $request->input('email');//inputan table
        $table->website = $request->input('website');//inputan table
        $table->kepala_sekolah = $request->input('kepala_sekolah');//inputan table
        
        $table->save();//eksekusi data
        Session::flash('message', "Sekolah berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editSekolah(Request $request)
    {
        $table = Sekolah::find($request->input('id'));//manggil desa sesuai id
        $table->nss = $request->input('nss');//inputan table
        $table->nama = $request->input('nama');//inputan table
        $table->alamat = $request->input('alamat');//inputan table
        $table->desa_id = $request->input('desa_id');//inputan table
        $table->rw = $request->input('rw');//inputan table
        $table->rt = $request->input('rt');//inputan table
        $table->no_telp = $request->input('no_telp');//inputan table
        $table->no_fax = $request->input('no_fax');//inputan table
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_random().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $table->image = $name;
        }
        $table->email = $request->input('email');//inputan table
        $table->website = $request->input('webiste');//inputan table
        $table->kepala_sekolah = $request->input('kepala_sekolah');//inputan table
        
        $table->save();//eksekusi data
        Session::flash('message', "Sekolah berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function deleteSekolah(Request $request)
    {
    	$table = Sekolah::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Kabupaten berhasil dihapus.");
        return back();
    }
}
