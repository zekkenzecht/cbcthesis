@extends('_layouts.app')
@section('content')
  {{-- Add new User --}}

  	<div class="col-md-6 col-md-offset-3">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Add a new user</h3>
            </div>
            <div class="box-body">
            <div class="form-group">
        {!! Form::open(['action' => 'UserController@store','method' => 'post','enctype' => 'multipart/form-data']) !!}
				{!! Form::label('name','Full Name:', []) !!}
				{!! Form::text('name',null, ['placeholder' => 'Enter Full Name...','class' =>'form-control input']) !!}
         {!! Form::label('avatar','Avatar', []) !!}
         <div class="row">
          <div class="col-md-6">
            {!! Form::file('avatar', ['id' => 'avatar']) !!}
             <p class="help-block">Upload an Avatar</p>
          </div>
          <div class="col-md-5">
            {!! Form::label('role','Role:', []) !!}
            {!! Form::select('role',$role,$role, ['class' => 'form-control']) !!}
          </div>
         </div> 
        <div class="row">
          <div class="col-md-6">
        {!! Form::label('email','Email Address:', []) !!}
        {!! Form::email('email',null, ['placeholder' => 'Enter Email Address','class' => 'form-control']) !!}
          </div>
        <div class="col-md-6">
          
        </div>
        <div class="col-md-6">
          {!! Form::label('contact','Phone No:', []) !!}
          <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input name='contact' type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
          </div>
        </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Birthdate:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="birthdate">
                </div>
              </div>
                <!-- /.input group -->
              </div> 
            <div class="col-md-6">
              <div class="form-group"><br>
                {!! Form::label('gender','Gender:&nbsp;', []) !!}
                  <input type="radio" class="flat-red" name='gender' value="male">Male
                  <input type="radio" class="flat-red" name='gender' value="female">Female
              </div>
            </div>
           
              
          </div>
         
        {!! Form::label('address','Address:', []) !!}
        {!! Form::text('address',null, ['placeholder' => 'Enter Address ...','class' =>'form-control input']) !!}
        {!! Form::label('password','Password:', []) !!}
        {!! Form::password('password', ['placeholder' => 'Enter Password ...','class' =>'form-control input']) !!}
        {!! Form::label('confirm','Confirm Password:', []) !!}
        {!! Form::password('confirm', ['placeholder' => 'Confirm Password','class' =>'form-control input']) !!}
        </div>
            </div>
              <div class="form-group">
            <div class="box-footer">  
          			{!! Form::submit('Add Users&nbsp;', ['class' => 'btn btn-primary pull-right']) !!}
          			{!! Form::close() !!}
            </div>
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
    </div>
    {{-- ./col --}}
    @section('scripts')
    <script type="text/javascript">
    $(function () {
    //Date picker
    $('#datepicker').datepicker({
      format: 'yyyy/mm/dd',
      autoclose: true
    })
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

  })
    </script>
    @endsection
@endsection