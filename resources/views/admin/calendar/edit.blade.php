<div class="col-md-4">
    <div class="panel panel-success">
        <div class="panel panel-heading">Edit Event</div>
    <div class="panel-body">
        {!! Form::open(['action' => ['EventController@update',$event->id],'method'=>'POST']) !!}
        <div class="form-group">
        {!! Form::label('title','Event title: ', ['class' => 'col-md-3 control-label']) !!}
        {!! Form::text('title',$event->title, ['placeholder' => 'Title of event','class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('description','Event description: ', ['class' => 'control-label']) !!}
        {!! Form::textarea('desc',$event->description, ['class' => 'form-control','rows' => '5']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('venue','Event Venue: ', ['class' => 'control-label']) !!}
        {!! Form::text('venue',$event->venue, ['class' => 'form-control','rows' => '5']) !!}
        </div>  
        <div class="form-group">   
        <div class="row">
            <div class="col-md-6">
                {!! Form::label('startdate','Start Date: ', []) !!}
                <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                <input type="text" class="form-control datepicker" name="startdate" value="{{ $event->start_date }}" required>
                </div>
             </div>
             <div class="col-md-6">
                {!! Form::label('enddate','End Date: ', []) !!}
                <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                <input type="text" class="form-control datepicker" name="enddate" value="{{ $event->end_date }}" required> 
                </div>      
             </div>
        </div>                                     
        </div>
    </div>
 </div>
        <div class="panel panel-footer">
            {!! Form::submit('Save Changes', ['Class' => 'btn btn-block btn-lg btn-success']) !!}
        </div>
     {!! Form::hidden('_method','PUT', []) !!}
        {!! Form::close() !!}
</div>