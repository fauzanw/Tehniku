    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">
                    <a href="<?= base_url('pegawai/tugas') ?>" class='badge badge-orange'><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke pesanan</a>
                </div>
                <div class="card-body">
                    <h5>Data pegawai yang akan survey kerumah kamu:</h5>
                    <table class="table table-orange table-responsive-md dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Nomor Ponsel</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;foreach($data_pegawai_to_surveying as $data) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['nomor_ponsel']; ?></td>
                                    <td><?= $data['gender']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <form method="post" class="mt-2">
                <button type="submit" class="btn btn-orange btn-block">Survey rumah customer</button>
            </form>
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
                            <div class="mt--3 mr-3 ml-3">
                                <div class="row">
                                    <i class="fas fa-briefcase" style="font-size: 22px;color: #939393;"></i>
                                    <p class="ml-2 mt--1"><?= $data_jasa['type']; ?></p>
                                </div>
                                <div class="row">
                                    <i class="fas fa-money-bill-wave" style="font-size: 20px;color: #939393;"></i>
                                    <p class="ml-2 mt--1 text-orange" style="font-weight: bold;"><?= $data_jasa['harga']; ?></p>
                                </div>
                                <div class="row mt-3">
                                    <p class="ml-2 mt--1"><?= $data_pesanan['waktu']; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="<?= base_url('customer/pakejasa/process/'.$data['id'].'?type='.$data['jasa_type_id'].'&coor='.base64_encode($data['jarak'])) ?>" class="btn btn-orange btn-block mt-4">Pilih jasa ini</a> -->
                    </div>
                </div>
            </div>
          </div>
      </div>
      <div class="card shadow-lg mt-3">
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