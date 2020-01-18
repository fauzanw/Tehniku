    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="card shadow-lg">
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_perusahaan">Nama Perusahaan</label>
                  <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="<?= $data_perusahaan['nama'] ?>">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Perusahaan</label>
                  <textarea name="alamat" id="alamat" cols="30" rows="6" class="form-control"><?= $data_perusahaan['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="nomor_ponsel">Nomor Ponsel</label>
                  <input type="text" name="nomor_ponsel" id="nomor_ponsel" class="form-control" value="<?= $data_perusahaan['nomor_ponsel'] ?>" required>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3">
                        <center>
                          <a href="#logo_perusahaan"><img src="<?= base_url('assets/argon/img/perusahaan/') . $data_perusahaan["logo_perusahaan"] ?>" style="width: 70px;height: 70px;" class="img-thumbnail"></a>
                      </center>
                      <div class="overlay" id="logo_perusahaan">
                          <a href="#" class="close">x close</a>
                        <img src="<?= base_url('assets/argon/img/perusahaan/') . $data_perusahaan["logo_perusahaan"] ?>" alt="Logo Perusahaan">
                      </div>
                    </div>
                    <div class="col-sm-9 container">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo_perusahaan">
                        <label class="custom-file-label" for="inputGroupFile01">Pilih logo perusahaan</label>
                        <p>(Pilih logo perusahaan jika logo mau diganti)</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group pt-1">
                  <button type="submit" name="manage" class="btn btn-orange btn-block">Edit data perusahaan</button>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nomor_npwp">Nomor NPWP</label>
                  <input type="text" name="nomor_npwp" id="nomor_npwp" class="form-control" value="<?= $data_perusahaan["nomor_npwp"] ?>" required>
                </div>
                <div class="form-group">
                  <label for="nomor_npwp">Nomor KTP</label>
                  <input type="text" name="nomor_ktp" id="nomor_ktp" class="form-control" value="<?= $data_perusahaan["nomor_ktp"] ?>" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <center>
                      <a href="#foto_npwp">
                        <img src="<?= base_url('assets/argon/img/npwp/') . $data_perusahaan['foto_npwp'] ?>" style="width: 85px;height: 70px;" class="img-thumbnail">
                      </a>
                    </center>
                    <div class="overlay" id="foto_npwp">
                        <a href="#" class="close">x close</a>
                        <img src="<?= base_url('assets/argon/img/npwp/') . $data_perusahaan["foto_npwp"] ?>" alt="Foto Npwp">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto_npwp">
                      <label class="custom-file-label" for="inputGroupFile01">Pilih foto npwp</label>
                      <p>(Pilih foto npwp jika foto npwp mau diganti)</p>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <center>
                      <a href="#foto_ktp"><img src="<?= base_url('assets/argon/img/ktp/') . $data_perusahaan['foto_ktp'] ?>" style="width: 85px;height: 70px;" class="img-thumbnail"></a>
                    </center>
                    <div class="overlay" id="foto_ktp">
                      <a href="#" class="close">x close</a>
                      <img src="<?= base_url('assets/argon/img/ktp/') . $data_perusahaan["foto_ktp"] ?>" alt="Foto Ktp">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto_ktp">
                      <label class="custom-file-label" for="inputGroupFile01">Pilih foto ktp</label>
                      <p>(Pilih foto ktp jika foto ktp mau diganti)</p>
                    </div>
                  </div>
                </div>  
                <div class="form-group">
                  <label for="latlon">Latitude & Longitude Lokasi Perusahaan</label>
                  <input type="text" readonly name="latlon" id="latlon" class="form-control" value="<?= $data_perusahaan['latlon'] ?>" required>
                  <p>(Izinkan kami untuk mengakses lokasi anda)</p>
                </div>
                <div class="form-group">
                  <button type="button" id="detectLocation" class="btn btn-orange btn-block">Akses lokasi saya</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card shadow mt-3 mb-3">
        <div class="card-header border-0 d-sm-flex align-items-center justify-content-between">
          <h3 class="text-dark">Data Jasa</h3>
          <a href="<?= base_url('perusahaan/jasa/tambah') ?>" class="btn btn-sm btn-orange text-white shadow-sm">
            <i class="fas fa-user-plus"></i> Tambah Jasa
          </a>
        </div>
        <div class="card-body">
          <form method="post" id="form_type_jasa">
            <div class="form-group">
              <p>
                <label for="type_jasa">Type Jasa : </label>
                <select name="type_jasa" id="type_jasa" class="custom-select">
                  <?php if(isset($_POST['type_jasa'])) : ?>
                    <option <?= ($_POST['type_jasa'] == 'semua_jasa') ? 'selected':null ?> value="semua_jasa">Semua Jasa</option>
                    <?php foreach($data_jasa_type as $data) : ?>
                      <option <?= ($_POST['type_jasa'] == $data['type']) ? 'selected':null ?> value="<?= $data['type'] ?>"><?= $data['type']; ?></option>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option value="semua_jasa" selected>Semua Jasa</option>
                    <?php foreach($data_jasa_type as $data) : ?>
                      <option value="<?= $data['type'] ?>"><?= $data['type']; ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </p>
            </div>
          </form>
          <table class="table table-responsive-md" id="dataTable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Type Jasa</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;foreach($data_jasa as $data) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $data['nama_jasa']; ?></td>
                <td><?= character_limiter($data['description'], 50); ?></td>
                <td><?= $data['harga']; ?></td>
                <td><?= $data['type']; ?></td>
                <td class='text-right'> 
                  <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expandexd="false">
                          <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="<?= base_url('perusahaan/jasa/') . $data['id'] . '/edit' ?>">Edit</a>
                          <a class="dropdown-item" href="<?= base_url('perusahaan/jasa/').$data['id']."/hapus" ?>">Hapus</a>
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
  </div>