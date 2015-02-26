@extends('triggers.main')

@section('title') Abweichende Alarmierung anlegen @stop

@section('content')
<h2>Abweichende Alarmierung anlegen</h2>

{!! Form::open(['route'=>['triggerslot.store', $triggerId], 'method'=>'post', 'class'=>'form-horizontal']) !!}

@include('triggers.partials.slotform')


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