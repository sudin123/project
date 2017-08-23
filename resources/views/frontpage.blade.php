@extends('site')
@section('title')Sellnepal - Free Classified Nepal, Online Advertising Nepal @parent @stop

@section('meta_description')Sellnepal is a free online classified site of Nepal where you can buy, sell and advertise any used or brand new products or service faster and easier. @parent @stop
@section('meta_keywords') sellnepal, classified nepal, free classified nepal, online advertising, free advertising nepal, classified nepal, used shop nepal,secondhand shop nepal, buy sell nepal, classified ads in nepal, online advertising nepal, best offers, nepali online classified, secondhand shop kathmandu, used shop nepal  @parent @stop
@section('meta_robots')index follow@parent @stop
@section('googlebot')index follow@parent @stop

@section('styles')

@endsection
@include('helper.macros')
@section('content')
<section id="top-sec">
    <div class="container">
        <div class="sec-title clearfix">
            <h2>Featured Ads</h2>
        </div>
        <div id="rec-slider" class="owl-carousel recommendation">
            @foreach($featured_posts as $post)
            <div class="item">
                <div class="post-box">
                    <figure class="image-holder"> 
                        <a href="{{ url($post->slug) }}">
                                         <?php $images = $post->gallery; ?>
                                        @if($post->get_meta('_featured_image') != 'no-image.png')
                                        {!! HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="260",$h="150", $crop = true, $parms = array()) !!}
                                        @elseif(count($images) > 0)
                                        {!! HTML::cropimage('uploads/'.$images[0]['filename'], $w="260",$h="150", $crop = true, $parms = array()) !!}
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
                            href="{{ url($post->slug) }}"> {{ str_limit($post->title, $limit = 30, $end = '...') }}</a>
                    </h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section id="main-sec">
    <div class="container">
        <div class="row">
            @include('sidebar')
            <div class="col-md-9 col-sm-9">
                <div class="google-ad">
                    @include('googleads.banner-ad')
                </div>
                <div class="block">
                    <div class="sec-title clearfix">
                        <h2>Popular Ads <a href="{{ route('popular-ads') }}" class="small">(View all)</a></h2>
                    </div>
                    <div class="content-entry">
                        <ul class="box-listing row">
                            @foreach($popular_posts as $post)
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
                                        href="{{ url($post->slug) }}"> {{ str_limit($post->title, $limit = 30, $end = '...') }}</a>
                                </h3>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="google-ad">
                    @include('googleads.banner-ad-2')
                </div>
                <div class="block add-margin-5">
                    <div class="sec-title  clearfix">
                        <h2>Recent Ads <a href="{{ route('recent-ads') }}" class="small">(View all)</a></h2>
                    </div>
                    <div class="content-entry">
                        <ul class="box-listing row">
                            @foreach($latest_posts as $post)
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
                                        href="{{ url($post->slug) }}">{{ str_limit($post->title, $limit = 30, $end = '...') }}</a>
                                </h3>
                            </li>
                            @endforeach
                        </ul>
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