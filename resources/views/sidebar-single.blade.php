<?php $categories = \App\Category::all()->toHierarchy(); ?>
<?php $cities = \App\City::all(); ?>
<div class="col-md-3 col-sm-3">
    <div class="widget widget-searchfrom">
        <h2 class="widget-title">Quick Search</h2>
        <div class="widget-entry">
            {!! Form::open(array('route' => 'search', 'method'=>'GET')) !!}
            <ul>
                <li class="form-group">
                    {!! Form::text('q', '', array('class'=>'form-control', 'placeholder'=>'Keyword...')) !!}
                </li>
                <li>
                    <input type="submit" value="Search" class="button big"/>
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
    </div>
    @if(count($relatedPosts) >1)
        <div class="widget widget-similar">
            <h2 class="widget-title">Similar Ads</h2>
            <div class="widget-entry">
            <ul>
                @foreach($relatedPosts as $post)
                    <li>
                        <figure class="image-holder">
                            <?php $images = $post->gallery; ?>
                                        @if($post->get_meta('_featured_image') != 'no-image.png')
                                        {!! HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="260",$h="150", $crop = true, $parms = array()) !!}
                                        @elseif(count($images) > 0)
                                        {!! HTML::cropimage('uploads/'.$images[0]['filename'], $w="260",$h="150", $crop = true, $parms = array()) !!}</a>
                                    @else
                                    {!! HTML::cropimage('uploads/no-image.png', $w="260",$h="150", $crop = true, $parms = array()) !!}
                                    @endif
                            <div class="item-meta">
                                        <span class="price">
                                            Rs {{ $post->price }}
                                        </span>
                                        <span class="condition">
                                            {!! HTML::condition($post->condition) !!}
                                        </span>
                            </div>
                        </figure>
                        <h3 class="post-title"><a href="{{ url($post->slug) }}">{{ $post->title }}</a></h3>
                    </li>
                @endforeach
            </ul>
            </div>
        </div>
    @endif
<div class="widget widget-ad">
    @include('googleads.sidebar-long-ad')
</div>
</div>
