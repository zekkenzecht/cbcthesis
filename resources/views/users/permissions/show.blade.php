	@extends('_layouts.app')
  @section('content')
  <div class="col-md-6 col-md-offset-3">
      <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Permission {{ $permission->name }}</h3>
            </div>
            <div class="box-body">
                 <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Permission ID</th>
                     <th>Permission Name</th>
                     <th>Created At</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $permission->id }} </td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->created_at }}</td>
                  </tr>
                </tbody>
              </table>       
              <!-- Minimal style -->
              <!-- checkbox -->   
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
    </div>
    {{-- ./col --}}
@endsection