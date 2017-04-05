@extends('admin::index')

@section('page-title')
    Edit Database Connection
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-databaseconnection'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.databases.connections.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {{ Form::model($databaseconnection, ['route' => ['admin.databases.connections.update', $databaseconnection->id], 'method' => 'PUT', 'id' => 'edit-databaseconnection']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('slug', 'Slug', ['class' => 'control-label']) }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Leave blank to autogenerate']) }}
    </div>

    <div class="form-group">
        {!! Form::label('database_driver_id', 'Driver') !!}
        {!! Form::select('database_driver_id', $databasedrivers, $databaseconnection->database_driver_id, ['class' => 'form-control select2', 'placeholder' => 'Select driver..']) !!}
    </div>

    <div class="form-group">
        {{ Form::label('host', 'Host', ['class' => 'control-label']) }}
        {{ Form::text('host', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('database', 'Database', ['class' => 'control-label']) }}
        {{ Form::text('database', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('port', 'Port', ['class' => 'control-label']) }}
        {{ Form::text('port', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('prefix', 'Prefix', ['class' => 'control-label']) }}
        {{ Form::text('prefix', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::close() }}
@endsection