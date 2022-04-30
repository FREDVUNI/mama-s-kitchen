<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet" />
    <link href="{{ asset('backend/demo/demo.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('frontend/images/Logo_main.png')  }}" type="image/x-icon">
    @stack('css')
</head>
<body> 
<div id="app">
    <main class="">
        <div class="wrapper">

            @include('layouts.partial.topbar')

            <div class="main-panel" id="main-panel">

              @include('layouts.partial.sidebar')

              @yield('content')

              @include('layouts.partial.footer')

            </div>
          </div>
    </main>
</div>
<script src="{{  asset('backend/js/core/jquery.min.js') }}"></script>
<script src="{{  asset('backend/js/core/popper.min.js') }}"></script>
<script src="{{  asset('backend/js/core/bootstrap.min.js') }}"></script>
<script src="{{  asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="{{  asset('backend/js/plugins/chartjs.min.js') }}"></script>
<script src="{{  asset('backend/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{  asset('backend/js/now-ui-dashboard.min.js?v=1.3.0') }}" type="text/javascript"></script>
<script src="{{  asset('backend/demo/demo.js') }}"></script>
<script>
    $(document).ready(function() {
        demo.initDashboardPageCharts();
  
    });
</script>
@stack('scripts')
</body>
</html>
