@extends('admin::index')

@section('page-title')
    Genders
@endsection

@section('toolbar')
    <a class="btn btn-outline-success" href="{{ route('admin.genders.create') }}">
        <i class="fa fa-fw fa-plus"></i>
        New
    </a>
    @can('seed', \Myrtle\Genders\Models\Gender::class)
        <a href="{{ route('admin.docks.genders.seed.create') }}" class="btn btn-outline-info">
            Seed
        </a>
    @endcan
@endsection

@section('dock')
    <ul class="list-group clearfix">
        @foreach($genders as $gender)
            <li class="gender list-group-item">
                {{ $gender->name }}
                <span class="pull-right">
                    <a href="{{ route('admin.genders.edit', $gender->id) }}" class="edit hidden-sm-up">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $genders->links() }}
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.gender').hover(
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