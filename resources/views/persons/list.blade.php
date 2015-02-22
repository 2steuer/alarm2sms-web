@extends('master')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Rufnummer</th>
        </tr>
    </thead>

    @foreach($persons as $person)
        <tr>
            <td>$person->name</td>
            <td>$person->number</td>
        </tr>
    @endforeach
</table>

@stop