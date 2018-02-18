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
                <div class="panel panel-heading">Add a Announcement</div>
            <div class="panel-body">
                {!! Form::open(['action' => 'AnnouncementController@store','method'=>'POST']) !!}
                <div class="form-group">
                {!! Form::label('announcement','Announcement:', ['class' => 'col-md-3 control-label']) !!}
                {!! Form::text('announcement',null, ['placeholder' => 'Announcement','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                {!! Form::label('about','Announcement about: ', ['class' => 'control-label']) !!}
                {!! Form::textarea('about',null, ['class' => 'form-control','rows' => '11']) !!}
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
                    {!! Form::submit('Make Announcement', ['Class' => 'btn btn-block btn-lg btn-success']) !!}
                </div>
                {!! Form::close() !!}

        </div>
        <div class="col-md-7">
            <div class="panel panel-success">
                <div class="panel-heading">Announcement Calendar</div>
                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
