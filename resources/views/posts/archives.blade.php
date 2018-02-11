@extends('_layouts.app')
@section('breadcrumbs')
   <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="/posts">Posts</a></li>
      </ol>
    </section>
@endsection
@section('content')
 <!-- Content Header (Page header) -->
 
    <!-- Main content -->
    <section class="content">
      <div class="col-md-11">
        <div class="form-group">
          {!! Form::open(['action' => 'Post\PostController@create','method' => 'get']) !!}
          {!! Form::submit('Add new post', ['class' => 'btn btn-lg bg-success']) !!}
          {!! Form::close() !!}
        </div>
      
                <!-- START DEFAULT DATATABLE -->
      <div class="panel panel-success">
          <div class="panel-heading">                                
              <h3 class="panel-title" style="background-color: ;">Post Table</h3>
              <ul class="panel-controls">
                  <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                  <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                  <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
              </ul>                                
          </div>
      <div class="panel-body">
          <table class="table table-striped datatable">
              <thead>
                  <tr>
                  <th>{!! Form::checkbox('postid','','', ['id' => 'check_all']) !!}</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Posted By</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                   @foreach ($post as $post)
                   <tr>
                  <td>{!! Form::checkbox('postid','','', ['class' => 'sub_chk']) !!}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->description }}</td>
                  <td><img src="{{ asset("$post->image") }}" width="120px" height="100px"></td>
                  <td>test</td>
                  <td>
                  {!! Form::open(['action' => ['Post\PostArchiveController@update',$post->id],'method' => 'post','class' => 'archive']) !!}
                  <a href="/admin/posts/{{ $post->id }}" class="btn btn-sm btn-info">View</a>
                  <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-sm btn-primary ">Edit</a>
                  {!! Form::hidden('postid',  $post->id   , []) !!}
                  @if ($post->archive == false)
                    {!! Form::submit('Archive', ['class' => 'btn btn-sm bg-danger']) !!}
                  @else
                  {!! Form::submit('Unarchive', ['class' => 'btn btn-sm btn-success']) !!}
                  @endif
                  {!! Form::hidden('_method', 'PUT') !!}
                  {!! Form::close() !!}
                  </td>

                </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
          </div>
          </div>
                            <!-- END DEFAULT DATATABLE -->
@endsection
@section('scripts')

@include('_partials.datatables')

<script type="text/javascript">
jQuery('#check_all').on('click', function(e) {
 if($(this).is(':checked',true))  
 {
 $(".sub_chk").prop('checked', true);  
 }  
 else  
 {  
 $(".sub_chk").prop('checked',false);  
 }  
});
</script>
@endsection


