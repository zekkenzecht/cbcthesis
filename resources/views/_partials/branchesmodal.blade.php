<div class="modal fade" id="create">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create Branch</h4>
            </div>
            <div class="modal-body">
                   <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title"></h3>
          </div>
          <div class="box-body">
              {{Form::open(['action' => 'BranchesController@store','method' => 'post'])}}
              <div class="form-group">
                <div class="row">
                  <div class="col-md-11">
                     {!! Form::label('name','Branch Name:', ['class'=>'col-md-3 control-label']) !!}
                  <div class="col-md-9">
                  {!! Form::text('name','' , ['class' => 'form-control']) !!}
                  </div> 
                  </div>
                </div>
              </div>
             
              <div class="form-group">
                <div class="row">
                  <div class="col-md-11">
                     {!! Form::label('name','Address:', ['class'=>'col-md-3 control-label']) !!}
                  <div class="col-md-9">
                  {!! Form::textarea('address','' , ['class' => 'form-control','rows' => '4']) !!}
                  </div> 
                  </div>
                </div>
              </div>

               <div class="form-group">
                <div class="row">
                  <div class="col-md-11">
                     {!! Form::label('pastor','Pastor Name:', ['class'=>'col-md-3 control-label']) !!}
                  <div class="col-md-9">
                  {!! Form::text('pastor','' , ['class' => 'form-control']) !!}
                  </div> 
                  </div>
                </div>
                  
              </div>

                <div class="form-group">
                <div class="row">
                  <div class="col-md-11">
                    {!! Form::label('time','Service Time:', ['class'=>'col-md-3 control-label']) !!}
                  <div class="col-md-9">
                 <input type="time" name="service" class="form-control" required>
                  </div> 
                  </div>
                </div>
              </div>
              {{Form::submit('Save Branch',['class' => 'btn btn-lg btn-success'])}}
              {{Form::close()}}
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


@foreach ($branches2 as $branch)
<div class="modal fade" id="{{ $branch->id }}">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Create Branch</h4>
    </div>
    <div class="modal-body">
           <div class="box box-success">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <div class="box-body">
      {{Form::open(['action' => ['BranchesController@update',$branch->id],'method' => 'post'])}}
      <div class="form-group">
        <div class="row">
          <div class="col-md-11">
             {!! Form::label('name','Branch Name:', ['class'=>'col-md-3 control-label']) !!}
          <div class="col-md-9">
          {!! Form::text('name',$branch->id , ['class' => 'form-control']) !!}
          </div> 
          </div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="row">
          <div class="col-md-11">
             {!! Form::label('name','Address:', ['class'=>'col-md-3 control-label']) !!}
          <div class="col-md-9">
          {!! Form::textarea('address',$branch->address , ['class' => 'form-control','rows' => '4']) !!}
          </div> 
          </div>
        </div>
      </div>

       <div class="form-group">
        <div class="row">
          <div class="col-md-11">
             {!! Form::label('pastor','Pastor Name:', ['class'=>'col-md-3 control-label']) !!}
          <div class="col-md-9">
          {!! Form::text('pastor',$branch->pastor , ['class' => 'form-control']) !!}
          </div> 
          </div>
        </div>
          
      </div>

        <div class="form-group">
        <div class="row">
          <div class="col-md-11">
            {!! Form::label('time','Service Time:', ['class'=>'col-md-3 control-label']) !!}
          <div class="col-md-9">
         <input type="time" name="service" value="{{ $branch->service }}" class="form-control" required>
          </div> 
          </div>
        </div>
      </div>
      {{Form::submit('Save Branch',['class' => 'btn btn-lg btn-success'])}}
      {!! Form::hidden('_method','PUT', []) !!}
      {{Form::close()}}
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

  <div class="modal fade" id="view{{ $branch->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Branch Details</h4>
              </div>
              <div class="modal-body">
                     <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">{{ $branch->name }}</h3>
            </div>
            <div class="box-body">

             <div class="table-responsive">
                      <table class="table table-striped">
                          <tbody>
                              <tr><th>Branch Name</th><td>{{ $branch->branchName }}</td></tr>
                              <tr><th> Address </th> <td> {{ $branch->address }} </td></tr>
                              <tr><th> Pastor </th> <td> {{ $branch->pastor }} </td></tr>
                              <tr><th> Address </th> <td> {{ $branch->address }} </td></tr>
                              <tr><th> Service Hours </th> <td> {{ $branch->service }} </td></tr>
                          </tbody>
                      </table>
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
@endforeach
