@extends('layouts.admin')

@section('content')
<div class="block-header">
  <h2>Siswa</h2>
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
          Data Siswa
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
                <th>Nis</th>
                <th>Nisn</th>
                <th>Nama</th>
                <th>Jenis-Kelamin</th>
                <th>Tempat/Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Dari Sekolah</th>
              </tr>
            </thead>            
            <tbody>
              @foreach($murid as $siswa)
              <tr>
                <td>{{ $siswa->id }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nisn }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>                
                <td>{{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</td>                
                <td>{{ $siswa->alamat }}</td>  
                <td>{{ $siswa->no_telp }}</td>    
                <td>{{ $siswa->email }}</td>     
                <td>{{ $siswa->jurusan->jurusan }}</td>                                                    
                <td>{{ $siswa->sekolah->nama }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $siswa->id }}editModal">
                    <i class="material-icons">edit</i>                    
                  </button>
                  <button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light" data-toggle="modal" data-target="#{{ $siswa->id }}deleteModal">
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
      <form method="post" action="{{ route('addSiswa') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="form-label">Nisn</label>
                <div class="form-line">
                  <input type="number" class="form-control" name="nisn" required autofocus />
                </div>
              </div>
                <div class="form-group">
                <label class="form-label">Nis</label>
                <div class="form-line">
                  <input type="number" class="form-control" name="nis" required autofocus />
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
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
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
                  <b>Jurusan</b>
                </p>
                <select class="form-control show-tick" data-live-search="true" name="jurusan_id" required>
                  @foreach($semuajurusan as $jurusan)
                  <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                  @endforeach
                </select>
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

@foreach($murid as $siswa)
<div class="modal fade" id="{{ $siswa->id }}editModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Edit Siswa</h4>
      </div>
      <form method="post" action="{{ route('editSiswa') }}">
        <div class="modal-body">
          <div class="row clearfix">
            <div class="col-sm-12">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $siswa->id }}">
              <div class="form-group">
                <label class="form-label">NISN</label>
                <div class="form-line">
                  <input type="number" class="form-control" name="nisn" value="{{ $siswa->nisn }}" required autofocus />
                </div>
              </div>
              <label class="form-label">NIS</label>
              <div class="form-line">
                <input type="number" class="form-control" name="nis" value="{{ $siswa->nis }}" required autofocus />
              </div>
            </div>
            <div class="form-group"> 
              <label class="form-label">Nama</label>
              <div class="form-line">
                <input type="text" class="form-control" name="nama" value="{{ $siswa->nama }}" required />
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Jenis Kelamin</label>
              <div class="form-line">
                <input type="text" class="form-control" name="jenkel" value="{{ $siswa->jenis_kelamin }}" required autofocus />
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Tempat Lahir</label>
              <div class="form-line">
                <input type="text" class="form-control" name="lahirdi" value="{{ $siswa->tempat_lahir }}" required autofocus />
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Tanggal Lahir</label>
              <div class="form-line">
                <input type="date" class="form-control" name="lahirtanggal" value="{{ $siswa->tanggal_lahir }}" required autofocus />
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Alamat</label>
              <div class="form-line">
                <input type="text" class="form-control" name="alamat" value="{{ $siswa->alamat }}" required autofocus />
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">No Telephone</label>
              <div class="form-line">
                <input type="text" class="form-control" name="telp" value="{{ $siswa->no_telp }}" required autofocus />
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">email</label>
              <div class="form-line">
                <input type="text" class="form-control" name="email" value="{{ $siswa->email }}" required autofocus />
              </div>
            </div>
            <div class="form-group">
              <p>
              <b>Jurusan</b>
              </p>
              <select class="form-control show-tick" data-live-search="true" name="jurusan_id" required>
                @foreach($semuajurusan as $jurusan)
                <option value="{{ $jurusan->id }}" {{ $siswa->jurusan->jurusan == $jurusan->jurusan ? 'selected' : null }}>{{ $jurusan->jurusan }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <p>
                <b>Sekolah</b>
              </p>
              <select class="form-control show-tick" data-live-search="true" name="sekolah_id" required>
                @foreach($semuasekolah as $sekolah)
                <option value="{{ $sekolah->id }}" {{ $siswa->sekolah->nama == $sekolah->nama ? 'selected' : null }}>{{ $sekolah->nama }}</option>
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

@foreach($murid as $siswa)
<div class="modal fade" id="{{ $siswa->id }}deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="smallModalLabel">Hapus Siswa</h4>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus Guru {{ $siswa->siswa }}?
      </div>
      <form method="post" action="{{ route('deleteSiswa') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $siswa->id }}">
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
