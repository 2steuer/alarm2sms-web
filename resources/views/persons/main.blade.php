@extends('master')

@section('subnav')
<ul class="nav nav-tabs">
    <li><a href="{{ url('persons') }}">Personen anzeigen</a></li>
    <li><a href="{{ url('persons/new') }}">Person anlegen</a></li>
</ul>
@stop