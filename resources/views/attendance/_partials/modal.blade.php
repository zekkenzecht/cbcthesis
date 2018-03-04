<div class="modal fade" id="modal{{ $value->id }}" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Change Attendance Status</h4>
        </div>
        <div class="modal-body">
         <div class="table-responsive">
            <table class="table table-striped">
                <tbody>                   
                    <tr><th> Name </th> <td> {{ $value->name }} </td></tr>
                    <tr><th> Email </th> <td> {{ $value->email }} </td></tr>
                     <tr><th> Contact </th> <td> {{ $value->contact }} </td></tr>
                     <tr><th> Select Class </th> 
                      <td> 
                        {!! Form::open(['action' => ['AttendanceController@update',$value->id],'method' => 'POST']) !!}
                        <select name="status">
                           <option value="attendee">Attendee</option>
                           <option value="inconsistent">Inconsistent</option>
                           <option value="non-attendee">Non-Attendee</option>
                        </select>
                      </td>
           
                    </tr>

                </tbody>
            </table>
            {!! Form::hidden('_method','PUT', []) !!}
            {!! Form::submit('Change Attendance Status', ['class' => 'btn btn-block btn-danger']) !!}
            {!! Form::close() !!}
        </div>     
        </div>

    </div>
</div>
</div>  