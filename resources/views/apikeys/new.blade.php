@extends('apikeys.main')

@section('title') API-Key anlegen @stop

@section('content')
<h2>API-Key anlegen</h2>
{!! Form::open(['route' => 'apikeys.store', 'method'=>'post', 'class'=>'form-horizontal']) !!}

@include('apikeys.partials.form')

<div class="form-group">
    <div class="col-sm-6">
        <input type="submit" name="submit_new" value="Anlegen und neu" class="btn btn-default form-control" />
    </div>

    <div class="col-sm-6">
        <input type="submit" name="submit_list" value="Anlegen und auflisten" class="btn btn-primary form-control" />
    </div>
</div>

{!! Form::close() !!}

@stop