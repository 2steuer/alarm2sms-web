@extends('persons.main')

@section('content')

{!! Form::model($person, ['route' => array('persons.update', $person->id), 'method' => 'put', 'class'=>'form-horizontal']) !!}

@include('persons.partials.form')

<div class="form-group">
    <div class="col-sm-6">
        <a href="{{ route('persons.index') }}" class="btn btn-default form-control">Zurück</a>
    </div>

    <div class="col-sm-6">
        <input type="submit" name="submit" value="Speichern" class="btn btn-primary form-control" />
    </div>
</div>

{!! Form::close() !!}

@stop