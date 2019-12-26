    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="card bg-default shadow mb-5">
        <div class="card-header bg-transparent border-0 d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="text-white mb-0">Data Perusahaan</h3>
        </div>
        <div class="card-body">
            <table class="table table-responsive-md table-dark table-hover" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Latitude & Longitude</th>
                        <th>Diverifikasi</th>
                        <th>Diblokir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;foreach($data_perusahaan as $data) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['nama_perusahaan']; ?></td>
                            <td><?= $data['latlon'] ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_verified" id="is_verified" disabled class="custom-control-input"  <?= ($data['is_verified']) == 1 ? "checked":null; ?> data-id="<?= $data['user_id'] ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="is_blocked"  class="form-check-input" name="is_blocked" id="is_blocked" class="custom-control-input"  <?= ($data['is_blocked']) == 1 ? "checked":null; ?> data-id="<?= $data['user_id'] ?>">
                                </div>
                            </td>
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