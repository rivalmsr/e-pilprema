@extends('layouts.layout')
@section('content')
<br>
<div class="container-fluid">
<div class="col-md-8">
    <div class="card">
        <div class="header">
            <h4 class="title"> Detail User </h4>
        </div>
        <div class="content">
            <form>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>School</label>
                            <input type="text" class="form-control" disabled placeholder="Company" value="Vocational School PGRI 1 CIMAHI">
                        </div>
                    </div>
                    <div class="col-md-7">
                    <!-- Content -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" disabled placeholder="Company" value="{{ $list_users->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Born</label>
                            <input type="text" class="form-control" disabled placeholder="Last Name" value="{{ $list_users->born }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" disabled placeholder="Home Address" value="{{ $list_users->address }}">
                        </div>
                    </div>
                </div>
                <div class="clearfix">Back</div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card card-user">
        <div class="image">
            
        </div>
        <div class="content">
            <div class="author">
                <img class="avatar border-gray" src="<?php echo asset('assets/img/default-avatar.png')?>" alt="..."/>
                  <h4 class="title">{{ $list_users->name }}<br />
                     <small>Vocational School PGRI 1 CIMAHI</small>
                  </h4>
            </div>
            <p class="description text-center"> 
            <!-- Content Description -->
            {{ $list_users->born }}
            <br>
            {{ $list_users->address }}
            </p>
        </div>
        <hr>
        <div class="text-center">
            <button class="btn btn-simple"><i class="fa fa-envelope"></i></button>
        </div>
    </div>
</div>
</div>
@stop