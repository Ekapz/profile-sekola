@extends('layouts.admin')

@section('head-content')
<!-- Light Gallery Plugin Css -->
<link href="{{asset('plugins/light-gallery/css/lightgallery.css')}}" rel="stylesheet">
@endsection

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('message') }}
</div>
@endif

@section('content')
<div class="block-header">
  <h2>Galeri</h2>
</div>
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>
          Data Galeri
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
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Sekolah</th>
                <th>Option</th>
              </tr>
            </thead>            
            <tbody id="aniimated-thumbnials" class="list-unstyled row">
              @foreach($semuagaleri as $galeri)
              <tr>
                <td>{{ $galeri->id }}</td>
                <td>{{ $galeri->judul }}</td>
                <td>{{ $galeri->deskripsi }}</td>
                <td>
                  <a href="{{ asset('uploads/'.$galeri->image) }}" data-sub-html="<h3>{{ $galeri->sekolah->nama }}</h3><h4>{{ $galeri->judul }}</h4><p>{{ $galeri->deskripsi }}</p>">
                    <img class="img-responsive img-rounded" src="{{ asset('uploads/'.$galeri->image) }}">                    
                  </a>    
                </td>
                <td>{{ $galeri->sekolah->nama }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $galeri->id }}editModal">
                    <i class="material-icons">edit</i>                    
                  </button>
                  <button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $galeri->id }}deleteModal">
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
        <h4 class="modal-title" id="defaultModalLabel">Tambah Galeri</h4>
      </div>
      <form method="post" action="{{route('addGaleri')}}" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="form-label">Judul</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="judul" required autofocus />
                </div>
              </div>              
              <div class="form-group"> 
                <label class="form-label">Deskripsi</label>
                <div class="form-line">                  
                  <textarea class="form-control" name="deskripsi" required></textarea>
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
              <div class="form-group">
                <label class="form-label">Upload Foto</label>
                <div class="form-line">
                  <input type="file" name="image[]" accept="image/*" required multiple />
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

@foreach($semuagaleri as $galeri)
<div class="modal fade" id="{{ $galeri->id }}editModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Edit Galeri</h4>
      </div>
      <form method="post" action="{{ route('editGaleri') }}" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $galeri->id }}">
              <div class="form-group">
                <label class="form-label">Judul</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="judul" value="{{ $galeri->judul }}" required autofocus />
                </div>
              </div>
              <div class="form-group"> 
                <label class="form-label">Deskripsi</label>
                <div class="form-line">
                  <input type="text" class="form-control" name="deskripsi" value="{{ $galeri->deskripsi }}" required />
                </div>
              </div>              
              <div class="form-group">
                <p>
                  <b>Sekolah</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="sekolah_id" required>
                  @foreach($sekolahan as $sekolah)
                  <option value="{{ $sekolah->id }}" {{ $sekolah->nama == $galeri->sekolah->nama ? 'selected' : null}}>{{ $sekolah->nama }}</option>
                  @endforeach
                </select>
              </div>              
              <div class="form-group">
                <label class="form-label">Upload Foto</label>
                <div class="form-line">                 
                  <input name="image" type="file" accept="image/*" />
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

@foreach($semuagaleri as $galeri)
<div class="modal fade" id="{{ $galeri->id }}deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="smallModalLabel">Hapus Galeri</h4>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus?
      </div>
      <form method="post" action="{{ route('deleteGaleri') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $galeri->id }}">
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