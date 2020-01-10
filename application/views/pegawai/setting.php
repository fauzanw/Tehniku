    <div class="container-fluid mt--7">
      <?= $this->session->flashdata('message'); ?>
      <div class="row mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-orange" style="border: none !important;"><h3 class='text-white'>Setting Akun Customer</h3></div>
                    <div class="card-body">
                    <form method="post" novalidate class="needs-validation" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama : </label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $data_pegawai['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nomor_ponsel">Nomor Ponsel : </label>
                                    <input type="text" name="nomor_ponsel" id="nomor_ponsel" class="form-control" value="<?= $data_pegawai['nomor_ponsel'] ?>" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="foto_customer">Profile Customer : </label>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="#foto_pegawai"><img src="<?= base_url('assets/argon/img/pegawai/') . $data_pegawai['foto_pegawai'] ?>" class="img-thumbnail" alt=""></a>
                                            <div class="overlay" id="foto_pegawai">
                                                <a href="#" class="close">x close</a>
                                                <img src="<?= base_url('assets/argon/img/pegawai/') . $data_pegawai["foto_pegawai"] ?>" alt="Foto Pegawai">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="change_foto_pegawai" name="foto_pegawai" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="change_foto_pegawai">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email : </label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $data_pegawai2["email"] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="new_password">Password baru : </label>
                                    <input type="password" name="new_password" id="new_password" class="form-control">
                                </div>
                                

                                <div class="form-group">
                                    <label for="old_password">Password Lama : </label>
                                    <input type="password" name="old_password" id="old_password" class="form-control">
                                    <p>(Isi field password jika password ingin diubah)</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                <button type="submit" name="edit_data" class="btn btn-orange btn-block">Setting Akun Customer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>