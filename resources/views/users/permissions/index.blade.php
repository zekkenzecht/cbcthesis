@extends('_layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
       Permissions List
        <small>This is the list of all of the Permissions</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="/admin/permission">Permission</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      {!! Form::open(['action' => 'PermissionController@create','method' => 'get']) !!}
      {!! Form::submit('Add new Permission	', ['class' => 'btn btn-lg bg-olive margin']) !!}
      {!! Form::close() !!}
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permissions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="post" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{!! Form::checkbox('postid','','', ['id' => 'check_all']) !!}</th>
                  <th>Permission ID</th>
                  <th>Permission Name</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($permission as $permission)
                 <tr>
                   <th>{!! Form::checkbox('permissionid','','', ['class' => 'sub_chk']) !!}</th>
                   <td>{{ $permission->id }}</td>
                   <td>{{ $permission->name }}</td>
                   <td>{{ $permission->created_at }}</td>
                   <td>
                    {!! Form::open(['action' => ['PermissionController@destroy',$permission->id],'method' => 'delete']) !!}
                   <a href="/admin/permissions/{{ $permission->id }}" class="btn btn-sm bg-purple ">View</a>
                  <a href="/admin/permissions/{{ $permission->id }}/edit" class="btn btn-sm bg-navy">Edit</a>
                  {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
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