    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card shadow-lg mb-5">
              <div class="card-header border-0 d-sm-flex align-items-center justify-content-between mb-4">
                <h3 class="text-dark mb-0">Edit Jasa <?= $data_jasa['nama_jasa']; ?></h3>
              </div>
              <div class="card-body">
                <form method="post" novalidate class="needs-validation">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nama_jasa">Nama Jasa</label>
                        <input type="text" name="nama_jasa" id="nama_jasa" class="form-control" required value="<?= $data_jasa['nama_jasa'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" class="rupiah form-control" required value="<?= $data_jasa['harga'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="type_jasa">Type Jasa</label>
                        <select name="type_jasa" id="type_jasa" class="custom-select" placeholder="Choose your type jasa" required>
                          <option value="" selected readonly>--- TYPE JASA ---</option>
                          <?php foreach($data_type_jasa as $data) : ?>
                          <option <?= $data['type'] == $data_jasa['type'] ? 'selected':null ?> value="<?= $data['id'] ?>"><?= $data['type'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="key_jasa">Keyword Jasa</label>
                        <select name="keyword_jasa" id="key_jasa" class="custom-select" placeholder="Choose your keyword" required>
                          <option value="" selected readonly>--- KEYWORD JASA ---</option>
                          <?php foreach($data_keyword as $data) : ?>
                          <option <?= $data['keyword'] == $data_jasa['keyword'] ? 'selected':null ?> value="<?= $data['id'] ?>"><?= $data['keyword']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="description">Deksripsi</label>
                          <textarea name="description" id="description" cols="30" rows="6" class="form-control" required><?= $data_jasa['description']; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <button type="submit" name="edit_jasa" class="btn btn-orange btn-block">Edit Jasa</button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>