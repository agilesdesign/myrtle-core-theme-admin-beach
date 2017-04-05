@extends('admin::index')

@section('page-title')
    {{ $department->name }}
    <small class="text-muted">
        Department
    </small>
    <small class="pull-right">
        <a href="{{ route('admin.organizations.show', $organization->id) }}">
            {{ $organization->name }}
        </a>
        /
        <a href="{{ route('admin.organizations.divisions.show', [$organization->id, $division->id]) }}">
            {{ $division->name }}
        </a>
    </small>
@endsection

@section('toolbar')
    <a class="btn btn-secondary" href="{{ route('admin.organizations.divisions.departments.edit', [$organization->id, $division->id, $department->id]) }}">
        <i class="fa fa-fw fa-pencil"></i>
        Edit
    </a>
@endsection

@section('content')
    <div class="teams mb-1">
        <h4>
            Teams
            <small class="pull-right">
                <a href="{{ route('admin.organizations.divisions.departments.teams.index', [$organization->id, $division->id, $department->id]) }}">
                    View All
                </a>
            </small>
        </h4>
        <div class="row teams">
            @if($department->teams)
                @foreach($department->teams->sortBy('name') as $team)
                    <div class="col-xs-6">
                        <div class="card card-outline-primary team">
                            <div class="card-block">
                                <h5>
                                    <a href="{{ route('admin.organizations.divisions.departments.teams.show', [$organization->id, $division->id, $department->id, $team->id]) }}">
                                        {{ $team->name }}
                                    </a>
                                    <small class="pull-right hidden-sm-up actions">
                                        <a href="{{ route('admin.organizations.divisions.departments.teams.edit', [$organization->id, $division->id, $department->id, $team->id]) }}">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                    </small>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-xs-12">
                    <div class="card card-outline-primary">
                        <div class="card-block">
                            <p class="card-text">No teams added to this department</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.team').hover(
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                        console.log($(this));
                    },
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                    }
            );
        });
    </script>
@endsection