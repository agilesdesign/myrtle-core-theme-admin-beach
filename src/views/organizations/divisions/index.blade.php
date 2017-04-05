@extends('admin::index')

@section('page-title')
    Divisions
    <small class="pull-right">
        <a href="{{ route('admin.organizations.show', $organization->id) }}">
            {{ $organization->name }}
        </a>
    </small>
@endsection

{{--todo: Check Gate for button permissions--}}
@section('toolbar')
    <a class="btn btn-success" href="{{ route('admin.organizations.divisions.create', $organization->id) }}">
        <i class="fa fa-fw fa-plus"></i>
        New
    </a>
    {{--<a class="btn btn-secondary" href="{{ route('admin.organizations.settings.edit') }}">--}}
        {{--<i class="fa fa-fw fa-gears"></i>--}}
        {{--Settings--}}
    {{--</a>--}}
@endsection

@section('content')
    <ul class="list-group divisions">
        @foreach($divisions->sortBy('name') as $division)
            <li class="list-group-item division">
                <div class="pull-right actions hidden-sm-up">
                    <a href="{{ route('admin.organizations.divisions.edit', [$organization->id, $division->id]) }}" class="edit">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </div>
                <h5 class="card-text">
                    <a href="{{ route('admin.organizations.divisions.show', [$organization->id, $division->id]) }}">
                        {{ $division->name }}
                    </a>
                </h5>
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
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $divisions->links() }}
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.division').hover(
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