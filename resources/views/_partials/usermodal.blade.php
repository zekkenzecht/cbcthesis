  <div class="modal fade" id="{{ $userModal->id }}">
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
              <h3 class="box-title">{{ $userModal->name }}</h3>
            </div>
            <div class="box-body">

             <div class="table-responsive">
                      <table class="table table-striped">
                          <tbody>
                              <tr><th>ID</th><td>{{ $userModal->id }}</td></tr>
                              <tr><th> Name </th> <td> {{ $userModal->name }} </td></tr>
                              <tr><th> Email </th> <td> {{ $userModal->email }} </td></tr>
                              <tr><th> Address </th> <td> {{ $userModal->address }} </td></tr>
                              <tr><th> Contact </th> <td> {{ $userModal->contact }} </td></tr>
                              <tr><th> Gender </th> <td> {{ $userModal->gender }} </td></tr>
                              <tr><th> Birthdate</th><td> {{date("M j, Y", strtotime("$userModal->birthdate"))  }} </td></tr>
                              <tr><th> Status </th> <td> {{ $userModal->status }} </td></tr>
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