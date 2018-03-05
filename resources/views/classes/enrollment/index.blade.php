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
  @foreach ($user as $user)
  <tr>
    <td>{!! Form::checkbox(null,null,'', ['class' => 'sub_chk']) !!}</td>
    <td><img src="{{ asset('') }}{{ $user->avatar }}" height="75px" width="75px"></td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->classname }}</td>
    <td>
      {!! Form::button('Enroll', ['class'=>'btn btn-info','data-toggle'=>'modal','data-target'=>"#$user->id"]) !!}
      @include('classes.enrollment.enrollmodal')
      {!! Form::button('Unenroll', ['class'=>'btn btn-danger']) !!}
    </td>

  </tr>
  @endforeach

</tbody>
          </table>
            </div>
        </div>
        </div>

</section>


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

