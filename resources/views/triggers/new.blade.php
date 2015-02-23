@extends('triggers.main')

@section('title') Auslöser anlegen @stop

@section('content')
<h2>Auslöser anlegen</h2>
{!! Form::open(['route' => 'triggers.store', 'method'=>'post', 'class'=>'form-horizontal']) !!}

@include('triggers.partials.form')

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