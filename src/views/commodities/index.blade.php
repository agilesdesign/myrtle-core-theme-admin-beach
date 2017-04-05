@extends('admin::index')

@section('page-title')
    Commodities
@endsection

@section('search')
    {{ Form::open(['method' => 'GET', 'role' => 'search', 'class' => 'form-inline']) }}
    {{ Form::input('search', 'search', Request::get('search'), ['class' => 'form-control boxed rounded-s', 'placeholder' => 'Search']) }}
    <div class="btn-group">
        {{ Form::button('<i class="fa fa-fw fa-search"></i>', ['class' => 'btn btn-secondary mb-0', 'type' => 'submit'] ) }}
        <a href="{{ route('admin.' . $dock->name . '.index') }}" class="btn btn-secondary mb-0">
            Clear
        </a>
    </div>
    {{ Form::close() }}
@endsection

@section('toolbar')
    <a class="btn btn-outline-success" href="{{ route('admin.commodities.create') }}"><i class="fa fa-fw fa-plus"></i> New</a>
    @can('seed', \Myrtle\Commodities\Models\Commodity::class)
        <a href="{{ route('admin.docks.commodities.seed.create') }}" class="btn btn-outline-info">
            Seed
        </a>
    @endcan
@endsection

@section('dock')
    <ul class="list-group clearfix">
        @foreach($commodities as $commodity)
            <li class="commodity list-group-item">
                {{ $commodity->name }}
                <span class="pull-right">
                    <a href="{{ route('admin.commodities.edit', $commodity->id) }}" class="edit hidden-sm-up">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $commodities->appends(\Request::except('page'))->render() }}
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.commodity').hover(
                    function(){
                        $(this).find('.edit').toggleClass('hidden-sm-up');
                    },
                    function(){
                        $(this).find('.edit').toggleClass('hidden-sm-up');
                    }
            );
        });
    </script>
@endpush