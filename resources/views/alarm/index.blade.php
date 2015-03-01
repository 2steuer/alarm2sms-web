@extends('master')

@section('title') Manuell Alarmieren @stop

@section('content')
    <h2>Auslöser manuell alarmieren</h2>

    @if($triggers->count() > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Auslöser</th>
            <th>&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($triggers as $trigger)
        <tr>
            <td>{{ $trigger->name }}</td>
            <td>
                <a href="{{ route('alarm.standart', [$trigger->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-flash"></span> Standardtext</a>
                <a href="{{ route('alarm.freetext', [$trigger->id]) }}" class="btn btn-default"><span class="glyphicon glyphicon-envelope"></span> Freitext</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else

    <p>Sie haben leider Auslöser zum manuellen Alarmieren freigegeben.</p>
    @endif
@stop