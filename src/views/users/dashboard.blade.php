@extends('admin::index')

@section('page-title')
    Users
    <small class="text-muted">
        Dashboard
    </small>
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.users.index') }}" class="breadcrumb-item">Users</a>
    <span class="breadcrumb-item active">Dashboard</span>
@endsection

@section('toolbar')
    @can('create', Myrtle\Users\Policies\UserPolicy::class)
        <a class="btn btn-outline-success" href="{{ route('admin.users.create') }}">
            <i class="fa fa-fw fa-plus"></i>
            New
        </a>
    @endcan
    @can('admin', Myrtle\Users\Policies\UserPolicy::class)
        <a class="btn btn-secondary" href="{{ route('admin.docks.permissions.edit', $dock->name) }}">
            <i class="fa fa-fw fa-shield"></i>
            Permissions
        </a>
        <a class="btn btn-secondary" href="{{ route('admin.docks.settings.edit', $dock->name) }}">
            <i class="fa fa-fw fa-gears"></i>
            Settings
        </a>
    @endcan
@endsection

@section('dock')
    <div class="row">
        @include('admin::blocks.users.online')
        @include('admin::blocks.users.total')
        @include('admin::blocks.users.registeredsince')
    </div>
@endsection