    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-<?= (sizeof($data_laporan_tugas_ini) > 0 ? '12':'7') ?>">
            <div class="card shadow-lg">
                <div class="card-header">
                    <a href="<?= base_url('pegawai/tugas') ?>" class='badge badge-orange'><i class="fas fa-arrow-left"></i> &nbsp;Kembali ke pesanan</a>
                </div>
                <div class="card-body">
                    <h5>Data pegawai yang akan ikut survey kerumah customer : </h5>
                    <table class="table table-orange table-responsive<?= (sizeof($data_laporan_tugas_ini) > 0 ? '-md':null) ?> dataTable">
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
                <button onclick="return confirm('Apakah kamu yakin?')" <?= (sizeof($data_laporan_tugas_ini) > 0 ? null:'disabled') ?> name="selesai" type="submit" class="btn btn-orange btn-block">Selesaikan tugas</button>
            </form>
        </div>
        <?php if(sizeof($data_laporan_tugas_ini) == 0) : ?>
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Laporkan ke perusahaan jika customer sudah membayar</h5>
                        <hr>
                    </div>
                    <form method="post" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="uang_customer">Uang Customer : </label>
                            <input type="text" name="uang_customer" id="uang_customer" required class="form-control rupiah">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="lapor" class="btn btn-orange btn-block">Lapor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
      </div>

      <div class="row mt-3">
        <div class="col-md-4 mb-sm-3">
            <div class="card card-pakejasa shadow-lg">
                <img src="<?= base_url('assets/argon/img/theme/wave.png') ?>" class="wave-pakejasa" alt="">
                <center class="mt--15">
                    <h2 class="text-white" style="font-weight: bold;"><?= $data_jasa['nama']; ?></h2>
                    <img src="<?= base_url('assets/argon/img/perusahaan/') . $data_jasa['logo_perusahaan'] ?>" class="mt--1 card-img-top mt-3" style="width: 80px;height:80px;" alt="">
                </center>
                <div class="card-body">
                    <div class="mt-5 mr-3 ml-3 text-center">
                        <h1 class="mt-5"><?= $data_jasa['nama_jasa']; ?></h1>
                        <div class="mt--4">
                            <hr>
                            <div class="mt--3 mr-3 ml-3">
                                <div class="row">
                                    <i class="fas fa-briefcase" style="font-size: 22px;color: #939393;"></i>
                                    <p class="ml-2 mt--1"><?= $data_jasa['type']; ?></p>
                                </div>
                                <i class="fas fa-clock"></i>
                                <p class="ml-2 mt--1"><?= $data_pesanan['waktu']; ?></p>
                            </div>
                        </div>
                        <!-- <a href="<?= base_url('customer/pakejasa/process/'.$data['id'].'?type='.$data['jasa_type_id'].'&coor='.base64_encode($data['jarak'])) ?>" class="btn btn-orange btn-block mt-4">Pilih jasa ini</a> -->
                    </div>
                    <div class="mt-4">
                        <div class="row justify-content-between mt--2">
                            <div class="col-lg-6 col-sm-6 col-md-12 mr-0 ml-0">
                                <div style="width: 90%;" class="h7">Harga Jasa</div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-12">
                                <div><?= $data_jasa['harga']; ?></div>
                            </div>
                        </div>
                        <?php if($data_jasa['type'] != 'instalasi') : ?>
                        <?php foreach($data_material_used as $data) : ?>
                            <div class="row justify-content-between mt--1">
                                <div class="col-lg-6 col-sm-6 col-md-12 mr-0 ml-0">
                                    <div style="width: 90%;" class="h7"><?= $data['nama_material']; ?></div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-12">
                                    <div>Rp. <?= $data['harga']; ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="row justify-content-between mt--4">
                            <hr style="width: 90%;">
                            <b class="mt-3 mr-2">+</b>
                        </div>
                        <div class="row justify-content-between mt--4">
                        <div class="col-lg-6 col-sm-6 col-md-12 mr-0 ml-0">
                                <div style="width: 90%;" class="h7">Total Harga</div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-12">
                            <div><b>Rp. <?= $data_total_harga; ?></b></div>
                            </div>
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