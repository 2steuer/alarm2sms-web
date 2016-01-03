@extends('apikeys.main')

@section('title') API-Key Bearbeiten @stop

@section('content')

<h2>API-Key bearbeiten</h2>

{!! Form::model($apikey, ['route' => array('apikeys.update', $apikey->id), 'method' => 'put', 'class'=>'form-horizontal']) !!}

@include('apikeys.partials.form')

<div class="form-group">
    <div class="col-sm-6">
        <a href="{{ route('apikeys.index') }}" class="btn btn-default form-control">Zurück</a>
    </div>

    <div class="col-sm-6">
        <input type="submit" name="submit" value="Speichern" class="btn btn-primary form-control" />
    </div>
</div>

{!! Form::close() !!}

@stop