@extends('admin::index')

@section('page-title')
    Edit Location
    <small class="pull-right">
        {{ $vendor->name->legal }}
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-vendor-location'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.locations.show', [$vendor->id, $location->id]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {{ Form::model($location, ['route' => ['admin.vendors.locations.update', $vendor->id, $location->id], 'method' => 'PUT', 'id' => 'edit-vendor-location']) }}

    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', $location->name, ['class' => 'form-control']) }}

        {!! $errors->first('name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {{ Form::close() }}
@endsection