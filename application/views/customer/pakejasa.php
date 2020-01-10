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
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="jasa">Type Jasa : </label>
                        <select name="type_jasa" id="type_jasa" class="custom-select">
                            <?php if(isset($_POST['cari_jasa'])) : ?>
                                <option value="semua_jasa">Semua Type Jasa</option>
                                <?php foreach($data_type_jasa as $data) : ?>
                                <option value="<?= $data['id'] ?>" <?= ($_POST['type_jasa'] == $data['id']) ? 'selected':null ?>><?= $data['type'] ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="semua_jasa" selected>Semua Type Jasa</option>
                                <?php foreach($data_type_jasa as $data) : ?>
                                <option value="<?= $data['id'] ?>"><?= $data['type'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cari Jasa : </label>
                            <div class="input-group input-group-lg">
                                <select class="form-control select2" name="keyword_jasa">
                                    <?php if(isset($_POST['cari_jasa'])) : ?>
                                        <option value="semua_jasa" selected>Semua Jasa</option>
                                        <?php foreach($data_keyword_jasa as $data) : ?>
                                        <option value="<?= $data['id'] ?>" <?= ($_POST['keyword_jasa'] == $data['id']) ? 'selected':null ?>><?= $data['keyword']; ?></option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="semua_jasa" selected>Semua Jasa</option>
                                        <?php foreach($data_keyword_jasa as $data) : ?>
                                        <option value="<?= $data['id'] ?>"><?= $data['keyword']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php if(isset($_POST['latlon'])) : ?>
                        <input type="hidden" name="latlon" id="latlon" value="<?= $_POST['latlon'] ?>">
                    <?php else: ?>
                        <input type="hidden" name="latlon" id="latlon">
                    <?php endif; ?>
                    <div class="custom-control custom-checkbox">
                        <?php if(isset($_POST['cari_jasa'])) : ?>
                            <input type="checkbox" class="custom-control-input" id="cari-perusahaan-terdekat" <?= ($_POST['latlon']) ? 'checked':null ?> name="cari-perusahaan-terdekat">
                        <?php else: ?>
                            <input type="checkbox" class="custom-control-input" id="cari-perusahaan-terdekat" name="cari-perusahaan-terdekat">
                        <?php endif; ?>
                        <label class="custom-control-label" for="cari-perusahaan-terdekat">Cari perusahaan terdekat</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-orange btn-block" name="cari_jasa" id="cari_jasa"><i class="fas fa-search"></i> Cari</button>
                </div>
            </form>
        </div>
      </div>
      <div class="row mb-5" id="result_cari_jasa">
          <?php if($data_jasa) : ?>
            <?php foreach($data_jasa as $data) : ?>
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
                                    <p class="ml-2 mt--1"><?= $data['jarak']; ?> Km</p>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-3 text-orange" style="font-weight: bold;"><?= $data['harga']; ?></h1>
                        <a href="<?= base_url('customer/pakejasa/process/'.$data['id'].'?type='.$data['jasa_type_id'].'&coor='.base64_encode($data['jarak'])) ?>" class="btn btn-orange btn-block mt-4">Pilih jasa ini</a>
                    </div>
                </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php else: ?>
            <div class="container text-center mt-2">
                <img src="<?= base_url('assets/argon/img/theme/empty.svg') ?>" style="width: 250px;height: 230px;">
				<h1>Jasa yang kamu cari belum ada</h1>
            </div>
          <?php endif; ?>
      </div>
  </div>