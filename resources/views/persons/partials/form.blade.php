<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::text('name', null, ['placeholder'=>'Name', 'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('number', 'Telefonnummer', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::text('number', null, ['class'=>'form-control', 'placeholder'=>'Telefonnummer']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('flash', 'Flash-SMS verwenden?', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::select('flash', ['0' => 'Nein', '1' => 'Ja'], '1', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('group_list', 'Gruppen', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::select('group_list[]', Helper::getGroups([]), null, ['class' => 'form-control', 'multiple']) !!}
    </div>
</div>
