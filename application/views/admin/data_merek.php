    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="card shadow-lg mb-5">
        <div class="card-header border-0 align-items-center justify-content-between">
            <h3 class="text-dark mb-0">Data Merek</h3>
            <a data-toggle="modal" data-target="#tambahMerek" href="#" class="btn btn-sm btn-orange text-white shadow-lg">
                <i class="fas fa-plus"></i> Tambah Merek
            </a>
        </div>
        <div class="card-body">
            <table class="table table-responsive-md table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Merek</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;foreach($data_merek as $data) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['nama_merek']; ?></td>
                            <td class='text-right'> 
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editMerek-<?= $data['id'] ?>">Edit</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/merek/').$data['id']."/hapus" ?>">Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php foreach($data_merek as $data) : ?>
        <div class="modal fade bd-example-modal-lg" id="editMerek-<?= $data['id'] ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataPegawaiLabel">Edit Merek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action='<?= base_url("admin/merek/") . $data['id'] . '/edit' ?>' novalidate class='needs-validation' enctype="multipart/form-data">
                    <div class="form-group">
                        <input type='text' class='form-control' name='nama_merek' placeholder='Nama Merek...' required value="<?= $data['nama_merek'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_merek" class="btn btn-orange">Edit Merek</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="modal fade bd-example-modal-lg" id="tambahMerek" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataPegawaiLabel">Tambah Merek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action='<?= base_url("admin/merek/tambah") ?>' novalidate class='needs-validation' enctype="multipart/form-data">
                    <div class='input-group form-group'>
                        <input type='text' class='form-control' name='nama_merek[]' placeholder='Nama Merek...' required>
                        <div class='input-group-prepend'>
                            <div class='input-group-text'><a id='add_input' class="text-dark" href="#"><i class='fa fa-plus'></i></a></div>
                        </div>
                    </div>
                    <div id="output"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambah_merek" class="btn btn-orange">Tambah Merek</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
      </div>
  </div>