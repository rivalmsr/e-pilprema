@extends('layouts.layout')
@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="header">
            <h4 class="title">Student Profile</h4>
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
                            <input type="text" class="form-control" disabled placeholder="Company" value="Student Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Birthday</label>
                            <input type="text" class="form-control" disabled placeholder="Last Name" value="yyyy-mm-dd">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" disabled placeholder="Home Address" value="Street.">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
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
                 <a href="#">
                <img class="avatar border-gray" src="assets/img/default-avatar.png" alt="..."/>

                  <h4 class="title">Student Name<br />
                     <small>Vocational School PGRI 1 CIMAHI</small>
                  </h4>
                </a>
            </div>
            <p class="description text-center"> 
            <!-- Content Description -->
            </p>
        </div>
        <hr>
        <div class="text-center">
            <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
            <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
            <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

        </div>
    </div>
</div>
@stop