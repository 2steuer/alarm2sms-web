@extends('master')

@section('title') Alarmieren @stop

@section('content')
    <h2>Auslöser alarmieren</h2>
<p class="text-warning">Sie sind im Begriff, den Auslöser <b>{{ $trigger->name }}</b> zu alarmieren.</p>

    {!! Form::open(['route' => ['alarm.trigger', $trigger->id, 'standard'], 'method' => 'post']) !!}
    {!! Form::submit('Jetzt alarmieren', ['class' => 'btn btn-primary form-control']) !!}
    <a href="{{ route('alarm.index') }}" class="btn btn-default form-control">Zurück</a>
    {!! Form::close() !!}
@stop