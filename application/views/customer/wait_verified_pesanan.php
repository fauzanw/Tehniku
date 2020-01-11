    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <center>
            <img src="<?= base_url('assets/argon/img/theme/wait_verified_pesanan.svg') ?>" width="300" height="300">
        </center>
        <div class="text-center mb-5">
            <h1 class="text-center">Menunggu diverifikasi oleh <?= $data_pesanan['nama']; ?></h1>
            <a href="<?= base_url('customer/pakejasa/pesanan') ?>" class="btn btn-orange mt-2"><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke pesanan</a>
        </div>
    </div>
  </div>