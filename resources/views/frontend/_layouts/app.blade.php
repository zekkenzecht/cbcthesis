<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=8">
<meta name="csrf-token" content="{{ Session::token() }}"> 
<link rel="shortcut icon" type="image/png" href=" {{ asset('/dist/favicon.ico') }} "/>
<title>City Bible Church</title>
@yield('css')
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="{{ asset('/front/css/animate.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/front/css/waypoints.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/front/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/front/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/front/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/front/css/animate.css') }}" rel="stylesheet"/>
</head>

<body>
	@include('frontend._partials.navbar')
  @yield('content')
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('/front/assets/js/bootstrap.min.js') }}"></script>
  	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    @yield('scripts')
</html>
