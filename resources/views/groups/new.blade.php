@extends('groups.main')

@section('title') Gruppe anlegen @stop

@section('content')
<h2>Gruppe anlegen</h2>
{!! Form::open(['route' => 'groups.store', 'method'=>'post', 'class'=>'form-horizontal']) !!}

@include('groups.partials.form')

<div class="form-group">
    <div class="col-sm-4">
        <input type="submit" name="submit_new" value="Anlegen und neu" class="btn btn-default form-control" />
    </div>

    <div class="col-sm-4">
        <input type="submit" name="submit_view" value="Anlegen und anzeigen" class="btn btn-default form-control" />
    </div>

    <div class="col-sm-4">
        <input type="submit" name="submit_list" value="Anlegen und auflisten" class="btn btn-primary form-control" />
    </div>
</div>

{!! Form::close() !!}

@stop