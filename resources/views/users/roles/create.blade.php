@extends('_layouts.app')
@section('content')
  {{-- Add new role --}}

  	<div class="col-md-6 col-md-offset-3">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Add a new role</h3>
            </div>
            <div class="box-body">
            <div class="form-group">
            	{!! Form::open(['action' => 'RoleController@store','method' => 'post']) !!}
				{!! Form::label('name','Role Name:', []) !!}
				{!! Form::text('name','', ['placeholder' => 'Enter Role Name...','class' =>'form-control input']) !!}
          {!! Form::label('permissions','Permissions', []) !!}
        {!! Form::select('permissions[] ',$permission,'', ['class' => 'form-control','multiple' => true]) !!}
            </div>
              <div class="form-group">
            <div class="box-footer">
			{!! Form::submit('Add Role&nbsp;', ['class' => 'btn btn-primary pull-right']) !!}
				{!! Form::close() !!}
            </div>
          </div>

      </div>
      <!-- /.row -->
    </div>
    {{-- ./col --}}
@endsection