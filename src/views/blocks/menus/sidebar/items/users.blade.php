@if(Route::has('admin.dashboards.users') || Route::has('admin.users.index'))
    @can('users.access.admin')
        <a href="#" data-turbolinks="false" class="list-group-item" data-toggle="collapse" data-target="#sidebar-users-menu" data-parent="sidebar-main-nav">
            Users
            <i class="fa fa-fw fa-caret-down"></i>
        </a>
        <div id="sidebar-users-menu" class="collapse">
            @if(Route::has('admin.users.create'))
                @can('create', \Myrtle\Users\Policies\UserPolicy::class)
                    <a href="{{ route('admin.users.create') }}" class="list-group-item pl-3 small">New</a>
                @endcan
            @endif
            @if(Route::has('admin.dashboards.users'))
                @can('dashboard', Myrtle\Users\Policies\UserPolicy::class)
                    <a href="{{ route('admin.dashboards.users') }}" class="list-group-item pl-3 small">Dashboard</a>
                @endcan
            @endif
            @if(Route::has('admin.users.index'))
                <a href="{{ route('admin.users.index') }}" class="list-group-item pl-3 small">List</a>
            @endif
        </div>
    @endcan
@endif