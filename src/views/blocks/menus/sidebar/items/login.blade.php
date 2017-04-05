@if(Route::has('login'))
    @can('login', \App\Policies\AuthenticationPolicy::class)
        <a href="{{ route('login') }}" class="list-group-item">
            Login
        </a>
    @endcan
@endif