@if(Route::has('admin.docks.index'))
    @can('view', Myrtle\Docks\Policies\DocksDockPolicy::class)
        <a href="{{ route('admin.docks.index') }}" class="list-group-item">
            Docks Manager
        </a>
    @endcan
@endif