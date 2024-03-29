  <!--   Core   -->
  <script src="<?= base_url('assets/argon') ?>/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/argon') ?>/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="<?= base_url('assets/argon') ?>/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url('assets/argon') ?>/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="<?= base_url('assets/argon') ?>/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/argon/') ?>DataTables/datatables.min.js"></script>
  <!-- <script src="<?= base_url('assets/argon/') ?>DataTables/DataTables-1.10.20/js/dataTables.bootstrap.js"></script> -->
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
  <script src="<?= base_url('assets/argon/select2-4.0.3/dist/js/select2.full.js') ?>"></script>
  <script src="<?= base_url('assets/argon/js/wow.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <script src="<?= base_url('assets/argon/js/plugins/jquery.expander.min.js') ?>"></script>
  <script>
    $('.expanderpm').expander({
      slicePoint: 5,
      expandText:'(+)',
      userCollapseText:'(-)'
    })
    new WOW().init();
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
    var rupiah = document.querySelector(".rupiah");
    if(rupiah) {
      rupiah.addEventListener("keyup", function(e) {
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    }
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
      }

      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });



      $('#dataTable').DataTable();
      $('.dataTable').DataTable();
      $(document).ready( function () {
        $('#datetimepicker').datetimepicker({ footer: true, modal: true });
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $(".select2" ).select2()
        $('#cari-perusahaan-terdekat').on('click', e => {
          if($('#cari-perusahaan-terdekat').prop('checked') == false) {
            $('#cari-perusahaan-terdekat').attr('checked', true)
            $('#latlon').val('')
          }else{
            if(navigator.geolocation) {
              $('#cari_jasa').attr('disabled', true);
              navigator.geolocation.getCurrentPosition(position => {
                const {latitude, longitude} = position.coords
                $('#latlon').val(`${latitude}, ${longitude}`)
                $('#cari_jasa').attr('disabled', false)
                return true
              }, showError);
            }else{
              e.preventDefault()
            }
          }
        })
        $('#is_blocked').on('click', function() {
          const id = $(this).data('id')
          $.ajax({
            url: "<?= base_url('perusahaan/customer/blocked/edit') ?>",
            type: "POST",
            data: {
              id: id
            },
            success: response => {
              document.location.href = "<?= base_url('perusahaan/pegawai') ?>"
            }
          })
        });
        
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
              $('#cari-perusahaan-terdekat').removeAttr('checked', 'checked')
              $('#cari_jasa').attr('disabled', false)
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kami membutuhkan akses lokasi anda',
              })
              break;
            case error.POSITION_UNAVAILABLE:
              $('#cari-perusahaan-terdekat').removeAttr('checked', 'checked')
              $('#cari_jasa').attr('disabled', false)
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kami tidak dapat mendapatkan lokasi anda',
              })
              break;
            case error.TIMEOUT:
              $('#cari-perusahaan-terdekat').removeAttr('checked', 'checked')
              $('#cari_jasa').attr('disabled', false)
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tehniku tidak dapat mendapatkan lokasi anda',
              })
              break;
            case error.UNKNOWN_ERROR:
              $('#cari-perusahaan-terdekat').removeAttr('checked', 'checked')
              $('#cari_jasa').attr('disabled', false)
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tehniku mengalami kesalahan',
              })
              break;
          }
        }

        $('#detectLocation').on('click', () => {
          if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
          }else{
            $('#latlon').removeAttr('readonly')
          }
        })
      });

      (function() {
        'use strict';
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

      $('#gender').val("").removeAttr('readonly').attr("placeholder", "Choose your country").prop('required', true).addClass('form-control');
      // var typingTimer;
      // $('#keyword_jasa').on('keyup', function() {
      //   if (typingTimer) clearTimeout(typingTimer);
      //   typingTimer = setTimeout(doneTypingSearchJasa, 500);
      // })

      // $('#keyword_jasa').on('keydown', function() {
      //   clearTimeout(typingTimer)
      // })

      // function doneTypingSearchJasa()
      // {
      //   var keyword = $('#keyword_jasa').val();
      //   function load_data(keyword) {
      //     $.ajax({
      //       url: "<?= base_url('customer/jasa/search') ?>",
      //       method: 'POST',
      //       data: {
      //         cari_jasa: true,
      //         keyword: keyword
      //       },
      //       success: response => {
      //         $('#result_cari_jasa').html(response)
      //       }
      //     })
      //   }
      //   if(keyword != '') {
      //     load_data(keyword)
      //   }else{
      //     load_data()
      //   }
      // }
  </script>
</body>

</html>