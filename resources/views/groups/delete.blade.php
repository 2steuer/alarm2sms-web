@extends('triggers.main')

@section('content')
<p class="text-danger">Die Gruppe <b>{{ $group->name }}</b> wirklich aus dem System löschen?</p>
{!! Form::open(['route' => ['groups.destroy', $group->id], 'method' => 'delete', 'class'=>'form-horizontal']) !!}

<div class="form-group">
    <div class="col-sm-6">
        <input type="submit" class="btn btn-default form-control" name="submit" value="Ja, löschen!" />
    </div>

    <div class="col-sm-6">
        <a href="{{ route('groups.index') }}" class="btn btn-primary form-control">Nein, zurück</a>
    </div>
</div>

{!! Form::close() !!}

@stop