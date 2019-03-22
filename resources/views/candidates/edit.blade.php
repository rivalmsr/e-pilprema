@extends('layouts.layout')
@section('content')
<br>
<div class="container-fluid">
    <div class="col-lg-10">
    <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Ubah Kandidat</font></h3>
         </div>
        <div class="content">
            <div class="row">
            {{ Form::model($candidate, ['route' => array('candidates.update', $candidate->id), 'method' => 'PUT', 'files' => true]) }}
            <div class="col-lg-4">
                <div class="form-group">
                {{ Form::text('name', $value = $candidate->name, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Nama')) }}
                {{ $errors->first('name') }}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                {{ Form::email('email',$value = $candidate->email, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'email@email.com')) }}
                {{ $errors->first('email') }}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                {{ Form::text('born', $value = $candidate->born, $attributes = array('required', 'class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Tanggal Lahir')) }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                    {{ Form::textarea('address', $value = $candidate->address, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Alamat')) }}
                    {{ $errors->first('address') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5">
                    <div class="form-group">
                    {{ Form::textarea('visi', $value = $candidate->visi, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'VISI')) }}
                    {{ $errors->first('visi') }}
                    </div>
                </div>
            <div class="col-lg-5">
                <div class="form-group">
                {{ Form::textarea('misi', $value = $candidate->misi, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'MISI')) }}
                {{ $errors->first('misi') }}
                </div>
            </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                   <h4>Image Before</h4>
                    <img src="{{ asset('uploads/images/' . $candidate->id . '/' . $candidate->image) }}" style="max-height:200px;max-width:200px;margin-top:10px;">
                        <br>
                        {{ Form::Label('image','image', array('class' => 'control-label')) }}
                        {{ Form::file('image', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
                        {{ $errors->first('image') }}
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