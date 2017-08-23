@extends('site')
@section('title')Recent Ads - Sellnepal@parent @stop
@section('meta_description')Recent ads - Sellnepal@parent @stop
@section('meta_keywords') sellnepal, recent ads in nepal, ads in nepal, buy sale nepal, classified ads nepal @parent @stop
@section('meta_robots')index follow@parent @stop
@section('googlebot')index follow@parent @stop
@section('styles')

@endsection
@include('helper.macros')
@section('content')
<section id="main-content">
    <div class="container">
        <div class="row">
            @include('sidebar')
            <div class="col-md-9 col-sm-9">
                <div class="google-ad">
                    @include('googleads.banner-ad')
                </div>
                <div class="content ">
                    <div class="sec-title clearfix">
                        <h2>Recent Post</h2>
                    </div>
                    <div class="content-entry">
                        <ul class="post-listing">
                            @foreach($posts as $post)
                            <li class="post clearfix">
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
                                <div class="entry clearfix">
                                    <h4><a href="{{ url($post->slug) }}"> {{ $post->title }}</a></h4>
                                    <p>
                                        {{ strip_tags(str_limit($post->content, $limit = 150, $end = '...')) }}
                                    </p>
                                    <div class="meta clearfix">
                                        <strong>Published:</strong> {{  \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}<br>
                                        <strong>Seller:</strong> @if($post->user->hasRole('vendor'))
                                        <a href="{{ url('dealers/'.$post->user->username) }}">{{ $post->user->profile->company_name }}</a>
                                        @else
                                        <a href="{{ url('dealers/'.$post->user->username) }}">{{ $post->user->firstname }} {{ $post->user->lastname }}</a>
                                        @endif<br>
                                        <strong>Is
                                            Negotiable:</strong> {!! HTML::negotiable($post->is_negotiable) !!}
                                        <br>
                                        <strong>Warranty:</strong> {!!  HTML::warranty($post->get_meta('_warranty_type')) !!}
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        {!! $posts->render() !!}
                    </div>
                </div>
                <div class="google-ad">
                    @include('googleads.banner-ad-2')
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
