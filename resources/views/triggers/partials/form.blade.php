<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::text('name', null, ['placeholder'=>'Name', 'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Beschreibung', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Beschreibung']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('trigger_text', 'Auslösertext', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::text('trigger_text', null, ['class'=>'form-control', 'placeholder'=>'Auslösertext']) !!}
    </div>
</div>
