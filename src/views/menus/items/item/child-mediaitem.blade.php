<div class="media item">
{{--    @can('update', $child)--}}
        <div class="media-left">
            -
            @if($child->icon)
                <i class="{{ $child->icon }}"></i>
            @endif
        </div>
    {{--@endcan--}}
    <div class="media-body">
        <a href="{{ route('admin.menus.items.edit', [$menu->id, $child->id]) }}" class="edit">
            {{ $child->name }}
        </a>
        @if(!$item->children->isEmpty())
            @foreach($child->children as $child )
                @include('admin::menus.items.item.child-mediaitem')
            @endforeach
        @endif
    </div>
</div>