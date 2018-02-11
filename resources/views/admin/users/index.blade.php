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
{!! Form::open(['action' => 'User\UserController@bulkChange','method' => 'post']) !!}
<div class="panel panel-default tabs">                            
<ul class="nav nav-tabs" role="tablist">
<li><a href="#tab-first" role="tab" data-toggle="tab">Active Users</a></li>
<li><a href="#tab-second" role="tab" data-toggle="tab">Inactive Users</a></li>
<li><a href="#tab-third" role="tab" data-toggle="tab">For-approval Users</a></li>
</ul>
<div class="panel-body tab-content">
<div class="tab-pane active" id="tab-first">
<div class="panel panel-success">
<div class="panel-heading">                                
<a href="/admin/users/create" class="btn btn-lg btn-success">Add New User</a>
{!! Form::submit('Deactivate Selected', ['class' => 'btn btn-lg btn-danger']) !!}                     
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
<tr>
<th>{!! Form::checkbox('userid','','', ['id' => 'check_all']) !!}</th>
<th>Avatar</th>
<th>User Name</th>
<th>Status</th>
<th>Email Address</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($user as $user)
<tr>
<td>{!! Form::checkbox('userid[]',$user->id,'', ['class' => 'sub_chk']) !!}</td>
<td><img src="{{ asset("$user->avatar") }}" height="75px" width="75px"></td>
<td>{{ $user->name }}</td>
@if ($user->status == 'active')
 <td><label class="label label-success label-form">{{ ucwords($user->status) }}</label></td>
@elseif($user->status == 'inactive')
<td><label class="label label-danger label-form">{{ ucwords($user->status) }}</label></td>
@else
<td><label class="label label-info label-form">{{ ucwords($user->status) }}</label></td>
@endif

<td>{{ $user->email }}</td>
<td>
{!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$user->id"]) !!}
<a href="/admin/users/stat/{{ $user->id }}" class="btn btn-danger">Deactivate</a>
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
{!! Form::open(['action' => 'User\UserController@bulkChange','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">                                
<a href="/admin/users/create" class="btn btn-lg btn-success">Add New User</a>
{!! Form::submit('Activated Selected', ['class' => 'btn btn-lg btn-info']) !!}            
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
    <tr>
    <th>{!! Form::checkbox('','','', ['id' => 'check_all2']) !!}</th>
    <th>Avatar</th>
    <th>User Name</th>
    <th>Status</th>
    <th>Email Address</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($inactive as $inactive)
   <tr>
     <td>{!! Form::checkbox('userid[]',$inactive->id,'', ['class' => 'sub_chk2']) !!}</td>
     <td><img src="{{ asset("$inactive->avatar") }}" height="75px" width="75px"></td>
     <td>{{ $inactive->name }}</td>
     @if ($inactive->status == 'active')
       <td><label class="label label-success label-form">{{ ucwords($inactive->status) }}</label></td>
    @elseif($inactive->status == 'inactive')
      <td><label class="label label-danger label-form">{{ ucwords($inactive->status) }}</label></td>
    @else
      <td><label class="label label-info label-form">{{ ucwords($inactive->status) }}</label></td>
     @endif
      
     <td>{{ $inactive->email }}</td>
     <td>
    {!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$inactive->id"]) !!}
    <a href="/admin/users/stat/{{ $inactive->id }}" class="btn btn-success">Activate</a>
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
{!! Form::open(['action' => 'User\UserController@bulkChange','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">                                
<a href="/admin/users/create" class="btn btn-lg btn-success">Add New User</a>
{!! Form::submit('Activated Selected', ['class' => 'btn btn-lg btn-info']) !!}                     
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
    @foreach ($approval as $approval)
   <tr>
     <td>{!! Form::checkbox('userid[]',$approval->id,'', ['class' => 'sub_chk3']) !!}</td>
     <td><img src="{{ asset("$approval->avatar") }}" height="75px" width="75px"></td>
     <td>{{ $approval->name }}</td>
     @if ($approval->status == 'active')
       <td><label class="label label-success label-form">{{ ucwords($approval->status) }}</label></td>
    @elseif($approval->status == 'inactive')
      <td><label class="label label-danger label-form">{{ ucwords($approval->status) }}</label></td>
    @else
      <td><label class="label label-info label-form">{{ ucwords($approval->status) }}</label></td>
     @endif
     <td>{{ $approval->email }}</td>
     <td>
    {!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$approval->id"]) !!}
    <a href="/admin/users/stat/{{ $approval->id }}" class="btn btn-success">Activate</a>
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

                

  <!-- START DEFAULT DATATABLE -->

              <!-- END DEFAULT DATATABLE -->
@foreach ($userModal as $userModal)
@include('_partials.usermodal')
@endforeach

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