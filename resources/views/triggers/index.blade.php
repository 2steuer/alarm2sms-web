@extends('groups.main')

@section('title') Gruppen @stop

@section('content')

<h2>Gruppen</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Beschreibung</th>
            <th></th>
        </tr>
    </thead>

    @foreach($groups as $group)
        <tr>
            <td>{{ $group->name }}</td>
            <td>{{ $group->description }}</td>
            <td><a href="{{ route('groups.edit', ['id' => $group->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('groups.delete', [$group->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    @endforeach
</table>

@stop