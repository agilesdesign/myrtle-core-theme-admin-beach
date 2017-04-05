<li class="media item">
    <div class="media-left">
        @if($item->icon)
            <i class="{{ $item->icon }}"></i>
        @endif
    </div>
    <div class="media-body">
        <a href="{{ route('admin.menus.items.edit', [$menu->id, $item->id]) }}" class="edit">
            {{ $item->name }}
        </a>
        @if(!$item->children->isEmpty())
            @foreach($item->children as $child )
                @include('admin::menus.items.item.child-mediaitem')
            @endforeach
        @endif
    </div>
</li>