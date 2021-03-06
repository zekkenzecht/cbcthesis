<div class="modal fade" id="{{ $user->id }}">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">User Details</h4>
</div>
<div class="modal-body">
       <div class="box box-success">
<div class="box-header">
<h3 class="box-title">{{ $user->name }}</h3>
</div>
<div class="box-body">

<div class="table-responsive">
        <table class="table table-striped">
            <tbody>                   
                <tr><th> Name </th> <td> {{ $user->name }} </td></tr>
                <tr><th> Email </th> <td> {{ $user->email }} </td></tr>
                 <tr><th> Select Class </th> 
                  <td> 
                    {!! Form::open(['action' => ['ClassEnrollController@store',$user->id],'method' => 'POST']) !!}
                    <select name="class">
                      <option value="0">NONE</option>
                     @foreach ($class as $class)
                       <option value="{{ $class->id }}">{{ $class->classname }}</option>
                     @endforeach
                    </select>
                  </td>
       
                </tr>

            </tbody>
        </table>
        {!! Form::submit('Enroll', ['class' => 'btn btn-block btn-success']) !!}
        {!! Form::close() !!}
    </div>     
</div>
<!-- /.box -->
</div>
<!-- /.row -->
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->