@if(Route::has('admin.roles.index'))
    @can('roles.admin')
        <a href="{{ route('admin.roles.index') }}" class="list-group-item">
            Roles
        </a>
    @endcan
@endif