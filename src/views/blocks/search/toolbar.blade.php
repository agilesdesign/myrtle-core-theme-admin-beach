{{ Form::open(['method' => 'GET', 'role' => 'search']) }}
    <label class="search">
        {{ Form::input('search', 'query', Request::get('query'), ['class' => 'search-input', 'placeholder' => 'Search..']) }}
        <i class="fa fa-search search-icon"></i>
    </label>
{{ Form::close() }}
