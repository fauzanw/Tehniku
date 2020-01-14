    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <?php if($data_pesanan): ?>
        <div class="row">
            <div class="col-md-10">
                <?php foreach($data_pesanan as $i => $data) : ?>
                    <div class="card shadow-lg" style="width: 18rem;">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

                        <div class="card-body">
                            <h5 class="card-title"><?= $data_jasa[$i]['nama_jasa']; ?></h5>
                            <p><i class="fas fa-phone-volume"></i> &nbsp;<?= $data_jasa[$i]['nomor_ponsel']; ?></p>
                                <p><i class="fas fa-street-view"></i> &nbsp;<?= $data_jasa[$i]['alamat']; ?></p>
                                <p><i class="fas fa-map-marker-alt"></i> &nbsp;Jarak customer : <?= $data_jasa['jarak']; ?> Km</p>
                            <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
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