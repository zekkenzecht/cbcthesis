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
<li><a href="/admin/classes/create">Create Class</a></li>
</ol>
</section>
@endsection
@section('content')

<section class="col-md-11">
@if (Session::has('message'))

 <div class="alert alert-success" role="alert">

    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;

    </span><span class="sr-only">Close</span></button>

    <strong>{{ Session::get('message') }}</strong>

</div>

@endif
</section>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel panel-heading">Add a class</div>
            <div class="panel-body">
                {!! Form::open(['action' => 'ClassesController@store','method'=>'POST','id'=>'jvalidate']) !!}
                <div class="form-group">
                {!! Form::label('name','Class Name:', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::text('name',null, ['placeholder' => 'Class Name','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                {!! Form::label('description','Class Description: ', ['class' => 'control-label']) !!}
                {!! Form::textarea('description',null, ['class' => 'form-control','rows' => '5']) !!}
                </div>  
                 <div class="form-group">
                 {!! Form::label('sessions','Class # of Sessions: ', ['class' => 'control-label']) !!}
                <input type="number" name="sessions" placeholder="Number of sessions" id="sessions" class="form-control">
                </div>  
               
                <div class="form-group">   
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('date','Start Date: ', []) !!}
                        <input type="text" id="dt1" class="form-control datepicker" name="date">
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('enddate','End Date: ', []) !!}
                        <input type="text" id="dt2" class="form-control" name="enddate" readonly>
                    </div>
                          
                </div>                                     
                </div>

             <div class="form-group">
                <label>Time Schedule: </label>   
                 <input type="text" class="form-control timepicker" name='time'/>
            </div>

            </div>
         </div>
                <div class="panel panel-footer">
                    {!! Form::submit('Add Class', ['Class' => 'btn btn-block btn-lg btn-success']) !!}
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
@section('scripts')
<script type='text/javascript' src="{{ asset('/backend/js/plugins/jquery-validation/jquery.validate.js') }}">
</script>
<script type='text/javascript' src='{{ asset('/backend/js/plugins/bootstrap/bootstrap-datepicker.js') }}'></script>
<script type="text/javascript" src="{{ asset('/backend/js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
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

            enddate: {
                    required: true,
            },

            time: {
                    required: true,
            },

            
        }                                        
    });       

</script>
<script type="text/javascript">
$("#sessions").keyup(function () {

           var someDate = new Date($('#dt1').val());
           var numberOfDaysToAdd = parseInt($(this).val());
           if (numberOfDaysToAdd == 1) {
            someDate.setDate(someDate.getDate() + parseInt(0));
             var date = someDate.getFullYear() + '-' + (someDate.getMonth()+parseInt(1)) + '-' + someDate.getDate();
           $('#dt2').val(date);
           } else {
            var days = numberOfDaysToAdd--;
             someDate.setDate(someDate.getDate() + parseInt(numberOfDaysToAdd * 7));
            var date = someDate.getFullYear() + '-' + (someDate.getMonth()+parseInt(1)) + '-' + someDate.getDate();
           $('#dt2').val(date);
           }
          
       });
$("#dt1").on('keyup change',function () {
           var someDate = new Date($('#dt1').val());
           var numberOfDaysToAdd = parseInt($('#sessions').val());
           if (numberOfDaysToAdd == 1) {
                someDate.setDate(someDate.getDate() + parseInt(0));
           var date = someDate.getFullYear() + '-' + (someDate.getMonth()+parseInt(1)) + '-' + someDate.getDate();
           $('#dt2').val(date)
           } else {
            var days = numberOfDaysToAdd--;
            someDate.setDate(someDate.getDate() + parseInt(numberOfDaysToAdd * 7));
           var date = someDate.getFullYear() + '-' + (someDate.getMonth()+parseInt(1)) + '-' + someDate.getDate();
           $('#dt2').val(date);
           }
          
       });
</script>
@endsection