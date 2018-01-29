  <div class="modal fade" id="{{ $roleModal->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Role Details</h4>
              </div>
              <div class="modal-body">
                     <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Role {{ $roleModal->name }}</h3>
            </div>
            <div class="box-body">

                   <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $roleModal->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $roleModal->name }} </td></tr>
                                    <tr><th> Permissions </th><td> {{ implode(', ', $roleModal->permissions->pluck('name')->toArray()) }} </td></tr>
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