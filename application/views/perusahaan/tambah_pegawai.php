    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow-lg mb-5">
                    <div class="card-body text-dark">
                        <form enctype="multipart/form-data" action="<?= base_url('perusahaan/pegawai/tambah') ?>" novalidate class="needs-validation" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Pegawai</label>
                                        <input type="text" name="nama" id="nama" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_ponsel">Nomor Ponsel Pegawai</label>
                                        <input type="text" name="nomor_ponsel" id="nomor_ponsel" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_ktp">Nomor Ktp Pegawai</label>
                                        <input type="text" name="nomor_ktp" id="nomor_ktp" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Pegawai</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password Pegawai</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto Pegawai</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto_pegawai" required>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="umur">Umur Pegawai</label>
                                        <input type="number" name="umur" id="umur" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat Rumah Pegawai</label>
                                        <textarea name="" id="alamat" cols="30" style="height: 258px;" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin Pegawai</label>
                                        <select name="gender" id="gender" class="custom-select">
                                            <option value="" readonly selected>--- JENIS KELAMIN ---</option>
                                            <option value="laki-laki">Laki Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <button type="submit" name="tambah_pegawai" class="btn btn-orange btn-block">Tambah Pegawai</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>