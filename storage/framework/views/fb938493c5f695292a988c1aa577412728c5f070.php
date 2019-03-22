<?php $__env->startSection('content'); ?>
<br>
<div class="container-fluid">
    <div class="col-lg-10">
    <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Ubah Kandidat</font></h3>
         </div>
        <div class="content">
            <div class="row">
            <?php echo e(Form::model($candidate, ['route' => array('candidates.update', $candidate->id), 'method' => 'PUT', 'files' => true])); ?>

            <div class="col-lg-4">
                <div class="form-group">
                <?php echo e(Form::text('name', $value = $candidate->name, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Nama'))); ?>

                <?php echo e($errors->first('name')); ?>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <?php echo e(Form::email('email',$value = $candidate->email, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'email@email.com'))); ?>

                <?php echo e($errors->first('email')); ?>

                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                <?php echo e(Form::text('born', $value = $candidate->born, $attributes = array('required', 'class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Tanggal Lahir'))); ?>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                    <?php echo e(Form::textarea('address', $value = $candidate->address, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Alamat'))); ?>

                    <?php echo e($errors->first('address')); ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5">
                    <div class="form-group">
                    <?php echo e(Form::textarea('visi', $value = $candidate->visi, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'VISI'))); ?>

                    <?php echo e($errors->first('visi')); ?>

                    </div>
                </div>
            <div class="col-lg-5">
                <div class="form-group">
                <?php echo e(Form::textarea('misi', $value = $candidate->misi, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'MISI'))); ?>

                <?php echo e($errors->first('misi')); ?>

                </div>
            </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                   <h4>Image Before</h4>
                    <img src="<?php echo e(asset('uploads/images/' . $candidate->id . '/' . $candidate->image)); ?>" style="max-height:200px;max-width:200px;margin-top:10px;">
                        <br>
                        <?php echo e(Form::Label('image','image', array('class' => 'control-label'))); ?>

                        <?php echo e(Form::file('image', $value = null, $attributes = array('required', 'class' => 'form-control'))); ?>

                        <?php echo e($errors->first('image')); ?>

                    </div>
                </div>
            </div>
            <?php echo Form::submit('Update', array('class' => 'btn btn-primary')); ?>

            </div>
            <?php echo e(Form::close()); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>