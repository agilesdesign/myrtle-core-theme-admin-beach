@extends('admin::layouts.content.dock.partials.items')

@section('page-title')
    Users
@endsection

@section('page-description')
    {{ $dock->description }}
@endsection

@section('search')
    {{ Form::open(['method' => 'GET', 'role' => 'search', 'class' => 'form-inline']) }}
    {{ Form::input('search', 'search', Request::get('search'), ['class' => 'form-control boxed rounded-s', 'placeholder' => 'Search']) }}
    {{ Form::select('biograph[gender_id]', $genders, Request::get('biograph')['gender_id'], ['class' => 'form-control', 'placeholder' => 'Filter Gender']) }}
    {{ Form::select('roles[]', $roles, Request::get('roles'), ['class' => 'form-control', 'placeholder' => 'Filter Role']) }}
    <div class="btn-group">
        {{ Form::button('<i class="fa fa-fw fa-search"></i>', ['class' => 'btn btn-secondary mb-0', 'type' => 'submit'] ) }}
        <a href="{{ route('admin.' . $dock->name . '.index') }}" class="btn btn-secondary mb-0">
            Clear
        </a>
    </div>
    {{ Form::close() }}
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item active">Users</span>
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

@section('items')
    <table class="table table-hover table-outline mb-0 hidden-sm-down">
        <thead class="thead-default">
        <tr>
            {{--<th class="text-xs-center">--}}
            {{--<i class="fa fa-fw fa-users"></i>--}}
            {{--</th>--}}
            <th>User</th>
            <th>Created</th>
            <th class="text-xs-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                {{--<td class="text-xs-center">--}}
                {{--<div class="avatar">--}}
                {{--<img src="" class="img-avatar" alt="admin@bootstrapmaster.com">--}}
                {{--<span class="avatar-status tag-success"></span>--}}
                {{--</div>--}}
                {{--</td>--}}
                <td>
                    <a href="{{ route('admin.users.show', $user) }}">
                        {{ $user->name->firstLast }}
                    </a>
                    <div class="small text-muted">
                        @foreach($user->roles as $role)
                            <span class="tag tag-xs tag-primary">{{ $role->name }}</span>
                        @endforeach
                    </div>
                </td>
                <td>
                    {{ $user->created_at->diffForHumans() }}
                </td>
                <td class="text-xs-right">
                    <div class="btn-group btn-group-sm">
                        @can('activate', $user)
                            @if(! $user->disabled_at)
                                {!! Form::open(['route' => ['admin.users.disable', $user], 'class' => 'hidden-xs-up', 'id' => 'user-' . $user->id . '-disable', 'method' => 'PATCH']) !!}
                                {!! Form::close() !!}
                                {{ Form::button('<i class="fa fa-fw fa-check"></i>', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'user-' . $user->id . '-disable'] ) }}
                            @else
                                {!! Form::open(['route' => ['admin.users.enable', $user], 'class' => 'hidden-xs-up', 'id' => 'user-' . $user->id . '-enable', 'method' => 'PATCH']) !!}
                                {!! Form::close() !!}
                                {{ Form::button('<i class="fa fa-fw fa-times"></i>', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'user-' . $user->id . '-enable'] ) }}
                            @endif
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('pagination')
    {{ $users->appends(\Request::except('page'))->render() }}
@endsection