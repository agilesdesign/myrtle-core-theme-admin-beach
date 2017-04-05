@extends('admin::index')

@section('page-title')
    Business Types
@endsection

@section('toolbar')
    @can('create', $policytype)
        <a class="btn btn-success" href="{{ route('admin.businesstypes.create') }}">
            <i class="fa fa-fw fa-plus"></i>
            New
        </a>
    @endcan
@endsection

@section('content')
    <ul class="list-group clearfix">
        @foreach($businesstypes as $businesstype)
            <li class="businesstype list-group-item">
                {{ $businesstype->name }}
                <span class="pull-right">
                    <a href="{{ route('admin.businesstypes.edit', $businesstype->id) }}" class="edit hidden-md hidden-lg">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
@endsection


@section('pagination')
    {{ $businesstypes->links() }}
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.businesstype').hover(
                    function(){
                        $(this).find('.edit').toggleClass('hidden-md').toggleClass('hidden-lg');
                    },
                    function(){
                        $(this).find('.edit').toggleClass('hidden-md').toggleClass('hidden-lg');
                    }
            );
        });
    </script>
@endsection