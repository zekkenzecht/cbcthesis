@extends('_layouts.app')
@section('breadcrumbs')
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a href="/admin/users">Users</a></li>
    </ol>
  </section>
@endsection
@section('content')
<!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    <div class="col-md-11">
  
        {!! Form::open(['action' => 'EnrollmentController@bulkEnroll','method' => 'post']) !!}
        <div class="form-group">
     
         <!-- START DEFAULT DATATABLE -->
        </div>
    <div class="panel panel-primary">
        <div class="panel-heading">                                
         {!! Form::submit('Enroll All Checked', ['class' => 'btn btn-lg btn-success btn-space','id'=>'blkdel']) !!}                             
        </div>
    <div class="panel-body">
        <table class="table table-striped datatable">

          
<thead>
<tr>
    <th>{!! Form::checkbox(null,null,'', ['id' => 'check_all','class' => 'form-check-input']) !!}</th>
    <th>Avatar</th>
    <th>Name</th>
    <th>Email</th>
    <th>Class Enrolled</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

@foreach ($result as $result)
<tr>
    <td>{!! Form::checkbox('userid[]',$result->id,'', ['class' => 'sub_chk']) !!}</td>
    <td><img src="{{ asset("$result->avatar") }}" height="75px" width="75px"></td>
    <td>{{ $result->name  }}</td>
    <td>{{ $result->email }}</td>
    <td>{{ $result->assimilation_name }}</td>
    <td>
        {!! Form::button('Enroll', ['class' => 'btn btn-info btn-block','data-toggle' => 'modal' ,'data-target' => "#$result->id"]) !!}
    </td>
</tr>
@endforeach
</tbody>
          </table>
            </div>
        </div>
        </div>
 {!! Form::close() !!}<br>
</section>
@foreach ($enrollModal as $enrollModal)
  @include('_partials.modals.enrollmodal')
@endforeach

@endsection
@section('scripts')

@include('_partials.datatables')
<script type='text/javascript' src='{{ asset('backend/js/plugins/noty/jquery.noty.js') }}'></script>
<script type='text/javascript' src='{{ asset('backend/js/plugins/noty/themes/default.js') }}'></script>
<script type="text/javascript" src="{{ asset('backend/custom/sweetalert2.all.min.js') }}"></script>
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
$(document).ready(function () {
    $('#blkdel').click(function() {
      checked = $("input[type=checkbox]:checked").length;
      if(!checked) {
        swal({
        type: 'error',
        title: 'Oops...',
        text: 'Please Check atleast one event to delete!',
      });
        return false;
      } 
     });
});
</script>

@endsection

