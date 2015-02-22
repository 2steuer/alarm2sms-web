<!-- {{ Request::segment(1) }}-->

<ul class="{{ $nav_classes }}">
    <li class="{{ Request::segment(1) == '' || Request::segment(1) == 'home' ? 'active' : false }}"><a href="{{ url('home') }}">Startseite</a></li>
    <li class="{{ Request::segment(1) == 'persons' ? 'active' : false }}"><a href="{{ url('persons') }}">Personen verwalten</a></li>
    <li class="{{ Request::segment(1) == 'groups' ? 'active' : false }}"><a href="{{ url('groups') }}">Gruppen verwalten</a></li>
    <li class="{{ Request::segment(1) == 'triggers' ? 'active' : false }}"><a href="{{ url('triggers') }}">Auslöser verwalten</a></li>
</ul>