@extends('site')
@section('title'){{ $user->profile->company_name }} Profile - Sellnepal@parent @stop
@section('styles')

@endsection
@include('helper.macros')
@section('content')
<section id="main-content">
    <div class="container">
        <div class="row">
            @include('sidebar-company')
            <div class="col-md-9 col-sm-9">
                <div class="google-ad">@include('googleads.banner-ad')</div>
                <div class="content">
                    <div class="sec-title filter-option clearfix">
                        <h2>{{ $user->firstname }} {{ $user->lastname }} Ads</h2>
                        <div class="dealers-post-count pull-right">{{ count($user->AuthorAds) }} <span>Ads</span>
                        </div>
                    </div>
                    <div class="content-entry">
                        @if(count($posts) >= 1)
                        <ul class="box-listing row">
                            @foreach($posts as $post)
                            <li class="post clearfix col-md-4">
                                <figure class="image-holder">
                                    <a href="{{ url($post->slug) }}">
                                        <?php $images = $post->gallery; ?>
                                        @if($post->get_meta('_featured_image') != 'no-image.png')
                                        {!! HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="260",$h="150", $crop = true, $parms = array()) !!}
                                        @elseif(count($images) > 0)
                                        {!! HTML::cropimage('uploads/'.$images[0]['filename'], $w="260",$h="150", $crop = true, $parms = array()) !!}</a>
                                    @else
                                    {!! HTML::cropimage('uploads/no-image.png', $w="260",$h="150", $crop = true, $parms = array()) !!}
                                    @endif
                                    </a>
                                    <div class="item-meta">
                                        <span class="price">
                                            Rs {{ $post->price }}
                                        </span>
                                        <span class="condition">
                                            {!! HTML::condition($post->condition) !!}
                                        </span>
                                    </div>
                                </figure>
                                <h3 class="post-title"><a
                                        href="{{ url($post->slug) }}"> {{ strip_tags(str_limit($post->title, $limit = 30, $end = '...')) }}</a>
                                </h3>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        {{ $posts->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('extra-area')
@endsection
@section('scripts')

@endsection
