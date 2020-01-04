    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-xl-0">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="card shadow mb-5">
        <div class="card-header border-0 d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="text-dark mb-0">Data Jasa</h3>
        </div>
        <div class="card-body">
            <table class="table table-responsive-md table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Jasa</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi    </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;foreach($data_jasa as $index => $data) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $data['nama_jasa']; ?></td>
                        <td><?= $data['description']; ?></td>
                        <td><?= $data['harga']; ?></td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="" id="" class="custom-select">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?= base_url('customer/pakejasa/') . $data['id'] . '/type' ?>" class="badge badge-orange">Pilih jasa</a>
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