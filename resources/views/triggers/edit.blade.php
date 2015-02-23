@extends('groups.main')

@section('title') Gruppe Bearbeiten @stop

@section('content')

<h2>Gruppe bearbeiten</h2>

{!! Form::model($group, ['route' => array('groups.update', $group->id), 'method' => 'put', 'class'=>'form-horizontal']) !!}

@include('groups.partials.form')

<div class="form-group">
    <div class="col-sm-6">
        <a href="{{ route('groups.index') }}" class="btn btn-default form-control">Zurück</a>
    </div>

    <div class="col-sm-6">
        <input type="submit" name="submit" value="Speichern" class="btn btn-primary form-control" />
    </div>
</div>

{!! Form::close() !!}

@stop