<div class="container-fluid mt--7">
      <div class="row">
        <div class="col-md-7 pb-3">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="jadwal">Jadwal:</label>
                            <input type="text" name="jadwal" id="datetimepicker" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="set_jadwal" class="btn btn-orange btn-block">Set jadwal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card card-pakejasa shadow-lg">
                <img src="<?= base_url('assets/argon/img/theme/wave.png') ?>" class="wave-pakejasa" alt="">
                <center class="mt--15">
                    <h2 class="text-white" style="font-weight: bold;"><?= $data_jasa['nama']; ?></h2>
                    <img src="<?= base_url('assets/argon/img/perusahaan/') . $data_jasa['logo_perusahaan'] ?>" class="mt--1 card-img-top mt-3" style="width: 80px;height:80px;" alt="">
                </center>
                <div class="card-body mr-3 ml-3">
                    <div class="mt-5 text-center">
                        <h1 class="mt-5"><?= $data_jasa['nama_jasa']; ?></h1>
                        <div class="mt--4">
                            <hr>
                            <div class="row justify-content-between mt--3">
                                <div class="row ml-3">
                                    <img src="<?= base_url('assets/argon/img/theme/iconWork.png') ?>" style="width: 20px;height:20px;" alt="">
                                    <p class="ml-2 mt--1"><?= $data_jasa['type']; ?></p>
                                </div>
                                <div class="row mr-3">
                                    <img src="<?= base_url('assets/argon/img/theme/iconLocation.png') ?>" style="width: 20px;height:18px;" alt="">
                                    <p class="ml-2 mt--1"><?= $jarak; ?> Km</p>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-3 text-orange" style="font-weight: bold;"><?= $data_jasa['harga']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>