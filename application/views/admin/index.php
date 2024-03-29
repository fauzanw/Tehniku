    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-xl-0">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Profile Admin</h6>
                </div>
              </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-4">
                <center>
                <img src="<?= base_url('assets/argon/img/admin/') . $data_admin['foto_admin'] ?>" class="card-img" style="width: 180px;height: 180px;">
                </center>
                </div>
                <div class="col-md-8">
                <div class="card-body text-white">
                    <h3 class="card-title text-white"><?= $data_admin['nama']; ?></h3>
                    <p class="card-text">Nomor Ponsel: <?= $data_admin['nomor_ponsel']; ?></p>
                </div>
                <div class="card-footer bg-transparent">
                <p class="card-text"><small class="text-muted">Bergabung ke <b>Tehniku</b> sejak <?= $this->session->userdata('date_joined') ?> </small></p>
                </div>
                </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>