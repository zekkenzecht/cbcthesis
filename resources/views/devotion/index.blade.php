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
  
        {!! Form::open(['action' => 'DevotionController@bulkDelete','method' => 'post']) !!}
        <div class="form-group">
     
         <!-- START DEFAULT DATATABLE -->
        </div>
    <div class="panel panel-primary">
        <div class="panel-heading">                                
         <a href="/admin/devotions/create" class="btn btn-lg btn-success">Add new Devotion</a>
         {!! Form::submit('Delete All Checked', ['class' => 'btn btn-lg btn-danger btn-space','id'=>'blkdel']) !!}                             
        </div>
    <div class="panel-body">
        <table class="table table-striped datatable">

          
<thead>
<tr>
    <th>{!! Form::checkbox(null,null,'', ['id' => 'check_all','class' => 'form-check-input']) !!}</th>
    <th>Topic</th>
    <th>Passage</th>
    <th>Content</th>
    <th>Date</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($devotion as $devotion)
<tr>
    <td>{!! Form::checkbox('devotionid[]',$devotion->id,'', ['class' => 'sub_chk']) !!}</td>
    <td>{{ $devotion->topic }}</td>
    <td>{{ $devotion->passage }}</td>
    <td>{{ $devotion->content }}</td>
    <td>{{ $devotion->date }}</td> 
    <td>
        {!! Form::button('View', ['class' => 'btn btn-info','data-toggle' => 'modal' ,'data-target' => "#$devotion->id"]) !!}
      <a href="/admin/devotions/{{$devotion->id}}/edit" class="btn btn-primary">Edit</a>
      <a href="/admin/devotions/{{ $devotion->id }}/del" class="btn btn-danger" id="cfirmdel">Delete</a>
    </td>
</tr>
@endforeach
</tbody>
          </table>
            </div>
        </div>
        </div>
 {!! Form::close() !!}<br>
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

