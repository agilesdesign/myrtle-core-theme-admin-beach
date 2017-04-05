@extends('admin::index')

@section('page-title')
    Settings
@endsection

@section('page-description')
    {{ $vendor->name->legal }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">{{ $vendor->name->legal }}</a>
    <span class="breadcrumb-item">Settings</span>
    <span class="breadcrumb-item active">Edit</span>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-vendor-settings'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.show', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {{ Form::model($vendor->settings, ['route' => ['admin.vendors.settings.update', $vendor->id], 'method' => 'PUT', 'id' => 'edit-vendor-settings']) }}

    <div class="form-group">
        {{ Form::label('primary_location_id', 'Primary Location', ['class' => 'control-label']) }}
        {{ Form::select('primary_location_id', $locations, $vendor->settings->options['primary_location_id'] ?? null, ['class' => 'form-control select2', 'placeholder' => 'Select primary location']) }}
    </div>

    {{ Form::close() }}
@endsection