    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="card shadow-lg mb-5">
        <div class="card-header border-0 d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="text-dark mb-0">Data Pegawai</h3>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Umur</th>
                        <th>Nomor Ponsel</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Diverifikasi</th>
                        <th>Diblokir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;foreach($data_pegawai as $data) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['umur'] ?></td>
                            <td><?= $data['nomor_ponsel']; ?></td>
                            <td><?= $data['gender']; ?></td>
                            <td><?= $data['status'] == 1 ? '<span class="badge badge-dot mr-4"><i class="bg-success"></i> Sedang Ready</span>':'<span class="badge badge-dot mr-4"><i class="bg-warning"></i> Sedang bekerja</span>'; ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_verified" id="is_verified" disabled class="custom-control-input"  <?= ($data['is_verified']) == 1 ? "checked":null; ?> data-id="<?= $data['user_id'] ?>">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="is_blocked"  class="form-check-input" name="is_blocked" id="is_blocked" disabled class="custom-control-input"  <?= ($data['is_blocked']) == 1 ? "checked":null; ?> data-id="<?= $data['user_id'] ?>">
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
      </div>
  </div>