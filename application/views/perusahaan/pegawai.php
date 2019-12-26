    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <?= $this->session->flashdata('message') ?>
          <div class="card bg-default shadow mb-5">
             <div class="card-header bg-transparent border-0 d-sm-flex align-items-center justify-content-between mb-4">
                  <h3 class="text-white mb-0">Data Pegawai</h3>
                  <a href="<?= base_url('perusahaan/pegawai/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-orange shadow-sm text-white">
                      <i class="fas fa-user-plus"></i> Tambah Pegawai
                  </a>
              </div>
              <div class="card-body">
                <table class="table table-responsive table-dark" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Nomor Ponsel</th>
                            <th scope="col">Nomor Ktp</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Status</th>
                            <th scope="col">Diblokir</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach($data_pegawai as $data) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['umur']; ?></td>
                            <td><?= $data['nomor_ponsel']; ?></td>
                            <td><?= $data['nomor_ktp']; ?></td>
                            <td><?= $data['gender']; ?></td>
                            <td><?= $data['status'] == 1 ? '<span class="badge badge-dot mr-4"><i class="bg-success"></i> Sedang Ready</span>':'<span class="badge badge-dot mr-4"><i class="bg-warning"></i> Sedang bekerja</span>'; ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_blocked" id="is_blocked" class="custom-control-input"  <?= ($data['is_blocked']) == 1 ? "checked":null; ?> data-id="<?= $data['user_id'] ?>">
                                </div>
                            </td>
                            <td class="text-right">
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
        <?php foreach($data_pegawai as $data) : ?>
        <div class="modal fade bd-example-modal-lg" id="editDataPegawai-<?= $data['id'] ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataPegawaiLabel">Edit data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action='<?= base_url("perusahaan/pegawai/". $data['id'] ."/edit") ?>' novalidate class='needs-validation' enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id_pegawai" value="<?= $data['id'] ?>">
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" value="<?= $data['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <input type="number" name="umur" id="umur" class="form-control" value="<?= $data['umur'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_ponsel">Nomor Ponsel</label>
                                    <input type="text" name="nomor_ponsel" id="nomor_ponsel" class="form-control" value="<?= $data['nomor_ponsel'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin Pegawai</label>
                                    <select name="gender" id="gender" class="custom-select custom-select-md">
                                        <option value="" readonly>--- JENIS KELAMIN ---</option>
                                        <option value="laki-laki" <?= ($data['gender'] == 'laki-laki' ? 'selected':'') ?>>Laki Laki</option>
                                        <option value="perempuan" <?= ($data['gender'] == 'perempuan' ? 'selected':'') ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-orange">Edit data pegawai</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
  </div>