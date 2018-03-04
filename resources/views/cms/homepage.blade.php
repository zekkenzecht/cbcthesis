@extends('_layouts.app')
@section('breadcrumbs')

@endsection
@section('content')
<div class="col-md-3">
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h4>Homepage Slider</h4>
		</div>
		<div class="panel-body">
		{!! Form::open(['action'=>'Cms\\HomePageController@slider','enctype'=>'multipart/form-data','method'=>'post']) !!}

			{!! Form::label('1stslide','First Slider', []) !!}<br>
			<input type="hidden" name="forslider1" value="1">
			{!! Form::file('Slider1', ['id'=>'Slider1']) !!}
			<input type="hidden" name="forslider2" value="2">
			{!! Form::label('2stslide','forSecond Slider', []) !!}<br> 
				{!! Form::file('Slider2', ['id'=>'Slider2']) !!}
			<input type="hidden" name="forslider3" value="3">
			{!! Form::label('3stslide','Third Slider', []) !!}<br>
				{!! Form::file('Slider3', ['id'=>'Slider3']) !!}
			<input type="hidden" name="forslider4" value='4'>
			{!! Form::label('4stslide','Third Slider', []) !!}<br>
				{!! Form::file('Slider4', ['id'=>'Slider4']) !!}<br>
				{!! Form::submit('Publish Sliders', ['class'=> 'btn btn-lg btn-success btn-block']) !!}
			{!! Form::hidden('_method', 'PUT') !!}
		{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection