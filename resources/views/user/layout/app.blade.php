<!DOCTYPE html>
<html lang="en">


<!-- molla/index-10.html  22 Nov 2019 09:58:04 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>dimasdturu | {{$judul}}</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('template-user/assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('template-user/assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('template-user/assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('template-user/assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset('template-user/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('template-user/assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('template-user/assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('template-user/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template-user/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('template-user/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('template-user/assets/css/plugins/jquery.countdown.css')}}">
    <!-- Toastr --> 
    <link rel="stylesheet" href="{{asset('template-admin/plugins/toastr/toastr.min.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('template-user/assets/css/style.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('template-user/assets/css/skins/skin-demo-10.css')}}"> -->
    <link rel="stylesheet" href="{{asset('template-user/assets/css/demos/demo-10.css')}}">
</head>

<body>

        @include('user.layout.header')

        <main class="main">
            @yield('content')
        </main><!-- End .main -->

        @include('user.layout.footer')

    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Plugins JS File -->
    <script src="{{asset('template-user/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('template-user/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template-user/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('template-user/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('template-user/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('template-user/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template-user/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('template-user/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('template-user/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('template-user/assets/js/jquery.countdown.min.js')}}"></script>
    <!-- Toastr --> 
    <script src="{{asset('template-admin/plugins/toastr/toastr.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('template-user/assets/js/main.js')}}"></script>
    <script src="{{asset('template-user/assets/js/demos/demo-10.js')}}"></script>

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