@extends('admin::index')

@section('page-title')
    {{ $menu->name }} <small>Items</small>
@endsection

{{--@section('toolbar-list')--}}
    {{--@can('create', $policytype)--}}
        {{--<li class="nav-item">--}}
            {{--<a class="btn btn-success btn-sm" href="{{ route('admin.credentials.create') }}">--}}
                {{--<i class="fa fa-fw fa-plus"></i>--}}
                {{--New--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--@endcan--}}
{{--@endsection--}}

@section('content')
    <ul class="media-list">
    @foreach($items as $item)
        @include('admin::menus.items.item.root-mediaitem')
    @endforeach
    </ul>
@endsection

@section('pagination')
    {{ $items->links() }}
@endsection

{{--@section('scripts')--}}
    {{--<script>--}}
        {{--$(function() {--}}
            {{--$('.item').hover(--}}
                    {{--function(){--}}
                        {{--$(this).find('.edit').toggleClass('hidden-md').toggleClass('hidden-lg');--}}
                    {{--},--}}
                    {{--function(){--}}
                        {{--$(this).find('.edit').toggleClass('hidden-md').toggleClass('hidden-lg');--}}
                    {{--}--}}
            {{--);--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}