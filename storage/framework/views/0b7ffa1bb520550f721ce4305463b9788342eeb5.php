<?php $__env->startSection('content'); ?>
<br>
<div class="container-fluid">
    <div class="col-lg-10">
    <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Tambah Kandidat</font></h3>
         </div>
        <div class="content">
            <div class="row">
    		<?php echo e(Form::open(array('route' => 'candidates.store', 'files' => true))); ?>

            <div class="col-lg-6">
            	<div class="form-group">
                <?php echo e(Form::label('name', 'NAMA KANDIDAT')); ?>

    			<?php echo e(Form::text('name', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Nama'))); ?>

    			<?php echo e($errors->first('name')); ?>

    			</div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                <?php echo e(Form::label('email', 'EMAIL')); ?>

                <?php echo e(Form::email('email', $value = null, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'email@email.com'))); ?>

                <?php echo e($errors->first('email')); ?>

                </div>
            </div>
            <div class="col-lg-6">
            	<div class="form-group">
                    <?php echo e(Form::text('born_date', $value = null, $attributes = array('required', 'class' => 'form-control', 'id' => 'datepicker','placeholder' => 'yyyy/mm/dd'))); ?>

    			</div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                <?php echo e(Form::textarea('address', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Alamat'))); ?>

                <?php echo e($errors->first('address')); ?>

                </div>
            </div>
            <!-- <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Visi</b></div>
                    <div class="panel-body">
                        <span class="pull-right" id="btn-add-visi" onclick="addVisi()">Tambah Visi</span>
                        <br>
                        <div id="list-visi" class="row"></div>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="col-lg-5">
                	<div class="form-group">
                    <?php echo e(Form::textarea('visi', $value = null, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'VISI', 'id' => 'textarea'))); ?>

        			<?php echo e($errors->first('visi')); ?>

        			</div>
                </div>
            <div class="col-lg-5">
            	<div class="form-group">
    			<?php echo e(Form::textarea('misi', $value = null, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'MISI', 'id' => 'textarea'))); ?>

    			<?php echo e($errors->first('misi')); ?>

    			</div>
            </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group">
                    <?php echo e(Form::file('image', $value = null, $attributes = array('required', 'class' => 'form-control'))); ?>

                    <?php echo e($errors->first('image')); ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5">
                <div class="form-group">
                <?php echo e(Form::submit('Simpan', array('class'=>'btn btn-primary btn-primary'))); ?>

                </div>
                </div>
            </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
    </div>
</div>
<!-- JS Custom -->
<script>
    $( function() {
        $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'yy/mm/dd'
        });
    });
    function addVisi(){
        var i;
        $('#list-visi').append('<div class="col-lg-12"> - <input type="text" id="'+i+'" name="visi["'+i+'"]" class="form-control"></div>');
        i = i+1;
    }
    // $('.textarea').ckeditor(); // if class is prefered.
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>