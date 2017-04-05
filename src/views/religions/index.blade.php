@extends('admin::index')

@section('page-title')
    Religions
@endsection

@section('toolbar')
    <a class="btn btn-outline-success" href="{{ route('admin.religions.create') }}">
        <i class="fa fa-fw fa-plus"></i>
        New
    </a>
@endsection

@section('dock')
    <ul class="list-group clearfix">
        @foreach($religions as $religion)
            <li class="religion list-group-item">
                {{ $religion->name }}
                <span class="pull-right">
                    <a href="{{ route('admin.religions.edit', $religion->id) }}" class="edit hidden-sm-up">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $religions->links() }}
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.religion').hover(
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