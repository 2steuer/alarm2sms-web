@extends('master')

@section('content')

{!! Form::open(['class'=>'form-horizontal']) !!}

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
    {!! Form::label('flash', 'Flash-SMS verwenden', ['class'=>'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::checkbox('flash', '1', true) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::submit('Person anlegen', ['class'=>'btn btn-primary form-control']) !!}
    </div>
</div>

{!! Form::close() !!}

@stop