<div class="sidebar-module">
    <a href="http://www.facebook.com/marth.anime"><img src="/icons/facebook.png"></a>
    <a href="http://www.twitter.com/marthaurion"><img src="/icons/twitter.png"></a>
    <a href="/feed"><img src="/icons/rss.png"></a>
</div>

<div class="sidebar-module">
    <h4>Categories</h4>
    <ul>
        @foreach ($categories as $category)
            <li><a href="{{ route('category.index', $category->slug) }}">{{ $category->title }}</a></li>
            @if(count($category->children)>0)
                <ul>
                    @foreach($category->children as $child)
                        <li><a href="{{ route('category.index', $child->slug) }}">{{ $child->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>

<div class="sidebar-module">
    <h4>Blogroll</h4>
    <ul>
        <li><a href="http://www.reddit.com">Reddit</a></li>
        <li><a href="http://www.marthaurion.com">Shameless Plug</a></li>
        <li><a href="http://www.youtube.com">Youtubes</a></li>
        <li><a href="http://www.twitch.tv/marthaurion">More Shameless</a></li>
    </ul>
</div>

{{--        <div class="sidebar-module">
            <h4>Meta</h4>
            <ul>
                @if(Auth::guest())
                    <li><a href="{{ url('/auth/login')}}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>--}}