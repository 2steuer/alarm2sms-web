@extends('persons.main')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>

    @foreach($persons as $person)
        <tr>
            <td>{{ $person->name }}</td>
            <td><a href="{{ route('persons.edit', ['id' => $person->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('persons.delete', [$person->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    @endforeach
</table>

@stop