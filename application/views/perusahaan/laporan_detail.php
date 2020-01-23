    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-xl-0">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-10 mb-5 mb-xl-0">
          <div class="card shadow-lg mb-5">
              <div class="card-body">
                <a href="javascript:window.location.href = '<?= base_url('perusahaan/laporan') ?>'" class="badge badge-orange mb-xl-5"><i class="fas fa-arrow-left"></i> Kembali cari laporan</a>
                <?php if(sizeof($data_laporan) > 0) : ?>
                    <button class="badge badge-orange mb-5 printjs">Print ke PDF</button>
                    <table class="table table-responsive table-hover dataTable" id="printJSTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>Nama Pegawai</th>
                                <th>Nama Jasa</th>
                                <th>Type Jasa</th>
                                <th>Biaya Total</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;foreach($data_laporan as $data) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $data['nama_customer']; ?></td>
                                    <td><?= $data['nama_pegawai']; ?></td>
                                    <td><?= $data['nama_jasa']; ?></td>
                                    <td><?= $data['type']; ?></td>
                                    <td><?= $data['uang_masuk']; ?></td>
                                    <td><?= $data['date_created']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="container text-center">
                        <img src="<?= base_url('assets/argon/img/theme/empty.svg') ?>" width="240" height="240" alt="" class="img-fluid">
                        <h2 class="mt-2">Belum ada laporan dari tanggal itu!</h2>
                    </div>
                <?php endif; ?>
              </div>
          </div>
        </div>
        </div>
    </div>
  </div>