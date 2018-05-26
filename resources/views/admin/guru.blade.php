@extends('layouts.admin')

@section('content')
<div class="block-header">
  <h2>Guru</h2>
</div>
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('message') }}
</div>
@endif
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>
          Data Guru
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
                <th>Nip</th>
                <th>Nama</th>
                <th>Jenis-Kelamin</th>
                <th>Tempat/Tanggal Lahir</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Dari Sekolah</th>
              </tr>
            </thead>            
            <tbody>
              @foreach($sensei as $guru)
              <tr>
                <td>{{ $guru->id }}</td>
                <td>{{ $guru->nip }}</td>
                <td>{{ $guru->jenis_kelamin }}</td>                
                <td>{{ $guru->tempat_lahir }}, {{ $guru->tanggal_lahir }}</td>                
                <td>{{ $guru->jurusan }}</td>                
                <td>{{ $guru->alamat }}</td>                
                <td>{{ $guru->no_telp }}</td>                
                <td>{{ $guru->email }}</td>                
                <td>{{ $guru->sekolah->nama }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $guru->id }}editModal">
                    <i class="material-icons">edit</i>                    
                  </button>
                  <button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $guru->id }}deleteModal">
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
        <h4 class="modal-title" id="defaultModalLabel">Tambah Guru</h4>
      </div>
      <form method="post" action="{{ route('addGuru') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="form-label">NIP</label>
                <div class="form-line">
                  <input type="number" class="form-control" name="nip" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Nama</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="nama" required />
                </div>
              </div>
               <div class="form-group">
                <p>
                  <b>Jenis Kelamin</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="jenkel" required>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
                 <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <div class="form-line">
                  <input type="date" class="form-control" name="lahirtanggal" required autofocus />
                </div>
              </div>
               <div class="form-group">
                <label class="form-label">Tempat Lahir</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="lahirdi" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">Jurusan</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="jurusan" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">Alamat</label>
                <div class="form-line">
                  <input type= textarea class="form-control" name="alamat" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">No Telp</label>
                <div class="form-line">
                  <input type="number" class="form-control" name="telp" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">Email</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="email" required autofocus />
                </div>
              </div>
              <div class="form-group">
                <p>
                  <b>Sekolah</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="sekolah_id" required>
                  @foreach($semuasekolah as $sekolah)
                  <option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
                  @endforeach
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

@foreach($sensei as $guru)
<div class="modal fade" id="{{ $guru->id }}editModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Edit guru</h4>
      </div>
      <form method="post" action="{{ route('editGuru') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $guru->id }}">
              <div class="form-group">
                <label class="form-label">NIP</label>
                <div class="form-line">
                  <input type="number" class="form-control" name="nip" value="{{ $guru->nip }}" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Nama</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="nama" value="{{ $guru->nama }}" required />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="jenkel" value="{{ $guru->jenis_kelamin }}" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">Tempat Lahir</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="lahirdi" value="{{ $guru->tempat_lahir }}" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <div class="form-line">
                  <input type="date" class="form-control" name="lahirtanggal" value="{{ $guru->tanggal_lahir }}" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">Jurusan</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="jurusan" value="{{ $guru->jurusan }}" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">Alamat</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="alamat" value="{{ $guru->alamat }}" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">No Telephone</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="telp" value="{{ $guru->no_telp }}" required autofocus />
                </div>
              </div>
                 <div class="form-group">
                <label class="form-label">email</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="email" value="{{ $guru->email }}" required autofocus />
                </div>
              </div>
              <div class="form-group">
                <p>
                  <b>Sekolah</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="sekolah_id" required>
                  @foreach($semuasekolah as $sekolah)
                  <option value="{{ $sekolah->id }}" {{ $guru->sekolah->nama == $sekolah->nama ? 'selected' : null }}>{{ $sekolah->nama }}</option>
                  @endforeach
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

@foreach($sensei as $guru)
<div class="modal fade" id="{{ $guru->id }}deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="smallModalLabel">Hapus Desa</h4>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus Guru {{ $guru->nama }}?
      </div>
      <form method="post" action="{{ route('deleteGuru') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $guru->id }}">
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
