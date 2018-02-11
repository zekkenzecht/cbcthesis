<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=8">
<meta name="csrf-token" content="{{ Session::token() }}"> 
<title>City Bible Church</title>
<!-- Tell the browser to be responsive to screen width -->
@yield('calendar')
@include('_partials.css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="page-container">
	@include('_partials.sidebar')
<div class="page-content">
	@include('_partials.navbar')
	@yield('breadcrumbs')
<div class="page-content-wrapper">
<div class="container">
	@yield('content')
	@include('_partials.calendar')
</div>
</div>
</div>
</div>
@include('_partials.logoutnotif')
@include('_partials.scripts')
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
</body>

@yield('scripts')


</html>
