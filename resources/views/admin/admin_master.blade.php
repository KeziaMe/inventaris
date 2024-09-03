<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{asset('backend/assets/images/logo2.png')}}">
  <title>Manajemen SARPRAS</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/simplebar.css')}}">
  <!-- Fonts CSS -->
  <link
    href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/feather.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/uppy.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/jquery.steps.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/jquery.timepicker.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/quill.snow.css')}}">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/daterangepicker.css')}}">
  <!-- App CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/app-light.css')}}" id="lightTheme">
  <link rel="stylesheet" href="{{asset('backend/css/app-dark.css')}}" id="darkTheme" disabled>
</head>

<body class="vertical  light  ">
  <div class="wrapper">

    @include('admin.body.header')

    @include('admin.body.sidebar')

    @yield('admin')

  </div> <!-- .wrapper -->
  <script src="{{asset('backend/js/jquery.min.js')}}"></script>
  <script src="{{asset('backend/js/popper.min.js')}}"></script>
  <script src="{{asset('backend/js/moment.min.js')}}"></script>
  <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('backend/js/simplebar.min.js')}}"></script>
  <script src="{{asset('backend/js/daterangepicker.js')}}"></script>
  <script src="{{asset('backend/js/jquery.stickOnScroll.js')}}"></script>
  <script src="{{asset('backend/js/tinycolor-min.js')}}"></script>
  <script src="{{asset('backend/js/config.js')}}"></script>
  <script src="{{asset('backend/js/d3.min.js')}}"></script>
  <script src="{{asset('backend/js/topojson.min.js')}}"></script>
  <script src="{{asset('backend/js/datamaps.all.min.js')}}"></script>
  <script src="{{asset('backend/js/datamaps-zoomto.js')}}"></script>
  <script src="{{asset('backend/js/datamaps.custom.js')}}"></script>
  <script src="{{asset('backend/js/Chart.min.js')}}"></script>
  <script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
  </script>
  <script src='{{asset('backend/js/jquery.dataTables.min.js')}}'></script>
  <script src='{{asset('backend/js/dataTables.bootstrap4.min.js')}}'></script>
  <script src="{{asset('backend/js/gauge.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('backend/js/apexcharts.min.js')}}"></script>
  <script src="{{asset('backend/js/apexcharts.custom.js')}}"></script>
  <script src="{{asset('backend/js/jquery.mask.min.js')}}"></script>
  <script src="{{asset('backend/js/select2.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.steps.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.timepicker.js')}}"></script>
  <script src="{{asset('backend/js/dropzone.min.js')}}"></script>
  <script src="{{asset('backend/js/uppy.min.js')}}"></script>
  <script src="{{asset('backend/js/quill.min.js')}}"></script>



  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Script Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="text/javascript">
    $(function () {
      $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
          },
          buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
          title: "Apakah anda yakin ingin menghapus?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Ya",
          cancelButtonText: "Batalkan!",
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            swalWithBootstrapButtons.fire({
              title: "Hapus!",
              text: "Kamu telah berhasil menghapus",
              icon: "success"
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire({
              title: "Batal",
              text: "Anda batal menghapus",
              icon: "error"
            });
          }
        });
      });
    });

  </script>
  <script>
    $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
    $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
    $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
    $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
    /** date range picker */
    if ($('.datetimes').length) {
      $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
    $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
    $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
    // editor
    var editor = document.getElementById('editor');
    if (editor) {
      var toolbarOptions = [
        [
          {
            'font': []
          }],
        [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [
          {
            'header': 1
          },
          {
            'header': 2
          }],
        [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
        [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
        [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
        [
          {
            'direction': 'rtl'
          }], // text direction
        [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
        [
          {
            'align': []
          }],
        ['clean'] // remove formatting button
      ];
      var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict';
      window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  <script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg) {
      var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
          {
            endpoint: 'https://master.tus.io/files/'
          });
      uppy.on('complete', (result) => {
        console.log('Upload complete! We’ve uploaded these files:', result.successful)
      });
    }
  </script>
  <script src="{{asset('backend/js/app.js')}}"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
  </script>

  <script>
    $('#dataTable-1').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [16, 32, 64, -1],
          [16, 32, 64, "All"]
        ]
      });
  </script>

  <script>
    const inputFoto = document.querySelector('#foto');
    const previewFoto = document.querySelector('#previewFoto');

    inputFoto.addEventListener('change', function () {
      const file = inputFoto.files[0];
      const reader = new FileReader();

      reader.onload = function (e) {
        previewFoto.src = e.target.result;
      }

      reader.readAsDataURL(file);
    });
  </script>

  <script>
    const inputNota = document.querySelector('#textNota');
    const previewNota = document.querySelector('#previewNota');

    inputNota.addEventListener('change', function () {
      const file = inputNota.files[0];
      const reader = new FileReader();

      reader.onload = function (e) {
        previewNota.src = e.target.result;
      }

      reader.readAsDataURL(file);
    });
  </script>

  <script>
    $(document).ready(function () {
      $('#notaForm').on('submit', function (e) {
        e.preventDefault(); // Mencegah form submit default

        var formData = new FormData(this); // Ambil data dari form

        $.ajax({
          type: 'POST',
          url: "{{ route('nota.store') }}", // Route untuk menyimpan data
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            $('#responseMessage').html('<div class="alert alert-success">Berhasil tambah nota.</div>');
            $('#notaForm')[0].reset(); // Reset form setelah submit berhasil
          },
          error: function (response) {
            $('#responseMessage').html('<div class="alert alert-danger">Gagal tambah nota. Cek inputan Anda.</div>');
          }
        });
      });
    });
  </script>



</body>

</html>