<!-- {{ Request::segment(1) }}-->

<ul class="{{ $nav_classes }}">
    <li class="{{ Request::segment(1) == '' || Request::segment(1) == 'alarm' ? 'active' : false }}"><a href="{{ route('alarm.index') }}">Alarmieren</a></li>
    <li class="{{ Request::segment(1) == 'users' ? 'active' : false }}"><a href="{{ route('users.index') }}">Benutzer</a> </li>
    <li class="{{ Request::segment(1) == 'persons' ? 'active' : false }}"><a href="{{ route('persons.index') }}">Personen</a></li>
    <li class="{{ Request::segment(1) == 'groups' ? 'active' : false }}"><a href="{{ route('groups.index') }}">Gruppen</a></li>
    <li class="{{ Request::segment(1) == 'triggers' ? 'active' : false }}"><a href="{{ route('triggers.index') }}">Auslöser</a></li>
    <li><a href="{{ route('users.logout') }}">Ausloggen</a></li>
</ul>