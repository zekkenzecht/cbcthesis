<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>City Bible Church</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@include('_partials.css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    
 
	@include('_partials.navbar')
	@include('_partials.sidebar')
	 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->
</div>
@include('_partials.scripts')

</body>

@yield('scripts')


</html>
