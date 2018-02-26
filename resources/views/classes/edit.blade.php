@extends('_layouts.app')
@section('calendar')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('breadcrumbs')
<section class="content-header">
<ol class="breadcrumb">
<li><a href="/dashboard">Dashboard</a></li>
<li><a href="/admin/classes">Classes</a></li>
<li><a href="/admin/classes/{{ $class->id }}/edit">Edit a Class</a></li>
</ol>
</section>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel panel-heading">Edit a class</div>
            <div class="panel-body">
                {!! Form::open(['action' => ['ClassesController@update',$class->id],'method'=>'POST','id'=>'jvalidate']) !!}
                <div class="form-group">
                {!! Form::label('name','Class Name:', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::text('name',$class->classname, ['placeholder' => 'Class Name','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                {!! Form::label('description','Class Description: ', ['class' => 'control-label']) !!}
                {!! Form::textarea('description',$class->description, ['class' => 'form-control','rows' => '9']) !!}
                </div>  
                 <div class="form-group">
                 {!! Form::label('sessions','Class # of Sessions: ', ['class' => 'control-label']) !!}
                <input type="number" value= "{{ $class->numberofsessions }}" name="sessions" placeholder="Number of sessions" class="form-control">
                </div>  
               
                <div class="form-group">   
                <div class="row">
                        {!! Form::label('date','Date: ', []) !!}
                        
                        <input type="text" value="{{ $class->schedule }}" class="form-control datepicker" name="date" >

                </div>                                     
                </div>
            </div>
         </div>
                <div class="panel panel-footer">
                    {!! Form::submit('Add Class', ['Class' => 'btn btn-block btn-lg btn-success']) !!}
                </div>
                {!! Form::hidden('_method','PUT') !!}
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
@section('scripts')
<script type='text/javascript' src="{{ asset('/backend/js/plugins/jquery-validation/jquery.validate.js') }}">
</script>
<script type='text/javascript' src='{{ asset('backend/js/plugins/bootstrap/bootstrap-datepicker.js') }}'></script>
<script type="text/javascript">
    var jvalidate = $("#jvalidate").validate({
    ignore: [],
    rules: {                                            
            name: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
            },
            
            description: {
                    required: true,
                    minlength: 5,
                    maxlength: 4096
            },

            sessions: {
                    required: true,
                    number: true,
            },

            date: {
                    required: true,
            },
            
        }                                        
    });       

</script>
@endsection