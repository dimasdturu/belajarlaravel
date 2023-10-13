<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>dimasdturu | {{$judul}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template-admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template-admin/dist/css/adminlte.min.css')}}">
  <!-- Toastr --> 
  <link rel="stylesheet" href="{{asset('template-admin/plugins/toastr/toastr.min.css')}}">

  <link rel="icon" href="{{asset('template-user/assets/images/icons/favicon.ico')}}" type="image/x-icon">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('template-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('template-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('admin.layout.header')

  @include('admin.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('template-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template-admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template-admin/dist/js/demo.js')}}"></script>
<!-- Toastr --> 
<script src="{{asset('template-admin/plugins/toastr/toastr.min.js')}}"></script>

<!-- DataTables & Plugins -->
<script src="{{asset('template-admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('template-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('template-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('template-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('template-admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('template-admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('template-admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  @if(Session::has('status'))
      @if(Session::get('status') == 'success')
          toastr.success(`{{Session::get('message')}}`)
      @else
          toastr.error(`{{Session::get('message')}}`)
      @endif
  @endif
</script>
@yield('script')
</body>
</html>
