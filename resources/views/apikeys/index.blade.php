@extends('apikeys.main')

@section('title') API-Keys @stop

@section('content')

<h2>API-Keys</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Schlüssel</th>
            <th></th>
        </tr>
    </thead>

    @foreach($apikeys as $key)
        <tr>
            <td>{{ $key->name }}</td>
            <td>
                {{ $key->key }}
            </td>
            <td><a href="{{ route('apikeys.edit', ['id' => $key->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('apikeys.delete', [$key->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    @endforeach
</table>

@stop