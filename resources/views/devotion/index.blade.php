@extends('_layouts.app')
@section('breadcrumbs')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="/dashboard"></i>Dashboard</a></li>
      <li><a href="/admin/devotions">Devotions</a></li>
    </ol>
  </section>
@endsection
@section('content')
<!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">

    <div class="col-md-11">

@if (Session::has('message'))

<section class="col-md-11">

    <div class="alert alert-success" role="alert">

        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;

        </span><span class="sr-only">Close</span></button>

        <strong>{{ Session::get('message') }}</strong>

    </div>
    
</section>

@endif
  
        {!! Form::open(['action' => 'DevotionController@bulkDelete','method' => 'post']) !!}

        <div class="form-group">
     
         <!-- START DEFAULT DATATABLE -->
        </div>
    <div class="panel panel-success">
        <div class="panel-heading">   
         <header><h1><span class="fa fa-book"></span>&nbsp;Devotion Manager</h1></header>                             
         <a href="/admin/devotions/create" class="btn btn-lg btn-success"><span class="fa fa-plus"></span>Add new Devotion</a>     
          <a href="#bulkdelete" data-toggle='modal' class="btn btn-lg btn-danger" data-target="#bulkdelete"  id="blkdelete"><span class="glyphicon glyphicon-trash"></span>Delete All Selected</a> 
          @include('devotion._partials.confirmbulk')          
        </div>
    <div class="panel-body">
        <table class="table table-striped datatable">

          
<thead>
<tr>
    <th>{!! Form::checkbox(null,null,'', ['id' => 'check_all','class' => 'form-check-input']) !!}</th>
    <th>Topic</th>
    <th>Passage</th>
    <th>Date</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($devotion as $devotion)
<tr>
    <td>{!! Form::checkbox('devotionid[]',$devotion->id,'', ['class' => 'sub_chk']) !!}</td>
    <td>{{ $devotion->topic }}</td>
    <td>{{ $devotion->passage }}</td>
    <td>{{ date("M j, Y", strtotime("$devotion->date"))  }}</td> 
    <td>

        {!! Form::button('<span class="fa fa-search"></span>View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#devotion$devotion->id",'data-backdrop'=>"static", 'data-keyboard'=>"false"]) !!}

      @include('devotion._partials.modal')
      <a href="/admin/devotions/{{$devotion->id}}/edit" class="btn btn-primary"><span class="fa fa-pencil"></span>Edit</a>
       <a href="#deldev{{ $devotion->id }}" data-toggle='modal' class="btn btn-danger" data-target="#deldev{{ $devotion->id }}"><span class="glyphicon glyphicon-trash"></span>Delete</a> 
      @include('devotion._partials.confirmdel')
    </td>
</tr>
@endforeach
</tbody>
          </table>
            </div>
        </div>
        </div>
 {!! Form::close() !!}<br>
</section>

@endsection
@section('scripts')

@include('_partials.datatables')
<script type="text/javascript" src="{{ asset('backend/custom/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/checkbox.js') }}">
</script>
@endsection

