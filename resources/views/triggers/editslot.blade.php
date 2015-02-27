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

<h3>Alarmierte Gruppen</h3>
@if($groups->count() > 0)
<table class="table table-striped">
    <thead>
    <tr>
        <th>Reihenfolge</th>
        <th>Name</th>
        <th>&nbsp;</th>
    </tr>
    </thead>

    <tbody>
    @foreach($groups as $group)
    <tr>
        <td>{{ $group->pivot->order }}
        @if($group->pivot->order > 1)
            <a href="{{ route('triggerslot.movegroup', [$triggerId, $slot->id, $group->id, 'up']) }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-up"></span></a>
        @endif
        @if($group->pivot->order < $groups->count())
            <a href="{{ route('triggerslot.movegroup', [$triggerId, $slot->id, $group->id, 'down']) }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-down"></span></a>
        @endif
        </td>
        <td>{{ $group->name }}</td>
        <td><a href="{{ route('triggerslot.deletegroup', [$triggerId, $slot->id, $group->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@else

<p>Noch keine Gruppen zugewiesen.</p>

@endif

{!! Form::open(['route' => ['triggerslot.addgroup', $triggerId, $slot->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

<div class="form-group">
    <div class="col-sm-4">
        {!! Form::select('group_id', Helper::getGroups($groups), null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-sm-4">
        {!! Form::select('order', Helper::getPositionStrings($groups->count() + 1), $groups->count() + 1, ['class' => 'col-sm-8 form-control']) !!}
    </div>

    <div class="col-sm-4">
        {!! Form::submit('Gruppe hinzufügen', ['name' => 'submit_slotedit', 'class' => 'btn btn-primary form-control']) !!}
    </div>
</div>

{!! Form::close() !!}

@stop