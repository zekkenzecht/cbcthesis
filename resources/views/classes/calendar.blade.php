@extends('_layouts.app')

@section('calendar')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@endsection

@section('breadcrumbs')

<ul class="breadcrumb">

<li><a href="/dashboard">Dashboard</a></li>

<li><a href="/admin/classes/calendar">Calendar of classes</a></li>

</ul>

@endsection

@section('content')

<div class="container">

    <div class="col-md-7 col-md-offset-2">

        <div class="panel panel-success">

            <div class="panel-heading">Classes Calendar</div>

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

@endsection
