    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-xl-0">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="card shadow mb-2">
        <div class="card-header border-0 d-sm-flex align-items-center justify-content-between">
            <h3 class="text-dark mb-0">Data Jasa</h3>
        </div>
        <div class="card-body">
            <form method='post'>
                <div class="row" style="margin-left: 2px;">
                    <div class="form-group">
                        <label for="jasa">Type Jasa : </label>
                        <select name="jasa" id="jasa" class="custom-select">
                            <?php if(isset($_POST['cari_jasa'])) : ?>
                                <option value="semua_jasa">Semua Type Jasa</option>
                                <?php foreach($data_type_jasa as $data) : ?>
                                <option value="<?= $data['id'] ?>" <?= ($_POST['jasa'] == $data['id']) ? 'selected':null ?>><?= $data['type'] ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="semua_jasa" selected>Semua Type Jasa</option>
                                <?php foreach($data_type_jasa as $data) : ?>
                                <option value="<?= $data['id'] ?>"><?= $data['type'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-orange ml-md-3" style="margin-top: 34px;"><i class="fas fa-search"></i> Cari</button>
                    </div>
                </div>
                <div class="row" style='margin-left: 2px;'>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                            <label class="custom-control-label" for="customCheck">Cari perusahaan terdekat</label>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <img src="<?= base_url('assets/argon/img/theme/iconSearch.png') ?>" style='width: 46px;height:46px;'  class="input-group-text" alt="">
                    </div>
                    <select name="nama_jasa" id="nama_jasa" class="select2 select2-container select2-container--bootstrap select2-container--above select2-container--focus">
                        <option value="2126244" selected="selected">twbs/bootstrap</option>
                    </select>
                </div>
            </form>
        </div>
      </div>
      <div class="row mb-5" id="result_cari_jasa">
          <?php foreach($data_jasa as $data) : ?>
          <?php 
            $latlon_perusahaan = explode(", ", $data['latlon']);
            $latlon_customer   = explode(", ", $data_customer['latlon']);
          ?>
          <div class="col-md-4 wow fadeInUp">
            <div class="card card-pakejasa shadow-lg">
                <img src="<?= base_url('assets/argon/img/theme/wave.png') ?>" class="wave-pakejasa" alt="">
                <center class="mt--15">
                    <h2 class="text-white" style="font-weight: bold;"><?= $data['nama']; ?></h2>
                    <img src="<?= base_url('assets/argon/img/perusahaan/') . $data['logo_perusahaan'] ?>" class="mt--1 card-img-top mt-3" style="width: 80px;height:80px;" alt="">
                </center>
                <div class="card-body mr-3 ml-3">
                    <div class="mt-5 text-center">
                        <h1 class="mt-5"><?= $data['nama_jasa']; ?></h1>
                        <div class="mt--4">
                            <hr>
                            <div class="row justify-content-between mt--3">
                                <div class="row ml-3">
                                    <img src="<?= base_url('assets/argon/img/theme/iconWork.png') ?>" style="width: 20px;height:20px;" alt="">
                                    <p class="ml-2 mt--1"><?= $data['type']; ?></p>
                                </div>
                                <div class="row mr-3">
                                    <img src="<?= base_url('assets/argon/img/theme/iconLocation.png') ?>" style="width: 20px;height:18px;" alt="">
                                    <p class="ml-2 mt--1"><?= hitungJarak($latlon_customer[0], $latlon_customer[1], $latlon_perusahaan[0], $latlon_perusahaan[1]) . " Km"; ?></p>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-3 text-orange" style="font-weight: bold;"><?= $data['harga']; ?></h1>
                        <a href="#" class="btn btn-orange btn-block mt-4">Pilih jasa ini</a>
                    </div>
                </div>
            </div>
          </div>
          <?php endforeach; ?>
      </div>
  </div>