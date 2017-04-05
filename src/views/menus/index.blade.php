@extends('admin::index')

@section('page-title')
    Menus
@endsection

@section('toolbar-list')
    @can('create', 'test')
        <li class="nav-item">
            <a class="btn btn-success btn-sm" href="{{ route('admin.menus.create') }}">
                <i class="fa fa-fw fa-plus"></i>
                New
            </a>
        </li>
    @endcan
@endsection

@section('content')
    <ul class="list-group">
    @foreach($menus as $menu)
        <li class="list-group-item menu">
            @can('update', $menu)
                <div class="pull-right">
                    <a href="{{ route('admin.menus.edit', $menu->id) }}" class="edit hidden-md hidden-lg">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </div>
            @endcan
            <a href="{{ route('admin.menus.items.index', $menu->id) }}">
                {{ $menu->name }}
            </a>
        </li>
    @endforeach
    </ul>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.menu').hover(
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