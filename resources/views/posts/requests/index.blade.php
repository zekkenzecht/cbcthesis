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
          {!! Form::open(['action' => 'Post\PostRequestController@create','method' => 'get']) !!}
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
                  <th>Status</th>
                  <th>Posted By</th>
                  <th>Posted at</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @role('super-admin')
                 @foreach ($all as $post)
                   <tr>
                  <td>{!! Form::checkbox('postid','','', ['class' => 'sub_chk']) !!}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->description }}</td>
                  <td><img src="{{ asset("$post->image") }}" width="120px" height="100px"></td>
                  <td><label class="label label-info">{{ $post->status }}</label></td>
                  <td>test</td>
                  <td>{{ date("M j, Y H:i A", strtotime("$post->created_at")) }}</td>
                  <td>
                    {!! Form::open(['action' => ['Post\PostRequestController@approval',$post->id] , 'method' =>'post']) !!}
                    <a href="admin/prequest/{{ $post->id}}" class="btn btn-info">View</a>
                    {!! Form::submit('Approve', ['class' => "btn btn-success",'id' => 'approve']) !!}
                    {!! Form::hidden('approval',null, ['id' => 'hid']) !!}
                    {!! Form::hidden('_method','PUT', []) !!}
                    {!! Form::submit('Decline', ['class' => "btn btn-danger",'id' => 'decline']) !!}
                    {!! Form::close() !!}
                  </td>
                  </tr>
                  @endforeach
                @endrole
                @role('members')
                   @foreach ($post as $post)
                   <tr>
                  <td>{!! Form::checkbox('postid','','', ['class' => 'sub_chk']) !!}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->description }}</td>
                  <td><img src="{{ asset("$post->image") }}" width="120px" height="100px"></td>
                  <td>{{ $post->status }}</td>
                  <td>{{ $post->user->name }}</td>
                  <td>{{ $post->created_at }}</td>  
                  <td>
                    <a href="/prequest/{{ $post->id}}" class="btn btn-info">View</a>
                    <a href="/prequest/{{ $post->id}}/edit" class="btn btn-primary">Edit</a>
                    <a href="/prequest/cancel{{ $post->id}}" class="btn btn-danger">Remove</a>
                  </td>
                  </tr>
                  @endforeach
                @endrole
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
<script type="text/javascript">
 document.getElementById("approve").onclick = function() {
    document.getElementById("hid").value = "approved";
};
document.getElementById("decline").onclick = function() {
    document.getElementById("hid").value = "declined";
};
</script>
@endsection


