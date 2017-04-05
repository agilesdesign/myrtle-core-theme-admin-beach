@extends('admin::index')

@section('page-title')
    Create Organization
@endsection

@section('toolbar-list')
    <li class="nav-item">
        {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-sm btn-success', 'type' => 'submit', 'form' => 'create-organization'] ) }}
    </li>
    <li class="nav-item">
        <a class="btn btn-sm btn-danger" href="{{ route('admin.organizations.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
    </li>
@endsection

@section('content')
    {{ Form::model($organization, ['route' => 'admin.organizations.store', 'id' => 'create-organization']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
        {{ Form::text('name', $organization->name, ['class' => 'form-control']) }}
    </div>

    {{ Form::close() }}
@endsection