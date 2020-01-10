    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-xl-0">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow-lg">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-dark ls-1 mb-1">Profile Pegawai <?= $data_perusahaan['nama'] ?></h6>
                </div>
              </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-4">
                <center>
                <img src="<?= base_url('assets/argon/img/pegawai/') . $data_pegawai['foto_pegawai'] ?>" class="card-img" style="width: 180px;height: 180px;">
                </center>
                </div>
                <div class="col-md-8">
                <div class="card-body text-dark">
                    <h3 class="card-title text-black"><?= $data_pegawai['nama']; ?></h3>
                    <p class="card-text">Nomor Ktp: <?= $data_pegawai['nomor_ktp']; ?></p>
                </div>
                <div class="card-footer bg-transparent">
                <p class="card-text"><small class="text-muted">Bergabung ke <b>Tehniku</b> sejak <?= $data_pegawai2['date_joined'] ?> </small></p>
                </div>
                </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>