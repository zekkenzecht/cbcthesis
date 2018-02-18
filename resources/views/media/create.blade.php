@extends('_layouts.app')
@section('content')
<div class="col-md-11">
  <div class="panel panel-default">
      <div class="panel-body">
          <h3><span class="fa fa-download"></span> Upload Files</h3>
          <p><code>This is</code> the dropzone</p>
          {{Form::open(['action' => 'MediaController@store','class' => 'dropzone','files' => true,
            'enctype'=>'multipart/form-data','id'=>'image-upload'])}}
          {{Form::close()}}
      </div>
</div>
</div>
@stop
@section('scripts')
    <script type="text/javascript" src="{{asset('backend')}}/js/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
      </script>
@endsection
