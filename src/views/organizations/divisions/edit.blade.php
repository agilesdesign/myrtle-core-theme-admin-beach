@extends('admin::index')

@section('page-title')
    Edit Division
    <small class="pull-right">
        {{ $organization->name }}
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-organization-division'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.organizations.divisions.show', [$organization->id, $division->id]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {{ Form::model($division, ['route' => ['admin.organizations.divisions.update', $organization->id, $division->id], 'method' => 'PUT', 'id' => 'edit-organization-division']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', $division->name, ['class' => 'form-control']) }}
    </div>

    {{ Form::close() }}
@endsection