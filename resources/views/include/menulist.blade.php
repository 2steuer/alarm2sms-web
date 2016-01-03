<ul class="{{ $nav_classes }}">
    @if(Auth::guest())
        <li class="active"><a href="{{ route('users.login') }}">Login</a></li>
    @else
        <li class="{{ Request::segment(1) == 'alarm' ? 'active' : false }}"><a href="{{ route('alarm.index') }}">Alarmieren</a></li>

        @if(Auth::user()->editusers || Auth::user()->admin)
            <li class="{{ Request::segment(1) == 'persons' ? 'active' : false }}"><a href="{{ route('persons.index') }}">Personen</a></li>
            <li class="{{ Request::segment(1) == 'groups' ? 'active' : false }}"><a href="{{ route('groups.index') }}">Gruppen</a></li>
        @endif
        @if(Auth::user()->admin)
            <li class="{{ Request::segment(1) == 'users' ? 'active' : false }}"><a href="{{ route('users.index') }}">Benutzer</a> </li>
            <li class="{{ Request::segment(1) == 'triggers' ? 'active' : false }}"><a href="{{ route('triggers.index') }}">Auslöser</a></li>
            <li class="{{ Request::segment(1) == 'apikeys' ? 'active' : false }}"><a href="{{ route('apikeys.index') }}">API-Keys</a></li>
        @endif
        <li><a href="{{ route('users.logout') }}">Ausloggen</a></li>
    @endif
</ul>