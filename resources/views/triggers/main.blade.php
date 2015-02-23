@extends('master')

@section('subnav')
<ul class="nav nav-tabs">
    <li class="{{ Request::segment(2) == '' ? 'active' : false }}"><a href="{{ route('triggers.index') }}">Auslöser anzeigen</a></li>
    <li class="{{ Request::segment(2) == 'create' ? 'active' : false }}"><a href="{{ route('triggers.create') }}">Auslöser anlegen</a></li>
</ul>
@stop