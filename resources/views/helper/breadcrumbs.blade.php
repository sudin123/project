@if ($breadcrumbs)
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <a title="Go to {{{ $breadcrumb->title }}}." href="{{{ $breadcrumb->url }}}" class="home">{{{ $breadcrumb->title }}}</a>
            @else
                {{{ $breadcrumb->title }}}
            @endif
        @endforeach
    </ol>
@endif