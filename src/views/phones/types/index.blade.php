@extends('admin::index')

@section('page-title')
    Phone Types
@endsection

@section('toolbar')
    @can('create', \Myrtle\Phones\Models\PhoneType::class)
        <a class="btn btn-outline-success" href="{{ route('admin.phones.types.create') }}">
            <i class="fa fa-fw fa-plus"></i>
            New
        </a>
    @endcan
    @can('seed', \Myrtle\Phones\Models\PhoneType::class)
        <a href="{{ route('admin.docks.phones.types.seed.create') }}" class="btn btn-outline-info">
            Seed
        </a>
    @endcan
@endsection

@section('dock')
    <ul class="list-group clearfix">
        @foreach($phonetypes as $phonetype)
            <li class="phonetype list-group-item">
                {{ $phonetype->name }}
                <span class="pull-right">
                    <a href="{{ route('admin.phones.types.edit', $phonetype->id) }}" class="edit hidden-sm-up">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $phonetypes->links() }}
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.phonetype').hover(
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