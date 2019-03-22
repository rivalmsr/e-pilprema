@extends('layouts.layout')
@section('content')
<br>
<div class="container-fluid">
    <div class="col-lg-10">
    <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Ubah Siswa</font></h3>
         </div>
        <div class="content">
            <div class="row">
            {{ Form::model($list_users, ['route' => array('users.update',$list_users->id), 'method' => 'PUT', 'files' => true]) }}
            <div class="col-lg-4">
                <div class="form-group">
                {{ Form::text('name', $value = $list_users->name, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Nama')) }}
                {{ $errors->first('name') }}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                {{ Form::text('email',$value = $list_users->gender, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'Jenis Kelamin')) }}
                {{ $errors->first('email') }}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                {{ Form::text('born', $value = $list_users->born, $attributes = array('required', 'class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'yyyy/mm/dd')) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                    {{ Form::textarea('address', $value = $list_users->address, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Alamat')) }}
                    {{ $errors->first('address') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5">
                    <div class="form-group">
                    {{ Form::textarea('visi', $value = $list_users->nisn, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'NISN')) }}
                    {{ $errors->first('visi') }}
                    </div>
                </div>
            <div class="col-lg-5">
                <div class="form-group">
                {{ Form::textarea('misi', $value = $list_users->status, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'MISI')) }}
                {{ $errors->first('misi') }}
                </div>
            </div>
            </div>
            {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
            </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
    </div>
<!-- JS Custom -->
<script type="text/javascript">
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy/mm/dd'
    });
  } );
</script>
@stop