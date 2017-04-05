@if(Route::has('admin.configurations.app.edit') || Route::has('admin.configurations.session.edit'))
    @can('any', Myrtle\Configurations\Policies\ConfigurationsDockPolicy::class)
        <a data-turbolinks="false" href="#" class="list-group-item" data-toggle="collapse" data-target="#sidebar-configurations-menu" data-parent="#sidebar-main-nav">
            Configuration
            <i class="fa fa-fw fa-caret-down"></i>
        </a>
        <div id="sidebar-configurations-menu" class="collapse">
            @if(Route::has('admin.configurations.app.edit'))
                @can('app', Myrtle\Configurations\Policies\ConfigurationsDockPolicy::class)
                    <a href="{{ route('admin.configurations.app.edit') }}" class="list-group-item small pl-3">Application</a>
                @endcan
            @endif
            @if(Route::has('admin.configurations.session.edit'))
                @can('session', Myrtle\Configurations\Policies\ConfigurationsDockPolicy::class)
                    <a href="{{ route('admin.configurations.session.edit') }}" class="list-group-item small pl-3">Session</a>
                @endcan
            @endif
        </div>
    @endcan
@endif