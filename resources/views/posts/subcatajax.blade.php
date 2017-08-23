<ul class="style-list">
        @foreach($children as $child)
            <li><a class="categories" href="javascript:void(0);" data-id="{{ $child->id }}">{{ $child->name }}</a></li>
        @endforeach
</ul>