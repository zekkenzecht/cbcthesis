@extends('_layouts.app')
@section('content')
  {{-- Add new role --}}
  	<div class="col-md-6 col-md-offset-3">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Edit Role {{ $role->name }}</h3>
            </div>
            <div class="box-body">
            <div class="form-group">
        {!! Form::open(['action' => ['RoleController@update',$role->id],'method' => 'post']) !!}
				{!! Form::label('name','Role Name:', []) !!}
				{!! Form::text('name',$role->name, ['placeholder' => 'Enter Role Name...','class' =>'form-control input']) !!}
        {!! Form::select('permissions[]',$permission,old('permissions')??isset($role)?$role->permissions->pluck('name','name'):null, ['class' => 'form-control','multiple' => 'multiple','required' => 'required']) !!}

            </div>
              <div class="form-group">
            <!-- /.box-body -->
            <div class="box-footer">
			{!! Form::submit('Save Changes&nbsp;', ['class' => 'btn btn-primary pull-right']) !!}
      {!! Form::hidden('_method', 'PUT') !!}
				{!! Form::close() !!}
            </div>
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
    </div>
    {{-- ./col --}}      
  </div>

@endsection