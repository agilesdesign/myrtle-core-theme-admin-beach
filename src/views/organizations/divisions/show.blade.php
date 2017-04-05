@extends('admin::index')

@section('page-title')
    {{ $division->name }}
    <small class="text-muted">
        Division
    </small>
    <small class="pull-right">
        <a href="{{ route('admin.organizations.show', $organization->id) }}">
            {{ $organization->name }}
        </a>
    </small>
@endsection

@section('toolbar')
    <a class="btn btn-secondary" href="{{ route('admin.organizations.divisions.edit', [$organization->id, $division->id]) }}"><i class="fa fa-fw fa-pencil"></i> Edit</a>
@endsection

@section('content')

    <div class="departments mb-1">
        <h4>
            Departments
            <small>
                <a href="{{ route('admin.organizations.divisions.departments.create', [$organization->id, $division->id]) }}">
                    <i class="fa fa-fw fa-plus"></i>
                </a>
            </small>
            <small class="pull-right">
                <a href="{{ route('admin.organizations.divisions.departments.index', [$organization->id, $division->id]) }}">
                    View All
                </a>
            </small>
        </h4>
        <div class="row">
            <div class="departments">
                @if($division->departments)
                    @foreach($division->departments->sortBy('name') as $department)
                        <div class="col-xs-6">
                            <div class="card card-outline-primary department">
                                <div class="card-block">
                                    <a href="{{ route('admin.organizations.divisions.departments.show', [$organization->id, $division->id, $department->id]) }}">
                                        {{ $department->name }}
                                    </a>
                                    <span class="pull-right">
                                    <span>
                                        Teams:
                                        <span class="tag tag-default">
                                            <?php echo $department->teams ? $department->teams->count() : 0; ?>
                                        </span>
                                    </span>
                                </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card card-outline-secondary">
                        <div class="card-block">
                            <p class="card-text">No departments added to this division</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection