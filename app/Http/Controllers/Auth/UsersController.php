<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use User;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function user()
	{
        $data['users'] = User::all();//pedesaan adalah variable yang akan dipanggil diviewnya
        return view('admin.users')->with($data);
    }

    public function addUser(Request $request)
    {
    	$table2 = new User;
        $table2->name = $request->input('nama');//inputan table2
        $table2->email = $request->input('email');//inputan table2
        $table2->password = bcrypt($request->input('password'));//inputan table2
        $table2->role_id = 0;//inputan table2
        $table2->save();//eksekusi data
        Session::flash('message', "Users berhasil ditambahkan.");//session buat alert
        return back();
    }

    public function editUser(Request $request)
    {
        $table = User::find($request->input('id'));//manggil desa sesuai id
    	$table2->name = $request->input('nama');//inputan table2
        $table2->email = $request->input('email');//inputan table2
        $table2->password = bcrypt($request->input('password'));//inputan table2
        $table2->role_id = 0;//inputan table2
        $table2->save();//eksekusi data
        Session::flash('message', "Users berhasil Diedit.");//session buat alert
        return back();
    }

    public function deleteDesa(Request $request)
    {
    	$table = User::find($request->input('id'));        
        $table->delete();//delete table
        Session::flash('message', "User berhasil dihapus.");
        return back();
    }
}
