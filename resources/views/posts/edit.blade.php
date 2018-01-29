@extends('_layouts.app')
@section('content')

<div class="form-group">
	{!! Form::open(['action' => ['PostController@update',$post->id] ,'method' => 'post','enctype' => 'multipart/form-data' ]) !!}
	 <!-- Form Element sizes -->
	 <div class="row">
	 <div class="col-md-6">
	 	<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Edit this Post</h3>
            </div>
            <div class="box-body">
            {!! Form::label('title','Title', []) !!}
            {!! Form::text('title',$post->title, ['class' => 'form-control input-lg' , 'placeholder' => 'Enter Title Here']) !!}
            {!! Form::label('description','Description', []) !!}
            {!! Form::text('description',$post->description, ['class' => 'form-control input-lg' , 'placeholder' => 'Enter Description here']) !!}
            <div class="form-group">
                  {!! Form::label('postimage','Post Image', []) !!}
                  {!! Form::file('postimage', ['id' => 'postimage']) !!}
                  <p class="help-block">Upload a picture for your post here</p>
                  {!! Form::submit('Save', ['Class' => 'btn btn-lg bg-olive margin pull-right']) !!}<br>
                </div>
            </div>

            <!-- /.box-body -->
     </div>
          <!-- /.box -->
          </div>
          	
            <div class="col-md-5">
               <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">This is the {{ $post->title }} Image</h3>
            </div>
            <div class="box-body">
           <img src="{{ asset("$post->image") }}" width="300px" height="200px">
                </div>
            </div>
            </div>
           

            <!-- /.box-body -->
     </div>
          
          <div class="col-md-12">
          	{!! Form::textarea('body', $post->body, ['id' => 'article-ckeditor']) !!}
          </div>
     </div>
          
	 </div>
          
     </div>
          {!! Form::hidden('_method','PUT', []) !!}
	{!! Form::close() !!}
</div>
@stop
@section('scripts')
 <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
