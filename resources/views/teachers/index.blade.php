<?php
use App\Models\Users;
use App\Models\TypeUsers;
?>
@extends('layouts.layout')
@section('content')
<br>
<div class="container-fluid">
    <div class="col-lg-12">
    <div class="col-lg-12">
    <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Daftar Pengawas</font></h3>
         </div>
            <div class="content">
        <div class="row">
        <div class="col-md-12">
          <div class="form-group">
        @if(count($users) == 0)
            <br>
            <br>
            <center><h4><h3>Data tidak ditemukan</h3><br /> Silahkan {{ link_to('users/create', 'Tambah', array('class' => 'btn btn-raised btn-primary')) }} data users.
            </h4></center>
            </div>
        </div>
        @else
        <div class="col-lg-6">
        <p>Data tersedia tersedia : {{ count($user_s) }}</p>
        </div>
        </div>
        <div class="content full-width-table table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Aktivasi</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
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
                <td> {{ $user->address }} </td>
                <td> {{ $user->born }} </td>
                <td> {{ $user->gender }} </td>
                <?php $type = TypeUsers::find($user->type_id); ?>
                <td> {{ $type->name }}
                </td>
                <td> {{ $user->graduate }} </td>
                <td>
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