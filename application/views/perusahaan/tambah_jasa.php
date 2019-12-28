    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card shadow-lg mb-5">
              <div class="card-header border-0 d-sm-flex align-items-center justify-content-between mb-4">
                <h3 class="text-dark mb-0">Tambah Jasa</h3>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nama_jasa">Nama Jasa</label>
                        <input type="text" name="nama_jasa" id="nama_jasa" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="description">Deksripsi</label>
                          <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-orange btn-block">Tambah Jasa</button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>