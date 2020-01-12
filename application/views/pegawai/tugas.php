    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <?php if($data_pesanan): ?>
        <div class="row">
            <?php foreach($data_pesanan as $i => $data) : ?>
            <div class="col-md-6">
                <div class="card mb-3 shadow-lg">
                    <div class="card-header" style="border: none !important;">
                        <div class="text-right">
                            <a href="<?= base_url('pegawai/tugas/') . $data['id']. '/detail' ?>" class="badge badge-orange"><i class="fas fa-info-circle"></i> Detail</a>
                        </div>
                    </div>
                    <div class="card-body text-black text-center">
                        <h1 class="card-title text-dark"><?= $data['nama_jasa']; ?></h1>
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
                            <div class="mr-5 ml-5 row justify-content-between mt--3">
                                <div class="row">
                                    <i class="fas fa-briefcase" style="font-size: 20px;color: #939393;"></i>
                                    <p class="ml-2 mt--1"><?= $data['type']; ?></p>
                                </div>
                                <div class="row">
                                    <i class="fas fa-money-bill-wave" style="font-size: 20px;color: #939393;"></i>
                                    <p class="ml-2 mt--1 text-orange" style='font-weight: bold;'><?= $data['harga']; ?></p>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mr-5 ml-5"><i class="fas fa-quote-left"></i> <?= $data['description']; ?> <i class="fas fa-quote-right"></i></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
      <?php else: ?>

      <?php endif; ?>
    </div>
  </div>