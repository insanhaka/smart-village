<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/home.png">
  <link rel="icon" type="image/png" href="assets/img/home.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Pemerintahan Desa Kebandingan
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tower-file-input.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/input-berita.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lc_switch.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.min.css') }}">

  <script src="{{ asset('assets/js/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/js/iziToast.js') }}"></script>
  <script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="{{ asset('assets/js/tower-file-input.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <!-- ckEditor JS -->
  <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  
</head>

            @include('layouts.sidebar')
            @include('layouts.navbar')
            <br>
            @yield('content')
            @include('layouts.footer')

            <!--   Core JS Files   -->
            <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
            <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
            <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
            <script>
              $(document).ready(function() {
                $('#datatable').DataTable();
              } );
            </script>

            <script type="text/javascript">
              $('#demoInput5').fileInput({
                  iconClass: 'mdi mdi-fw mdi-upload'
              });
            </script>

  </body>
</html>

    