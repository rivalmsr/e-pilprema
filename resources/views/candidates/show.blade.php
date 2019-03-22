<?php
use App\Models\Votes;
$votes = Votes::all();
?>
@extends('layouts.layout')
@section('content')
<div class="container-fluid">
<br>
<br>
<br>
<div class="col-md-12">
    <div class="card">
     <div class="header">
        <h3 class="title"><font color="white">Info Kandidat</font></h3>
     </div>
        <div class="content">
            <form>
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <h2>Polling Suara :
                            <?php
                            $voting = $candidate->votes;
                            if (count($voting) > 0) {
                              $total = (count($voting)/count($votes))*100;
                              echo $total.'%';
                            }else{
                              echo "Belum Ada Pemilihan";
                            }
                            ?>
                            </h2>
                            <small>Lahir : {{ $candidate->born }}</small> 
                            <br>
                            <small> VISI : {!! $candidate->visi !!} </small>
                            <br>
                             <small>MISI : {!! $candidate->misi !!}</small>
                            <br>
                            <small>Alamat : {{ $candidate->address }}</small>
                        </div>
                    </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="image">
                            <a href="#">
                            <center>
                            <img class="avatar border-gray" src="{{ asset('uploads/images/' . $candidate->id . '/' . $candidate->image) }}" alt="..."/>
                            </a>
                            <h4 class="title">{{ $candidate->name }}<br /></h4>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <hr>
                        <div class="text-center">
                            <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                            <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                            <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@stop