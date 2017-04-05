@if(Route::has('admin.routes.index'))
    @can('routes.access.admin')
        <a href="{{ route('admin.routes.index') }}" class="list-group-item">
            Routes
        </a>
    @endcan
@endif