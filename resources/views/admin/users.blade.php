@extends('layouts.admin')

@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('message') }}
</div>
@endif
<div class="block-header">
  <h2>Users</h2>
</div>
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>
          Data User
        </h2>
        <ul class="header-dropdown m-r--5">
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">more_vert</i>
            </a>
            <ul class="dropdown-menu pull-right">
              <li><a data-toggle="modal" data-target="#addModal">Tambah</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="body">
        <div class="table-responsive">          
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Hak Akeses</th>
                <th>Option</th>
              </tr>
            </thead>            
            <tbody>
              @foreach($users as $r)
              <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->name }}</td>
                <td>{{ $r->email }}</td>
                @if($r->role_id == 2)                
                <td>Admin</td>
                @elseif ($r->role_id == 1)
                <td>Guru</td>
                @elseif ($r->role_id == 0)
                <td>Siswa</td>
                @endif
                <td class="text-center">
                @if ($r->role_id == 2)
                  <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $r->id }}editModal">
                    <i class="material-icons">edit</i>                    
                  </button>
                  @endif
                  <button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $r->id }}deleteModal">
                    <i class="material-icons">delete</i>                    
                  </button>                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Tambah User</h4>
      </div>
      <form method="post" action="{{ route('addUser') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="form-label">Nama</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="nama" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Email</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="email" required />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">password</label>
                <div class="form-line">
                  <input type="password" class="form-control" name="password" required />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Hak Akses</label>
                <div class="form-line">
                  <select class="form-control show-tick" data-live-search="true" name="role_id" required>
                    <option value="0">Siswa</option>
                    <option value="1">Guru</option>
                    <option value="2">Admin</option>
                  </select>
                </div>
              </div>              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success waves-effect">Simpan</button>
          <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach($users as $user)
<div class="modal fade" id="{{ $user->id }}editModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Edit user</h4>
      </div>
      <form method="post" action="{{ route('editUser') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $user->id }}">
              <div class="form-group">
                <label class="form-label">Nama</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="nama" value="{{ $user->name }}" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Email</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="email" value="{{ $user->email }}" required />
                </div>
              </div>
              @if(Auth::user()->id == $user->id)
              <div class="form-group"> 
                <label class="form-label">Password</label>
                <div class="form-line">
                  <input type="password" class="form-control" name="password"/>
                </div>
              </div>
              @endif
              <div class="form-group">
                <p>
                  <b>Role</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="role_id" required>
                  <option value="0">Siswa</option>
                  <option value="2">Guru</option>
                  <option value="3">Admin</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success waves-effect">Simpan</button>
          <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@foreach($users as $user)
<div class="modal fade" id="{{ $user->id }}deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="smallModalLabel">Hapus User</h4>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus akun {{ $user->name }}?
      </div>
      <form method="post" action="{{ route('deleteUser') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger waves-effect">Hapus</button>
          <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection
