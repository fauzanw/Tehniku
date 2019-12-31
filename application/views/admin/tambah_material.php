    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
        <div class="card shadow-lg">
            <div class="card-body">
                <form method="post" novalidate class="needs-validation">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_material">Nama Material</label>
                                <input type="text" name="nama_material" id="nama_material" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="merek">Merek</label>
                                <select name="merek" id="merek2" class="custom-select" placeholder="Choose your merek">
                                    <option value="" selected readonly>--- MEREK ---</option>
                                    <?php foreach($data_merek as $data) : ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nama_merek'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" id="harga" class="rupiah form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jasa_keyword">Jasa</label>
                                <select name="jasa_keyword" id="jasa_keyword" class="custom-select">
                                    <option value="" selected readonly>--- JASA ---</option>
                                    <?php foreach($data_jasa_keyword as $data) : ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['keyword']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" cols="30" rows="6" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-orange btn-block" name="tambah_material">Tambah Material</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
  </div>