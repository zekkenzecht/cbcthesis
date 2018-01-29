@extends('_layouts.app')
@section('content')

<div class="form-group">
	{!! Form::open(['action' => 'PostController@store' ,'method' => 'post','enctype' => 'multipart/form-data' ]) !!}
	 <!-- Form Element sizes -->
	 <div class="row">
	 <div class="col-md-6">
	 	<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Create a Post</h3>
            </div>
            <div class="box-body">
            {!! Form::label('title','Title', []) !!}
            {!! Form::text('title','', ['class' => 'form-control input-lg' , 'placeholder' => 'Enter Title Here']) !!}
            {!! Form::label('description','Description', []) !!}
            {!! Form::text('description','', ['class' => 'form-control input-lg' , 'placeholder' => 'Enter Description here']) !!}
            <div class="form-group">
                  {!! Form::label('postimage','Post Image', []) !!}
                  {!! Form::file('postimage', ['id' => 'postimage']) !!}
                  <p class="help-block">Upload a picture for your post here</p>
                </div>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          	{!! Form::submit('Publish', ['Class' => 'btn btn-lg bg-olive margin']) !!}<br>
           {!! Form::open(["url(/posts/draft)",'method' => 'post']) !!}
            {!! Form::submit('Save As Draft', ['Class' => 'btn btn-lg bg-navy margin']) !!}<br>
            {!! Form::close() !!}
            
          <div class="col-md-12">
          	{!! Form::textarea('body', '', ['id' => 'article-ckeditor']) !!}
          </div>
     </div>
          
	 </div>
          
     </div>
          
	{!! Form::close() !!}


</div>  
@stop
@section('scripts')
 <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
