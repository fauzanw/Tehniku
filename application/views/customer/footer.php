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
  <script src="<?= base_url('assets/argon/select2-4.0.12/dist/js/select2.min.js') ?>"></script>
  <script src="<?= base_url('assets/argon/js/wow.min.js') ?>"></script>
  <script>
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
      $(document).ready( function () {
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $( ".select2" ).select2({
        placeholder: "Pilih jasa",
				width : null,
				ajax: {
					url: "<?= base_url('customer/jasa/search') ?>",
					dataType: 'json',
					delay: 250,
					data: function (params) {
						return {
							keyword: params.term,
						};
					},
					processResults: function (data, params) {

						return {
							results: data
						};
					},
				},
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
				minimumInputLength: 1,
				templateResult: jasa => {
          if (jasa.loading) return jasa.text

          markup = `
            <div class='select2-result-repository clearfix'>
              <div class='select2-result-repository__avatar'><img src='<?= base_url('assets/argon/img/perusahaan/') ?>${jasa.logo_perusahaan}'/></div>
              <div class='select2-result-repository__meta'>
                <div class='select2-result-repository__title'>${jasa.nama_jasa}</div>
              <div class='select2-result-repository__statistics'>
                <div class='select2-result-repository__forks'><i class='fas fa-building'></i>  ${jasa.nama}</div>
                <div class='select2-result-repository__stargazers'><i class='fas fa-briefcase'></i>  ${jasa.type} </div>
                <div class='select2-result-repository__watchers'><i class='fas fa-search-location'></i> 70 Km</div>
                <div class='select2-result-repository__price'><i class='fas fa-money-bill-wave'></i>  ${jasa.harga}</div>
              </div>
            </div></div>`

          return markup
        },
				templateSelection: jasa => jasa.nama_jasa
			})
      $('.select2').on('change', function() {
        var value = $(this).val()
        $('.select2').val(value)
      })
      $( ":checkbox" ).on( "click", function() {
				$( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
			});
        $('#cari-perusahaan-terdekat').on('click', e => {
          if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
              const {latitude, longitude} = position.coords
              $('#latlon').val(`${latitude}, ${longitude}`)
              $('form').unbind('submit').submit();
            }, showError);
          }else{
            e.preventDefault( )
          }
          e.preventDefault()
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
      var typingTimer;
      $('#keyword_jasa').on('keyup', function() {
        if (typingTimer) clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingSearchJasa, 500);
      })

      $('#keyword_jasa').on('keydown', function() {
        clearTimeout(typingTimer)
      })

      function doneTypingSearchJasa()
      {
        var keyword = $('#keyword_jasa').val();
        function load_data(keyword) {
          $.ajax({
            url: "<?= base_url('customer/jasa/search') ?>",
            method: 'POST',
            data: {
              cari_jasa: true,
              keyword: keyword
            },
            success: response => {
              $('#result_cari_jasa').html(response)
            }
          })
        }
        if(keyword != '') {
          load_data(keyword)
        }else{
          load_data()
        }
      }
  </script>
</body>

</html>