@extends('_layouts.app')
@section('content')

<div class="form-group">
	{!! Form::open(['action' => 'PostController@store' ,'method' => 'post','enctype' => 'multipart/form-data' ]) !!}
	 <!-- Form Element sizes -->
	 <div class="row">
	 <div class="col-md-12">
	 	<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $post->title }}</h3>
            </div>
            <div class="box-body">

			<h3>{{ $post->description }}</h3>
			<div class="row">
				<img src="{{asset("$post->image") }}" width="100%" height="400px">
				<div class="container">
					<div class="col-md-11">
						{!! $post->body !!}
					</div>
				</div>
			
			</div>
			
          </div>
          <!-- /.box -->
          </div>
          
     </div>
          
	 </div>
          
 </div>

@endsection
