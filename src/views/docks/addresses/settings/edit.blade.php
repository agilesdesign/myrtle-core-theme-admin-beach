@extends('admin::index')

@section('page-title')
    Addresses
@endsection

@section('page-description')
    Settings
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-settings'] ) }}
    <a class="btn btn-danger" href="{{ url()->previous() }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {{ Form::open(['route' => ['admin.docks.settings.update', $dock->name], 'method' => 'PUT', 'id' => 'edit-settings']) }}

    <div class="form-group{{ $errors->has('primary_address_type_id') ? ' has-danger' : '' }}">
        {!! Form::label('primary_address_type_id', 'Primary Address Type') !!}
        {!! Form::select('primary_address_type_id', $types, null, ['class' => 'form-control select2']) !!}

        {!! $errors->first('primary_address_type_id', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {{ Form::close() }}
@endsection