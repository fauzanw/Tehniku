    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="card shadow-lg mb-5">
        <div class="card-header border-0 align-items-center justify-content-between">
            <h3 class="text-dark mb-0">Data Material</h3>
            <a href="<?= base_url('admin/material/tambah') ?>" class="btn btn-sm btn-orange text-white shadow-sm">
                <i class="fas fa-plus"></i> Tambah Material
            </a>
            <a href="<?= base_url('admin/material/impor_excel') ?>" class="btn btn-sm btn-orange text-white shadow-sm">
                <i class="fas fa-file-excel"></i> Impor dari excel
            </a>
            <a href="<?= base_url('assets/argon/Template Material.xls') ?>" class="btn btn-sm btn-orange text-white shadow-sm">
                <i class="fas fa-download"></i> Download template
            </a>
        </div>
        <div class="card-body">
            <form method='post'>
                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jasa">Jasa : </label>
                            <select name="jasa" id="jasa" class="custom-select">
                                <?php if(isset($_POST['cari_jasa'])) : ?>
                                    <option value="semua_jasa">Semua Jasa</option>
                                    <?php foreach($data_keyword_jasa as $data) : ?>
                                    <option value="<?= $data['id'] ?>" <?= ($_POST['jasa'] == $data['id']) ? 'selected':null ?>><?= $data['keyword'] ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="semua_jasa" selected>Semua Jasa</option>
                                    <?php foreach($data_keyword_jasa as $data) : ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['keyword'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="merek">Merek : </label>
                            <select name="merek" id="merek" class="custom-select">
                                <?php if(isset($_POST['cari_jasa'])) : ?>
                                    <option value="semua_merek">Semua Merek</option>
                                    <?php foreach($data_merek as $data) : ?>
                                    <option value="<?= $data['id'] ?>" <?= ($_POST['merek'] == $data['id']) ? 'selected':null ?>><?= $data['nama_merek'] ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="semua_merek" selected>Semua Merek</option>
                                    <?php foreach($data_merek as $data) : ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nama_merek'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mt-4">
                            <button type="submit" name="cari_jasa" class="btn btn-orange mt-2"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-responsive-md table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Material</th>
                        <th>Deskripsi Material</th>
                        <th>Merek</th>
                        <th>Harga</th>
                        <th>Jasa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;foreach($data_material as $data) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['nama_material']; ?></td>
                            <td><?= character_limiter($data['description'], 50) ?></td>
                            <td><?= $data['nama_merek']; ?></td>
                            <td><?= $data['harga']; ?></td>
                            <td><?= $data['keyword']; ?></td>
                            <td class='text-right'> 
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="<?= base_url('admin/material/').$data['id']."/edit" ?>">Edit</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/material/').$data['id']."/hapus" ?>">Hapus</a>
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