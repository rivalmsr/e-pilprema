@extends('layouts.layout')
@section('content')
<br>
<div class="container-fluid">
    <div class="col-lg-7">
    <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Tambah Hak Akses</font></h3>
         </div>
        <div class="content">
            <div class="row">
    		{{ Form::open(array('route' => 'roles.store', 'files' => true)) }}
            <div class="col-lg-12">
            <div class="col-lg-4">
            	<div class="form-group">
    			{{ Form::text('slug', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Slug')) }}
    			{{ $errors->first('slug') }}
    			</div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                {{ Form::text('name', $value = null, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'Nama Role')) }}
                {{ $errors->first('name') }}
                </div>
            </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5">
                <div class="form-group">
                {{ Form::submit('Simpan', array('class'=>'btn btn-primary btn-primary')) }}
                </div>
                </div>
            </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    </div>
</div>
<!-- JS Custom -->
<script type="text/javascript">
</script>
@stop