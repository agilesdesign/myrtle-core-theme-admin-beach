@extends('admin::index')

@section('page-title')
    Credentials
@endsection

@section('toolbar')
    @can('create', $policytype)
        <a id="test" class="btn btn-success" href="{{ route('admin.credentials.create') }}">
            <i class="fa fa-fw fa-plus"></i>
        </a>
    @endcan
    @can('credentials.admin')
        <a class="btn btn-secondary" href="{{ route('admin.docks.permissions.edit', $dock->name) }}" data-toggle="tooltip" data-placement="bottom" title="Permissions">
            <i class="fa fa-fw fa-lock"></i>
        </a>
    @endcan
@endsection

@section('breadcrumbs')
    <span class="breadcrumb-item active">Credentials</span>
@endsection

@section('dock')
    <ul class="list-group">
    @foreach($credentials as $credential)
        <li class="list-group-item credential">
            @can('update', $credential)
                <div class="pull-right">
                    <a href="{{ route('admin.credentials.edit', $credential->id) }}" class="edit hidden-md hidden-lg">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </div>
            @endcan
            <h4 class="page-header">
                {{ $credential->name }}
                <small class="text-muted">
                    <i class="fa fa-fw fa-at"></i>
                    {{ $credential->location }}
                </small>
            </h4>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-fw fa-user"></i>
                </div>
                <input type="text" value="{{ $credential->username }}" class="form-control" readonly="readonly">
            </div>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-fw fa-lock"></i>
                </div>
                <input type="password" class="form-control revealable" value="{{ $credential->password }}" readonly="readonly">
            </div>
        </li>
    @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $credentials->links() }}
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.credential').hover(
                    function(){
                        $(this).find('.edit').toggleClass('hidden-md').toggleClass('hidden-lg');
                    },
                    function(){
                        $(this).find('.edit').toggleClass('hidden-md').toggleClass('hidden-lg');
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