@extends('_layouts.app')
@section('content')
  <div class="col-md-11">
    <div class="panel panel-success">
      <div class="panel panel-heading">Quick Mail</div>
    <div class="panel-body">
      <div class="content-frame-body">
      <div class="block">
      <form role="form" class="form-horizontal" action="/admin/sendemail" method="POST">
        {{ csrf_field() }}
      <div class="form-group">
          <label class="col-md-2 control-label">From:</label>
          <div class="col-md-10">
              <input type="email" class="form-control" name="sender" value="{{Auth::user()->email}}" readonly>
          </div>
      </div>
      <div class="form-group">
          <label class="col-md-2 control-label">To:</label>
          <div class="col-md-9">
              <input type="email" class="tagsinput" name="emailto" data-placeholder="add email"/>
          </div>
          <div class="col-md-1">
              <button class="btn btn-link toggle" data-toggle="mail-cc">Cc</button>
          </div>
      </div>
      <div class="form-group hidden" id="mail-cc">
          <label class="col-md-2 control-label">Cc:</label>
          <div class="col-md-10">
          <input type="text" class="tagsinput" value="" name="ccto" data-placeholder="add email"/>
          </div>
      </div>
      <div class="form-group">
          <label class="col-md-2 control-label">Subject:</label>
          <div class="col-md-10">
              <input type="text" class="form-control" value="Re: Lorem ipsum dolor sit amet"/>
          </div>
      </div>
      <div class="form-group">
          <label class="col-md-2 control-label">Attachments:</label>
          <div class="col-md-10">
              <input type="file" class="file" data-filename-placement="inside"/>
          </div>
      </div>
      <div class="form-group">
          <div class="col-md-12">
          <textarea class="summernote" name="content">
          </textarea>
          </div>
      </div>

      </div>

      </div>
    </div>
    <div class="panel panel-footer">
      <div class="form-group">
          <div class="col-md-12">
              <div class="pull-left">
                  <button class="btn btn-default"><span class="fa fa-trash-o"></span> Delete Draft</button>
              </div>
              <div class="pull-right">
                  <button class="btn btn-danger"><span class="fa fa-envelope"></span> Send Message</button>
              </div>
          </div>
      </div>
      </form>
    </div>
    </div>
  </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('backend/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/plugins/bootstrap/bootstrap-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/plugins/summernote/summernote.js')}}"></script>
@endsection
