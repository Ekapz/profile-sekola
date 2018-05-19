@extends('layouts.admin')

@section('content')
<div class="block-header">
  <h2>Desa</h2>
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
          Data EksKul
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
                <th>Jenis</th>
                <th>Nama</th>
                <th>Sekolah</th>
                <th>Option</th>
              </tr>
            </thead>            
            <tbody>
              @foreach($eskul as $r)
              <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->jenis }}</td>
                <td>{{ $r->nama }}</td>                
                <td>{{ $r->sekolah->nama }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $r->id }}editModal">
                    <i class="material-icons">edit</i>                    
                  </button>
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
        <h4 class="modal-title" id="defaultModalLabel">Tambah Eskul</h4>
      </div>
      <form method="post" action="{{ route('addEskul') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="form-label">Jenis</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="jenis" required autofocus />
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
                  <b>Sekolah</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="sekolah_id" required>
                  @foreach($sekolahan as $sekola)
                  <option value="{{ $sekola->id }}">{{ $sekola->nama }}</option>
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

@foreach($eskul as $r)
<div class="modal fade" id="{{ $r->id }}editModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Edit Desa</h4>
      </div>
      <form method="post" action="{{ route('editEskul') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $r->id }}">
              <div class="form-group">
                <label class="form-label">Jenis</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="jenis" value="{{ $r->jenis }}" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Naama</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="nama" value="{{ $r->nama }}" required />
                </div>
              </div>
              <div class="form-group">
                <p>
                  <b>Kecamatan</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="kecamatan_id" required>
                  @foreach($sekolahan as $sekola)
                  <option value="{{ $sekola->id }}" {{ $r->sekolah->nama == $sekola->nama ? 'selected' : null }}>{{ $sekola->nama }}</option>
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

@foreach($eskul as $r)
<div class="modal fade" id="{{ $r->id }}deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="smallModalLabel">Hapus Desa</h4>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus desa {{ $r->nama }}?
      </div>
      <form method="post" action="{{ route('deleteEskul') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $r->id }}">
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
