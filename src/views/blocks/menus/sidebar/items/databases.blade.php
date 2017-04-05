@if(Route::has('admin.databases.connections.index'))
    @can('databases.access.admin')
        <a data-turbolinks="false" href="#" class="list-group-item" data-toggle="collapse" data-target="#sidebar-databases-menu" data-parent="#sidebar-main-nav">
            Databases
            <i class="fa fa-fw fa-caret-down"></i>
        </a>
        <div id="sidebar-databases-menu" class="collapse">
            @if(Route::has('admin.databases.connections.index'))
                <a href="{{ route('admin.databases.connections.index') }}" class="list-group-item small pl-3">Connections</a>
            @endif
            @if(Route::has('admin.databases.system.migrations.index'))
                    <a href="{{ route('admin.databases.system.migrations.index') }}" class="list-group-item small pl-3">Migrations</a>
            @endif
                @if(Route::has('admin.databases.system.tables.index'))
                    <a href="{{ route('admin.databases.system.tables.index') }}" class="list-group-item small pl-3">Tables</a>
                @endif
        </div>
    @endcan
@endif