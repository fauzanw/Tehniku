    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <a href="<?= base_url('admin/material') ?>" class="badge badge-orange"><i class="fas fa-arrow-left"></i> &nbsp;Kembali</a>
                            </div>
                        </div>
                        <form method="post" novalidate class="needs-validation" enctype="multipart/form-data">
                            <div class="dropload dropload__ready">
                                <div class="dropload-ready">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p class="header font-weight-normal">Drag & Drop</p>
                                    <p class="info font-weight-light">(Pilih file excel kamu yang berisi material)</p>
                                </div>
                                <div class="dropload-drag">
                                    <p class="text-gray-300">Drop file excel kamu disini ...</p>
                                </div>
                                <div class="dropload-drop">
                                    <a href="#" class="btn btn-danger btn-small btn-control" id="remove-preview"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                <label for="cover" class="stretched-link"></label>
                                <input type="file" class="d-none" name="cover" id="cover" required/>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" name="impor_material" class="btn btn-block btn-orange">Impor material</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>