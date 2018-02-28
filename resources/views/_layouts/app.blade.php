<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=8">
<meta name="csrf-token" content="{{ Session::token() }}"> 

<title>City Bible Church</title>

@yield('calendar')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/customstyle.css') }}">
@include('_partials.css')
</head>

	

<body>
	
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

<div class="loader"></div>

</body>

@include('_partials.logoutnotif')

@include('_partials.scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

@yield('scripts')

<script type="text/javascript">

$(window).load(function(){
     $('.loader').fadeOut(1000);
});

</script>
</html>
