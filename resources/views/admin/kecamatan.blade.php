@extends('layouts.admin')

@section('content')
<div class="block-header">
  <h2>Kecamatan</h2>
  <hr>
  <hr>
  <!-- Exportable Table -->
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>
            EXPORTABLE TABLE
          </h2>
          <ul class="header-dropdown m-r--5">
            <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">more_vert</i>
              </a>
              <ul class="dropdown-menu pull-right">
                <li><a data-toggle="modal" data-target="#addModal">Tambah</a></li></ul>
              </li>
            </ul>
          </div>
          <div class="body">
            <div class="table-responsive">          
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                    <th>Option</th>
                  </tr>
                </thead>            
                <tbody>
                  @foreach($kecamatan as $r)
                  <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->kode }}</td>
                    <td>{{ $r->kecamatan }}</td>         
                    <td>{{ $r->kabupaten->kabupaten }}</td>
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
    <!-- #END# Exportable Table -->
    <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Kecamatan</h4>
          </div>
          <form method="post" action="{{ route('addKecamatan') }}">
            <div class="modal-body">
              <div class="row clearfix">
                <div class="col-sm-12">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="form-label">Kode</label>
                    <div class="form-line">
                      <input type="number" class="form-control" name="kode" required autofocus />
                    </div>
                  </div>
                  <div class="form-group"> 
                    <label class="form-label">Kecamatan</label>
                    <div class="form-line">
                      <input type="text" class="form-control" name="kecamatan" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <p>
                      <b>Kabupaten</b>
                    </p>
                    <select class="form-control show-tick" data-live-search="true" name="kabupaten_id" required>
                      @foreach($semuakabupaten as $r)
                      <option value="{{ $r->id }}">{{$r->kabupaten}}</option>
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

    @foreach($kecamatan as $r)
    <div class="modal fade" id="{{ $r->id }}editModal" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Edit Kecamatan</h4>
          </div>
          <form method="post" action="{{ route('editKecamatan') }}">
            <div class="modal-body">
              <div class="row clearfix">
                <div class="col-sm-12">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $r->id }}">
                  <div class="form-group">
                    <label class="form-label">Kode</label>
                    <div class="form-line">
                      <input type="number" class="form-control" name="kode" value="{{ $r->kode }}" required autofocus />
                    </div>
                  </div>
                  <div class="form-group"> 
                    <label class="form-label">Kecamatan</label>
                    <div class="form-line">
                      <input type="text" class="form-control" name="kecamatan" value="{{ $r->kecamatan }}" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <p>
                      <b>Kabupaten</b>
                    </p>
                    <select class="form-control show-tick" data-live-search="true" name="kabupaten_id" required>
                      @foreach($semuakabupaten as $kabupatens)
                      <option value="{{ $kabupatens->id }}" {{ $r->kabupaten->kabupaten == $kabupatens->kabupaten ? 'selected' : null }}>{{ $kabupatens->kabupaten }}</option>
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
    


    @foreach($kecamatan as $r)
    <div class="modal fade" id="{{ $r->id }}deleteModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="smallModalLabel">Hapus Kecamatan</h4>
          </div>
          <div class="modal-body">
            Yakin ingin menghapus Kecamatan {{ $r->kecamatan }}?
          </div>
          <form method="post" action="{{ route('deleteKecamatan') }}">
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
    