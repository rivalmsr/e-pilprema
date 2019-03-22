<?php
Use App\Models\Candidates;
Use App\Models\Users;
?>

<?php $__env->startSection('content'); ?>

<?php echo e(Sentinel::check()); ?>

<div class="row" style="width:auto;">
    <div class="content_body_one">
      <div class="col-xs-12">
       <!-- notice voted -->
           <?php if(session('status')): ?>
           <div class="row" id="alert">
            <div class="col-xs-5">
              <div class="alert alert-success">
                <center><span><?php echo e(session('status')); ?></span></center>
              </div>
            </div>
          </div>
          <?php endif; ?>
      <!-- end notice -->
      <!-- error voted -->
           <?php if(session('error')): ?>
           <div class="row" id="alert">
            <div class="col-xs-5">
              <div class="alert alert-danger">
                <center><span><?php echo e(session('error')); ?></span></center>
              </div>
            </div>
          </div>
          <?php endif; ?>
      <!-- end notice -->
      </div>

      <div class="col-md-9">
      <h2>E-<strong>PILPRESMA</strong></h2>
      <h3><strong>Politeknik</strong> TEDC Bandung </h3>
          <h4>Kepemimpinan dalam kepengurusan OSIS yang berperan sebagai salah satu jalur pembinaan mahasiswa harus mampu mewujudkan tugas pokok dan fungsinya, secara teratur dan terencana. Suarakan aspirasimu!
          </h4>
          <br><br>
      </div>
      <div class="">
         <!-- <img src="assets/img/home/home_page_epilketos12.png" class="img-responsive" > -->
      </div>
    </div>
</div>

<div class="row" style=" width:auto;">
  <div class="content_body_candidates">
    <?php if(count($list_candidates) == 0): ?>
    <br><br><br><br><br><h4 align="center">Maaf data kandidat PRESMA tidak ditemukan, mohon masukan data kandidat terlebih dahulu</h4>
    <?php else: ?>
    <h3><center>Calon Presiden Mahasiswa Politeknik TEDC Bandung</center></h3>
    <br>
    <br>

    <center>
      <?php foreach($list_candidates as $candidates): ?>
      <div class="text-center">
          <div class="col-xs-6 col-md-3">
          <div class="thumbnail text-center">
            <center>
            <h3><?php echo e($candidates->name); ?></h3>
            </center>
            <img src="<?php echo e(asset('uploads/images/' . $candidates->id . '/thumb' . $candidates->id . '.jpg')); ?>" style="width:auto;" class="img-circle">
            <div class="caption">
            <center>
              <p><a href="show_candidate/<?php echo e($candidates->id); ?>" class="btn btn-primary" role="button">Profil</a></p>
              <h3>Polling Suara</h3>
              <?php
              $voting = Candidates::find($candidates->id)->votes;
              if (count($voting) > 0) {
                $total = (count($voting)/count($votes))*100;
                  echo number_format((float)$total, 2, '.', '') . '%';
              }else{
                echo "Belum Ada Pemilihan";
              }
              ?>
            </center>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </center>

    <div class="row">
      <div class="col-lg-12">
         <?php
          $total_suara = 0;
          foreach ($list_candidates as $key => $votescandidates) {
            $total_suara = $total_suara + count($votescandidates->votes);
          }
          $tes2 = Users::where('status', '=', '1')->get();
          $tes = Users::where('status', '!=', '2')->get();
          ?>
        <br>

        <center>
        Jumlah mahasiswa yang sudah memilih:
        <?php echo e(count($tes2)); ?>

         dari
        <?php echo e(count($tes)); ?>

        </center>

      </div>
    </div>
    <?php endif; ?>
  </div>
</div>
<div class="row" style=" width:auto;">
  <div class="content_body_three">
    <br>
      <center><font color="white"> Teknik Informatika &copy; 2019</font></center>
    <br>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>