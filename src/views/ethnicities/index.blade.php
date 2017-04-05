@extends('admin::index')

@section('page-title')
    Ethnicities
@endsection

@section('toolbar')
    @can('create', $policytype)
        <a class="btn btn-outline-success" href="{{ route('admin.ethnicities.create') }}">
            <i class="fa fa-fw fa-plus"></i>
            New
        </a>
    @endcan
@endsection

@section('dock')
    <ul class="list-group clearfix">
        @foreach($ethnicities as $ethnicity)
            <li class="ethnicity list-group-item">
                {{ $ethnicity->name }}
                <span class="pull-right">
                    <a href="{{ route('admin.ethnicities.edit', $ethnicity->id) }}" class="edit hidden-md hidden-lg">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
@endsection


@section('pagination')
    {{ $ethnicities->links() }}
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.ethnicity').hover(
                    function(){
                        $(this).find('.edit').toggleClass('hidden-md').toggleClass('hidden-lg');
                    },
                    function(){
                        $(this).find('.edit').toggleClass('hidden-md').toggleClass('hidden-lg');
                    }
            );
        });
    </script>
@endsection