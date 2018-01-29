@extends('_layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Forums List
        <small>This is the list of all of the forums</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="/posts">Posts</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	{!! Form::open(['action' => 'PostController@create','method' => 'get']) !!}
    	{!! Form::submit('Add new post', ['class' => 'btn btn-lg bg-olive margin']) !!}
    	{!! Form::close() !!}
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Posts in Forums</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="post" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{!! Form::checkbox('postid','','', ['id' => 'check_all']) !!}</th>

                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Posted By</th>
                  <th>Archived</th>
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
                  <td>{{ $post->status }}</td>
                  <td>test</td>
                  @if ($post->archive == false)
                   {!! "<td>Not Archive</td>" !!}
                  @else
                   {{ $archive = 'Archived' }}
                   {!! "<td>Archived</td>" !!}
                  @endif

                  <td>
                  {!! Form::open(['action' => ['PostArchiveController@update',$post->id],'method' => 'post','class' => 'archive']) !!}
                  <a href="/admin/posts/{{ $post->id }}" class="btn btn-sm bg-purple ">View</a>
                  <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-sm bg-navy ">Edit</a>
                  {!! Form::hidden('postid',  $post->id   , []) !!}
                  @if ($post->archive == false)
                    {!! Form::submit('Archive', ['class' => 'btn btn-sm bg-maroon']) !!}
                  @else
                  {!! Form::submit('Unarchive', ['class' => 'btn btn-sm btn-primary']) !!}
                  @endif
                  {!! Form::hidden('_method', 'PUT') !!}
                  {!! Form::close() !!}
                  </td>

                </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
<script>
  $(function () {
    $('#post').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
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