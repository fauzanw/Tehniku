    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <?php if($data_jasa['type'] == "instalasi") : ?>
            <div class="col-md-12 mb-5">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <a href="<?= base_url('perusahaan/pesanan') ?>" class='badge badge-orange'><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke pesanan</a>
                        <button type="button" data-toggle="modal" data-target="#tambahPegawaiModal" class="badge badge-orange"><i class="fas fa-plus"></i> Tambah pegawai</button>
                    </div>
                    <div class="card-body">
                        <h5>Data pegawai yang akan survey kerumah customer:</h5>
                        <table class="table table-orange table-responsive-md" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Nomor Ponsel</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;foreach($data_pegawai as $data) : ?>
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
                <center>
                    <img src="<?= base_url('assets/argon/img/theme/selecting_team.svg') ?>" width="300" height="300" alt="">
                    <h3>Pilih pegawaimu untuk menyurvei rumah customer!</h3>
                </center>
            </div>
        <?php else: ?>
        <?php endif; ?>
      </div>

      <div class="modal fade" id="tambahPegawaiModal" tabindex="-1" role="dialog" aria-labelledby="tambahPegawaiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPegawaiLabel">Tambah Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                <div class="modal-body">
                    <?php if($data_tambah_pegawai) : ?>
                        <table class="table table-reponsive table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;foreach($data_tambah_pegawai as $data) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td>
                                        <input type="checkbox" id="id_pegawai" name="id_pegawai[]" value="<?= $data['id'] ?>">
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="container text-center">
                            <img src="<?= base_url('assets/argon/img/theme/empty.svg') ?>" width="240" height="240" alt="">
                            <h2>Semua pegawaimu sedang sibuk!</h2>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambah_pegawai" class="btn btn-orange">Tambah Pegawai</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
  </div>