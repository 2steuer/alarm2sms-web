@extends('groups.main')

@section('title') Gruppe Bearbeiten @stop

@section('content')

<h2>Gruppe bearbeiten</h2>

{!! Form::model($group, ['route' => array('groups.update', $group->id), 'method' => 'put', 'class'=>'form-horizontal']) !!}

@include('groups.partials.form')

<div class="form-group">
    <div class="col-sm-6">
        <a href="{{ route('groups.index') }}" class="btn btn-default form-control">Zurück</a>
    </div>

    <div class="col-sm-6">
        <input type="submit" name="submit" value="Speichern" class="btn btn-primary form-control" />
    </div>
</div>

{!! Form::close() !!}

    <hr />

    <h3>Personen</h3>

    @if($persons->count() > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Reihenfolge</th>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($persons->get() as $person)
            <tr>
                <td>{{ $person->pivot->order }}
                    @if($person->pivot->order > 1)
                        <a href="{{ route('groups.moveperson', [$group->id, $person->id, 'up']) }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-up"></span></a>
                    @endif
                    @if($person->pivot->order < $persons->count())
                        <a href="{{ route('groups.moveperson', [$group->id, $person->id, 'down']) }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-down"></span></a>
                    @endif</td>
                <td>{{ $person->name }}</td>
                <td><a href="{{ route('groups.deleteperson', [$group->id, $person->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @else
    <p>Keine Personen zugeordnet.</p>
    @endif

{!! Form::open(['route' => ['groups.addperson', $group->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

<div class="form-group">
    <div class="col-sm-4">
        {!! Form::select('person_id', Helper::getPersons($persons), null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-sm-4">
        {!! Form::select('order', Helper::getPositionStrings($persons->count() + 1), $persons->count() + 1, ['class' => 'form-control']) !!}
    </div>

    <div class="col-sm-4">
        {!! Form::submit('Person hinzufügen', ['name' => 'submit_edit', 'class' => 'btn btn-primary form-control']) !!}
    </div>
</div>

{!! Form::close() !!}

@stop