<?php $__env->startSection('content'); ?>
<br>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Tambah Siswa</font></h3>
         </div>
        <div class="content">
        <div class="row">
        <?php echo e(Form::open(['route' => 'users.store'])); ?>

        <div class="col-lg-4">
            <div class="form-group">
            <?php echo e(Form::label('NISN')); ?>

                <?php echo e(Form::text('nisn', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'NISN', 'maxlength' => '10'))); ?>

                <?php echo e($errors->first('nisn')); ?>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
            <?php echo e(Form::label('Nama')); ?>

            <?php echo e(Form::text('name', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Nama'))); ?>

            <?php echo e($errors->first('name')); ?>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
            <?php echo e(Form::label('Gender')); ?>

            <select name="gender" class="form-control">
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
            <?php echo e($errors->first('gender')); ?>

            </div>
        </div>
        <div class="col-lg-2">
            <?php echo e(Form::label('Tanggal Lahir')); ?>

            <div class="form-group">
            <?php echo e(Form::text('born_date', $value = null, $attributes = array('required', 'class' => 'form-control', 'id' => 'datepicker','placeholder' => 'yyyy/mm/dd'))); ?>

            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
            <?php echo e(Form::label('Tipe Users')); ?>

                <select name="type" class="form-control">
                    <?php foreach($type as $typ): ?>
                    <option value="<?php echo e($typ->id); ?>"><?php echo e($typ->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
           <div class="col-lg-8">
                <div class="form-group">
                <?php echo e(Form::label('Alamat')); ?>

                <?php echo e(Form::textarea('address', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Alamat'))); ?>

                <?php echo e($errors->first('address')); ?>

                </div>
            </div>
            <div class="col-lg 4">
              <?php echo e(Form::submit('Save', array('class' => 'btn btn-primary'))); ?>

            </div>
        <?php echo e(Form::close()); ?>

        </div>
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
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>