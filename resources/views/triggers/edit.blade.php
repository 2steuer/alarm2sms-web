@extends('triggers.main')

@section('title') Auslöser Bearbeiten @stop

@section('content')

<h2>Auslöser bearbeiten</h2>

{!! Form::model($trigger, ['route' => array('triggers.update', $trigger->id), 'method' => 'put', 'class'=>'form-horizontal']) !!}

@include('triggers.partials.form')

<div class="form-group">
    <div class="col-sm-6">
        <a href="{{ route('triggers.index') }}" class="btn btn-default form-control">Zurück</a>
    </div>

    <div class="col-sm-6">
        <input type="submit" name="submit" value="Speichern" class="btn btn-primary form-control" />
    </div>
</div>

{!! Form::close() !!}

<hr />

<h3>Standard-Alarmierung</h3>

{!! Form::model($defaultSlot, ['route' => array('triggerslot.update', $trigger->id, $defaultSlot->id), 'method' => 'put', 'class'=>'form-horizontal']) !!}

<div class="form-group">
    {!! Form::label('text', 'Text', ['class' => 'col-sm-2 form-label']) !!}

    <div class="col-sm-10">
        {!! Form::textarea('text', null, ['class'=>'col-sm-10 form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::submit('Text speichern', ['name' => 'submit_defaultslot', 'class'=>'btn btn-primary form-control']) !!}
    </div>
</div>

{!! Form::close() !!}

<hr />

<h3>Abweichende Alarmierungen</h3>

@if($specialSlots->count() > 0)

<table class="table table-striped">
    <thead>
        <tr>
            <th>Wochentag</th>
            <th>Startzeit</th>
            <th>Endzeit</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($specialSlots as $slot)
            <tr>
                <td>{{ Helper::getWeekday($slot->weekday) }}</td>
                <td>{{ $slot->start }}</td>
                <td>{{ $slot->end }}</td>
                <td><a href="{{ route('triggerslot.edit', [$trigger->id, $slot->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ route('triggerslot.delete', [$trigger->id, $slot->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@else
<p>Keine abweichenden Alarmierungen angelegt.</p>
@endif

<a href="{{ route('triggerslot.create', $trigger->id) }}" class="btn btn-primary form-control">Neue abweichende Alarmierung</a>

@stop