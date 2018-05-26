<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sekolah;
use Guru;
use Session;
use User;

class GuruController extends Controller
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

    public function guru()
    {
    	$data['semuasekolah'] = Sekolah::all();
        $data['sensei'] = Guru::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.guru')->with($data);
    }

    public function addGuru(Request $request)
    {
        $table = new Guru;//daftarin table desa dengan variable modle
        $table->nip = $request->input('nip');//inputan table
        $table->nama = $request->input('nama');//inputan table
        $table->jenis_kelamin = $request->input('jenkel');//inputan table
        $table->tempat_lahir = $request->input('lahirdi');//inputan table
        $table->tanggal_lahir = $request->input('lahirtanggal');//inputan table
        $table->jurusan = $request->input('jurusan');//inputan table
        $table->alamat = $request->input('alamat');//inputan table
        $table->no_telp = $request->input('telp');//inputan table
        $table->email = $request->input('email');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        

        $table2 = new User;
        $table2->name = $request->input('nama');//inputan table2
        $table2->email = $request->input('email');//inputan table2
        $table2->password = bcrypt($request->input('nip'));//inputan table2
        $table2->role_id = 1;//inputan table2

        $table->save();//eksekusi data
        $table2->save();//eksekusi data

        Session::flash('message', "Guru berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editGuru(Request $request)
    {
        $table = Guru::find($request->input('id'));//manggil desa sesuai id
      $table->nip = $request->input('nip');//inputan table
        $table->nama = $request->input('nama');//inputan table
        $table->jenis_kelamin = $request->input('jenkel');//inputan table
        $table->tempat_lahir = $request->input('lahirdi');//inputan table
        $table->tanggal_lahir = $request->input('lahirtanggal');//inputan table
        $table->jurusan = $request->input('jurusan');//inputan table
        $table->alamat = $request->input('alamat');//inputan table
        $table->no_telp = $request->input('telp');//inputan table
        $table->email = $request->input('email');//inputan table
        $table->sekolah_id = $request->input('sekolah_id');//inputan table
        

         $table2 = new User;
        $table2->name = $request->input('nama');//inputan table2
        $table2->email = $request->input('email');//inputan table2
        $table2->password = bcrypt($request->input('nip'));//inputan table2
        $table2->role_id = 1;//inputan table2
        $table->save();//eksekusi data
        $table2->save();//eksekusi data

        Session::flash('message', "Guru berhasil diedit.");
        return back();
    }

    public function deleteGuru(Request $request)
    {
    	$table = Guru::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "Guru berhasil dihapus.");
        return back();
    }
}

