@extends('_layouts.app')
@section('breadcrumbs')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="/admin/permissions">Permission</a></li>
      </ol>
    </section>
@endsection
@section('content')
 <!-- Content Header (Page header) -->
 
    <!-- Main content -->
    <section class="content">
      <div class="col-md-11">
        <div class="form-group">
      {!! Form::open(['action' => 'User\PermissionController@bulkDelete','method' => 'post']) !!}
        </div>
  
                <!-- START DEFAULT DATATABLE -->
      <div class="panel panel-success">
          <div class="panel-heading">                                
              <h3 class="panel-title" style="background-color: ;">Permsissions Table &nbsp;</h3>
              <a href="/admin/permissions/create" class="btn btn-rounded btn-lg btn-success">Add new Permission</a>                        
              {!! Form::submit('Delete all Selected', ['class' => 'btn btn-rounded btn-lg btn-danger']) !!}
          </div>
      <div class="panel-body">
          <table class="table datatable">
              <thead>
                  <tr>
                  <th>{!! Form::checkbox('','','', ['id' => 'check_all']) !!}</th>
                  <th>Permission ID</th>
                  <th>Permission Name</th>
                  <th>Created At</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($permission as $permission)
                 <tr>
                   <th>{!! Form::checkbox('permissionid[]',$permission->id,'', ['class' => 'sub_chk']) !!}</th>
                   <td>{{ $permission->id }}</td>
                   <td>{{ $permission->name }}</td>
                   <td>{{ $permission->created_at }}</td>
                   <td>
                   <a href="/admin/permissions/{{ $permission->id }}" class="btn btn-rounded btn-lg btn-info ">View</a>
                  <a href="/admin/permissions/{{ $permission->id }}/edit" class="btn btn-rounded btn-lg btn-primary">Edit</a>
                  <a href="/admin/permissions/del/{{ $permission->id }}" class="btn btn-rounded btn-lg btn-danger">Delete</a>
                    </td>
                 </tr>
                 @endforeach
                          </tbody>
                      </table>
              </div>
          </div>
          </div>
        </section>                 <!-- END DEFAULT DATATABLE -->
  {!! Form::close() !!}
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