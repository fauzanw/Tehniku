    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-xl-0">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="card shadow mb-5">
        <div class="card-header border-0 d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="text-white mb-0">Data Perusahaan Terdekat</h3>
            <form method="post">
                <input type="hidden" name='latlon' id="latlon">
                <button type="submit" name="cari_perusahaan" id="cari-perusahaan-terdekat" class="d-none d-sm-inline-block btn btn-sm btn-orange shadow-sm text-white">
                    <i class="fas fa-user-plus"></i> Cari perusahaan terdekat
                </button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-responsive-md table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Logo Perusahaan</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jarak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;foreach($data_perusahaan[0] as $index => $data) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td>
                            <img src="<?= base_url('assets/argon/img/perusahaan/') . $data['logo_perusahaan'] ?>" alt="" class='img-thumbnail' style="width: 50px;height: 50px;">
                        </td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td><?= $data_perusahaan['jarak'][$index]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
      </div>
  </div>