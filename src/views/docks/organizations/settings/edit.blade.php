@extends('admin::index')

@section('page-title')
    Organizations
@endsection

@section('page-description')
    Settings
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-settings'] ) }}
    <a class="btn btn-danger" href="{{ url()->previous() }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {{ Form::open(['route' => ['admin.docks.settings.update', $dock->name], 'method' => 'PUT', 'id' => 'edit-settings']) }}

    <div class="form-group{{ $errors->has('primary_address_type_id') ? ' has-danger' : '' }}">
        {!! Form::label('primary_address_type_id', 'Primary Address Type') !!}
        {!! Form::select('primary_address_type_id', $addresstypes, $dock->get('primary_address_type_id'), ['class' => 'form-control select2']) !!}

        {!! $errors->first('primary_address_type_id', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('primary_phone_type_id_priority_list') ? ' has-danger' : '' }}">
        {{ Form::label('primary_phone_type_id_priority_list', 'Select Phone type order', ['class' => 'control-label']) }}
        {{ Form::select('primary_phone_type_id_priority_list[]', $phonetypes, $dock->get('primary_phone_type_id_priority_list'), ['class' => 'form-control select2', 'multiple' => 'multiple']) }}

        {!! $errors->first('primary_phone_type_id_priority_list', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group{{ $errors->has('max_members') ? ' has-danger' : '' }}">
        {{ Form::label('max_members', 'Max number of members per', ['class' => 'control-label']) }}
        {{ Form::select('max_members', [0 => 'Unlimited', 5 => '5', 10 => '10', 15 => '15', 30 => '30', 60 => '60', 90 => '90', 120 => '120'], $dock->get('max_members'), ['class' => 'select2 form-control']) }}

        {!! $errors->first('max_members', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {{ Form::close() }}
@endsection