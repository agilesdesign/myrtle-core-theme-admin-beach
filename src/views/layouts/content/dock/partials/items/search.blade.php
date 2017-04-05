{{ Form::open(['method' => 'GET', 'role' => 'search', 'class' => 'form-inline']) }}
    {{ Form::input('search', 'search', Request::get('search'), ['class' => 'form-control boxed rounded-s', 'placeholder' => 'Search']) }}
    @yield('filters')
    <div class="btn-group">
        {{ Form::button('<i class="fa fa-fw fa-search"></i>', ['class' => 'btn btn-secondary mb-0', 'type' => 'submit'] ) }}
        <a href="{{ route('admin.' . $dock->name . '.index') }}" class="btn btn-secondary mb-0">
            Clear
        </a>
    </div>
{{ Form::close() }}