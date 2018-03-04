@extends('_layouts.app')
@section('breadcrumbs')
<section class="content-header">
<ol class="breadcrumb">
<li><a href="/dashboard">Dashboard</a></li>
<li><a href="/admin/attendance">attendance</a></li>
</ol>
</section>
@endsection
@section('content')
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
<div class="col-md-11">
{!! Form::open(['action' => 'User\UserController@bulkChange','method' => 'post']) !!}
<div class="panel panel-default tabs">                            
<ul class="nav nav-tabs" role="tablist">
<li><a href="#tab-first" role="tab" data-toggle="tab">Attendee</a></li>
<li><a href="#tab-second" role="tab" data-toggle="tab">Inconsistent</a></li>
<li><a href="#tab-third" role="tab" data-toggle="tab">Non-Attendee</a></li>
</ul>
<div class="panel-body tab-content">
<div class="tab-pane active" id="tab-first">
<div class="panel panel-success">
<div class="panel-heading">  
<h1><span class="glyphicon glyphicon-check"></span>&nbsp;Attendance</h1>                                             
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
<tr>
<th>{!! Form::checkbox('userid','','', ['id' => 'check_all']) !!}</th>
<th>Avatar</th>
<th>Member Name</th>
<th>Email Address</th>
<th>Contact</th>
<th>Action</th>
</tr>
</thead>
<tbody>

  @foreach ($user as $key => $value)
  @if (count($value->attendance) == 0)
  
  @elseif($value->attendance[0]->status == 'attendee')
 
  <tr>
    <td>{!! Form::checkbox('attendee[]',$value->attendance[0]->id,'', ['class' => 'sub_chk']) !!}</td>
    <td><img src="{{  asset("$value->avatar") }}" height="75px" width="75px"></td>  
    <td> {{ ucwords($value->name) }}</td>
    <td>{{ $value->email }}</td>
    <td>{{ $value->contact }}</td>
    <td>
      {!! Form::button('<span class="fa fa-trash-o"></span>Attendance Status', ['class' => 'btn btn-danger','data-toggle'=>'modal','data-target'=>"#modal$value->id"]) !!}
     
      <a href="#" class="btn btn-primary">Send SMS</a>
      <a href="#" class="btn btn-success">Send Email</a>
    </td>
  </tr>
  @endif
  @endforeach
</tbody>
  </table>
</div>
</div>
</div>
{!! Form::close() !!}
<div class="tab-pane" id="tab-second">
{!! Form::open(['action' => 'User\UserController@bulkChange','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">                                
  <h1><span class="glyphicon glyphicon-check"></span>&nbsp;Attendance</h1>           
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
    <tr>
    <th>{!! Form::checkbox('','','', ['id' => 'check_all2']) !!}</th>
    <th>Avatar</th>
    <th>Member Name</th>
    <th>Email Address</th>
   <th>Contact</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
   @foreach ($user as $key => $value)
  @if (count($value->attendance) == 0)
    
  @elseif($value->attendance[0]->status == 'inconsistent')
  <tr>
    <td>{!! Form::checkbox('','','', ['class' => 'sub_chk2']) !!}</td>
    <td><img src="{{  asset("$value->avatar") }}" height="75px" width="75px"></td>  
    <td> {{ ucwords($value->name) }}</td>
    <td>{{ $value->email }}</td>
    <td>{{ $value->contact }}</td>
    <td>
    {!! Form::button('<span class="fa fa-trash-o"></span>Attendance Status', ['class' => 'btn btn-danger','data-toggle'=>'modal','data-target'=>"#modal$value->id"]) !!}
    
      <a href="#" class="btn btn-primary">Send SMS</a>
      <a href="#" class="btn btn-success">Send Email</a>
    </td>
  </tr>
  @endif
  @endforeach
</tbody>
  </table>
</div>
</div>
{!! Form::close() !!}
</div>
<div class="tab-pane" id="tab-third">
{!! Form::open(['action' => 'User\UserController@bulkChange','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">                                
<h1><span class="glyphicon glyphicon-check"></span>&nbsp;Attendance</h1>                     
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
    <tr>
    <th>{!! Form::checkbox('','','', ['id' => 'check_all3']) !!}</th>
    <th>Avatar</th>
    <th>User Name</th>  
    <th>Status</th>
    <th>Email Address</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
  @foreach ($user as $key => $value)
  @if (count($value->attendance) == 0)
    
  @elseif($value->attendance[0]->status == 'non-attendee')
  <tr>
    <td>{!! Form::checkbox('','','', ['class' => 'sub_chk3']) !!}</td>
    <td><img src="{{  asset("$value->avatar") }}" height="75px" width="75px"></td>  
    <td> {{ ucwords($value->name) }}</td>
    <td>{{ $value->email }}</td>
    <td>{{ $value->contact }}</td>
    <td>
       {!! Form::button('<span class="fa fa-trash-o"></span>Attendance Status', ['class' => 'btn btn-danger','data-toggle'=>'modal','data-target'=>"#modal$value->id"]) !!}
    
      <a href="#" class="btn btn-primary">Send SMS</a>
      <a href="#" class="btn btn-success">Send Email</a>
    </td>
  </tr>
  @endif
  @endforeach
  </tbody>
        </table>
</div>
</div>
{!! Form::close() !!}
</div>
</div>


</div>
</div>
@foreach ($user as $key => $value)
    @include('attendance._partials.modal')
@endforeach
</section>

@endsection

@section('scripts')

@include('_partials.datatables')

<script type="text/javascript">
jQuery('#check_all').on('click', function(e) {
if($(this).is(':checked',true))  
{
$(".sub_chk").prop('checked', true);  
}  
else  
{  
$(".sub_chk").prop('checked',false);  
}  
});
jQuery('#check_all2').on('click', function(e) {
if($(this).is(':checked',true))  
{
$(".sub_chk2").prop('checked', true);  
}  
else  
{  
$(".sub_chk2").prop('checked',false);  
}  
});
jQuery('#check_all3').on('click', function(e) {
if($(this).is(':checked',true))  
{
$(".sub_chk3").prop('checked', true);  
}  
else  
{  
$(".sub_chk3").prop('checked',false);  
}  
});
</script>
@endsection