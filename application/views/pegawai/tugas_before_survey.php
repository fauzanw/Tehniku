    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <a href="<?= base_url('pegawai/tugas') ?>" class='badge badge-orange'><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke pesanan</a>
                </div>
                <div class="card-body">
                    <h5>Data pegawai yang akan ikut survey kerumah customer:</h5>
                    <table class="table table-orange table-responsive-md dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Nomor Ponsel</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;foreach($data_pegawai_to_surveying as $data) : ?>
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
            <form method="post" class="mt-2">
                <button onclick="return confirm('Apakah kamu yakin?')" name="survey" type="submit" class="btn btn-orange btn-block">Berangkat Survey</button>
            </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-4 mb-sm-3">
            <div class="card card-pakejasa shadow-lg">
                <img src="<?= base_url('assets/argon/img/theme/wave.png') ?>" style="height: 180px;" alt="">
                <center class="mt--15">
                    <h2 class="text-white" style="font-weight: bold;"><?= $data_jasa['nama']; ?></h2>
                    <img src="<?= base_url('assets/argon/img/perusahaan/') . $data_jasa['logo_perusahaan'] ?>" class="card-img-top mt-3" style="width: 70px;height:70px;" alt="">
                </center>
                <div class="card-body">
                    <div class="mt-6 mr-3 ml-3 row justify-content-between">
                        <h6 class="mb-0 float-left"><?= $data_jasa['nama_jasa']; ?></h6>
                        <span class="badge badge-danger float-right">Rp. <?= $data_total_harga; ?></span>
                    </div>
                    <hr>
                    <div class="mt--3">
                        <div class="row no-gutters justify-content-between">

                            <div class="col-auto d-flex align-items-center">
                                <div class="mr-2 embed-responsive embed-responsive-1by1" style="width:32px;">
                                    <div class="embed-responsive-item">
                                        <i class="fas fa-briefcase p-1 img__contain"></i>
                                    </div>
                                </div>
                                <p class="h7 mb-0 font-weight-light">
                                    <span class="font-weight-medium"><?= $data_jasa['type']; ?></span>
                                </p>
                            </div>

                            <div class="col-auto d-flex align-items-center">
                                <div class="mr-2 embed-responsive embed-responsive-1by1" style="width:32px;">
                                    <div class="embed-responsive-item">
                                        <i class="fas fa-money-bill-wave p-1 img__contain"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="h7 mb-0 font-weight-light"><span class="text-bold text-orange"><?= $data_jasa['harga']; ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header no-border bg-orange">
                    <h5 class="text-white">Data Customer Pemesan</h5>
                </div>
                <div class="card-body mt--3">
                    <center>
                        <img src="<?= base_url('assets/argon/img/customer/') . $data_pesanan['foto_customer'] ?>" alt="" style="width: 20%;height: 8vw;" class="img-thumbnail card-img-top mt-2">
                    </center>
                        <div class="row">
                            <div class="col-md-8">
                                <h1><?= $data_pesanan['nama']; ?></h1>
                                <p><i class="fas fa-phone-volume"></i> &nbsp;<?= $data_pesanan['nomor_ponsel']; ?></p>
                                <p class="expander"><i class="fas fa-street-view"></i> &nbsp;<?= $data_pesanan['alamat']; ?></p>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="description">Deskripsi customer : </label>
                            <textarea name="description" id="description" readonly class="form-control"><?= $data_pesanan['description']; ?></textarea>
                        </div>
                </div>
            </div>
        </div>
      </div>
      <div class="card shadow-lg mt-3 mb-3">
        <div class="card-header">
            Data component yang digunakan pada jasa ini : 
        </div>
        <div class="card-body">
            <?php if($data_jasa['type'] != 'instalasi') : ?>
                <button data-toggle="modal" data-target="#modalTambahComponent" class="badge badge-orange mb-3">Tambah Component Kerusakan</button>
                <!-- Modal Tambah Component -->
                <div class="modal fade bd-example-modal-lg" id="modalTambahComponent" tabindex="-1" role="dialog" aria-labelledby="modalTambahComponentLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahComponentLabel">Daftar Component</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url("pegawai/tugas/".$this->uri->segment(3)."/material/tambah") ?>" method="post">
                        <div class="modal-body modal-scrollable">
                            <table class="table table-responsive-md table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Component</th>
                                        <th>Merek</th>
                                        <th>Harga</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;foreach($data_material as $data) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $data['nama_material']; ?></td>
                                            <td><?= $data['nama_merek'] ?></td>
                                            <td>Rp. <?= $data['harga']; ?></td>
                                            <td>
                                                <input type="checkbox" name="id_material[]" id="id" value="<?= $data['id'] ?>">
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-orange">Tambah component kerusakan</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <table class="table table-responsive-md table-hover dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Component</th>
                            <th>Merek</th>
                            <th>Harga</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach($data_material_used as $data) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['nama_material']; ?></td>
                                <td><?= $data['nama_merek'] ?></td>
                                <td>Rp. <?= $data['harga']; ?></td>
                                <td>
                                    <input type="checkbox" checked disabled>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <table class="table table-responsive-md table-hover dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Component</th>
                        <th>Merek</th>
                        <th>Harga</th>
                        <th>Pilih</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;foreach($data_material_used as $data) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['nama_material']; ?></td>
                            <td><?= $data['nama_merek'] ?></td>
                            <td>Rp. <?= $data['harga']; ?></td>
                            <td>
                                <input type="checkbox" checked disabled name="id_material[]" id="id_material">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
    </div>
  </div>