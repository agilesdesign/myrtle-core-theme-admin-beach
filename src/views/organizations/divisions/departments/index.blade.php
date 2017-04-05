@extends('admin::index')

@section('page-title')
    Departments
    <span class="h4 pull-right">
        <a href="{{ route('admin.organizations.show', $organization->id) }}">
            {{ $organization->name }}
        </a>
        /
        <a href="{{ route('admin.organizations.divisions.show', [$organization->id, $division->id]) }}">
            {{ $division->name }}
        </a>
    </span>
@endsection

{{--todo: Check Gate for button permissions--}}
@section('toolbar')
    <a class="btn btn-success btn-sm" href="{{ route('admin.organizations.divisions.departments.create', [$organization->id, $division->id]) }}">
        <i class="fa fa-fw fa-plus"></i>
        New
    </a>
    {{--<a class="btn btn-secondary btn-sm" href="{{ route('admin.organizations.settings.edit') }}">--}}
        {{--<i class="fa fa-fw fa-gears"></i>--}}
        {{--Settings--}}
    {{--</a>--}}
@endsection

@section('content')
    <ul class="list-group departments">
        @foreach($departments->sortBy('name') as $department)
            <li class="list-group-item division">
                <h5 class="card-text">
                    <a href="{{ route('admin.organizations.divisions.departments.show', [$organization->id, $division->id, $department->id]) }}">
                        {{ $division->name }}
                    </a>
                </h5>
                <span>
                    Teams:
                    <span class="tag tag-default">
                        <?php echo $department->teams ? $department->teams->count() : 0; ?>
                    </span>
                </span>
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $departments->links() }}
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