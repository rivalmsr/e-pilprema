@extends('layouts.layout')
@section('content')
<br>
<div class="container-fluid">
<div class="col-lg-12">
<div class="card">
     <div class="header">
        <h3 class="title"><font color="white">Daftar Kandidat</font></h3>
     </div>
        <div class="content">
            <div class="row">
              @if(count($candidates) == 0)
                <div class="col-md-12">
                <div class="form-group">
                <br>
                <br>
                <h4 align="center">Maaf data kandidat tidak ditemukan, silahkan {{ link_to('candidates/create', 'Tambah', array('class' => 'btn btn-primary btn-primary')) }} data terlebih dahulu.
                </h4>
                    </div>
                </div>
              @else
          <div class="container-fluid" style="width:95%">
            <div class="col-lg-5 pull-right">
              <div class="form-group pull-right">
               <div class="btn-group">
                  {{ link_to('candidates/create', 'Tambah', array('class' => 'btn btn-primary btn-primary')) }}
                    <a class = "btn btn-success btn-success" href="javascript:void(0)">Excel</a>
                    <a href="bootstrap-elements.html" data-target="#" class="btn btn-success btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="export_candidates">
                      <i class="material-icons">insert_drive_file</i>Export
                      </a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              &nbsp;
            </div>
          @foreach($candidates as $candidate)
          <div class="col-sm-6 col-md-3">
          <div class="form-group">
              <div class="thumbnail">
                <img src="uploads/images/{{$candidate->id}}/{{ $candidate->id }}.jpg" style="max-height:200px;max-width:200px;margin-top:10px;">
                <div class="caption">
                    <center><h3>{{ $candidate->name }}</h3>
                    {{ $candidate->born }}
                    <br>
                    {{ $candidate->email }}
                    </center>
                  <div class="row">
                <div class="col-xs-12">
                <center>
              <a class="btn btn-success btn-success btn-xs" href="candidates/{{$candidate->id}}">
                <i class="material-icons">info</i>
              </a>
              <a class="btn btn-success btn-success btn-xs" href="candidates/{{$candidate->id}}/edit">
                <i class="material-icons">create</i>
              </a>
             <i class="material-icons">
             {{ Form::open(array('route' => array('candidates.destroy', $candidate->id), 'method' => 'delete')) }}
              {!! Form::submit('delete', array('class' => 'btn btn-success btn-success btn-sm')) !!}
              {{  Form::close() }}
              </i>
              </center>
                </div>
                  </div>
              </div>
            </div>
            </div>
          </div>
          @endforeach
          </div>
      @endif
      </div>
      </div>
</div>
</div>
</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
@stop
