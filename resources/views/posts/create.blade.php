@extends('_layouts.app')
@section('content')
<div class="row">
  <div class="col-md-11">
    <div class="form-group">
      {!! Form::open(['action' => 'Post\PostController@store' ,'method' => 'post','enctype' => 'multipart/form-data','class' => 'form-horizontal']) !!}
      <div class="panel panel-success">
          <div class="panel-heading">
              <h3 class="panel-title"><strong>Create New</strong> Post</h3>
              <ul class="panel-controls">
                  <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
              </ul>
          </div>
         
            <div class="panel-body">
              <div class="row">
              <div class="col-md-6">
                {!! Form::label('title','Title', []) !!}
                {!! Form::text('title','', ['class' => 'form-control input-lg' , 'placeholder' => 'Enter Title Here']) !!}
                {!! Form::label('description','Description', []) !!}
                {!! Form::text('description','', ['class' => 'form-control input-lg' , 'placeholder' => 'Enter Description here']) !!}
               {!! Form::label('postimage','Post Image', []) !!}
                {!! Form::file('postimage', ['id' => 'postimage']) !!}
                <p class="help-block">Upload a picture for your post here</p>
                <br>
              </div>
              <div class="col-md-6">
                  {!! Form::submit('Publish', ['Class' => 'btn btn-lg btn-primary']) !!}<br><br>
                  {!! Form::submit('Save Draft', ['Class' => 'btn btn-lg btn-info']) !!}<br>
              </div>
              </div>
              <div class="col-md-12">
                  {!! Form::textarea('body', '', ['id' => 'article-ckeditor']) !!}
              </div>
            
             </div>    
      </div>
      
   </div>  
 </div>
</div>
 
@stop
@section('scripts')
 <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
