@extends('admin::index')

@section('page-title')
    Edit Location
    <small class="pull-right">
        {{ $organization->name }}
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-organization-location'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.organizations.locations.index', $organization->id) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {{ Form::model($location, ['route' => ['admin.organizations.locations.update', $organization->id, $location->id], 'method' => 'PUT', 'id' => 'edit-organization-location']) }}

    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', $location->name, ['class' => 'form-control']) }}

        {!! $errors->first('name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    {{ Form::close() }}
@endsection