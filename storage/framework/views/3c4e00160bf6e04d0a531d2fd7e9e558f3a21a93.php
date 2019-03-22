<?php $__env->startSection('content'); ?>
<br>
<div class="container-fluid">
    <div class="col-lg-10">
    <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Ubah Siswa</font></h3>
         </div>
        <div class="content">
            <div class="row">
            <?php echo e(Form::model($list_users, ['route' => array('users.update',$list_users->id), 'method' => 'PUT', 'files' => true])); ?>

            <div class="col-lg-4">
                <div class="form-group">
                <?php echo e(Form::text('name', $value = $list_users->name, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Nama'))); ?>

                <?php echo e($errors->first('name')); ?>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <?php echo e(Form::text('email',$value = $list_users->gender, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'Jenis Kelamin'))); ?>

                <?php echo e($errors->first('email')); ?>

                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                <?php echo e(Form::text('born', $value = $list_users->born, $attributes = array('required', 'class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'yyyy/mm/dd'))); ?>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                    <?php echo e(Form::textarea('address', $value = $list_users->address, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Alamat'))); ?>

                    <?php echo e($errors->first('address')); ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5">
                    <div class="form-group">
                    <?php echo e(Form::textarea('visi', $value = $list_users->nisn, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'NISN'))); ?>

                    <?php echo e($errors->first('visi')); ?>

                    </div>
                </div>
            <div class="col-lg-5">
                <div class="form-group">
                <?php echo e(Form::textarea('misi', $value = $list_users->status, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'MISI'))); ?>

                <?php echo e($errors->first('misi')); ?>

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