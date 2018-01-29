@extends('_layouts.app')
@section('content')
  {{-- Edit  User --}}

  	<div class="col-md-6 col-md-offset-3">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Edit {{ $user->name }}</h3>
            </div>
            <div class="box-body">
            <div class="form-group">
      {!! Form::open(['action' => ['UserController@update',$user->id],'method' => 'post','enctype' => 'multipart/form-data']) !!}
				{!! Form::label('name','Full Name:', []) !!}
				{!! Form::text('name',$user->name, ['placeholder' => 'Enter Full Name...','class' =>'form-control input']) !!}
         {!! Form::label('avatar','Avatar', []) !!}
         <div class="row">
          <div class="col-md-6">
            {!! Form::file('avatar', ['id' => 'avatar']) !!}
             <p class="help-block">Upload an Avatar</p>
          </div>
          <div class="col-md-5">
            {!! Form::label('role','Role:', []) !!}
            {!! Form::select('role',Spatie\Permission\Models\Role::get()->pluck('name','name'), isset($user)?$user->getRoleNames():null, ['class' => 'form-control']) !!}
          </div>
         </div>
        {!! Form::label('email','Email Address:', []) !!}
        {!! Form::email('email',$user->email, ['placeholder' => 'Enter Email Address','class' => 'form-control']) !!}
            </div>
		

              <div class="form-group">
            <div class="box-footer">  
              {!! Form::hidden('_method','PUT', []) !!}
          			{!! Form::submit('Save Changes&nbsp;', ['class' => 'btn btn-primary pull-right']) !!}
          			{!! Form::close() !!}
            </div>
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
    </div>
    {{-- ./col --}}
@endsection