@extends('admin::index')

@section('page-title')
    {{ $vendor->legal_name }}
@endsection

@section('page-description')
    Create Location
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-vendor-location'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.vendors.locations.index', $vendor->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {{ Form::model($location, ['route' => ['admin.vendors.locations.store', $vendor->id], 'id' => 'create-vendor-location']) }}

    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', $location->name, ['class' => 'form-control']) }}

        {!! $errors->first('name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {{ Form::close() }}
@endsection