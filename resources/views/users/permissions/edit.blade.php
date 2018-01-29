@extends('_layouts.app')
@section('content')
  {{-- Add new permission --}}

    <div class="col-md-6 col-md-offset-3">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Edit permission {{ $permission->name }}</h3>
            </div>
            <div class="box-body">
            <div class="form-group">
              {!! Form::open(['action' => ['PermissionController@update',$permission->id],'method' => 'post']) !!}
        {!! Form::label('name','Permission Name:', []) !!}
        {!! Form::text('name',$permission->name, ['placeholder' => 'Enter Permisson Name...','class' =>'form-control input']) !!}

            </div>
              <div class="form-group">
     
            <!-- /.box-body -->
            <div class="box-footer">
      {!! Form::submit('Save Changes&nbsp;', ['class' => 'btn btn-primary pull-right']) !!}
      {!! Form::hidden('_method', 'put') !!}
        {!! Form::close() !!}
            </div>
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
    </div>
    {{-- ./col --}}
@endsection