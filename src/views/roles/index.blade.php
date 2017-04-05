@extends('admin::index')

@section('page-title')
    Roles
@endsection

@section('toolbar')
    <a class="btn btn-outline-success" href="{{ route('admin.roles.create') }}">
        <i class="fa fa-fw fa-plus"></i>
        New
    </a>
    @can('roles.admin')
        <a class="btn btn-secondary" href="{{ route('admin.docks.permissions.edit', $dock->name) }}" data-toggle="tooltip" data-placement="bottom" title="Permissions">
            <i class="fa fa-fw fa-lock"></i>
            Permissions
        </a>
    @endcan
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item active">Roles</span>
@endsection

@section('dock')
    <ul class="list-group clearfix">
        @foreach($roles as $role)
            <li class="role list-group-item">
                {{ $role->name }}
                <span class="pull-right">
                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="edit hidden-sm-up">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $roles->links() }}
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.role').hover(
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