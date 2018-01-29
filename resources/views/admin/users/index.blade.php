@extends('_layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
       Users List
        <small>This is the list of all of the Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="/admin/users">Users</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      {!! Form::open(['action' => 'UserController@create','method' => 'get']) !!}
      {!! Form::submit('Add new User', ['class' => 'btn btn-lg bg-olive margin']) !!}
      {!! Form::close() !!}
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="post" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{!! Form::checkbox('userid','','', ['id' => 'check_all']) !!}</th>
                  <th>User ID</th>
                  <th>Avatar</th>
                  <th>User Name</th>
                  <th>Email Address</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($user as $user)
                 <tr>
                   <th>{!! Form::checkbox('userid','','', ['class' => 'sub_chk']) !!}</th>
                   <td>{{ $user->id }}</td>
                   <td><img src="{{ asset("$user->avatar") }}" height="100px" width="100px"></td>
                   <td>{{ $user->name }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->created_at }}</td>
                   <td>
                    {!! Form::open(['action' => ['UserController@destroy',$user->id],'method' => 'delete']) !!}
                    {!! Form::button('View', ['class' => 'btn btn-sm bg-purple','data-toggle' => 'modal' ,'data-target' => "#$user->id"."$user->name"]) !!}
                  <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-sm bg-navy">Edit</a>
                  {!! Form::submit('Deactivate', ['class'=>'btn btn-sm btn-danger']) !!}
                  {!! Form::close() !!}
                    </td>
                 </tr>

                 @endforeach
                </tbody>
              </table>
{{-- 
               @foreach ($user as $roleModal)
                  @include('_partials.rolemodal')
              @endforeach --}}
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
      'autoWidth'   : true
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