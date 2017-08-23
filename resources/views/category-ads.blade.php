@extends('site')
@section('title'){{$category->name}} - buy or sell new & used item in Nepal - Sellnepal@parent @stop

@section('styles')

@endsection
@include('helper.macros')
@section('meta_description'){!! HTML::catdesc($category->id) !!}@parent @stop
@section('meta_keywords') {!! HTML::catkey($category->id) !!} @parent @stop
@section('meta_robots')index follow@parent @stop
@section('googlebot')index follow@parent @stop
@section('content')
<section id="main-content">
    <div class="container">
        <div class="row">
            @include('sidebar-category')
            <div class="col-md-9 col-sm-9">
                <div class="google-ad">
                    @include('googleads.banner-ad')
                </div>
                <div class="content ">
                    <div class="sec-title filter-option clearfix">
                        <h2>Ads in <strong>{{ $category->name }}</strong></h2>
                        <ul class="sort-option clearfix ">
                            <li class="dropdown-parent"><a class="dropdown-toggle" href="javascript:void(0)">Sort by: @if($price){!!   HTML::pricesort($price) !!} @endif @if($order){!!  HTML::ordersort($order) !!} @endif @if(empty($price) && empty($order)) Recent Ads @endif</a>
                                <div class="dropdown-menu pointer sort-price"> 
                                    <ul class="disc-list">
                                        <li><a href="?price=high">Price High to Low</a></li>
                                        <li><a href="?price=low">Price Low to High</a></li>
                                        <li><a href="?order=popular">Popular Posts First</a></li>
                                        <li><a href="?order=older">Older Posts First</a></li>
                                        <li><a href="{{ Request::url() }}">Recent Ads</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
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
                        {{ $posts->appends(array('price' => $price, 'order'=> $order))->links() }}
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
