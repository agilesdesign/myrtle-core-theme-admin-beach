@if(Route::has('logout'))
    @can('logout', \App\Policies\AuthenticationPolicy::class)
        <li>
            <a href="{{ route('logout') }}">
                Logout
            </a>
        </li>
    @endcan
@endif