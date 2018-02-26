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
<section class="content">
<div class="col-md-11">
{!! Form::open(['action' => 'FellowshipController@bulkDecline','method' => 'post']) !!}
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
<a href="/admin/classes/create" class="btn btn-lg btn-success"> Add New Class</a>
{!! Form::button('Decline Selected', ['class' => 'btn btn-lg btn-danger']) !!}
<span class="fa-fa"></span>
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
<tr>
<th>{!! Form::checkbox(null,null,'', ['id' => 'check_all','class' => 'form-check-input']) !!}</th>
    <th>Class Name</th>
    <th>Description</th>
    <th>Number of Sessions</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($classes as $class)
<tr>
    <td>{!! Form::checkbox('classid[]',$class->id,'', ['class' => 'sub_chk']) !!}</td>
    <td>{{ $class->classname }}</td>
    <td>{{ $class->description }}</td>
    <td>{{ $class->numberofsessions }}</td>
    <td>{{ ucwords($class->status) }}</td>
    <td>
        {!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$class->id"]) !!}
      <a href="/admin/classes/{{$class->id}}/edit" class="btn btn-primary">Edit</a>
      <a href="/admin/classes/{{ $class->id }}/del" class="btn btn-danger" id="cfirmdel">Delete</a>
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
{!! Form::open(['action' => 'FellowshipController@bulkDecline','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">
    <h1><span class="glyphicon glyphicon-book"></span>&nbsp;Classes</h1>
<a href="/admin/classes/create" class="btn btn-lg btn-success"> Add New Class</a>
{!! Form::submit('Approve Selected', ['class' => 'btn btn-lg btn-primary']) !!}
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
 <tr>
<th>{!! Form::checkbox(null,null,'', ['id' => 'check_all','class' => 'form-check-input']) !!}</th>
    <th>Class Name</th>
    <th>Description</th>
    <th>Number of Sessions</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
    @foreach ($declined as $declined)
<tr>
    <td>{!! Form::checkbox('classid[]',$declined->id,'', ['class' => 'sub_chk']) !!}</td>
    <td>{{ $declined->classname }}</td>
    <td>{{ $declined->description }}</td>
    <td>{{ $declined->numberofsessions }}</td>
    <td>{{ ucwords($declined->status) }}</td>
    <td>
        {!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$declined->id"]) !!}
      <a href="/admin/classes/{{$declined->id}}/edit" class="btn btn-primary">Edit</a>
      <a href="/admin/classes/{{ $declined->id }}/del" class="btn btn-danger" id="cfirmdel">Delete</a>
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
{!! Form::open(['action' => 'FellowshipController@bulkChange','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">
    <h1><span class="glyphicon glyphicon-book"></span>&nbsp;Classes</h1>
  <a href="/admin/classes/create" class="btn btn-lg btn-success"> Add New Class</a>
{{Form::submit('Decline Selected',['class' => 'btn btn-lg btn-danger','name' => 'change','value' => 'decline'])}}
{!! Form::submit('Approve Selected', ['class' => 'btn btn-lg btn-primary','name' => 'change','value' => 'approve']) !!}
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
  <tr>
<th>{!! Form::checkbox(null,null,'', ['id' => 'check_all','class' => 'form-check-input']) !!}</th>
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
    <td>{!! Form::checkbox('classid[]',$crequest->id,'', ['class' => 'sub_chk']) !!}</td>
    <td>{{ $crequest->classname }}</td>
    <td>{{ $crequest->description }}</td>
    <td>{{ $crequest->numberofsessions }}</td>
    <td>{{ ucwords($crequest->status) }}</td>
    <td>
        {!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$crequest->id"]) !!}
      <a href="/admin/classes/{{$crequest->id}}/approve" class="btn btn-primary">Approve</a>
      <a href="/admin/classes/{{ $crequest->id }}/declined" class="btn btn-danger" id="cfirmdel">Decline</a>
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
<script type="text/javascript">
    $(document).ready(function() {

    $('#blkdelete').click(function() {
   
      checked = $("input[class=sub_chk]:checked").length;
      if(!checked) {
        swal({
        type: 'error',
        title: 'Oops...',
        text: 'Please Check atleast one devotion to delete!',
      });
        return false;
      } 
     });
});
</script>
@endsection
