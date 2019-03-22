<?php
use App\Models\Roles;
?>
@extends('layouts.layout')
@section('content')
<br>
<div class="container-fluid">
    <div class="content">
    <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Daftar Hak Akses</font></h3>
         </div> 
        <div class="row">
        <div class="col-md-12">
          <div class="form-group">
        @if(count($roles) == 0)
            <br>
            <br>
            <center><h4><h3>Hak akses tidak ditemukan</h3><br /> Silahkan {{ link_to('roles/create', 'Tambah', array('class' => 'btn btn-raised btn-primary')) }} hak akses.
            </h4></center>
            </div>
        </div>
        @else
        <div class="col-lg-12">
          &nbsp;
        </div>
        <div class="col-lg-6 pull-right">
        <div class="form-group pull-right">
             <div class="btn-group">  
              {{ link_to('roles/create', 'Create', array('class' => 'btn btn-raised btn-primary')) }}
              <a href="javascript:void(0)" class="btn btn-success">Excel</a>
              <a href="bootstrap-elements.html" data-target="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="export_users/2019">Export Hak Akses</a></li>
              </ul>
            </div>
        </div>
        </div>
        </div>
        <div class="content full-width-table table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Slug</th>
                <th>Roles</th>
                <th colspan="3">Action</th>
            </tr>
            @foreach($roles as $role)
            <tr>
              <td> {{ $role->slug }} </td>
              <td> {{ $role->name }} </td>
              <td> 
              <td>
              <a class="btn btn-success btn-success btn-xs" href="  roles/{{$role->id}}/edit">
                <i class="material-icons">create</i>
              </a>
               <i class="material-icons">
                  {{ Form::open(array('route' => array('roles.destroy', $role->id), 'method' => 'delete')) }}
                  {!! Form::submit('delete', array('class' => 'btn btn-success btn-success btn-sm')) !!}
                  {{  Form::close() }}
              </i>
              </td>
          </tr>
            @endforeach
        </table>
        </div>
        @endif
  </div>
</div>
<?php
ini_set('max_execution_time', 300);
?>
<script type="text/javascript">

</script>
@stop