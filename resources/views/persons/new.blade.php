@extends('persons.main')

@section('content')

{!! Form::open(['action' => 'PersonsController@store', 'method'=>'post', 'class'=>'form-horizontal']) !!}

@include('persons.partials.form')

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