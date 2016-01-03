@extends('master')

@section('subnav')
<ul class="nav nav-tabs">
    <li class="{{ Request::segment(2) == '' || Request::segment(2) == 'list' ? 'active' : false }}"><a href="{{ route('apikeys.index') }}">API-Keys anzeigen</a></li>
    <li class="{{ Request::segment(2) == 'create' ? 'active' : false }}"><a href="{{ route('apikeys.create') }}">API-Key anlegen</a></li>
</ul>
@stop