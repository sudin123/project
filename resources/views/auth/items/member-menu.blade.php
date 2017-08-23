<ul class="tabs clearfix">
    @if(\Auth::user()->hasRole('administrator'))
        <li @if(Request::segment(2) == 'my-ads') class="active" @endif ><a href="{{ route('my-ads') }}">All Ads</a></li>
        <li @if(Request::segment(2) == 'change-password') class="active" @endif ><a
                    href="{{ route('change-password') }}">Change
                Password</a></li>
    @else
        <?php $urlArray = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $segments = explode('/', $urlArray); ?>
        <li @if(Request::segment(1) == 'member-area' && count($segments) == 2 ) class="active" @endif ><a
                    href="{{ route('member-area') }}">Member Area</a></li>
        <li @if(Request::segment(2) == 'my-ads') class="active" @endif ><a href="{{ route('my-ads') }}">My Ads</a></li>
        <li @if(Request::segment(2) == 'my-wishlist') class="active" @endif ><a href="{{ route('my-wishlist') }}">My
                Wishlist</a></li>
        @if(\Auth::user()->hasRole('vendor'))
            <li @if(Request::segment(2) == 'company-profile') class="active" @endif ><a
                        href="{{ route('edit-company-profile') }}">Company Profile</a></li>
        @else
            <li @if(Request::segment(2) == 'my-profile') class="active" @endif ><a href="{{ route('my-profile') }}">My
                    Profile</a></li>
        @endif
        <li @if(Request::segment(2) == 'change-password') class="active" @endif ><a
                    href="{{ route('change-password') }}">Change
                Password</a></li>
    @endif
</ul>