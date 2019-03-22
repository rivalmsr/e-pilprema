<?php
use App\Models\Votes;
use App\Models\Users;
?>
@extends('layouts.layout')
@section('content')
<div class="container-fluid">
<div class="col-xs-12">
<br>
<br>
<br>
  <div class="card">
     <div class="header">
        <h3 class="title"><font color="white">Quick Count</font></h3>
     </div>
    <div class="content">
    <div class="row">
      <div class="col-lg-3">
        <a href="officialreport"><span class="btn btn-default pull-right">DOWNLOAD BERITA ACARA</span></a>
      </div>
    </div>
    <div class="col-lg-12">&nbsp;</div>
      <div class="row">
      @foreach($list_candidates as $candidates)
        <div class="col-xs-4">
        	<div class="thumbnail">
        	 <img src="{{ asset('uploads/images/' . $candidates->id . '/thumb' . $candidates->id . '.jpg') }}" style="max-height:200px;max-width:200px;margin-top:10px;" class="img-circle">
          	<div class="caption">
        		  <center>
      		    <h3>{{ $candidates->name }}</h3>
      		    <p>Vote Sementara</p>
      		    <p>
                <?php
                $voting = $candidates->votes;
                if (count($voting) > 0) {
                  $total = (count($voting)/count($votes))*100;
                  echo number_format((float)$total, 2, '.', '') . '%';
                }else{
                  echo "Belum Ada Pemilihan";
                }
                ?>
        			</p>
        		  </center>
      		  </div>
        	</div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
</div>
@stop