@if(Route::has('admin.addresses.types.index')
    || Route::has('admin.establishments.types.index')
    || Route::has('admin.commodities.index')
    || Route::has('admin.ethnicities.index')
    || Route::has('admin.genders.index')
    || Route::has('admin.maritalstatuses.index')
    || Route::has('admin.phones.types.index')
    || Route::has('admin.religions.index'))
    @if(Gate::allows('addresses.admin')
    || Gate::allows('businesstypes.admin')
    || Gate::allows('commodities.admin')
    || Gate::allows('ethnicities.admin')
    || Gate::allows('genders.admin')
    || Gate::allows('maritalstatuses.admin')
    || Gate::allows('phones.admin')
    || Gate::allows('religions.admin'))
        <a href="#" data-turbolinks="false" class="list-group-item" data-toggle="collapse" data-target="#sidebar-definitions-menu" data-parent="#sidebar-main-nav">
            Definitions
            <i class="fa fa-fw fa-caret-down"></i>
        </a>
        <div id="sidebar-definitions-menu" class="collapse">
            @if(Route::has('admin.addresses.types.index'))
                @can('addresses.admin')
                    <a href="{{ route('admin.addresses.types.index') }}" class="list-group-item pl-3 small">Address Types</a>
                @endcan
            @endif
            @if(Route::has('admin.commodities.index'))
                @can('commodities.admin')
                    <a href="{{ route('admin.commodities.index') }}" class="list-group-item pl-3 small">Commodities</a>
                @endcan
            @endif
            @if(Route::has('admin.establishments.types.index'))
                @can('establishments.types.admin')
                    <a href="{{ route('admin.establishments.types.index') }}" class="list-group-item pl-3 small">Establishment Types</a>
                @endcan
            @endif
            @if(Route::has('admin.ethnicities.index'))
                @can('ethnicities.admin')
                    <a href="{{ route('admin.ethnicities.index') }}" class="list-group-item pl-3 small">Ethnicities</a>
                @endcan
            @endif
            @if(Route::has('admin.genders.index'))
                @can('genders.admin')
                    <a href="{{ route('admin.genders.index') }}" class="list-group-item pl-3 small">Genders</a>
                @endcan
            @endif
            @if(Route::has('admin.maritalstatuses.index'))
                @can('maritalstatuses.admin')
                    <a href="{{ route('admin.maritalstatuses.index') }}" class="list-group-item pl-3 small">Marital Statuses</a>
                @endcan
            @endif
            @if(Route::has('admin.phones.types.index'))
                @can('phones.admin')
                    <a href="{{ route('admin.phones.types.index') }}" class="list-group-item pl-3 small">Phone Types</a>
                @endcan
            @endif
            @if(Route::has('admin.religions.index'))
                @can('religions.admin')
                    <a href="{{ route('admin.religions.index') }}" class="list-group-item pl-3 small">Religions</a>
                @endcan
            @endif
        </div>
    @endif
@endif