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
<div class="panel panel-default tabs">                            
<ul class="nav nav-tabs" role="tablist">
<li><a href="#tab-first" role="tab" data-toggle="tab">Active Posts</a></li>
<li><a href="#tab-second" role="tab" data-toggle="tab">Archives</a></li>

</ul>
<div class="panel-body tab-content">
<div class="tab-pane active" id="tab-first">
{!! Form::open(['action' => 'Post\PostArchiveController@bulkChange','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">                                
<a href="/admin/posts/create" class="btn btn-lg btn-success">Add new Post</a>
{!! Form::submit('Archive Selected', ['class' => 'btn btn-lg btn-danger']) !!}
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
    <tr>
    <th>{!! Form::checkbox('','','', ['id' => 'check_all']) !!}</th>
    <th>Title</th>
    <th>Description</th>
    <th>Image</th>
    <th>Status</th>
    <th>Posted By</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
     @foreach ($post as $post)
     <tr>
    <td>{!! Form::checkbox('postid[]',$post->id,'', ['class' => 'sub_chk']) !!}</td>
    <td>{{ $post->title }}</td>
    <td>{{ $post->description }}</td>
    <td><img src="{{ asset("$post->image") }}" width="120px" height="100px"></td>
    <td>{{ $post->status }}</td>
    <td>{{ ucwords($post->user->name) }}</td>
    <td>
    <a href="/admin/posts/{{ $post->id }}" class="btn btn-info">View</a>
    <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-primary ">Edit</a>
    @if ($post->archive == false)
      <a href="/admin/posts/arch/{{ $post->id }}" class="btn btn-danger">Archive</a>
    @else
     <a href="/admin/posts/arch/{{ $post->id }}" class="btn btn-success">Archive</a>
    @endif
  
    </td>

  </tr>
    @endforeach
  </tbody>
  </table>
</div>
</div>

{!! Form::close() !!}

</div>
<div class="tab-pane" id="tab-second">
{!! Form::open(['action' => 'Post\PostArchiveController@bulkChange','method' => 'post']) !!}
<div class="panel panel-success">
<div class="panel-heading">                                
<a href="/admin/posts/create" class="btn btn-lg btn-success">Add new Post</a>
{!! Form::submit('Unarchive Selected', ['class' => 'btn btn-lg btn-danger']) !!}
</div>
<div class="panel-body">
<table class="table table-striped datatable">
<thead>
    <tr>
    <th>{!! Form::checkbox('','','', ['id' => 'check_all2']) !!}</th>
    <th>Title</th>
    <th>Description</th>
    <th>Image</th>
    <th>Status</th>
    <th>Posted By</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
     @foreach ($archives as $archives)
     <tr>
    <td>{!! Form::checkbox('postid[]',$archives->id,'', ['class' => 'sub_chk2']) !!}</td>
    <td>{{ $archives->title }}</td>
    <td>{{ $archives->description }}</td>
    <td><img src="{{ asset("$archives->image") }}" width="120px" height="100px"></td>
    <td>{{ $archives->status }}</td>
    <td>{{ ucwords($archives->user->name) }}</td>
    <td>
    <a href="/admin/posts/{{ $archives->id }}" class="btn btn-info">View</a>
    <a href="/admin/posts/{{ $archives->id }}/edit" class="btn btn-primary ">Edit</a>
      <a href="/admin/posts/arch/{{ $archives->id }}" class="btn btn-danger">Unarchive</a>
    </td>

  </tr>
    @endforeach
  </tbody>
  </table>
</div>
</div>

{!! Form::close() !!}
</div>
</div>

</div>
</section>

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
jQuery('#check_all2').on('click', function(e) {
if($(this).is(':checked',true))  
{
$(".sub_chk2").prop('checked', true);  
}  
else  
{  
$(".sub_chk2").prop('checked',false);  
}  
});
</script>
@endsection


