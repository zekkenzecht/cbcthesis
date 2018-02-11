@extends('_layouts.app')
@section('content')
  {{-- Add new permission --}}

  	<div class="col-md-6 col-md-offset-3">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Add a new permission</h3>
            </div>
            <div class="box-body">
            <div class="form-group">
        {!! Form::open(['action' => 'User\PermissionController@store','method' => 'post']) !!}
				{!! Form::label('name','Permission Name:', []) !!}
				{!! Form::text('name','', ['placeholder' => 'Enter Permisson Name...','class' =>'form-control input']) !!}
            </div>
		

              <div class="form-group">
            <div class="box-footer">
          			{!! Form::submit('Add Permission&nbsp;', ['class' => 'btn btn-primary pull-right']) !!}
          			{!! Form::close() !!}
            </div>
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
    </div>
    {{-- ./col --}}
@endsection