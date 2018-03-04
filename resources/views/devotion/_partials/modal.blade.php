<div class="modal fade" id="devotion{{ $devotion->id }}" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">{{ $devotion->topic }}</h4>
        </div>
        <div class="modal-body">
              <p>{!! wordwrap($devotion->content,145,"<br>",true) !!}</p> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Close</button>
            <a href="/admin/devotions/{{ $devotion->id }}/edit" class="btn btn-lg btn-success">Edit devotion</a>
        </div>
    </div>
</div>
</div>  