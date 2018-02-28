  <div class="modal fade" id="{{ $all->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Class Details</h4>
              </div>
              <div class="modal-body">
                     <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">{{ $all->classname }}</h3>
            </div>
            <div class="box-body">

             <div class="table-responsive">
                      <table class="table table-striped">
                          <tbody>
                              <tr><th>Name</th><td> {{ $all->classname }} </td></tr>
                              <tr><th>Description</th><td> {!! wordwrap($all->description,50,"<br>",true) !!} </td></tr>
                              <tr><th>Number Of Sessions</th><td> {{ $all->numberofsessions }} </td></tr>
                              <tr><th>Start Date</th><td> {{date("M j, Y", strtotime("$all->startdate"))  }} </td></tr>
                              <tr><th>End Date</th><td> {{date("M j, Y", strtotime("$all->end_date")) }} </td></tr>
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
        <!-- /.modal -->