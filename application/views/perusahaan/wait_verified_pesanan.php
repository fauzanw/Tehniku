    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row mb-3">
        <div class="col-md-8">
            <div class="card shadow-lg mb-2">
                <div class="card-header" style="border: none;">
                    <a href="<?= base_url('perusahaan/pesanan') ?>" class='badge badge-orange'><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke pesanan</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/argon/img/customer/') . $data_pesanan['foto_customer'] ?>" alt="" style="width: 180px;height: 180px;" class="img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h1><?= $data_pesanan['nama']; ?></h1>
                            <p><i class="fas fa-phone-volume"></i> &nbsp;<?= $data_pesanan['nomor_ponsel']; ?></p>
                            <p class="expander"><i class="fas fa-street-view"></i> &nbsp;<?= $data_pesanan['alamat']; ?></p>
                            <p><i class="fas fa-map-marker-alt"></i> &nbsp;Jarak customer : <?= $data_jasa['jarak']; ?> Km</p>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Deskripsi customer</label>
                        <textarea name="description" id="description" readonly class="form-control"><?= $data_pesanan['description']; ?></textarea>
                    </div>
                </div>
            </div>
            <form method="post">
                <button type="submit" name="verif" class="btn btn-orange btn-block">Verifikasi Pesanan</button>
            </form>
        </div>
        <div class="col-md-4 wow fadeInUp">
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
    </div>
  </div>