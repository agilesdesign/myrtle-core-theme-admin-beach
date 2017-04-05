@if(Route::has('admin.vendors.index'))
    @can('vendors.access.admin')
        <a href="{{ route('admin.vendors.index') }}" class="list-group-item">
            Vendors
        </a>
    @endcan
@endif