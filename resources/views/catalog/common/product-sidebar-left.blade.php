<div class="sidebar">
    <div class="sidebar__item mb-3">
        <h3 class="sidebar__item-title">Danh mục</h3>
        <ul class="sidebar__item-list">
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    <li><a title="{{ $category->name }}" href="{{ route('catalog.product.getProductByCategory', [$category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="sidebar__item mb-3">
        <h3 class="sidebar__item-title padding-tag">Nhóm hàng</h3>
        <ul class="sidebar__item-list">
            @if(count($groups) > 0)
                @foreach($groups as $group)
                    <li><a title="{{ $group->name }}" href="{{ route('catalog.product.getProductByGroup', [$group->slug]) }}">{{ $group->name }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
</div>