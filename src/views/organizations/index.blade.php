@extends('admin::index')

@section('page-title')
    Organizations
@endsection

@section('toolbar')
    @can('create', $policytype)
        <a class="btn btn-success" href="{{ route('admin.organizations.create') }}">
            <i class="fa fa-fw fa-plus"></i>
            New
        </a>
    @endcan
    <a class="btn btn-secondary" href="{{ route('admin.docks.settings.edit', $dock->name) }}">
        <i class="fa fa-fw fa-gears"></i>
        Settings
    </a>
    <a class="btn btn-secondary" href="{{ route('admin.docks.permissions.edit', $dock->name) }}">
        <i class="fa fa-fw fa-lock"></i>
        Permissions
    </a>
@endsection

@section('content')
    <ul class="list-group">
        @foreach($organizations as $organization)
            <li class="list-group-item organization">
                <div class="pull-right actions hidden-sm-up">
                    <a href="{{ route('admin.organizations.edit', $organization->id) }}" class="edit">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </div>
                <h5>
                    <a href="{{ route('admin.organizations.show', $organization->id) }}">
                        {{ $organization->name }}
                    </a>
                </h5>
                @if($organization->primaryLocation || $organization->primaryPhone)
                    <address>
                        @if($organization->primaryAddress)
                                <strong>{{ $organization->primaryAddress->type->name }}</strong><br>
                                {{ $organization->primaryAddress->street }}<br>
                                {{ $organization->primaryAddress->city }}, {{ $organization->primaryAddress->state }} {{ $organization->primaryAddress->zip }}<br>
                        @endif
                        @if($organization->primaryPhone)
                            <abbr title="Phone">P:</abbr> {{$organization->primaryPhone->number}} <br>
                        @endif
                        {{--@foreach($organization->commodities as $commodity)--}}
                            {{--<span class="tag tag-default"> {{ $commodity->name }} </span>--}}
                        {{--@endforeach--}}
                    </address>
                @endif
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $organizations->links() }}
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.organization').hover(
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                    },
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                    }
            );
        });
    </script>
@endsection