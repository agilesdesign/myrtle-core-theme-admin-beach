@extends('admin::index')

@section('page-title')
    Database Connections
@endsection

@section('toolbar')
    @can('create', $policytype)
        <a class="btn btn-success btn-sm" href="{{ route('admin.databases.connections.create') }}">
            <i class="fa fa-fw fa-plus"></i>
            New
        </a>
    @endcan
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item active">Database Connections</span>
@endsection

@section('content')
    <ul class="list-group">
    @foreach($databaseconnections as $databaseconnection)
        <li class="list-group-item user">
            @can('update', $databaseconnection)
                <div class="pull-right actions hidden-sm-up">
                    <a href="{{ route('admin.databases.connections.edit', $databaseconnection->id) }}" class="edit">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </div>
            @endcan
            <div>
                {{ $databaseconnection->name }}
            </div>
        </li>
    @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $databaseconnections->links() }}
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.user').hover(
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                    },
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                    }
            );

            $('input.revealable[type="password"]').hover(
                    function() {
                        $(this)
                                .attr('type', 'text');
                    },
                    function() {
                        $(this)
                                .attr('type', 'password');
                    }
            );
        });
    </script>
@endsection