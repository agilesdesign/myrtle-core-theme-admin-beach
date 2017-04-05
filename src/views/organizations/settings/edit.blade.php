@extends('admin::index')

@section('page-title')
    Edit Settings
    <small class="pull-right">
        {{ $organization->name }}
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-organization-settings'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.organizations.show', $organization->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {{ Form::model($settings, ['route' => ['admin.organizations.settings.update', $organization->id], 'method' => 'PUT', 'id' => 'edit-organization-settings']) }}

    <div class="form-group">
        {{ Form::label('primary_location_id', 'Name', ['class' => 'control-label']) }}
        {{ Form::select('primary_location_id', $locations, $settings->options['primary_location_id'] ?? null, ['class' => 'form-control select2', 'placeholder' => 'Select primary location']) }}
    </div>

    {{ Form::close() }}
@endsection