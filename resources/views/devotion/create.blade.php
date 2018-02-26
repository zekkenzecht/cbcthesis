@extends('_layouts.app')

@section('calendar')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@endsection

@section('breadcrumbs')

<ul class="breadcrumb">

<li><a href="/dasboard">Dashboard</a></li>

<li><a href="/admin/devotions">Devotions</a></li>

<li class="active"><a href="/admin/devotions/create">Add a devotion</a></li>

</ul>

@endsection

@section('content')

<div class="container">

@if (Session::has('message'))

<section class="col-md-11">

    <div class="alert alert-{{ Session::get('messages-type') }}" role="alert">

        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;

        </span><span class="sr-only">Close</span></button>

        <strong>{{ Session::get('message') }}</strong>

    </div>
    
</section>

@endif
    
    <div class="row">

    <div class="col-md-4">

            <div class="panel panel-success">

                <div class="panel panel-heading">Add a devotion</div>

            <div class="panel-body">

                {!! Form::open(['action' => 'DevotionController@store','method'=>'POST' ,'id'=>'jvalidate']) !!}

                <div class="form-group">

                {!! Form::label('topic','Topic:', ['class' => 'col-md-3 control-label']) !!}

                {!! Form::text('topic',null, ['placeholder' => 'Devotion Topic','class' => 'form-control']) !!}

                </div>

                <div class="form-group">

                {!! Form::label('passage','Passage: ', ['class' => 'control-label']) !!}

                {!! Form::text('passage', null, ['class' => 'form-control','placeholder' => 'Enter Passage']) !!}

                </div>

                <div class="form-group">

                {!! Form::label('content','Passage Content: ', ['class' => 'control-label']) !!}

                {!! Form::textarea('content',null, ['class' => 'form-control','rows' => '9','placeholder'=>'Enter Passage Content']) !!}

                </div>  

                <div class="form-group">   

                <div class="row">

                        {!! Form::label('date','Date: ', []) !!}

                        <input type="text" class="form-control datepicker" name="date" required>
                </div>                                     

                </div>
        </div>

     </div>

    <div class="panel panel-footer">
        
             {!! Form::submit("Add Devotion", ['Class' => 'btn btn-lg btn-block btn-success','id'=>'submit']) !!}
    
            {!! Form::close() !!}

    </div>
</div>
    <div class="col-md-7">

        <div class="panel panel-success">

            <div class="panel-heading">Devotion Calendar</div>

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
<script type='text/javascript' src='{{ asset('backend/js/plugins/bootstrap/bootstrap-datepicker.js') }}'></script>
@include('devotion._partials.validation')

@endsection
