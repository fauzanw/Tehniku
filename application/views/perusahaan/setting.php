    <div class="container-fluid mt--7">
      <div class="row mb-3">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-orange" style="border: none !important;"><h3 class='text-white'>Setting Akun Perusahaan</h3></div>
                <div class="card-body">
                    <form method="post" novalidate class="needs-validation" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="email" class='col-sm-2 col-form-label'>Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" class="form-control" value="<?= $data_perusahaan2["email"] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class='col-sm-2 col-form-label'>Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_lama" class='col-sm-2 col-form-label'>Password Lama</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_lama" id="password_lama" class="form-control">
                                <p>(Isi field password jika password ingin diubah)</p>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" name="edit_data" class="btn btn-orange btn-block">Setting Akun Perusahaan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>