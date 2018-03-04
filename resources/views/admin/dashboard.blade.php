@extends('_layouts.app')
@section('breadcrumbs')
<ul class="breadcrumb">
    <li><a href="/">Home</a></li>                    
    <li class="active"><a href="/dashboard">Dashboard</a></li>
</ul>
@stop
@section('content')
<div class="row">
	<div class="col-md-3">


		<div class="widget widget-default widget-item-icon">
		    <div class="widget-item-left">
		        <span class="fa fa-user"></span>
		    </div>
		    <div class="widget-data">
		        <div class="widget-int num-count">{{ $user }}</div>
		        <div class="widget-title">Registered users</div>
		        <div class="widget-subtitle">On your website</div>
		    </div>                 
		</div>    

	</div>	

	<div class="col-md-3">


		<div class="widget widget-default widget-item-icon">
		    <div class="widget-item-left">
		        <span class="fa fa-user"></span>
		    </div>
		    <div class="widget-data">
		        <div class="widget-int num-count">{{ $attendance }}</div>
		        <div class="widget-title">Attendees</div>
		        <div class="widget-subtitle">Members Attendance</div>
		    </div>                 
		</div>    

	</div>	

	<div class="col-md-3">


		<div class="widget widget-default widget-item-icon">
		    <div class="widget-item-left">
		        <span class="fa fa-user"></span>
		    </div>
		    <div class="widget-data">
		        <div class="widget-int num-count">{{ $incon }}</div>
		        <div class="widget-title">Inconsistent</div>
		        <div class="widget-subtitle">Members Attendance</div>
		    </div>                 
		</div>    

	</div>	

	<div class="col-md-3">


		<div class="widget widget-default widget-item-icon">
		    <div class="widget-item-left">
		        <span class="fa fa-user"></span>
		    </div>
		    <div class="widget-data">
		        <div class="widget-int num-count">{{ $non }}</div>
		        <div class="widget-title">Non-Attendees</div>
		        <div class="widget-subtitle">Members Attendance</div>
		    </div>                 
		</div>    

	</div>	


</div>


@endsection