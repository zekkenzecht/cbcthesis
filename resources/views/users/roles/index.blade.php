@extends('_layouts.app')
  @section('breadcrumbs')
      <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
          <li><a href="/admin/roles">Roles</a></li>
        </ol>
      </section>
  @endsection
  @section('content')
   <!-- Content Header (Page header) -->
   
      <!-- Main content -->
      <section class="content">
        <div class="row">
         
            {!! Form::open(['action' => 'User\RoleController@bulkDelete','method' => 'post']) !!}

                <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-primary">
            <div class="panel-heading">                                
                <h3 class="panel-title" style="background-color: ;">Role Table &nbsp;</h3>
                <a href="/admin/roles/create" class="btn btn-lg btn-rounded btn-success">Add New Role</a>
                {!! Form::submit('Bulk Delete', ['class' => 'btn btn-lg btn-rounded btn-danger']) !!}
            </div>
        <div class="panel-body">
            <table class="table datatable">
                <thead>
                    <tr>
                  <th>{!! Form::checkbox('','','', ['id' => 'check_all']) !!}</th>
                  <th>Role ID</th>
                  <th>Role Name</th>
                  <th>Created At</th>
                  <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role as $role)
                 <tr>
                   <th>{!! Form::checkbox('roleid[]',$role->id,'', ['class' => 'sub_chk']) !!}</th>
                   <td>{{ $role->id }}</td>
                   <td>{{ $role->name }}</td>
                   <td>{{ $role->created_at }}</td>
                   <td>
               
                    {!! Form::button('View', ['class' => 'btn btn-lg btn-rounded btn-info','data-toggle' => 'modal' ,'data-target' => "#$role->id"]) !!}
                  <a href="/admin/roles/{{ $role->id }}/edit" class="btn btn-lg btn-rounded btn-primary">Edit</a>
                  <a href="/admin/roles/del/{{ $role->id }}" class="btn btn-lg btn-rounded btn-danger">Delete</a>
                 
                    </td>
                 </tr>

                 @endforeach
                </tbody>
                        </table>
                </div>
            </div>
            </div>
          </div>
        </section>
  {!! Form::close() !!}
                              <!-- END DEFAULT DATATABLE -->
@foreach ($roleModal as $roleModal)
@include('_partials.rolemodal')
@endforeach

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
