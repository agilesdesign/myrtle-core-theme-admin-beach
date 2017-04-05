@extends('admin::index')

@section('page-title')
    Establishment Types
@endsection

@section('toolbar')
    @can('create', $policytype)
        <a class="btn btn-outline-success" href="{{ route('admin.establishments.types.create') }}">
            <i class="fa fa-fw fa-plus"></i>
            New
        </a>
    @endcan
    @can('seed', \Myrtle\Establishments\Models\EstablishmentType::class)
        <a href="{{ route('admin.docks.establishments.types.seed.create') }}" class="btn btn-outline-info">
            Seed
        </a>
    @endcan
@endsection

@section('dock')
    <ul class="list-group clearfix">
        @foreach($establishmenttypes as $establishmenttype)
            <li class="establishmenttype list-group-item">
                {{ $establishmenttype->name }}
                <span class="pull-right">
                    <a href="{{ route('admin.establishments.types.edit', $establishmenttype->id) }}" class="edit hidden-sm-up">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
@endsection


@section('pagination')
    {{ $establishmenttypes->links() }}
@endsection

@push('scripts')
<script>
    $(function() {
        $('.establishmenttype').hover(
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