    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-8 wow bounce" data-wow-delay=".25s">
            <div class="card shadow-lg">
                <div class="card-header">
                    <a href="<?= base_url('customer/pakejasa/pesanan') ?>" class='badge badge-orange'><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke pesanan</a>
                </div>
                <div class="card-body">
                    <h5>Data pegawai yang akan survey kerumah kamu:</h5>
                    <table class="table table-orange table-responsive-md" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Nomor Ponsel</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($data_pegawai_to_survey[0]) : ?>
                            <?php $i = 1;foreach($data_pegawai_to_survey as $data) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['nomor_ponsel']; ?></td>
                                    <td><?= $data['gender']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 wow fadeInUp">
            <div class="card card-pakejasa shadow-lg">
                <img src="<?= base_url('assets/argon/img/theme/wave.png') ?>" class="wave-pakejasa" alt="">
                <center class="mt--15">
                    <h2 class="text-white" style="font-weight: bold;"><?= $data_pesanan['nama']; ?></h2>
                    <img src="<?= base_url('assets/argon/img/perusahaan/') . $data_pesanan['logo_perusahaan'] ?>" class="mt--1 card-img-top mt-3" style="width: 80px;height:80px;" alt="">
                </center>
                <div class="card-body">
                    <div class="mt-5 mr-3 ml-3 text-center">
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
                                    <p class="ml-2 mt--1"><?= $data_jasa['jarak']; ?> Km</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="mt--4">
                        <div class="row justify-content-between mt--2">
                            <div class="col-lg-6 col-sm-6 col-md-12 mr-0 ml-0">
                                <div style="width: 90%;" class="h7">Harga Jasa</div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-12">
                                <div><?= $data_jasa['harga']; ?></div>
                            </div>
                        </div>
                        <?php if($data_jasa['type'] != 'instalasi') : ?>
                            <?php foreach($data_material_used as $data) : ?>
                                <div class="row justify-content-between mt--3">
                                    <div class="col-lg-6 col-sm-6 col-md-12 mr-0 ml-0">
                                        <div style="width: 90%;" class="h7"><?= $data['nama_material']; ?></div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-12">
                                        <div>Rp. <?= $data['harga']; ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="row justify-content-between mt--5">
                            <hr style="width: 90%;">
                            <b class="mt-3 mr-2">+</b>
                        </div>
                        <div class="row justify-content-between mt--5">
                        <div class="col-lg-6 col-sm-6 col-md-12 mr-0 ml-0">
                                <div style="width: 90%;" class="h7">Total Harga</div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-12">
                            <div><b>Rp. <?= $data_harga_total; ?></b></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
      <center class="wow bounce pb-4 mt--2" data-wow-duration="2s">
        <img src="<?= base_url('assets/argon/img/theme/completed.svg') ?>" class="img-fluid" width="300" height="300" alt="">
        <h2 class="mt-2">Pesanan anda telah selesai</h2>
      </center>
      <?php if($data_jasa['type'] != 'instalasi') : ?>
        <div class="card shadow-lg mb-5 wow fadeIn">
            <div class="card-header">
                Data component yang rusak : 
            </div>
            <div class="card-body">
                <table class="table table-hover dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Component</th>
                            <th>Merek</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach($data_material_used as $data) : ?>
                            <tr>
                                <th><?= $i++; ?></th>
                                <td><?= $data['nama_material']; ?></td>
                                <td><?= $data['nama_merek']; ?></td>
                                <td><?= $data['harga']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
      <?php endif; ?>
    </div>
  </div>