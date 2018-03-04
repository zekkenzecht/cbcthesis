@extends('_layouts.app')
@section('content')
<div class="row">
<div class="col-md-3">

<div class="panel panel-default">
    <div class="panel-body profile">
        <div class="profile-image">
         <img src="{{ asset('') }}{{ Auth::user()->avatar }}"/>
        </div>                            
    </div>  
        <div class="panel-body">
        <div class="panel-body list-group border-bottom">
            <a href="#" class="list-group-item active">User Details</a>
            <a href="#" class="list-group-item">{{ Auth::user()->name }}</a>     
            <a href="#" class="list-group-item">{{ Auth::user()->email }}</a>                               
            <a href="#" class="list-group-item">{{ Auth::user()->contact }}</a>    
            <a href="#" class="list-group-item">{{ Auth::user()->address }}</a>    
            <a href="#" class="list-group-item">{{ Auth::user()->ministry }}</a>    
        </div>
    </div>                              
    </div>    
</div>

<div class="col-md-9">


    <div class="timeline timeline-right">


    <div class="timeline-item timeline-main">
        <div class="timeline-date">Steps</div>
    </div>
     <div class="timeline-item timeline-main">
        <div class="timeline-date">2014</div>
    </div>
                                        
    </div>        
</div>          

@endsection