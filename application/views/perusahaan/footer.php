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
  <script src="<?= base_url('assets/argon/') ?>DataTables/DataTables-1.10.20/css/dataTables.bootstrap.js"></script>
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
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
      $('.dataTable').DataTable();

      $(document).ready( function () {
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

      $('#gender').val("").removeAttr('readonly').attr("placeholder", "Choose your country").prop('required', true).addClass('form-control');
  </script>
</body>

</html>