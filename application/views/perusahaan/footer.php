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



      $(document).ready( function () {
        $('#type_jasa').on('change', function() {
          $('#form_type_jasa').submit();
        })
        $('#dataTable').DataTable();
        $('.dataTable').DataTable();
        $('#is_blocked').on('click', function() {
          const id = $(this).data('id')
          $.ajax({
            url: "<?= base_url('perusahaan/pegawai/blocked/edit') ?>",
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
              $('#latlon').removeAttr('readonly')
              break;
            case error.POSITION_UNAVAILABLE:
              $('#latlon').removeAttr('readonly')
              break;
            case error.TIMEOUT:
              $('#latlon').removeAttr('readonly')
              break;
            case error.UNKNOWN_ERROR:
              $('#latlon').removeAttr('readonly')
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

      $('#gender').val("").removeAttr('readonly').attr("placeholder", "Choose your gender").prop('required', true).addClass('form-control');
      $('#type_jasa2').val("").removeAttr('readonly').attr("placeholder", "Choose your type jasa").prop('required', true).addClass('form-control');
      $('#keyword_jasa').val("").removeAttr('readonly').attr("placeholder", "Choose your keyword jasa").prop('required', true).addClass('form-control');
  </script>
</body>

</html>