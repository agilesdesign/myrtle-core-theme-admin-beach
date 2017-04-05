@if(Route::has('admin.system.information.view') || Route::has('admin.docks.permissions.edit', 'system'))
    @if(Gate::allows('system.admin') || Gate::allows('information', \Myrtle\System\Policies\SystemPolicy::class))
        <a href="#" data-turbolinks="false" class="list-group-item" data-toggle="collapse" data-target="#sidebar-system-menu" data-parent="#sidebar-main-nav">
            System
            <i class="fa fa-fw fa-caret-down"></i>
        </a>
        <div id="sidebar-system-menu" class="collapse">
            @if(Route::has('admin.docks.permissions.edit', 'system'))
                @can('system.admin')
                    <a href="{{ route('admin.docks.permissions.edit', 'system') }}" class="list-group-item small pl-3">
                        Permissions
                    </a>
                @endcan
            @endif
            @if(Route::has('admin.system.information.index'))
                @can('information', \Myrtle\System\Policies\SystemPolicy::class)
                    <a href="{{ route('admin.system.information.index') }}" class="list-group-item small pl-3">
                        Information
                    </a>
                @endcan
            @endif
        </div>
    @endif
@endif