@if(Route::has('admin.credentials.index'))
    @can('credentials.access.admin')
        <a href="{{ route('admin.credentials.index') }}" class="list-group-item">
            Credentials
        </a>
    @endcan
@endif