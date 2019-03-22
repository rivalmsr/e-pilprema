@if(count($list_candidates) == 0)
    <br><br><br><br><br><h4 align="center"><font color="white">Maaf data kandidat PRESMA tidak ditemukan, mohon masukan data kandidat terlebih dahulu</font></h4>
    @else
    <h3><center>
    <font color="white">QUICK COUNT E-<strong>PILPRESMA</strong> Politeknik TEDC Bandung
    </font>
    </center></h3>
    <h4 style="color:white;">Jam</h4>
    <span class="alert alert-success">
    <?php
    date_default_timezone_set('asia/jakarta');
    echo date("h");
    ?>
    </span>&nbsp;<font color="white">:</font>&nbsp;<span class="alert alert-info">{{date("i")}}</span>
    <div class="col-lg-12">&nbsp;</div>
      @foreach($list_candidates as $candidates)
        <center>
          <div class="col-sm-6 col-md-3" style="background-color:white;">
            <div class="">
              <center>
              <h3>{{ $candidates->name }}</h3>
              </center>
              <img src="{{ asset('uploads/images/' . $candidates->id . '/thumb' . $candidates->id . '.jpg') }}" style="width:auto;" class="img-circle">
              <div class="caption">
              <center>
                <p><a href="show_candidate/{{$candidates->id}}" class="btn btn-primary" role="button">Profil</a></p>
                <h2>Polling Suara</h2>
                <?php
                $voting = $candidates->votes;
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
        </center>
      @endforeach
      @endif
        <?php
        $total_suara = 0;
        foreach ($list_candidates as $key => $votescandidates) {
          $total_suara = $total_suara + count($votescandidates->votes);
        }
        ?>
      <div class="col-xs-12">
        <div class="row">
          <center>
            <p style="color:white;"><i>Jumlah Pemilih sebesar :{{ count($usersVotes) }} dari {{ count($sumUsers) }} Orang</i></p>
              <a href="/" class="btn btn-primary" role="button">Back</a>
          </center>
        </div>
      </div>
