@extends('triggers.main')

@section('title') Auslöser Bearbeiten @stop

@section('content')

<h2>Auslöser bearbeiten</h2>

{!! Form::model($trigger, ['route' => array('triggers.update', $trigger->id), 'method' => 'put', 'class'=>'form-horizontal']) !!}

@include('triggers.partials.form')

<div class="form-group">
    <div class="col-sm-6">
        <a href="{{ route('triggers.index') }}" class="btn btn-default form-control">Zurück</a>
    </div>

    <div class="col-sm-6">
        <input type="submit" name="submit" value="Speichern" class="btn btn-primary form-control" />
    </div>
</div>

{!! Form::close() !!}

@stop