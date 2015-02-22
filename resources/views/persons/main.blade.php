@extends('master')

@section('subnav')
<ul class="nav nav-tabs">
    <li class="{{ Request::segment(2) == '' || Request::segment(2) == 'list' ? 'active' : false }}"><a href="{{ url('persons') }}">Personen anzeigen</a></li>
    <li class="{{ Request::segment(2) == 'new' ? 'active' : false }}"><a href="{{ url('persons/new') }}">Person anlegen</a></li>
</ul>
@stop