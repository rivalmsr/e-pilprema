<?php
use App\Models\Users;
?>
@extends('layouts.layout')
@section('content')
<br>
<div class="container-fluid">
    <div class="col-lg-12">
    <div class="col-lg-12">
    <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Daftar mahasiswa</font></h3>
         </div>
            <div class="content">
        <div class="row">
        <div class="col-md-12">
          <div class="form-group">
        @if(count($users) == 0)
            <br>
            <br>
            <center><h4><h3>Data mahasiswa tidak ditemukan</h3><br /> Silahkan {{ link_to('users/create', 'Tambah', array('class' => 'btn btn-raised btn-primary')) }} data mahasiswa, atau <button type="button" class="btn btn-info" id="myBtn">Import</button> data mahasiswa terlebih dahulu
            </h4></center>
            </div>
        </div>
        <!-- MODAL -->
        <div id="myModal" class="modal">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Silahkan import data mahasiswa dengan format XLSX</h4>
              </div>
              {{ Form::open(array('url' => 'import_users', 'files' => true)) }}
              <div class="modal-body">
                <p>{{ Form::file('users') }}</p>
              </div>

              <div class="modal-footer">
              {{ Form::submit('Import', array('class' => 'btn btn-info')) }}
              </div>
            </div>
        </div>
        <!-- END MODAL -->
        @else
          <div class="col-lg-6">
          <p>Data mahasiswa tersedia : {{ count($user_s) }}</p>
          </div>
          <div class="col-lg-6">
            <div class="form-group pull-right">
              <div class="btn-group">
                {{ link_to('users/create', 'Create', array('class' => 'btn btn-raised btn-primary')) }}
                <a href="javascript:void(0)" class="btn btn-success">Excel</a>
                <a href="bootstrap-elements.html" data-target="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="javascript:void(0)" id="myBtn">Import</a></li>
                  <li class="divider"></li>
                  <li><a href="export_users/all">Export Semua</a></li>
                  <li class="divider"></li>
                  <li><a href="export_users/2019">Export Kelas 10</a></li>
                  <li><a href="export_users/2018">Export Kelas 11</a></li>
                  <li><a href="export_users/2017">Export Kelas 12</a></li>
                </ul>
              </div>
            </div>
          </div>
            <div class="col-lg-6 pull-right">
             {{ Form::open(array('route' => array('users.activeall'), 'method' => 'post')) }}
              {{ Form::submit('Aktifkan Semua',array('class' => 'btn btn-primary pull-right', "onclick" => "return confirm('Anda akan aktifkan semua user?')")) }}
              {{  Form::close() }}
            </div>

        <!-- MODAL -->
        <div id="myModal" class="modal">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Silahkan import data mahasiswa dengan format XLSX</h4>
              </div>
              {{ Form::open(array('url' => 'import_users', 'files' => true)) }}
              <div class="modal-body">
                  <p>{{ Form::file('users') }}</p>
                  {{ Form::label('Import data mahasiswa menurut kelas :') }}
                  <select class="form-control" name="graduate">
                    <option value="2019">Kelas 10</option>
                    <option value="2018">Kelas 11</option>
                    <option value="2017">Kelas 12</option>
                  </select>
              </div>

              <div class="modal-footer">
              {{ Form::submit('Import', array('class' => 'btn btn-info')) }}
              </div>
              {{ Form::close() }}
            </div>
        </div>
        <!-- END MODAL -->

        <div class="col-lg-12">&nbsp;</div>
        <div class="content full-width-table table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Aktivasi</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Lulusan</th>
                <th colspan="3">Action</th>
            </tr>
            @foreach($users as $user)
            <tr>
            <?php $activation = Users::find($user->id)->activation; ?>
              @if($activation['completed'] == 1)
                <td width="5%">
                  {{ Form::open(array('route' => array('users.deactive', $user->id), 'method' => 'post')) }}
                  {{ Form::submit('Aktif',array('class' => 'btn btn-primary', "onclick" => "return confirm('Anda akan non-aktifkan user $user->first_name $user->last_name ?')")) }}
                  {{  Form::close() }}
                </td>
              @else
                <td width="5%">
                  {{ Form::open(array('route' => array('users.active', $user->id), 'method' => 'post')) }}
                  {{ Form::submit('Belum Aktif',array('class' => 'btn btn-danger', "onclick" => "return confirm('Anda akan aktifkan user $user->first_name $user->last_name ?')")) }}
                  {{  Form::close() }}
                </td>
              @endif
                <td> {{ $user->name }} </td>
                <td> {{ $user->gender }} </td>
                <td>
                <?php
                  if ($user->status == 0) {
                    echo "Belum Memilih";
                  }else{
                    echo "Sudah Memilih";
                  }
                ?>
                </td>
                <td> {{ $user->graduate }} </td>
                <td>
                <div class="btn-group">
                  <a class="btn btn-success btn-success btn-xs" href="users/{{$user->id}}">
                    <i class="material-icons">info</i>
                  </a>
                  <a class="btn btn-success btn-success btn-xs" href="  users/{{$user->id}}/edit">
                    <i class="material-icons">create</i>
                  </a>
                   <i class="material-icons">
                      {{ Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'delete')) }}
                      {!! Form::submit('delete', array('class' => 'btn btn-success btn-success btn-sm')) !!}
                      {{  Form::close() }}
                  </i>
                </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $users->render() }}
        </div>
        @endif
  </div>
</div>
<?php
ini_set('max_execution_time', 300);
?>
<script type="text/javascript">
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
@stop
