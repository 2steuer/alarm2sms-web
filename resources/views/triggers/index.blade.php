@extends('triggers.main')

@section('title') Auslöser @stop

@section('content')

<h2>Auslöser</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Beschreibung</th>
            <th></th>
        </tr>
    </thead>

    @foreach($triggers as $trigger)
        <tr>
            <td>{{ $trigger->name }}</td>
            <td>{{ $trigger->description }}</td>
            <td><a href="{{ route('triggers.edit', ['id' => $trigger->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('triggers.delete', [$trigger->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    @endforeach
</table>

@stop