    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <?php if($data_jasa['type'] == "instalasi") : ?>
            <div class="col-md-7 mb-5">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <a href="<?= base_url('perusahaan/pesanan') ?>" class='badge badge-orange'><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke pesanan</a>
                        <button type="button" data-toggle="modal" data-target="#tambahPegawaiModal" class="badge badge-orange"><i class="fas fa-plus"></i> Tambah pegawai</button>
                    </div>
                    <div class="card-body">
                        <h5>Data pegawai yang akan survey kerumah customer:</h5>
                        <table class="table table-responsive-md" id="dataTable">
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
            </div>
            <div class="col-md-5 mb-5">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h5>Data customer pemesan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/argon/img/customer/') . $data_pesanan['foto_customer'] ?>" alt="" style="width: 160px;height: 160px;" class="img-thumbnail">
                            </div>
                            <div class="col-md-8">
                                <h1><?= $data_pesanan['nama']; ?></h1>
                                <p><i class="fas fa-phone-volume"></i> &nbsp;<?= $data_pesanan['nomor_ponsel']; ?></p>
                                <p><i class="fas fa-street-view"></i> &nbsp;<?= $data_pesanan['alamat']; ?></p>
                                <p><i class="fas fa-map-marker-alt"></i> &nbsp;Jarak customer : <?= $data_jasa['jarak']; ?> Km</p>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="description">Deskripsi customer : </label>
                            <textarea name="description" id="description" readonly class="form-control"><?= $data_pesanan['description']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
        <?php endif; ?>
    </div>
    
    <div class="card shadow-lg">
        <div class="card-header" style="border: none;">
            Material yang digunakan pada jasa ini :
        </div>
        <div class="card-body">
            <table class="table table-responsive-md dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Component</th>
                        <th>Merek</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;foreach($data_material as $data) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['nama_material']; ?></td>
                            <td><?= $data['nama_merek']; ?></td>
                            <td>Rp. <?= $data['harga']; ?></td>
                            <td>
                                <input type="checkbox" name="material[]" id="material[]" disabled checked>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <center>
      <img src="<?= base_url('assets/argon/img/theme/selecting_team.svg') ?>" width="300" height="300" alt="">
      <h3>Pilih pegawaimu yang akan survey kerumah customer!</h3>
    </center>

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