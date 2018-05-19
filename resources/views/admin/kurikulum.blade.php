@extends('layouts.admin')

@section('content')
<div class="block-header">
  <h2>Kurikulum</h2>
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
          Data Kurikulum
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
                <th>Kurikulum</th>
                <th>Keterangan</th>
                <th>Option</th>
              </tr>
            </thead>            
            <tbody>
              @foreach($kurikulum as $r)
              <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->kurikulum }}</td>
                <td>{{ $r->keterangan }}</td>
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
        <h4 class="modal-title" id="defaultModalLabel">Tambah Kurikulum</h4>
      </div>
      <form method="post" action="{{ route('addKurikulum') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="form-label">Kurikulum</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="kurikulum" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">keterangan</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="keterangan" required />
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

@foreach($kurikulum as $r)
<div class="modal fade" id="{{ $r->id }}editModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Edit Kurikulum</h4>
      </div>
      <form method="post" action="{{ route('editKurikulum') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $r->id }}">
              <div class="form-group">
                <label class="form-label">kurikulum</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="kurikulum" value="{{ $r->kurikulum }}" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Keterangan</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="keterangan" value="{{ $r->keterangan }}" required />
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
@endforeach

@foreach($kurikulum as $r)
<div class="modal fade" id="{{ $r->id }}deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="smallModalLabel">Hapus Kurikulum</h4>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus desa {{ $r->kurikulum }}?
      </div>
      <form method="post" action="{{ route('deleteKurikulum') }}">
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
