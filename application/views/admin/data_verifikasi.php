    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="card shadow mb-5">
        <div class="card-header border-0 d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="text-dark mb-0">Data Verifikasi</h3>
        </div>
        <div class="card-body">
            <table class="table table-responsive-md table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Nomor Ponsel</th>
                        <th>Nomor Ktp</th>
                        <th>Diverifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;foreach($data_verifikasi_user as $index => $data) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= ($data['nama']) ?></td>
                            <td><?= $data['nomor_ponsel']; ?></td>
                            <td><?= $data['nomor_ktp']; ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input is_verified_user" name="is_verified" class="custom-control-input"  <?= ($data_verifikasi[$index]['is_verified']) == 1 ? "checked":null; ?> data-id="<?= $data_verifikasi[$index]['id'] ?>">
                                </div>
                            </td>
                            <!-- <td>
                                <div class="form-check">
                                    <input type="checkbox" name="is_blocked_user" disabled  class="form-check-input" id="is_blocked_user" class="custom-control-input"  <?= ($data_verifikasi[$index]['is_blocked']) == 1 ? "checked":null; ?> data-id="<?= $data_verifikasi[$index]['id'] ?>">
                                </div>
                            </td> -->
                            <td class='text-right'> 
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#editDataPegawai-<?= $data['id'] ?>" href="#">Edit</a>
                                        <a class="dropdown-item" href="<?= base_url('perusahaan/pegawai/').$data['id']."/hapus" ?>">Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
      </div>
  </div>