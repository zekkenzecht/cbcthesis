@extends('_layouts.app')
@section('content')
<div class="col-md-11">
  <div class="panel panel-default">
      <div class="panel-body">
          <h3><span class="fa fa-download"></span> Upload Files</h3>
          <p><code>This is</code> the dropzone</p>
          {{Form::open(['action' => 'FileController@store','class' => 'dropzone','files' => true,
            'enctype'=>'multipart/form-data','id'=>'image-upload'])}}
          {{Form::close()}}
      </div>
</div>
</div>
@stop
@section('scripts')
    <script type="text/javascript" src="{{asset('backend')}}/js/plugins/dropzone/dropzone.min.js"></script>
    
<script>
  Dropzone.options.myDropzone = {
    maxFilesize: 500,
    init: function() {
      this.on("uploadprogress", function(file, progress) {
        console.log("File progress", progress);
      });
    }
  }
</script>
@endsection
