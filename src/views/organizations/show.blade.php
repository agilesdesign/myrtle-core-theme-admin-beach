@extends('admin::index')

@section('page-title')
    {{$organization->name}}
@endsection

@section('toolbar')
    <a class="btn btn-secondary" href="{{ route('admin.organizations.edit', $organization->id) }}"><i class="fa fa-fw fa-pencil"></i> Edit</a>
    <a class="btn btn-secondary" href="{{ route('admin.organizations.settings.edit', $organization->id) }}"><i class="fa fa-fw fa-gears"></i> Settings</a>
@endsection

@section('content')
    <div class="mb-2">
        @foreach($organization->commodities as $commodity)
            <span class="tag tag-primary"> {{ $commodity->name }} </span>
        @endforeach
    </div>

    <div class="contact-information mb-1">
        <h4>
            Locations
            <small>
                <a href="{{ route('admin.organizations.locations.create', $organization->id) }}">
                    <i class="fa fa-fw fa-plus"></i>
                </a>
            </small>
            <small class="pull-right">
                <a href="{{ route('admin.organizations.locations.index', $organization->id) }}">
                    View All
                </a>
            </small>
        </h4>
        <div class="row organization-locations">
            @if(!$organization->locations->isEmpty())
                @foreach($organization->locations as $location)
                    <div class="organization-location col-xs-6">
                        <div class="card card-outline-primary">
                            <div class="card-block">
                                <h6 class="card-text">
                                    <a href="{{ route('admin.organizations.locations.show', [$organization->id, $location->id]) }}">
                                        {{ $location->name }}
                                    </a>
                                    <small class="pull-right hidden-sm-up actions">
                                        <a href="{{ route('admin.organizations.locations.edit', [$organization->id, $location->id]) }}">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                    </small>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-xs-12">
                    <div class="card card-outline-primary">
                        <div class="card-block">
                            <p class="card-text">No locations added to organization</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="mb-2">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a href="#organization-members" role="tab" data-toggle="tab" class="nav-link active">
                    Members
                    @if(!$organization->members->isEmpty())
                        <span class="tag tag-default">{{ $organization->members->count() }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a href="#organization-structure" role="tab" data-toggle="tab" class="nav-link">
                    Structure
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="organization-members">
                <ul class="list-group">
                    <a href="" class="btn btn-success btn-sm mb-1 mt-1"><i class="fa fa-fw fa-plus"></i> New</a>
                    @if(!$organization->members->isEmpty())
                        @foreach($organization->members as $member)
                            <li class="list-group-item">
                                <h5>
                                    <a href="{{ route('admin.organizations.members.show', [$organization->id, $member->id]) }}">
                                        {{ $member->name->firstLast }}
                                    </a>
                                    <small class="pull-right">
                                        <span class="label label-xs label-info">{{ $member->pivot->title }}</span>
                                    </small>
                                </h5>
                                @if($member->pivot->email)
                                    <h6><a href="mailto:{{ $member->pivot->email->address }}">{{ $member->pivot->email->address }}</a></h6>
                                @endif
                                @if($member->pivot->phone)
                                    <h6>{{ $member->pivot->phone->type->name }} <small>{{ $member->pivot->phone->number }}</small></h6>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="organization-structure">
                <div class="row organization-teams mt-1">
                    <div class="col-xs-12">
                        <h5>
                            Teams
                            <small>
                                <a href="{{ route('admin.organizations.teams.create', $organization->id) }}">
                                    <i class="fa fa-fw fa-plus"></i>
                                </a>
                            </small>
                            <small class="pull-right">
                                <a href="{{ route('admin.organizations.divisions.index', $organization->id) }}">
                                    View All
                                </a>
                            </small>
                        </h5>
                    </div>
                    @if(!$organization->teams->isEmpty())
                        @foreach($organization->teams as $team)
                            <div class="col-xs-6">
                                <div class="card card-outline-primary">
                                    <div class="card-block">
                                        {{ $team->name }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-xs-12">
                            <div class="card card-outline-primary">
                                <div class="card-block">
                                    <p class="card-text">No teams added to this organization</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row organization-divisions mt-1">
                    <div class="col-xs-12">
                        <h5>
                            Divisions
                            <small>
                                <a href="{{ route('admin.organizations.divisions.create', $organization->id) }}">
                                    <i class="fa fa-fw fa-plus"></i>
                                </a>
                            </small>
                            <small class="pull-right">
                                <a href="{{ route('admin.organizations.divisions.index', $organization->id) }}">
                                    View All
                                </a>
                            </small>
                        </h5>
                    </div>
                    @if(!$organization->divisions->isEmpty())
                        @foreach($organization->divisions as $division)
                            <div class="col-xs-6">
                                <div class="card card-outline-primary">
                                    <div class="card-block">
                                        <a href="{{ route('admin.organizations.divisions.show', [$organization->id, $division->id]) }}">
                                            {{ $division->name }}
                                        </a>
                                        <span class="pull-right">
                                            <span>
                                                Departments:
                                                <span class="tag tag-default">
                                                    <?php echo $division->departments ? $division->departments->count() : 0; ?>
                                                </span>
                                            </span>
                                                                    <span>
                                                Teams:
                                                <span class="tag tag-default">
                                                    <?php echo $division->teams ? $division->teams->count() : 0; ?>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-xs-12">
                            <div class="card card-outline-primary">
                                <div class="card-block">
                                    <p class="card-text">No departments added to this organization</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.organization-location').hover(
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