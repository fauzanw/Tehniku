<div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      
      <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-2">
                <div class="card-body">
                    <img src="<?= base_url('assets/argon/img/perusahaan/') . $data_perusahaan['logo_perusahaan'] ?>" alt="" class="img-thumbnail" style="width: 100%;height: 200px;">
                    <h2 class="mt-2"><?= $data_perusahaan['nama']; ?></h2>
                    <p>Nomor Ponsel : <?= $data_perusahaan['nomor_ponsel']; ?></p>
                    <p>Latitude & Longitude : <?= $data_perusahaan['latlon']; ?></p>
                </div>
            </div>
            <a href="<?= base_url('admin/perusahaan') ?>" class="btn btn-orange btn-block text-white mb-2"><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke data perusahaan</a>
        </div>
        <div class="col-md-8">
            <div class="card shadow pt-2">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="#foto_ktp"><img src="<?= base_url('assets/argon/img/ktp/') . $data_perusahaan['foto_ktp'] ?>" class='img-thumbnail' style="width: 100%;height: 80px;" alt=""></a>
                                    <div class="overlay" id="foto_ktp">
                                        <a href="#" class="close">x close</a>
                                        <img src="<?= base_url('assets/argon/img/ktp/') . $data_perusahaan["foto_ktp"] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Nomor ktp :</label>
                                        <input type="text" class="form-control" readonly value="<?= $data_perusahaan['nomor_ktp'] ?>">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="#foto_npwp"><img src="<?= base_url('assets/argon/img/npwp/') . $data_perusahaan['foto_npwp'] ?>" class='img-thumbnail' style="width: 100%;height: 80px;" alt=""></a>
                                    <div class="overlay" id="foto_npwp">
                                        <a href="#" class="close">x close</a>
                                        <img src="<?= base_url('assets/argon/img/npwp/') . $data_perusahaan["foto_npwp"] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Nomor npwp :</label>
                                        <input type="text" class="form-control" readonly value="<?= $data_perusahaan['nomor_npwp'] ?>">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <label>Alamat : </label>
                                <textarea name="" id="" cols="30" rows="5" readonly class="form-control"><?= $data_perusahaan['alamat']; ?></textarea>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
  </div>