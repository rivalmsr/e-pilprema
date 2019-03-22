<?php
Use App\Models\Candidates;
?>
@extends('layouts.layout_login')
@section('content')
<div class="row">
<br>
<br>
<br>
<br>

<div class="col-xs-2">
</div>
<div class="col-xs-8">
    <div class="card">
     <div class="header">
        <h3 class="title"><font color="white">Info Kandidat</font></h3>
     </div>
        <div class="content" >
        <div class="row" style="width:100%;">
            <div class="col-xs-8">
                <div class="form-group">
                <table class="table table-hover">
                <tr>
                    <td width="10px">Nama</td><td width="10px"> : </td><td> {{ $candidate->name }}</td>
                </tr>
                <tr class="success">
                    <td>Lahir</td><td> : </td><td> {{ $candidate->born }}</td>
                </tr>
                <tr>
                    <td>VISI</td><td> : </td><td> {!! $candidate->visi !!}</td>
                </tr>
                <tr class="success">
                    <td>MISI</td><td> : </td><td> {!! $candidate->misi !!}</td>
                </tr>
                <tr >
                    <td>Alamat</td><td> : </td><td> {{ $candidate->address }}</td>
                </tr>
                </table>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <div class="image">
                        <center>
                        <img class="avatar border-gray" src="{{ asset('uploads/images/' . $candidate->id . '/' . $candidate->image) }}" alt="..."/ width="100%">
                        <h4 class="title"><br /></h4>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="col-xs-2">
</div>
</div>

@stop