    <div class="container-fluid mt--7">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-6 pb-3">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="jadwal">Jadwal: &nbsp;<?= $data_pesanan['waktu']; ?></label>
                                <input type="text" name="jadwal" id="datetimepicker" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi : </label>
                                <textarea name="description" id="description" rows="6" class="form-control"><?= $data_pesanan['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="ubah_data" class="btn btn-orange btn-block">Ubah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <center>
                            <img src="<?= base_url('assets/argon/img/theme/wait_verified_pesanan.svg') ?>" width="200" height="200">
                        </center>
                        <div class="text-center mb-5">
                            <h2 class="text-center">Menunggu diverifikasi oleh <?= $data_pesanan['nama']; ?></h2>
                        </div>
                    </div>
                    <div class="card-footer mt-md--4 text-center no-border">
                        <a href="<?= base_url('customer/pakejasa/pesanan') ?>" class="btn btn-orange mt-2"><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke pesanan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>