<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Register Page | Tehniku
  </title>
  <!-- Favicon -->
  <link href="<?= base_url('assets/argon') ?>/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?= base_url('assets/argon') ?>/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="<?= base_url('assets/argon') ?>/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?= base_url('assets/argon') ?>/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="../index.html">
          <img src="<?= base_url('assets/argon') ?>/img/brand/white.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="<?= base_url('assets/argon') ?>/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-orange py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Tehniku!</h1>
              <p class="text-white">Tehniku adalah sebuah app untuk mempermudahkan anda membeli / service barang elektronik anda</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <?= $this->session->flashdata('message'); ?>
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form class="needs-validation" enctype="multipart/form-data" novalidate  method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nama Lengkap" name='nama_lengkap' type="text" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" name="email" id="email" placeholder="Alamat Email" type="email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" name="password" placeholder="Password" type="password" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea name="alamat" id="alamat" class="form-control" style="border: .1 solid black;" placeholder="Alamat Rumah" rows="4" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nomor Ponsel" type="text" id="nomor_ponsel" name="nomor_ponsel" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nomor Ktp" type="text" id="nomor_ktp" name="nomor_ktp" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto_ktp" required>
                        <label class="custom-file-label" for="inputGroupFile01">Pilih Foto Ktp</label>
                      </div>
                    </div>
                    <div class="form-group">  
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Latitude & Longitude Lokasi Perusahaan" type="text" id="latlon" name="latlon" required>
                        <div class="input-group-prepend">
                          <span class="input-group-text"><h5 id='detectLocation'><a class='text-orange' href="javascript:void(0)">Akses lokasi</a></h5></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="text-center">
                        <button type="submit" name="daftar" class="btn btn-orange btn-block mt-4">DAFTAR SEKARANG!</button>
                      </div>
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
  </div>
  <!--   Core   -->
  <script src="<?= base_url('assets/argon') ?>/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/argon') ?>/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="<?= base_url('assets/argon') ?>/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    $(":input").inputmask();
    $('#nomor_ponsel').inputmask({
      "mask": "999-999-999-999"
    })
    $("#nomor_ktp").inputmask({
      "mask": "9999999999999999"
    })

    $('#nomor_npwp').inputmask({
      "mask": "99.999.999.9-999.999"
    })

    $('#email').inputmask({
      mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
      greedy: false,
      onBeforePaste: function (pastedValue, opts) {
        pastedValue = pastedValue.toLowerCase();
        return pastedValue.replace("mailto:", "");
      },
      definitions: {
        '*': {
          validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
          casing: "lower"
        }
      },
    })

    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop()
      if(fileName.length > 15) {
        $(this).next('.custom-file-label').addClass('selected').html("Foto berhasil dipilih")
      }else{
        $(this).next('.custom-file-label').addClass('selected').html(fileName)
      }
    })

    function showPosition(position) {
      const {latitude, longitude} = position.coords
      $('#latlon').val(`${latitude}, ${longitude}`)
    }

    function showError(error) {
      switch(error.code) {
        case error.PERMISSION_DENIED:
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tehniku membutuhkan akses lokasi anda',
          })
          break;
        case error.POSITION_UNAVAILABLE:
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tehniku tidak dapat mendapatkan lokasi anda',
          })
          break;
        case error.TIMEOUT:
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tehniku tidak dapat mendapatkan lokasi anda',
          })
          break;
        case error.UNKNOWN_ERROR:
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tehniku mengalami kesalahan',
          })
          break;
      }
    }


    (function() {
        'use strict';
        $('#detectLocation').on('click', () => {
          if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Browser anda tidak mendukung geolocation',
            })
          }
        })
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>