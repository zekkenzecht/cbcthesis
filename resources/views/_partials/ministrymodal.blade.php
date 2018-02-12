<div class="modal fade" id="{{ $ministryModal->id }}">
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
    <h3 class="box-title">{{ $ministryModal->name }}</h3>
  </div>
  <div class="box-body">

   <div class="table-responsive">
            <table class="table table-striped">
                <tbody>                   
                    <tr><th> Name </th> <td> {{ $ministryModal->name }} </td></tr>
                    <tr><th> Email </th> <td> {{ $ministryModal->email }} </td></tr>
                     <tr><th> Select Minsitry </th> 
                      <td> 
                        {!! Form::open(['action' => ['AssignMinistryController@update',$ministryModal->id],'method' => 'PUT']) !!}
                        <select name="ministry">
                          <option value="NONE">NONE</option>
                         @foreach ($ministry as $ministry)
                           <option value="{{ $ministry->ministry }}">{{ $ministry->ministry }}</option>
                         @endforeach
                        </select>
                      </td>
           
                    </tr>

                </tbody>
            </table>
            {!! Form::submit('Assign', ['class' => 'btn btn-block btn-info']) !!}
            {!! Form::hidden('_METHOD','PUT') !!}
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