@extends('_layouts.app')
@section('breadcrumbs')
<section class="content-header">
<ol class="breadcrumb">
<li><a href="/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
<li><a href="/admin/users">Users</a></li>
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
{!! Form::submit('Decline Selected', ['class' => 'btn btn-lg btn-danger']) !!}
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
<tr>
<th>{!! Form::checkbox('','','', ['id' => 'check_all']) !!}</th>
<th>Name</th>
<th>Description</th>
<th>Venue</th>
<th>Date</th>
<th>Time</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($approved as $approved)
<tr>
<td>{!! Form::checkbox('fellowshipid[]',$approved->id,'', ['class' => 'sub_chk']) !!}</td>
<td>{{$approved->name }}</td>
<td>{{$approved->description }}</td>
<td>{{$approved->venue}}</td>
<td>{{ $approved->date }}</td>
<td>{{ $approved->time }}</td>
<td>
{!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$approved->id"]) !!}
<a href="/admin/frequest/decline/{{$approved->id}}" class="btn btn-danger">Decline</a>
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
{!! Form::open(['action' => 'FellowshipController@bulkApprove','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">
{!! Form::submit('Approve Selected', ['class' => 'btn btn-lg btn-success']) !!}
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
    <tr>
    <th>{!! Form::checkbox('','','', ['id' => 'check_all2']) !!}</th>
    <th>Name</th>
    <th>Description</th>
    <th>Venue</th>
    <th>Date</th>
    <th>Time</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($declined as $declined)
   <tr>
     <td>{!! Form::checkbox('fellowshipid[]',$declined->id,'', ['class' => 'sub_chk2']) !!}</td>
     <td>{{$declined->name }}</td>
     <td>{{$declined->description }}</td>
     <td>{{$declined->venue}}</td>
     <td>{{ $declined->date }}</td>
     <td>{{ $declined->time }}</td>
     <td>
     {!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$declined->id"]) !!}
     <a href="/admin/frequest/approve/{{$declined->id}}" class="btn btn-success">Approve</a>
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
{{Form::submit('Decline Selected',['class' => 'btn btn-lg btn-danger','name' => 'change','value' => 'decline'])}}
{!! Form::submit('Approve Selected', ['class' => 'btn btn-lg btn-success','name' => 'change','value' => 'approve']) !!}
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
    <tr>
    <th>{!! Form::checkbox('','','', ['id' => 'check_all3']) !!}</th>
    <th>Name</th>
    <th>Description</th>
    <th>Venue</th>
    <th>Date</th>
    <th>Time</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($frequest as $frequest)
   <tr>
     <td>{!! Form::checkbox('fellowshipid[]',$frequest->id,'', ['class' => 'sub_chk3']) !!}</td>
     <td>{{$frequest->name }}</td>
     <td>{{$frequest->description}}</td>
     <td>{{$frequest->venue}}</td>
     <td>{{ $frequest->date }}</td>
     <td>{{ $frequest->time }}</td>
     <td>
     {!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$frequest->id"]) !!}
     <a href="/admin/frequest/approve/{{$frequest->id}}" class="btn btn-success">Approve</a>
     <a href="/admin/frequest/decline/{{$frequest->id}}" class="btn btn-danger">Decline</a>
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
  {{-- <!-- START DEFAULT DATATABLE -->

              <!-- END DEFAULT DATATABLE -->
@foreach ($userModal as $userModal)
@include('_partials.usermodal')
@endforeach --}}

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
