@extends('admin::index')

@section('page-title')
    Marital Status
@endsection

@section('toolbar')
    @can('create', $policytype)
        <a class="btn btn-outline-success" href="{{ route('admin.maritalstatuses.create') }}">
            <i class="fa fa-fw fa-plus"></i>
            New
        </a>
    @endcan
    @can('seed', \Myrtle\MaritalStatuses\Policies\MaritalStatusPolicy::class)
        <a href="{{ route('admin.docks.maritalstatuses.seed.create') }}" class="btn btn-outline-info">
            Seed
        </a>
    @endcan
@endsection

@section('dock')
    <ul class="list-group clearfix">
        @foreach($maritalstatuses as $maritalstatus)
            <li class="maritalstatus list-group-item">
                {{ $maritalstatus->name }}
                <span class="pull-right">
                    <a href="{{ route('admin.maritalstatuses.edit', $maritalstatus->id) }}" class="edit hidden-sm-up">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $maritalstatuses->links() }}
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.maritalstatus').hover(
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