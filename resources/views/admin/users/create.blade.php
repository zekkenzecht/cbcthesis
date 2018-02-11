@extends('_layouts.app')
@section('content')
  {{-- Add new User --}}
<div class="row">
    <div class="col-md-11">
        
    
          {!! Form::open(['action' => 'User\UserController@store','method' => 'post','enctype' => 'multipart/form-data' ,'class' =>  'form-horizontal']) !!}
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Add New</strong>&nbsp;User</h3>
            </div>
            <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti excepturi temporibus sed animi architecto velit, atque odio, reprehenderit qui iusto labore neque enim tenetur sequi nostrum, ratione natus ab at. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, illum, debitis itaque, adipisci quam a quis exercitationem sit, iusto magnam odit laudantium veniam ipsa sunt necessitatibus aliquam tempora? Voluptatibus, illo.</p>
            </div>
            <div class="panel-body">                                                                        
                
                <div class="row">
                     
                    <div class="col-md-6">
                        
                        <div class="form-group">
                          {!! Form::label('name','Full Name:', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                  {!! Form::text('name',null, ['placeholder' => 'Enter Full Name...','class' =>'form-control input' ,'required']) !!}
                                </div>                                            
                                <span class="help-block">Enter Full name here</span>
                            </div>
                        </div>
                        
                        <div class="form-group">                             
                         {!! Form::label('password','Password:', ['class' => 'col-md-3 control-label']) !!}           
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                   {!! Form::password('password', ['placeholder' => 'Enter Password ...','class' =>'form-control','required']) !!}
                                </div>            
                                <span class="help-block">Enter password here</span>
                            </div>
                        </div>

                         <div class="form-group">
                              <label class="col-md-3 control-label">Contact No:</label>
                              <div class="col-md-9">
                                  <input type="text" class="mask_phone form-control" value="" id="phone" name="contact" required/>
                                  <span class="help-block">Example: +639123456789</span>
                              </div>
                            </div>   
                        
                        <div class="form-group">
                           {!! Form::label('address','Address:', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9 col-xs-12">
                              {!! Form::textarea('address', null, ['class' => 'form-control','rows' => '5']) !!}
                                <span class="help-block">Enter Address Here</span>
                            </div>
                        </div>
                        
                    <div class="form-group">
                      {!! Form::label('avatar','Avatar:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">                                       
                          {!! Form::file('avatar', ['id' => 'filename','class' => 'fileinput btn-primary','title' => 'Browse file']) !!}
                            <span class="help-block">Upload an Avatar</span>
                        </div>
                    </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">                                        
                            <label class="col-md-3 control-label">Birthdate:</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" class="form-control datepicker" name="birthdate" required> 
                                </div>
                                <span class="help-block">Select a Birthday</span>
                            </div>
                        </div>
                          <div class="form-group">
                          {!! Form::label('email','Email Address', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                  {!! Form::email('email',null, ['placeholder' => 'Enter Email...','class' =>'form-control input','required']) !!}
                                </div>                                            
                                <span class="help-block">Enter Email address here</span>
                            </div>
                        </div>
                        <div class="form-group">
                          {!! Form::label('role','Role:', ['class' => 'col-md-3 control-label']) !!}
                          <div class="col-md-6">
                         
                            {!! Form::select('roles[]', Spatie\Permission\Models\Role::get()->pluck('name','name'), isset($user)?$user->getRoleNames():null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required','multiple'] : ['class' => 'form-control','multiple','required']) !!}
                        </div>
                        </div>
                        
                         <div class="form-group">
                            {!! Form::label('gender','Gender:&nbsp;', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">                                       
                              <input type="radio" name='gender' value="male" required>Male
                              <input type="radio"  name='gender' value="female" required>Female
                                <span class="help-block">Select your gender</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel-footer">
                {!! Form::submit('Add User&nbsp;', ['class' => 'btn btn-primary pull-right','id' =>'create']) !!}
                {!! Form::close() !!}
            </div>
        </div>

        
    </div>
</div>                    

    {{-- ./col --}}
@section('scripts')
   <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
   <script type="text/javascript" src="{{ asset('backend/js/plugins/maskedinput/jquery.maskedinput.min.js') }}"></script>
  <script type="text/javascript">
    jQuery(function($){
   $("#phone").mask("+639-99999-9999");
});
  </script>
@endsection
@endsection