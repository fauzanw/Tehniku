    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <?php if($data_pesanan): ?>
        <div class="row">
            <div class="col-md-10">
                <?php foreach($data_pesanan as $i => $data) : ?>
                    <div class="card mb-3 shadow-lg">
                        <div class="card-header" style="border: none !important;">
                            <div class="text-right">
                            <a href="<?= base_url('perusahaan/pesanan/') . $data['id']. '/detail' ?>" class="btn btn-orange"><i class="fas fa-info-circle"></i> Detail</a>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <center>
                                <img src="<?= base_url('assets/argon/img/perusahaan/') . $data_jasa[$i]['logo_perusahaan'] ?>" class="card-img" style="width: 200px;height: 200px;">
                                </center>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body mt-xl--3 text-dark">
                                    <h1 class="card-title text-dark"><?= $data_jasa[$i]['nama_jasa']; ?></h1>
                                    <?php if($data['status'] == 1) : ?>
                                        <p><b>Status: </b> <span class="badge badge-dot mr-4"><i class="bg-warning"></i> Menunggu diverifikasi</span></p>
                                    <?php elseif($data['status'] == 2) : ?>
                                        <p><b>Status: </b> <span class="badge badge-dot mr-4"><i class="bg-success"></i> Diverifikasi</span></p>
                                    <?php elseif($data['status'] == 3) : ?>
                                        <p><b>Status: </b> <span class="badge badge-dot mr-4"><i class="bg-warning"></i> Sedang survey</span></p>
                                    <?php elseif($data['status'] == 4) : ?>
                                        <p><b>Status: </b> <span class="badge badge-dot mr-4"><i class="bg-success"></i> Selesai</span></p>
                                    <?php endif; ?>
                                    <div class="mt--4">
                                        <hr>
                                        <div class="row justify-content-between mt--3">
                                            <div class="col-md-6 row">
                                                <i class="fas fa-briefcase" style="font-size: 20px;color: #939393;"></i>
                                                <p class="ml-2 mt--1"><?= $data_jasa[$i]['type']; ?></p>
                                            </div>
                                            <div class="col-md-6 row">
                                                <i class="fas fa-money-bill-wave" style="font-size: 20px;color: #939393;"></i>
                                                <p class="ml-2 mt--1 text-orange" style='font-weight: bold;'><?= $data_jasa[$i]['harga']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent mt--3">
                                <p class="card-text"><small class="text-muted">Jadwal pesanan: <?= $data['waktu'] ?> </small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
      <?php else: ?>

      <?php endif; ?>
    </div>
  </div>