@extends('site')
@section('title'){{ $user->profile->company_name }} Profile - Sellnepal @parent @stop
@section('styles')

@endsection
@include('helper.macros')
@section('content')
<section id="main-content">
    <div class="container">
        <div class="row">
            @include('sidebar-company')
            <div class="col-md-9 col-sm-9">
                <div class="content">
                    <div class="sec-title filter-option clearfix">
                        <h2>About {{ $user->profile->company_name }}</h2>
                        <div class="dealers-post-count pull-right">{{ count($user->AuthorAds) }} <span>Ads</span></div>
                    </div>
                    <div class="content-entry">
                        <article class="post-details clearfix">
                            <figure class="image-holder alignright">
                                @if($user->profile->company_logo)
                                    {!! HTML::cropimage('uploads/company-logo/'.$user->profile->company_logo, $w="180",$h="145", $crop = false, $parms = array()) !!}
                                @else
                                    {!! HTML::cropimage('uploads/no-image.png', $w="180",$h="145", $crop = false, $parms = array()) !!}
                                @endif
                            </figure>
                            <div class="entry">
                               
                                <div class="entry">    <p>{{ $user->profile->about }}</p></div>
                                <div class="meta clearfix">
                                    <p>
                                        <strong>Contact No:</strong> <a
                                            href="tel:{{ $user->profile->phone }}">{{ $user->profile->phone }}</a> @if($user->profile->telephone)
                                        ,
                                        <a href="tel:{{ $user->profile->telephone }}">{{ $user->profile->telephone }}</a> @endif
                                        <br>
                                        @if($user->profile->fax)
                                        <strong>FAX.</strong> {{ $user->profile->fax }}<br>
                                        @endif
                                        <strong>Email:</strong> <a
                                            href="mailto:{{ $user->email }}">{{ $user->email }}</a><br>
                                        @if($user->profile->website != '')
                                        <strong>Website:</strong> {{ $user->profile->website }}<br>
                                        @endif
                                        <strong>City:</strong> {{ \App\City::findorFail($user->user_profile->city)->name }}
                                        <br>
                                        <strong>Location:</strong> {{ $user->profile->street }} {{ $user->profile->area }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="google-ad"> @include('googleads.banner-ad')</div>
                <div class="content">
                    <div class="sec-title clearfix">
                        <h2>{{ $user->profile->company_name }} Ads</h2>
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
                            <h3 class="post-title"><a href="{{ url($post->slug) }}"> {{ strip_tags(str_limit($post->title, $limit = 30, $end = '...')) }}</a></h3>
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
