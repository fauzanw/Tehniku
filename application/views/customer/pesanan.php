    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <?php if($data_pesanan): ?>
        <div class="row">
            <?php foreach($data_pesanan as $i => $data) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-lg" style="width: 18rem;">
                        <center>
                            <img src="<?= base_url('assets/argon/img/perusahaan/') . $data_jasa[$i]['logo_perusahaan'] ?>" style="width: 50%;height:10vw;" alt="" class="bd-placeholder-img card-img-top mt-2">
                        </center>
                        <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg> -->

                        <div class="card-body">
                            <h5 class="card-title"><?= $data_jasa[$i]['nama_jasa']; ?></h5>
                            <?php if($data['status'] == 1) : ?>
                                <p><span class="badge badge-dot mr-4"><i class="bg-warning"></i> Menunggu diverifikasi</span></p>
                            <?php elseif($data['status'] == 2) : ?>
                                <p><span class="badge badge-dot mr-4"><i class="bg-success"></i> Diverifikasi</span></p>
                            <?php elseif($data['status'] == 3) : ?>
                                <p><span class="badge badge-dot mr-4"><i class="bg-warning"></i> Sedang survey</span></p>
                            <?php elseif($data['status'] == 4) : ?>
                                <p><span class="badge badge-dot mr-4"><i class="bg-success"></i> Selesai</span></p>
                            <?php endif; ?>
                            <p><i class="fas fa-briefcase" style="font-size: 20px;color: #939393;"></i> &nbsp;<?= $data_jasa[$i]['type']; ?></p>
                            <p><i class="fas fa-money-bill-wave" style="font-size: 16px;color: #939393;"></i> &nbsp;<?= $data_jasa[$i]['harga']; ?></p>
                            <p><i class="fas fa-search-location" style="font-size: 20px;color: #939393;"></i> &nbsp;<?= $data_jasa[$i]['jarak']; ?> Km</p>
                            <a href="<?= base_url('customer/pakejasa/pesanan/') . $data['id'] . '/detail' ?>" class="btn btn-orange btn-block"><i class="fas fa-info-circle"></i> Detail Pesanan</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
      <?php else: ?>

      <?php endif; ?>
    </div>
  </div>