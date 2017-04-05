@if(Route::has('admin.organizations.index'))
    @can('organization.access.admin')
        <li>
            <a href="{{ route('admin.organizations.index') }}">
                Organization
            </a>
        </li>
    @endcan
@endif