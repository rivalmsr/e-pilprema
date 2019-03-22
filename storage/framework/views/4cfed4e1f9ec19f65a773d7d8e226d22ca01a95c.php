<?php $__env->startSection('content'); ?>
<br>
<div class="container-fluid">
<div class="col-lg-12">
<div class="card">
     <div class="header">
        <h3 class="title"><font color="white">Daftar Kandidat</font></h3>
     </div>
        <div class="content">
            <div class="row">
              <?php if(count($candidates) == 0): ?>
                <div class="col-md-12">
                <div class="form-group">
                <br>
                <br>
                <h4 align="center">Maaf data kandidat tidak ditemukan, silahkan <?php echo e(link_to('candidates/create', 'Tambah', array('class' => 'btn btn-primary btn-primary'))); ?> data terlebih dahulu.
                </h4>
                    </div>
                </div>
              <?php else: ?>
          <div class="container-fluid" style="width:95%">
            <div class="col-lg-5 pull-right">
              <div class="form-group pull-right">
               <div class="btn-group">
                  <?php echo e(link_to('candidates/create', 'Tambah', array('class' => 'btn btn-primary btn-primary'))); ?>

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
          <?php foreach($candidates as $candidate): ?>
          <div class="col-sm-6 col-md-3">
          <div class="form-group">
              <div class="thumbnail">
                <img src="uploads/images/<?php echo e($candidate->id); ?>/<?php echo e($candidate->id); ?>.jpg" style="max-height:200px;max-width:200px;margin-top:10px;">
                <div class="caption">
                    <center><h3><?php echo e($candidate->name); ?></h3>
                    <?php echo e($candidate->born); ?>

                    <br>
                    <?php echo e($candidate->email); ?>

                    </center>
                  <div class="row">
                <div class="col-xs-12">
                <center>
              <a class="btn btn-success btn-success btn-xs" href="candidates/<?php echo e($candidate->id); ?>">
                <i class="material-icons">info</i>
              </a>
              <a class="btn btn-success btn-success btn-xs" href="candidates/<?php echo e($candidate->id); ?>/edit">
                <i class="material-icons">create</i>
              </a>
             <i class="material-icons">
             <?php echo e(Form::open(array('route' => array('candidates.destroy', $candidate->id), 'method' => 'delete'))); ?>

              <?php echo Form::submit('delete', array('class' => 'btn btn-success btn-success btn-sm')); ?>

              <?php echo e(Form::close()); ?>

              </i>
              </center>
                </div>
                  </div>
              </div>
            </div>
            </div>
          </div>
          <?php endforeach; ?>
          </div>
      <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>