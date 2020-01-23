    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-xl-0">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow-lg mb-5">
              <div class="card-body">
                <form class="needs-validation" novalidate method="post">
                    <div class="form-group">
                        <label for="dari_tanggal">Dari Tanggal : </label>
                        <input type="date" name="dari_tanggal" id="dari_tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sampai_tanggal">Sampai Tanggal : </label>
                        <input type="date" name="sampai_tanggal" id="sampai_tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="type_jasa">Type Jasa : </label>
                      <select name="type_jasa" id="type_jasa" class="custom-select select2">
                        <option value="semua_jasa">Semua Jasa</option>
                        <?php foreach($data_jasa as $data) : ?>
                        <option value="<?= $data['id'] ?>"><?= $data['nama_jasa']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="get_laporan" class="btn btn-orange btn-block">Cari Laporan</button>
                    </div>
                </form>
              </div>
          </div>
        </div>
        </div>
    </div>
  </div>