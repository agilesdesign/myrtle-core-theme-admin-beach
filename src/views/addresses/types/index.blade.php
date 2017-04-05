@extends('admin::index')

@section('page-title')
    Address Types
@endsection

@section('toolbar')
    @can('create', $policy)
        <a class="btn btn-outline-success" href="{{ route('admin.addresses.types.create') }}">
            <i class="fa fa-fw fa-plus"></i>
            New
        </a>
    @endcan
    @can('seed', $policy)
        <a href="{{ route('admin.docks.addresses.types.seed.create') }}" class="btn btn-outline-info">
            Seed
        </a>
    @endcan
@endsection

@section('dock')
    <ul class="list-group clearfix">
        @foreach($types as $type)
            <li class="type list-group-item">
                {{ $type->name }}
                @can('edit', $type)
                    <span class="pull-right">
                        <a href="{{ route('admin.addresses.types.edit', $type->id) }}" class="edit hidden-sm-up">
                            <i class="fa fa-fw fa-pencil"></i>
                        </a>
                    </span>
                @endcan
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $types->links() }}
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.type').hover(
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