  <div class="modal fade" id="{{ $eventModal->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Event Details</h4>
              </div>
              <div class="modal-body">
                     <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">{{ $eventModal->name }}</h3>
            </div>
            <div class="box-body">

             <div class="table-responsive">
                      <table class="table table-striped">
                          <tbody>
                              <tr><th>Event ID</th><td>{{ $eventModal->id }}</td></tr>
                              <tr><th> Title </th> <td> {{ $eventModal->title }} </td></tr>
                              <tr><th> Description </th> <td> {{ $eventModal->description }} </td></tr>
                              <tr><th> Venue </th> <td> {{ $eventModal->venue }} </td></tr>
                              <tr><th> Start Date </th> <td> {{ $eventModal->start_date }} </td></tr>
                              <tr><th> End Date </th> <td> {{ $eventModal->end_date }} </td></tr>
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