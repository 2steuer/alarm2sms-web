<div class="form-group">
    {!! Form::label('name', 'App-Name', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::text('name', null, ['placeholder'=>'Name', 'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('key', 'API-Key', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::email('key', null, ['class'=>'form-control', 'placeholder'=>'Wird automatisch generiert', 'readonly'=>'readonly']) !!}
    </div>
</div>