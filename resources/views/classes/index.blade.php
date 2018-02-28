@extends('_layouts.app')
@section('breadcrumbs')
<section class="content-header">
<ol class="breadcrumb">
<li><a href="/dashboard">Dashboard</a></li>
<li><a href="/admin/classes">Classes</a></li>
</ol>
</section>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="col-md-11">
    @if (Session::has('message'))

     <div class="alert alert-success" role="alert">

        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;

        </span><span class="sr-only">Close</span></button>

        <strong>{{ Session::get('message') }}</strong>

    </div>

@endif
</section>

<section class="content">

    
<div class="col-md-11">
{!! Form::open(['action' => 'ClassesController@bulkDecline','method' => 'post']) !!}
<div class="panel panel-default tabs">
<ul class="nav nav-tabs" role="tablist">
<li><a href="#tab-first" role="tab" data-toggle="tab">Approved Request</a></li>
<li><a href="#tab-second" role="tab" data-toggle="tab">Declined Request</a></li>
<li><a href="#tab-third" role="tab" data-toggle="tab">For-approval Request</a></li>
</ul>
<div class="panel-body tab-content">
<div class="tab-pane active" id="tab-first">
<div class="panel panel-success">
<div class="panel-heading">
    <h1><span class="glyphicon glyphicon-book"></span>&nbsp;Classes</h1>
<a href="/admin/classes/create" class="btn btn-lg btn-success"><span class="fa fa-plus"></span>Add New Class</a>
{!! Form::button('<span class="fa fa-trash-o"></span>Decline Selected', ['class' => 'btn btn-lg btn-danger','data-toggle'=>'modal','data-target'=>'#confirmblkdec','id'=>'decline']) !!}
@include('classes._partials.confirmbulkdel')
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
<tr>
<th>{!! Form::checkbox(null,null,'', ['id' => 'check_all','class' => 'form-check-input']) !!}</th>
    <th>Class Name</th>
    <th>Description</th>
    <th>Number of Sessions</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($classes as $class)
<tr>
    <td>{!! Form::checkbox('classid[]',$class->id,'', ['class' => 'sub_chk']) !!}</td>
    <td>{{ $class->classname }}</td>
    <td>{{str_limit($class->description,20, '...')  }}</td>
    <td>{{ $class->numberofsessions }}</td>
    <td>
        {!! Form::button('<span class="fa fa-search"></span>View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$class->id"]) !!}
       
      <a href="/admin/classes/{{$class->id}}/edit" class="btn btn-primary"><span class="fa fa-pencil"></span>Edit</a>
      {!! Form::button('<span class="fa fa-trash-o"></span>Decline', ['class' => 'btn btn-danger','data-toggle'=>'modal','data-target'=>'#confirmdel']) !!}
      @include('classes._partials.confirmdel')
    </td>
</tr>
@endforeach
      </tbody>
  </table>
</div>
</div>
</div>
{!! Form::close() !!}
<div class="tab-pane" id="tab-second">
{!! Form::open(['action' => 'ClassesController@bulkApprove','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">
    <h1><span class="glyphicon glyphicon-book"></span>&nbsp;Classes</h1>
<a href="/admin/classes/create" class="btn btn-lg btn-success"><span class="fa fa-plus"></span>Add New Class</a>
{!! Form::button('<span class="fa fa-check"></span>Approve Selected', ['class' => 'btn btn-lg btn-danger','data-toggle'=>'modal','data-target'=>'#confirmblkapp','id'=>'approve']) !!}
@include('classes._partials.confirmbulkapp')
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
 <tr>
<th>{!! Form::checkbox(null,null,'', ['id' => 'check_all2','class' => 'form-check-input']) !!}</th>
    <th>Class Name</th>
    <th>Description</th>
    <th>Number of Sessions</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
    @foreach ($declined as $declined)
<tr>
    <td>{!! Form::checkbox('classid[]',$declined->id,'', ['class' => 'sub_chk2']) !!}</td>
    <td>{{ $declined->classname }}</td>
    <td>{{ str_limit($declined->description,20, '...') }}</td>
    <td>{{ $declined->numberofsessions }}</td>
    <td>
        {!! Form::button('<span class="fa fa-search"></span>View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$declined->id"]) !!}
      <a href="/admin/classes/{{$declined->id}}/edit" class="btn btn-primary"><span class="fa fa-pencil"></span>Edit</a>
      <a href="/admin/classes/{{ $declined->id }}/approve" class="btn btn-danger" id="cfirmdel"><span class="fa fa-check"></span>Approve</a>
      
    </td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
{!! Form::close() !!}
</div>
<div class="tab-pane" id="tab-third">
{!! Form::open(['action' => 'ClassesController@bulkDecline','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">
    <h1><span class="glyphicon glyphicon-book"></span>&nbsp;Classes</h1>
  <a href="/admin/classes/create" class="btn btn-lg btn-success"><span class="fa fa-plus"></span>Add New Class</a>

{!! Form::button('<span class="fa fa-trash-o"></span>Decline Selected', ['class' => 'btn btn-lg btn-danger','data-toggle'=>'modal','data-target'=>'#declineconfirm','id'=>'decl']) !!}
@include('classes._partials.confirmdecline')
{!! Form::button('<span class="fa fa-check"></span>Approve Selected', ['class' => 'btn btn-lg btn-primary','data-toggle'=>'modal','data-target'=>'#confirm','id'=>'appr']) !!}
@include('classes._partials.confirmapprove')
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
  <tr>
<th>{!! Form::checkbox(null,null,'', ['id' => 'check_all3','class' => 'form-check-input']) !!}</th>
    <th>Class Name</th>
    <th>Description</th>
    <th>Number of Sessions</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
 @foreach ($crequest as $crequest)
<tr>
    <td>{!! Form::checkbox('classid[]',$crequest->id,'', ['class' => 'sub_chk3']) !!}</td>
    <td>{{ $crequest->classname }}</td>
    <td>{{ str_limit($crequest->description,20, '...')  }}</td>
    <td>{{ $crequest->numberofsessions }}</td>
    <td>{{ ucwords($crequest->status) }}</td>
    <td>
        {!! Form::button('<span class="fa fa-search"></span>View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$crequest->id"]) !!}
      {!! Form::button('<span class="fa fa-check"></span>Approve', ['class' => 'btn btn-primary','data-toggle'=>'modal','data-target'=>'#singleconfirm']) !!}
      @include('classes._partials.singleconfirm')
      {!! Form::button('<span class="fa fa-trash-o"></span>Decline', ['class' => 'btn btn-danger','data-toggle'=>'modal','data-target'=>'#singledecline']) !!}
      @include('classes._partials.singledecline')
    </td>
</tr>
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
@foreach ($all as $all)
  @include('classes._partials.modal')
@endforeach
</section>


@endsection
@section('scripts')

@include('_partials.datatables')
<script type="text/javascript" src="{{ asset('backend/custom/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/classes.js') }}"></script>
@endsection
