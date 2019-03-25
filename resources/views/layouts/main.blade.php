<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{env('APP_URL')}}/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{env('APP_URL')}}/favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>My Talaqqi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <style type="text/css">
      @yield('styles')
    </style>
    <script src="{{ asset('./assets/js/require.min.js') }}"></script>
    <script>
      @yield('corejs')
    </script>
    <!-- Dashboard Core -->
    <link href="{{ asset('./assets/css/dashboard.css') }}" rel="stylesheet" />
    <script src="{{ asset('./assets/js/dashboard.js') }}"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('./assets/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
    <script src="{{ asset('./assets/plugins/charts-c3/plugin.js') }}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{ asset('./assets/plugins/input-mask/plugin.js') }}"></script>
    @yield('script')
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        @include('layouts.header')
        @include('layouts.header_menu')

        <div class="my-3 my-md-5">
          @yield('page')
        </div>
      </div>

      @yield('footer')
    </div>
  </body>
</html>