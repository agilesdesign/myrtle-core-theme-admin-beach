@extends('admin::index')

@section('page-title')
    Users
@endsection

@section('page-description')
    Settings
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-settings'] ) }}
    <a class="btn btn-outline-warning" href="{{ url()->previous() }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {{ Form::open(['route' => ['admin.docks.settings.update', $dock->name], 'method' => 'PUT', 'id' => 'edit-settings']) }}

    <div class="form-group{{ $errors->has('registration') ? ' has-danger' : '' }}">
        {!! Form::label('registration', 'Registration') !!}
        {!! Form::select('registration', [0 => 'Off', 1 => 'On'], $dock->getSetting('registration'), ['class' => 'form-control select2']) !!}

        {!! $errors->first('registration', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {{ Form::close() }}
@endsection