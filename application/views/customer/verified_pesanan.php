    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-8">
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
                                    <p class="ml-2 mt--1"><?= $data_jasa['jarak']; ?> Km</p>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-3 text-orange" style="font-weight: bold;"><?= $data_jasa['harga']; ?></h1>
                        <!-- <a href="<?= base_url('customer/pakejasa/process/'.$data['id'].'?type='.$data['jasa_type_id'].'&coor='.base64_encode($data['jarak'])) ?>" class="btn btn-orange btn-block mt-4">Pilih jasa ini</a> -->
                    </div>
                </div>
            </div>
          </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-4">
            <div class="card card-pakejasa shadow-lg">
                <img src="<?= base_url('assets/argon/img/theme/wave.png') ?>" class="wave-pakejasa" alt="">
                <center class="mt--13">
                    <img src="<?= base_url('assets/argon/img/perusahaan/') . $data_pesanan['logo_perusahaan'] ?>" class="mt--1 card-img-top mt-3" style="width: 100px;height:100px;" alt="">
                </center>
                <div class="card-body mr-3 ml-3">
                    <div class="mt-5 text-center">
                        <h1 class="mt-5" style="font-weight: bold;"><?= $data_pesanan['nama']; ?></h1>
                    </div>
                    <div class="mt--4">
                        <hr>
                        <div class="mt--3">
                            <div class="row">
                                <i class="fas fa-phone-volume"></i>
                                <p class="ml-2 mt--1"><?= $data_pesanan['nomor_ponsel']; ?></p>
                            </div>
                            <div class="row">
                                <i class="fas fa-map-marker-alt"></i>
                                <p class="ml-2 mt--1"><?= $data_pesanan['alamat']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <table class="table table-responsive-md table-hover dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Component</th>
                                <th>Merek</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>