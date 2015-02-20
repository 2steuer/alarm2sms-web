<ul class="{{ $nav_classes }}">
    {{ HTML::nav_link('home', 'Startseite') }}
    <!--<li><a href="{{ url('home') }}">Startseite</a></li>-->
    <li><a href="{{ url('persons') }}">Personen verwalten</a></li>
    <li><a href="{{ url('groups') }}">Gruppen verwalten</a></li>
    <li><a href="{{ url('triggers') }}">Auslöser verwalten</a></li>
</ul>