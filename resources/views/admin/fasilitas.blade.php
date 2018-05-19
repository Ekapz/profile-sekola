@extends('layouts.admin')

@section('content')
<div class="block-header">
  <h2>Fasilitas</h2>
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
          Data Fasilitas
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
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Nama Sekolah</th
                <th>Option</th>
              </tr>
            </thead>            
            <tbody>
              @foreach($fasilitas as $litas)
              <tr>
                <td>{{ $litas->id }}</td>
                <td>{{ $litas->nama }}</td>
                <td>{{ $litas->jenis }}</td>        
                <td>{{ $litas->keterangan }}</td>                
                <td>{{ $litas->sekolah->nama }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $litas->id }}editModal">
                    <i class="material-icons">edit</i>                    
                  </button>
                  <button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $litas->id }}deleteModal">
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
        <h4 class="modal-title" id="defaultModalLabel">Tambah Fasilitas</h4>
      </div>
      <form method="post" action="{{ route('addFasilitas') }}">
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
                <label class="form-label">Jenis</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="jenis" required />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Keterangan</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="keterangan" required />
                </div>
              </div>
              
              <div class="form-group">
                <p>
                  <b>Sekolah</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="sekolah_id" required>
                  @foreach($sekolahan as $sekolah)
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

@foreach($fasilitas as $litas)
<div class="modal fade" id="{{ $litas->id }}editModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Edit Fasilitas</h4>
      </div>
      <form method="post" action="{{ route('editFasilitas') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $litas->id }}">
              <div class="form-group">
                <label class="form-label">Nama</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="nama" value="{{ $litas->nama }}" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Jenis</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="jenis" value="{{ $litas->jenis }}" required />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">keterangan</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="keterangan" value="{{ $litas->keterangan }}" required />
                </div>
              </div>
              <div class="form-group">
                <p>
                  <b>Sekolah</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="sekolah_id" required>
                  @foreach($sekolahan as $sekolah)
                  <option value="{{ $sekolah->id }}" {{ $litas->sekolah->nama == $sekolah->nama ? 'selected' : null }}>{{ $sekolah->nama }}</option>
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

@foreach($fasilitas as $litas)
<div class="modal fade" id="{{ $litas->id }}deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="smallModalLabel">Hapus Fasilitas</h4>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus Fasilitas {{ $litas->fasilitas }}?
      </div>
      <form method="post" action="{{ route('deleteFasilitas') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $litas->id }}">
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
