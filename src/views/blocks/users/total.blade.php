<div class="col-xs-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Total Users</h4>
        </div>
        <div class="card-block">
            <h1 class="card-text text-sm-right">
                @can('list', Myrtle\Users\Policies\UserPolicy::class)
                <a href="{{ route('admin.users.index') }}" class="card-link">
                    {{ $registered }}
                </a>
                @else
                    {{ $registered }}
                @endcan
            </h1>
        </div>
    </div>
</div>