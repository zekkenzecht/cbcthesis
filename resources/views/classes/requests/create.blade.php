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
                <div class="panel panel-heading">Request a class</div>
            <div class="panel-body">
                {!! Form::open(['action' => 'ClassesRequestController@store','method'=>'POST']) !!}
                <div class="form-group">
                {!! Form::label('name','Class Name:', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::text('name',null, ['placeholder' => 'Class Name','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                {!! Form::label('description','Class Description: ', ['class' => 'control-label']) !!}
                {!! Form::textarea('description',null, ['class' => 'form-control','rows' => '9']) !!}
                </div>  
                 <div class="form-group">
                 {!! Form::label('sessions','Class # of Sessions: ', ['class' => 'control-label']) !!}
                <input type="number" name="sessions" placeholder="Number of sessions" class="form-control">
                </div>  
               
                <div class="form-group">   
                <div class="row">
                        {!! Form::label('date','Date: ', []) !!}
                        <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input type="text" class="form-control datepicker" name="date" required>
                        </div>
                </div>                                     
                </div>
            </div>
         </div>
                <div class="panel panel-footer">
                    {!! Form::submit('Request Class', ['Class' => 'btn btn-block btn-lg btn-success']) !!}
                </div>
                {!! Form::close() !!}

        </div>
        <div class="col-md-7">
            <div class="panel panel-success">
                <div class="panel-heading">Class Calendar</div>
                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection