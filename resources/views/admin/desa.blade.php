@extends('layouts.admin')

@section('content')
<div class="block-header">
  <h2>Desa</h2>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>
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
              <li><a href="javascript:void(0);">Action</a></li>
              <li><a href="javascript:void(0);">Another action</a></li>
              <li><a href="javascript:void(0);">Something else here</a></li>
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
                <th>Kode</th>
                <th>Desa</th>
                <th>Kecamatan</th>
              </tr>
            </thead>            
            <tbody>
              @foreach($pedesaan as $desa)
              <tr>
                <td>{{ $desa->id }}</td>
                <td>{{ $desa->kode }}</td>
                <td>{{ $desa->desa }}</td>
                <?php
                $kecamatan = \App\Kecamatan::where('id', '=', $desa->kecamatan_id)->value('kecamatan')
                ?>
                <td>{{ $kecamatan }}</td>
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

<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Select:</label>
            <select>
              <option>Laki-Laki</option>
              <option>Perempuan</option>
              <option>Waria</option>
              <option>Lainnya</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('foot-content')
$('#exampleModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var recipient = button.data('whatever') // Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-title').text('New message to ' + recipient)
modal.find('.modal-body input').val(recipient)
})
@endsection

