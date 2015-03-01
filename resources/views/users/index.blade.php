@extends('users.main')

@section('title') Benutzer @stop

@section('content')

<h2>Benutzer</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Admin</th>
            <th></th>
        </tr>
    </thead>

    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>
                @if($user->admin)
                <span class="glyphicon glyphicon-check"></span>
                @else
                <span class="glyphicon glyphicon-remove"></span>
                @endif
            </td>
            <td><a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('users.delete', [$user->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    @endforeach
</table>

@stop