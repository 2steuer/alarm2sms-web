@extends('triggers.main')

@section('title') Abweichende Alarmierung bearbeiten @stop

@section('content')
<h2>Abweichende Alarmierung bearbeiten</h2>

{!! Form::model($slot, ['route'=>['triggerslot.update', $triggerId, $slot->id], 'method'=>'put', 'class'=>'form-horizontal']) !!}

@include('triggers.partials.slotform')


<div class="form-group">
    <div class="col-sm-6">
        <a href="{{ route('triggers.edit', $triggerId) }}" class="btn btn-default form-control">Zurück</a>
    </div>

    <div class="col-sm-6">
        {!! Form::submit('Änderungen speichern', ['class' => 'btn btn-primary form-control', 'name' => 'submit_back']) !!}
    </div>
</div>

{!! Form::close() !!}

@stop