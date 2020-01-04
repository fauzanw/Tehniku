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
      
      $(document).ready(function() {
        $('#dataTable').DataTable();
        $('#is_blocked_customer').on('click', function() {
          const id = $(this).data('id')
          $.ajax({
            url: "<?= base_url('admin/customer/blocked/edit') ?>",
            type: "POST",
            data: {
              id: id
            },
            success: response => {
              document.location.href = "<?= base_url('admin/customer') ?>"
            }
          })
        });
        $('#is_verified_user').on('click', function() {
          const id = $(this).data('id')
          $.ajax({
            url: "<?= base_url('admin/user/verifikasi/edit') ?>",
            type: "POST",
            data: {
              id: id
            },
            success: response => {
              document.location.href = "<?= base_url('admin/verifikasi') ?>"
            }
          })
        })
        $('#is_blocked').on('click', function() {
          const id = $(this).data('id')
          $.ajax({
            url: "<?= base_url('admin/perusahaan/blocked/edit') ?>",
            type: "POST",
            data: {
              id: id
            },
            success: response => {
              document.location.href = "<?= base_url('admin/perusahaan') ?>"
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
      return prefix == undefined ? rupiah : rupiah ? rupiah : "";
    }

        $('#detectLocation').on('click', () => {
          if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
          }else{
            $('#latlon').removeAttr('readonly')
          }
        })
      });

      var max_fields = 10;
      var x          = 1;
      $(document).on('click', '#add_input', e => {
        if(x < max_fields) {
          x++;
					$('#output').append('<div class=\"input-group\ form-group\ text-dark\" id=\"out\"><input type=\"text\" class=\"form-control\" name=\"nama_merek[]\" placeholder=\"Nama Merek...\" required><div class=\"input-group-prepend\ remove\"><div class=\"input-group-text\"><a href="#" class="text-danger"><i class=\"fa fa-minus\"></i></a></div></div></div>');
        } 
        $('#output').on("click",".remove", function(e){
					e.preventDefault(); $(this).parent('#out').remove(); x--;
					repeat();
				})
      })

      $(document).on('click', '#add_input_jasa', e => {
        if(x < max_fields) {
          x++;
					$('#output').append('<div class=\"input-group\ form-group\ text-dark\" id=\"out\"><input type=\"text\" class=\"form-control\" name=\"nama_jasa[]\" placeholder=\"Nama Jasa...\" required><div class=\"input-group-prepend\ remove\"><div class=\"input-group-text\"><a href="#" class="text-danger"><i class=\"fa fa-minus\"></i></a></div></div></div>');
        } 
        $('#output').on("click",".remove", function(e){
					e.preventDefault(); $(this).parent('#out').remove(); x--;
					repeat();
				})
      })

      $(function() {
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
    })
    $(document).on("click", "#remove-preview", function(e) {
        e.preventDefault();
        $(".dropload").removeClass("dropload__dropped").addClass("dropload__ready")
        $('#cover').val('');
    })

      $('#gender').val("").removeAttr('readonly').attr("placeholder", "Choose your country").prop('required', true).addClass('form-control');
      $('#merek2').val("").removeAttr('readonly').attr("placeholder", "Choose your merek").prop('required', true).addClass('form-control');
      $('#jasa_keyword').val("").removeAttr('readonly').attr("placeholder", "Choose your jasa").prop('required', true).addClass('form-control');
      'use strict';

      (function(document, window, index) {
        // feature detection for drag&drop upload
        var isAdvancedUpload = (function() {
          var div = document.createElement('div');
          return (
            ('draggable' in div || ('ondragstart' in div && 'ondrop' in div)) &&
            'FormData' in window &&
            'FileReader' in window
          );
        })();

        // applying the effect for every form
        var forms = document.querySelectorAll('.dropload');
        Array.prototype.forEach.call(forms, function(form) {
          var input = form.querySelector('input[type="file"]'),
            label = form.querySelector('label'),
            totalFiles = form.querySelector('span.totalFiles'),
            errorMsg = form.querySelector('.dropload__error span'),
            restart = form.querySelectorAll('.dropload__restart'),
            droppedFiles = false,
            showFiles = function(ele) {
              $('.form-text').text("").addClass("d-none");
              var files = ele.files;				

              validateFile(files[0].size, function(res) {
                if(res === true) {
                  var reader = new FileReader();
                  reader.onload = function(e) {					
                    var img = new Image;
                    img.src = reader.result;
                      img.onload = function() {
                      $(input)
                        .parents('.dropload')
                        .find('.dropload-drop p')
                        .html(`${files[0].name} sucessfully uploaded`);
                      };							
                  };

                  
                  reader.readAsDataURL(files[0]);
                  $(input).parents('.dropload').removeClass('dropload__ready').addClass('dropload__dropped');
                              
                } else {
                  $(input).val('');
                  //$('#error-cover').text(MESSAGE_ERRORS.size).removeClass("d-none");
                }
              })				
            },
            loadingState = function(ele) {
              var files = ele.files;
            },
            triggerFormSubmit = function() {
              var event = document.createEvent('HTMLEvents');
              event.initEvent('submit', true, false);
              form.dispatchEvent(event);
            },
            validateFile = function(size, callback) {
              if(size > 2000000) {
                callback(false);
              } else {
                callback(true);
              }
            };

          // letting the server side to know we are going to make an Ajax request
          var ajaxFlag = document.createElement('input');
          ajaxFlag.setAttribute('type', 'hidden');
          ajaxFlag.setAttribute('name', 'ajax');
          ajaxFlag.setAttribute('value', 1);
          form.appendChild(ajaxFlag);

          // automatically submit the form on file select
          input.addEventListener('change', function(e) {									
            showFiles(e.target);
            // triggerFormSubmit();
          });

          // drag&drop files if the feature is available
          if (isAdvancedUpload) {
            form.classList.add('dropload__ready'); // letting the CSS part to know drag&drop is supported by the browser

            [ 'drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop' ].forEach(function(event) {
              form.addEventListener(event, function(e) {
                // preventing the unwanted behaviours
                e.preventDefault();
                e.stopPropagation();
              });
            });
            [ 'dragover', 'dragenter' ].forEach(function(event) {
              form.addEventListener(event, function() {
                form.classList.remove('dropload__ready');
                form.classList.remove('dropload__dropped');
                form.classList.add('dropload__dragged');
              });
            });
            [ 'dragleave', 'dragend', 'drop' ].forEach(function(event) {
              form.addEventListener(event, function() {
                form.classList.add('dropload__ready');
                form.classList.remove('dropload__dragged');
              });
            });
            form.addEventListener('drop', function(e) {				    			
              droppedFiles = e.dataTransfer; // the files that were dropped
              var files = e.dataTransfer.files;				
              input.files = files;
              
              showFiles(droppedFiles);								
              // triggerFormSubmit();
            });
          }

          // restart the form if has a state of error/success
          Array.prototype.forEach.call(restart, function(entry) {
            entry.addEventListener('click', function(e) {
              e.preventDefault();
              form.classList.remove('is-error', 'is-success');
              input.click();
            });
          });

          // Firefox focus bug fix for file input
          input.addEventListener('focus', function() {
            input.classList.add('has-focus');
          });
          input.addEventListener('blur', function() {
            input.classList.remove('has-focus');
          });
        });
      })(document, window, 0);
  </script>
</body>

</html>