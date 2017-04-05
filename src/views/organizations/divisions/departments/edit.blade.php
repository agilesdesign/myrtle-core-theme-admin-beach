@extends('admin::index')

@section('page-title')
    Edit Department
    <small class="pull-right">
        {{ $organization->name }} / {{ $division->name }}
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'edit-organization-division-department'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.organizations.divisions.departments.show', [$organization->id, $division->id, $department->id]) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {{ Form::model($department, ['route' => ['admin.organizations.divisions.departments.update', $organization->id, $division->id, $department->id], 'method' => 'PUT', 'id' => 'edit-organization-division-department']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', $department->name, ['class' => 'form-control']) }}
    </div>

    {{ Form::close() }}
@endsection