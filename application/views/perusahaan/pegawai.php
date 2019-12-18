    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <?= $this->session->flashdata('message') ?>
          <div class="card bg-default shadow mb-5">
              <div class="card-header bg-transparent border-0 d-sm-flex align-items-center justify-content-between mb-4">
                  <h3 class="text-white mb-0">Data Pegawai</h3>
                  <a href="<?= base_url('perusahaan/pegawai/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                      <i class="fas fa-user-plus"></i> Tambah Pegawai
                  </a>
              </div>
              <div class="table-responsive">
                  <div class="container">
                    <table class="table align-items-center table-dark table-flush table-hover dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Nomor Ponsel</th>
                                <th scope="col">Nomor Ktp</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
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
                                <td><?= $data['status'] == 1 ? '<span class="badge badge-dot mr-4"><i class="bg-success"></i> Ready</span>':'<span class="badge badge-dot mr-4"><i class="bg-warning"></i> On Survey</span>'; ?></td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="<?= base_url('perusahaan/pegawai/').$data['id']."/hapus" ?>">Hapus</a>
                                            <a class="dropdown-item" href="#">Edit</a>
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
        </div>
        </div>
    </div>
  </div>