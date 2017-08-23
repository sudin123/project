@extends('site')
@section('title'){{ $post->title }} - Sellnepal@parent @stop
@section('meta_description'){{ $post->title }} - Sellnepal@parent @stop
@section('meta_keywords') buy sell nepal, @if($post->condition == 1) Brand New @else Secondhand @endif {{ $post->category->name }}, best deal {{ $post->category->name }} @parent @stop
@section('meta_robots')index follow@parent @stop
@section('googlebot')index follow@parent @stop
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/fancybox/jquery.fancybox.css?v=2.1.5') }}" type="text/css"
          media="screen"/>
@endsection
@include('helper.macros')
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <div class="content">
                        <div class="sec-title filter-option clearfix">
                            <h2>{{ $post->title }} <span>Rs {{$post->price}}</span></h2>
                            @if(!Auth::guest())
                                <?php $wishlistIds = \Auth::user()->watchlist->lists('post_id')->toArray(); //print_r($wishlistIds)?>
                                @if(in_array($post->id, $wishlistIds))
                                <a href="{{route('my-wishlist')}}" class="add-wishlist active"
                                   title="Click to see your Wishlists" data-toggle="tooltip"><i class="fa fa-heart"></i></a>
                                @else
                                <a href="javascript:void(0);" class="wishlist add-wishlist" title="Add to Wishlist"
                                   data-id="{{$post->id}}"><i class="fa fa-heart" data-toggle="tooltip"></i></a>
                                @endif
                                @endif

                        </div>
                        <div class="content-entry">
                            <article class="post-details">
                                <div class="entry">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <?php $images = $post->gallery;
                                            ?>
                                            @if(count($images) > 0)
                                                <div id="items-gallery" class="owl-carousel">
                                                    @if($post->get_meta('_featured_image') != 'no-image.png')
                                                    <div class="item">
                                                        <a rel="gallery-{{ $post->slug }}" class="fancybox"
                                                           href="{{ url('uploads/'.$post->get_meta('_featured_image')) }}">
                                                            {!! HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="300",$h="240", $crop = true, $parms = array()) !!}
                                                        </a>
                                                    </div>
                                                     @endif
                                                    @foreach($images as $image)
                                                        <div class="item"><a rel="gallery-{{ $post->slug }}"
                                                                             class="fancybox"
                                                                             href="{{ url('uploads/'.$image['filename']) }}">
                                                                {!! HTML::cropimage('uploads/'.$image['filename'], $w="300",$h="240", $crop = true, $parms = array()) !!}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <figure class="image-holder">
                                                    <a href="{{ url('uploads/'.$post->get_meta('_featured_image')) }}"
                                                       rel="gallery-{{ $post->slug }}" class="fancybox">
                                                        {!! HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="300",$h="240", $crop = true, $parms = array()) !!}
                                                    </a>
                                                </figure>
                                            @endif
                                        </div>
                                        <div class="col-md-7">
                                            <div class="widget widget-user-details">
                                                <h4 class="widget-title">Publisher Details</h4>
                                                <div class="widget-entry">
                                                    <ul class="details-list clearfix">
                                                        <li><strong>Published Date:</strong> <span
                                                                    class="entry">{{  \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</span>
                                                        </li>
                                                        <li><strong>Ad Id:</strong> <span
                                                                    class="entry">{{ $post->get_meta('_post_unique_id') }}</span>
                                                        </li>
                                                        <li><strong>Ads Views:</strong><span
                                                                    class="entry">{{ $post->view_count }}</span></li>
                                                        @if($post->user->hasRole('vendor'))
                                                            <li><strong>Published By:</strong><span class="entry"><a
                                                                            href="{{ url('dealers/'.$post->user->username) }}">{{ $post->user->profile->company_name }}</a></span>
                                                            </li>
                                                        @else
                                                            <li><strong>Published By:</strong><span class="entry"><a
                                                                            href="{{ url('dealers/'.$post->user->username) }}">{{ $post->user->firstname }} {{ $post->user->lastname }}</a></span>
                                                            </li>
                                                        @endif
                                                        <li><strong>Address:</strong><span class="entry">{{ $post->user->user_profile->street }}
                                                                , {{$post->user->user_profile->area}}
                                                                , {{ \App\City::findorFail($post->user->user_profile->city)->name }}</span>
                                                        </li>
                                                        @if($post->user->user_profile->show_phone == 1)
                                                        <li><strong>Phone 1:</strong><span
                                                                    class="entry">{{ $post->user->user_profile->phone }}</span>
                                                        </li>
                                                        @endif
                                                        @if($post->user->user_profile->telephone != '')
                                                            <li><strong>Phone 2:</strong><span
                                                                        class="entry">{{ $post->user->user_profile->telephone }}</span>
                                                            </li>
                                                        @endif
                                                        <li><strong>Email:</strong><span
                                                                    class="entry">{{ $post->user->email }}</span></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="content">
                        <div class="sec-title">
                            <h4>Description</h4>
                        </div>
                        <div class="content-entry content-desc">
                            {!!  $post->content  !!}
                        </div>
                    </div>
                    <?php $node = \App\Category::findorFail($post->category_id); ?>
                    @if($node->parent_id == 16)
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    @if($post->get_meta('_make_year'))
                                        <li><strong>Make Year:</strong><span
                                                    class="entry">{{ $post->get_meta('_make_year') }}</span></li>@endif
                                    @if($post->get_meta('_kilometers'))
                                        <li><strong>Kilometers:</strong><span
                                                    class="entry">{{ $post->get_meta('_kilometers') }}</span></li>@endif
                                    @if($post->get_meta('_colour'))
                                        <li><strong>Colour:</strong><span
                                                    class="entry">{{ $post->get_meta('_colour') }}</span></li>@endif
                                    @if($post->get_meta('_fuel_type'))
                                        <li><strong>Engine (CC):</strong><span
                                                    class="entry">{{ $post->get_meta('_fuel_type') }}</span></li>@endif
                                    @if($post->get_meta('_engine_cc'))
                                        <li><strong>Fuel Type</strong><span
                                                    class="entry">{{ $post->get_meta('_engine_cc') }}</span></li>@endif
                                    @if($post->get_meta('_transmission'))
                                        <li><strong>Transmission:</strong><span
                                                    class="entry">{{ $post->get_meta('_transmission') }}</span>
                                        </li>@endif
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if($node->parent_id == 39)
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    @if($post->get_meta('_lot_no'))
                                        <li><strong>Lot No.:</strong><span
                                                    class="entry">{{ $post->get_meta('_lot_no') }}</span></li>@endif
                                    @if($post->get_meta('_zone'))
                                        <li><strong>Zone:</strong><span
                                                    class="entry">{{ $post->get_meta('_zone') }}</span></li>@endif
                                    @if($post->get_meta('_make_year'))
                                        <li><strong>Make Year:</strong><span
                                                    class="entry">{{ $post->get_meta('_make_year') }}</span></li>@endif
                                    @if($post->get_meta('_kilometers'))
                                        <li><strong>Kilometers:</strong><span
                                                    class="entry">{{ $post->get_meta('_kilometers') }}</span></li>@endif
                                    @if($post->get_meta('_milage'))
                                        <li><strong>Milage</strong><span
                                                    class="entry">{{ $post->get_meta('_milage') }}</span></li>@endif
                                    @if($post->get_meta('_colour'))
                                        <li><strong>Color:</strong><span
                                                    class="entry">{{ $post->get_meta('_colour') }}</span></li>@endif
                                    @if($post->get_meta('_engine_cc'))
                                        <li><strong>Engine (CC):</strong><span
                                                    class="entry">{{ $post->get_meta('_engine_cc') }}</span></li>@endif
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if($node->id == 93)
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    @if($post->get_meta('_processor'))
                                        <li><strong>Processor:</strong><span
                                                    class="entry">{{ $post->get_meta('_processor') }}</span></li>@endif
                                    @if($post->get_meta('_ram'))
                                        <li><strong>RAM:</strong><span
                                                    class="entry">{{ $post->get_meta('_ram') }}</span></li>@endif
                                    @if($post->get_meta('_graphics_card'))
                                        <li><strong>Graphics Card:</strong><span
                                                    class="entry">{{ $post->get_meta('_graphics_card') }}</span>
                                        </li>@endif
                                    @if($post->get_meta('_harddisk'))
                                        <li><strong>Harddisk Size:</strong><span
                                                    class="entry">{{ $post->get_meta('_harddisk') }}</span></li>@endif
                                    @if($post->get_meta('_moniter_desc'))
                                        <li><strong>Moniter Description: </strong><span
                                                    class="entry">{{ $post->get_meta('_moniter_desc') }}</span>
                                        </li>@endif
                                        @if(count(json_decode($post->get_meta('_features'))) > 0)
                                            <li><strong>Features :</strong><span
                                                        class="entry">@foreach(json_decode($post->get_meta('_features')) as $features){{ $features }}, @endforeach</span></li>   @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if($node->id == 97)
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    @if($post->get_meta('_processor'))
                                        <li><strong>Processor:</strong><span
                                                    class="entry">{{ $post->get_meta('_processor') }}</span></li>@endif
                                    @if($post->get_meta('_ram'))
                                        <li><strong>RAM:</strong><span
                                                    class="entry">{{ $post->get_meta('_ram') }}</span></li>@endif
                                    @if($post->get_meta('_graphics_card'))
                                        <li><strong>Graphics Card:</strong><span
                                                    class="entry">{{ $post->get_meta('_graphics_card') }}</span>
                                        </li>@endif
                                    @if($post->get_meta('_harddisk'))
                                        <li><strong>Harddisk Size:</strong><span
                                                    class="entry">{{ $post->get_meta('_harddisk') }}</span></li>@endif
                                    @if($post->get_meta('_screen_size'))
                                        <li><strong>Screen Size: </strong><span
                                                    class="entry">{{ $post->get_meta('_screen_size') }}</span>
                                        </li>@endif
                                    @if(count(json_decode($post->get_meta('_features'))) > 0)
                                            <li><strong>Features :</strong><span
                                                        class="entry">@foreach(json_decode($post->get_meta('_features')) as $features){{ $features }}, @endforeach</span></li>   @endif
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if($node->parent_id == 186)
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    @if($post->get_meta('_property_type'))
                                        <li><strong>Property Type :</strong><span
                                                    class="entry">{{ $post->get_meta('_property_type') }}</span>
                                        </li>@endif
                                    @if($post->get_meta('_property_location'))
                                        <li><strong>Property Location:</strong><span
                                                    class="entry">{{ $post->get_meta('_property_location') }}</span>
                                        </li>@endif
                                    @if($post->get_meta('_access_road'))
                                        <li><strong>Access Road:</strong><span
                                                    class="entry">{{ $post->get_meta('_access_road') }}</span>
                                        </li>@endif
                                    @if($post->get_meta('_land_size'))
                                        <li><strong>Land Area:</strong><span
                                                    class="entry">{{ $post->get_meta('_land_size') }}</span></li>@endif
                                    @if($post->get_meta('_bedrooms'))
                                        <li><strong>Bedrooms: </strong><span
                                                    class="entry">{{ $post->get_meta('_bedrooms') }}</span></li>@endif
                                    @if($post->get_meta('_bathroom'))
                                        <li><strong>Bathroom :</strong><span
                                                    class="entry">{{ $post->get_meta('_bathroom') }}</span></li> @endif
                                    @if($post->get_meta('_livingroom'))
                                        <li><strong>Living Room:</strong><span
                                                    class="entry">{{ $post->get_meta('_livingroom') }}</span>
                                        </li> @endif
                                    @if($post->get_meta('_water_supply'))
                                        <li><strong>Water Supply :</strong><span
                                                    class="entry">{{ $post->get_meta('_water_supply') }}</span>
                                        </li> @endif
                                    @if($post->get_meta('_furnished'))
                                        <li><strong>Furnish :</strong><span
                                                    class="entry">{{ $post->get_meta('_furnished') }}</span></li> @endif
                                        @if(count(json_decode($post->get_meta('_features'))) > 0)
                                            <li><strong>Features :</strong><span
                                                        class="entry">@foreach(json_decode($post->get_meta('_features')) as $features){{ $features }}, @endforeach</span></li>   @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if($node->parent_id == 135)
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    @if($post->get_meta('_sim_slot'))
                                        <li><strong>Sim Slot:</strong><span
                                                    class="entry">{{ $post->get_meta('_sim_slot') }}</span></li>@endif
                                    @if($post->get_meta('_camera'))
                                        <li><strong>Camera:</strong><span
                                                    class="entry">{{ $post->get_meta('_camera') }}</span></li>@endif
                                    @if($post->get_meta('_smartphone_os'))
                                        <li><strong>OS:</strong><span
                                                    class="entry">{{ $post->get_meta('_smartphone_os') }}</span>
                                        </li>@endif
                                    @if($post->get_meta('_screen_size'))
                                        <li><strong>Screen Size:</strong><span
                                                    class="entry">{{ $post->get_meta('_screen_size') }}</span>
                                        </li>@endif
                                    @if($post->get_meta('_cpu_core'))
                                        <li><strong>CPU Core: </strong><span
                                                    class="entry">{{ $post->get_meta('_cpu_core') }}</span></li>@endif
                                    @if($post->get_meta('_ram'))
                                        <li><strong>RAM :</strong><span
                                                    class="entry">{{ $post->get_meta('_ram') }}</span></li> @endif
                                    @if($post->get_meta('_internal_storage'))
                                        <li><strong>Internal Storage:</strong><span
                                                    class="entry">{{ $post->get_meta('_internal_storage') }}</span>
                                        </li> @endif
                                        @if(count(json_decode($post->get_meta('_features'))) > 0)
                                        <li><strong>Features :</strong><span
                                                    class="entry">@foreach(json_decode($post->get_meta('_features')) as $features){{ $features }}, @endforeach</span></li>  @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="content">
                        <div class="sec-title">
                            <h4>General Details</h4>
                        </div>
                        <div class="content-entry">
                            <ul class="details-list clearfix">
                                <li>
                                    <strong>Category:</strong><span class="entry"><?php
                                        $node = \App\Category::findorFail($post->category_id);
                                        $i = 0;
                                        $count = count($node->getAncestorsAndSelf());
                                        ?>
                                        @foreach($node->getAncestorsAndSelf() as $cat){{ $cat->name }}
                                        @if($i < $count-1)
                                            /
                                        @endif
                                        <?php $i++; ?>
                                        @endforeach
                                </span>
                                </li>
                                <li><strong>Condition: </strong><span
                                            class="entry">{!! HTML::condition($post->condition) !!}</span></li>
                                @if($post->get_meta('_is_used_for'))
                                    <li><strong>is Used For:</strong><span
                                                class="entry">{{  $post->get_meta('_is_used_for') }}</span></li>
                                @endif
                                <li><strong>Is Negotiable: </strong><span
                                            class="entry">{!! HTML::negotiable($post->is_negotiable) !!}</span>
                                @if($post->get_meta('_is_home_delivary') == 0)
                                    <li><strong>Home Delivery :</strong><span
                                                class="entry">{!! HTML::delivary($post->get_meta('_is_home_delivary')) !!}</span>
                                    </li>
                                @else
                                    <li><strong>Home Delivery :</strong><span
                                                class="entry">{!! HTML::delivary($post->get_meta('_is_home_delivary')) !!}</span>
                                    </li>
                                    <li><strong>Delivery Areas :</strong><span
                                                class="entry">{!! HTML::delivary($post->get_meta('_delivary_area')) !!}</span>
                                    </li>
                                    <li><strong>Delivery Charge:</strong><span
                                                class="entry">{{ $post->get_meta('_delivary_charges') }}</span></li>
                                @endif
                                @if($post->get_meta('_warranty_type') == 0)
                                    <li><strong>Warranty Type:</strong><span
                                                class="entry">{!! HTML::warranty($post->get_meta('_warranty_type')) !!}</span>
                                    </li>
                                @else
                                    <li><strong>Warranty Type:</strong><span class="entry">{!!
                                    HTML::warranty($post->get_meta('_warranty_type')) !!}</span>
                                    </li>
                                    <li><strong>Warranty Period:</strong><span class="entry">{{
                                $post->get_meta('_warrenty_period') }}</span>
                                    </li>
                                    <li><strong>Warranty Includes:</strong><span class="entry">{{
                                $post->get_meta('_warranty_includes') }}</span>
                                    </li>
                                    @endif
                                    </li>
                            </ul>
                        </div>
                    </div>
                    <div class="content">
                        <div class="sec-title">
                            <h4>Share this items</h4>
                        </div>
                        <div class="content-entry">
                            <div class="social-bar clearfix">
                                <ul class="share-link">
                                    <li>Tell to friend :</li>
                                    <li><a target="_blank" class="share-icon fa fa-facebook-square" href="https://www.facebook.com/sharer/sharer.php?u={{ url($post->slug) }}"></a></li>
                                    <li><a target="_blank" class="share-icon fa fa-twitter-square" href="https://twitter.com/home?status={{ url($post->slug) }}"></a></li>
                                    <li><a target="_blank" class="share-icon fa fa-google-plus-square " href="https://plus.google.com/share?url={{ url($post->slug) }}"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="google-ad"> @include('googleads.banner-ad')</div>
                    <div class="content">
                        <div class="sec-title">
                            <h4>Comments</h4>
                        </div>
                        <div class="fb-comments" data-href="{{ url($post->slug) }}"
                             data-numposts="10" data-width="100%"></div>
                    </div>

                </div>
                @include('sidebar-single')
            </div>
        </div>
    </section>
@endsection
@section('extra-area')
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/fancybox/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/fancybox/jquery.easing-1.4.pack.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.share-icon').click(function(e){
                e.preventDefault();
                var href = $(this).attr('href'); // get value pos
                var left  = ($(window).width()/2)-(900/2),
                        top   = ($(window).height()/2)-(600/2),
                        popup = window.open (href, "popup", "width=900, height=600, top="+top+", left="+left);

            });
            $("a.fancybox").fancybox({
                'transitionIn': 'elastic',
                'transitionOut': 'elastic',
                'speedIn': 600,
                'speedOut': 200,
                'overlayShow': false
            });

            var wishlistaddUrl = "{{ route('add-wishlist') }}";
            var token = "{{ Session::getToken() }}";
            $('.wishlist').on('click', function () {
                var id_value = $(this).attr('data-id'); // get value pos
                var wishlist_url = "{{route('my-wishlist')}}";
                _this = $(this);

                $.ajax({
                    url: wishlistaddUrl,
                    type: 'post',
                    data: {id: id_value, _token: token},
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            _this.addClass('active').attr('href', wishlist_url);
                            _this.removeClass('wishlist');
                        } else {
                            alert('failed');
                        }
                    }
                });
            });

        });

    </script>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1527387440824990";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
@endsection