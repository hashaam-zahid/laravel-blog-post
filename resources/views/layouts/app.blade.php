<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Laravel Blog">
  <meta name="author" content="Laravel">

  <title>@yield('title')</title>

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/theme.css')}}" rel="stylesheet">

</head>

<body>

@include('inc.header')
 <div class="container">
 @alert()
 @endalert
</div>
 
 @yield('content')
 
 @include('inc.footer')

  <!-- Custom scripts for this template -->
  <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>

</body>

</html>
