<div class="modal fade" id="bulkdelete" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
              <h4>Are you sure you want to delete all checked ?</h4>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Close</button>
              {!! Form::button('<span class="fa fa-trash-o"></span>Delete All Checked', ['type'=>'submit','class' => 'btn btn-lg btn-danger btn-space','id'=>'blkdel']) !!}    
        </div>
    </div>
</div>
</div>  