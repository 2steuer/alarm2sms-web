@extends('master')

@section('subnav')
<ul class="nav nav-tabs">
    <li class="{{ Request::segment(2) == '' ? 'active' : false }}"><a href="{{ route('groups.index') }}">Gruppen anzeigen</a></li>
    <li class="{{ Request::segment(2) == 'create' ? 'active' : false }}"><a href="{{ route('groups.create') }}">Gruppen anlegen</a></li>
</ul>
@stop