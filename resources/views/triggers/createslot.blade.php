@extends('triggers.main')

@section('title') Abweichende Alarmierung anlegen @stop

@section('content')
<h2>Abweichende Alarmierung anlegen</h2>

{!! Form::open(['route'=>['triggerslot.store', $triggerId], 'method'=>'post', 'class'=>'form-horizontal']) !!}

<div class="form-group">
    {!! Form::label('weekday', 'Wochentag', ['class'=>'form-label col-sm-2']) !!}

    <div class="col-sm-10">
        {!! Form::select('weekday', Helper::getWeekdays(), 1, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('start', 'Startzeit', ['class' => 'form-label col-sm-2']) !!}

    <div class="col-sm-10">
        {!! Form::input('time', 'start', '00:00', ['class' => 'form-control', 'step' => '1']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('end', 'Endzeit', ['class' => 'form-label col-sm-2']) !!}

    <div class="col-sm-10">
        {!! Form::input('time', 'end', '23:59:59', ['class' => 'form-control', 'step' => '1']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('text', 'Alarmierungstext', ['class' => 'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::textarea('text', null, ['class'=>'col-sm-10 form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-4">
        <a href="{{ route('triggers.edit', $triggerId) }}" class="btn btn-default form-control">Zurück</a>
    </div>

    <div class="col-sm-4">
        {!! Form::submit('Anlegen und zurück', ['class' => 'btn btn-default form-control', 'name' => 'submit_back']) !!}
    </div>

    <div class="col-sm-4">
        {!! Form::submit('Anlegen und bearbeiten', ['class' => 'btn btn-primary form-control', 'name' => 'submit_edit']) !!}
    </div>
</div>

{!! Form::close() !!}

@stop