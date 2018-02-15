@extends('_layouts.app')
@section('calendar')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-4">
    <div class="panel panel-success">
        <div class="panel panel-heading">Request fellowship</div>
    <div class="panel-body">
        {!! Form::open(['action' => 'FellowshipRequestController@store','method'=>'POST']) !!}
        <div class="form-group">
        {!! Form::label('name','Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name',$frequest->name, ['placeholder' => 'Fellowship Name','class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('desc','Description: ', ['class' => 'control-label']) !!}
        {!! Form::textarea('desc', $frequest->description, ['class' => 'form-control','rows' => '5','placeholder' => 'Fellowship Description']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('venue','Venue:', ['class' => 'control-label']) !!}
        {!! Form::text('venue',$frequest->venue, ['placeholder' => 'Venue','class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        <div class="row">
                {!! Form::label('date','Date: ', []) !!}
                <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                <input type="text" class="form-control datepicker" name="date" value="{{$frequest->date}}" required>
                </div><br>
        {!! Form::label('time','Time: ', []) !!}
    <div class="input-group bootstrap-timepicker">
         <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
        <input name="time" type="text" value="{{$frequest->time}}" class="form-control timepicker"/>
    </div>
        </div>
        </div>
    </div>
 </div>
        <div class="panel panel-footer">
            {!! Form::submit('Make a request', ['Class' => 'btn btn-block btn-lg btn-success']) !!}
        </div>
        {!! Form::close() !!}

</div>
<div class="col-md-7">
    <div class="panel panel-success">
        <div class="panel-heading">Fellowship Calendar</div>
        <div class="panel-body">
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('/backend/js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
@endsection
