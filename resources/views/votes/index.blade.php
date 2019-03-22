@extends('layouts.layout_votes')
@section('content')
<br>
@if(count($list_candidates) == 0)
<br>
<br>
<h4 align="center">Sorry vote doesn't available, entry candidates before vote</h4>
@else
<h4 align="center" style="color:white">
	Waktu anda Tinggal
</h4>
<center><input type="text" disabled="true" value="60" id="txt" class="form-control" style="width:4%"></center>
 <h3 align="center">
 <font color = "white">
	Silahkan pilih calon ketua OSIS tahun ajaran 2016-2017.
 </font>
 </h3>
<br>
<br>
<div class="col-xs-12">
@foreach($list_candidates as $candidates)
<div class="col-sm-6 col-md-3" style="background-color:white;">
<div class="">
<br>
 <img src="{{ asset('uploads/images/' . $candidates->id . '/thumb' . $candidates->id . '.jpg') }}" style="max-height:200px;max-width:200px;margin-top:10px;" class="img-circle">
      <div class="caption">
  <div class="caption">
  <center>
    <h3>{{ $candidates->name }}</h3>
    <p></p>
    <p>
    {{ Form::open(array('url' => 'votes_store/'.$candidates->id , 'method' => 'post')) }}
      {{ Form::submit('Vote',array('class' => 'btn btn-primary btn-xs')) }}
    {{  Form::close() }}
    </p>  
  </center>	
  </div>
</div>
</div>
</div>
@endforeach
</div>
<div class="col-xs-12">
    <span id="txt"></span>
</div>
@endif
<script type="text/javascript">
$( document ).ready(function() {
    setTimeout(function(){ window.location = 'expired';}, 60000);
    startCount();
	var c = 60;
	var t;
	var timer_is_on = 0;

	function timedCount() {
	    document.getElementById("txt").value = c;
	    c = c - 1;
	    t = setTimeout(function(){ timedCount() }, 1000);
	}

	function startCount() {
	    if (!timer_is_on) {
	        timer_is_on = 1;
	        timedCount();
	    }
	}

	function stopCount() {
	    clearTimeout(t);
	    timer_is_on = 0;
	}

});
</script>
@stop