
<?php $__env->startSection('title'); ?><?php echo e($post->title); ?> - Sellnepal@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?><?php echo e($post->title); ?> - Sellnepal@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_keywords'); ?> buy sell nepal, <?php if($post->condition == 1): ?> Brand New <?php else: ?> Secondhand <?php endif; ?> <?php echo e($post->category->name); ?>, best deal <?php echo e($post->category->name); ?> @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_robots'); ?>index follow@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('googlebot'); ?>index follow@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/fancybox/jquery.fancybox.css?v=2.1.5')); ?>" type="text/css"
          media="screen"/>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <div class="content">
                        <div class="sec-title filter-option clearfix">
                            <h2><?php echo e($post->title); ?> <span>Rs <?php echo e($post->price); ?></span></h2>
                            <?php if(!Auth::guest()): ?>
                                <?php $wishlistIds = \Auth::user()->watchlist->lists('post_id')->toArray(); //print_r($wishlistIds)?>
                                <?php if(in_array($post->id, $wishlistIds)): ?>
                                <a href="<?php echo e(route('my-wishlist')); ?>" class="add-wishlist active"
                                   title="Click to see your Wishlists" data-toggle="tooltip"><i class="fa fa-heart"></i></a>
                                <?php else: ?>
                                <a href="javascript:void(0);" class="wishlist add-wishlist" title="Add to Wishlist"
                                   data-id="<?php echo e($post->id); ?>"><i class="fa fa-heart" data-toggle="tooltip"></i></a>
                                <?php endif; ?>
                                <?php endif; ?>

                        </div>
                        <div class="content-entry">
                            <article class="post-details">
                                <div class="entry">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <?php $images = $post->gallery;
                                            ?>
                                            <?php if(count($images) > 0): ?>
                                                <div id="items-gallery" class="owl-carousel">
                                                    <?php if($post->get_meta('_featured_image') != 'no-image.png'): ?>
                                                    <div class="item">
                                                        <a rel="gallery-<?php echo e($post->slug); ?>" class="fancybox"
                                                           href="<?php echo e(url('uploads/'.$post->get_meta('_featured_image'))); ?>">
                                                            <?php echo HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="300",$h="240", $crop = true, $parms = array()); ?>

                                                        </a>
                                                    </div>
                                                     <?php endif; ?>
                                                    <?php foreach($images as $image): ?>
                                                        <div class="item"><a rel="gallery-<?php echo e($post->slug); ?>"
                                                                             class="fancybox"
                                                                             href="<?php echo e(url('uploads/'.$image['filename'])); ?>">
                                                                <?php echo HTML::cropimage('uploads/'.$image['filename'], $w="300",$h="240", $crop = true, $parms = array()); ?>

                                                            </a>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php else: ?>
                                                <figure class="image-holder">
                                                    <a href="<?php echo e(url('uploads/'.$post->get_meta('_featured_image'))); ?>"
                                                       rel="gallery-<?php echo e($post->slug); ?>" class="fancybox">
                                                        <?php echo HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="300",$h="240", $crop = true, $parms = array()); ?>

                                                    </a>
                                                </figure>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="widget widget-user-details">
                                                <h4 class="widget-title">Publisher Details</h4>
                                                <div class="widget-entry">
                                                    <ul class="details-list clearfix">
                                                        <li><strong>Published Date:</strong> <span
                                                                    class="entry"><?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()); ?></span>
                                                        </li>
                                                        <li><strong>Ad Id:</strong> <span
                                                                    class="entry"><?php echo e($post->get_meta('_post_unique_id')); ?></span>
                                                        </li>
                                                        <li><strong>Ads Views:</strong><span
                                                                    class="entry"><?php echo e($post->view_count); ?></span></li>
                                                        <?php if($post->user->hasRole('vendor')): ?>
                                                            <li><strong>Published By:</strong><span class="entry"><a
                                                                            href="<?php echo e(url('dealers/'.$post->user->username)); ?>"><?php echo e($post->user->profile->company_name); ?></a></span>
                                                            </li>
                                                        <?php else: ?>
                                                            <li><strong>Published By:</strong><span class="entry"><a
                                                                            href="<?php echo e(url('dealers/'.$post->user->username)); ?>"><?php echo e($post->user->firstname); ?> <?php echo e($post->user->lastname); ?></a></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <li><strong>Address:</strong><span class="entry"><?php echo e($post->user->user_profile->street); ?>

                                                                , <?php echo e($post->user->user_profile->area); ?>

                                                                , <?php echo e(\App\City::findorFail($post->user->user_profile->city)->name); ?></span>
                                                        </li>
                                                        <?php if($post->user->user_profile->show_phone == 1): ?>
                                                        <li><strong>Phone 1:</strong><span
                                                                    class="entry"><?php echo e($post->user->user_profile->phone); ?></span>
                                                        </li>
                                                        <?php endif; ?>
                                                        <?php if($post->user->user_profile->telephone != ''): ?>
                                                            <li><strong>Phone 2:</strong><span
                                                                        class="entry"><?php echo e($post->user->user_profile->telephone); ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <li><strong>Email:</strong><span
                                                                    class="entry"><?php echo e($post->user->email); ?></span></li>
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
                            <?php echo $post->content; ?>

                        </div>
                    </div>
                    <?php $node = \App\Category::findorFail($post->category_id); ?>
                    <?php if($node->parent_id == 16): ?>
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    <?php if($post->get_meta('_make_year')): ?>
                                        <li><strong>Make Year:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_make_year')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_kilometers')): ?>
                                        <li><strong>Kilometers:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_kilometers')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_colour')): ?>
                                        <li><strong>Colour:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_colour')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_fuel_type')): ?>
                                        <li><strong>Engine (CC):</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_fuel_type')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_engine_cc')): ?>
                                        <li><strong>Fuel Type</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_engine_cc')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_transmission')): ?>
                                        <li><strong>Transmission:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_transmission')); ?></span>
                                        </li><?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($node->parent_id == 39): ?>
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    <?php if($post->get_meta('_lot_no')): ?>
                                        <li><strong>Lot No.:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_lot_no')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_zone')): ?>
                                        <li><strong>Zone:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_zone')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_make_year')): ?>
                                        <li><strong>Make Year:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_make_year')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_kilometers')): ?>
                                        <li><strong>Kilometers:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_kilometers')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_milage')): ?>
                                        <li><strong>Milage</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_milage')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_colour')): ?>
                                        <li><strong>Color:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_colour')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_engine_cc')): ?>
                                        <li><strong>Engine (CC):</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_engine_cc')); ?></span></li><?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($node->id == 93): ?>
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    <?php if($post->get_meta('_processor')): ?>
                                        <li><strong>Processor:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_processor')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_ram')): ?>
                                        <li><strong>RAM:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_ram')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_graphics_card')): ?>
                                        <li><strong>Graphics Card:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_graphics_card')); ?></span>
                                        </li><?php endif; ?>
                                    <?php if($post->get_meta('_harddisk')): ?>
                                        <li><strong>Harddisk Size:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_harddisk')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_moniter_desc')): ?>
                                        <li><strong>Moniter Description: </strong><span
                                                    class="entry"><?php echo e($post->get_meta('_moniter_desc')); ?></span>
                                        </li><?php endif; ?>
                                        <?php if(count(json_decode($post->get_meta('_features'))) > 0): ?>
                                            <li><strong>Features :</strong><span
                                                        class="entry"><?php foreach(json_decode($post->get_meta('_features')) as $features): ?><?php echo e($features); ?>, <?php endforeach; ?></span></li>   <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($node->id == 97): ?>
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    <?php if($post->get_meta('_processor')): ?>
                                        <li><strong>Processor:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_processor')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_ram')): ?>
                                        <li><strong>RAM:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_ram')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_graphics_card')): ?>
                                        <li><strong>Graphics Card:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_graphics_card')); ?></span>
                                        </li><?php endif; ?>
                                    <?php if($post->get_meta('_harddisk')): ?>
                                        <li><strong>Harddisk Size:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_harddisk')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_screen_size')): ?>
                                        <li><strong>Screen Size: </strong><span
                                                    class="entry"><?php echo e($post->get_meta('_screen_size')); ?></span>
                                        </li><?php endif; ?>
                                    <?php if(count(json_decode($post->get_meta('_features'))) > 0): ?>
                                            <li><strong>Features :</strong><span
                                                        class="entry"><?php foreach(json_decode($post->get_meta('_features')) as $features): ?><?php echo e($features); ?>, <?php endforeach; ?></span></li>   <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($node->parent_id == 186): ?>
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    <?php if($post->get_meta('_property_type')): ?>
                                        <li><strong>Property Type :</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_property_type')); ?></span>
                                        </li><?php endif; ?>
                                    <?php if($post->get_meta('_property_location')): ?>
                                        <li><strong>Property Location:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_property_location')); ?></span>
                                        </li><?php endif; ?>
                                    <?php if($post->get_meta('_access_road')): ?>
                                        <li><strong>Access Road:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_access_road')); ?></span>
                                        </li><?php endif; ?>
                                    <?php if($post->get_meta('_land_size')): ?>
                                        <li><strong>Land Area:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_land_size')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_bedrooms')): ?>
                                        <li><strong>Bedrooms: </strong><span
                                                    class="entry"><?php echo e($post->get_meta('_bedrooms')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_bathroom')): ?>
                                        <li><strong>Bathroom :</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_bathroom')); ?></span></li> <?php endif; ?>
                                    <?php if($post->get_meta('_livingroom')): ?>
                                        <li><strong>Living Room:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_livingroom')); ?></span>
                                        </li> <?php endif; ?>
                                    <?php if($post->get_meta('_water_supply')): ?>
                                        <li><strong>Water Supply :</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_water_supply')); ?></span>
                                        </li> <?php endif; ?>
                                    <?php if($post->get_meta('_furnished')): ?>
                                        <li><strong>Furnish :</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_furnished')); ?></span></li> <?php endif; ?>
                                        <?php if(count(json_decode($post->get_meta('_features'))) > 0): ?>
                                            <li><strong>Features :</strong><span
                                                        class="entry"><?php foreach(json_decode($post->get_meta('_features')) as $features): ?><?php echo e($features); ?>, <?php endforeach; ?></span></li>   <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($node->parent_id == 135): ?>
                        <div class="content">
                            <div class="sec-title">
                                <h4>Ads Details</h4>
                            </div>
                            <div class="content-entry">
                                <ul class="details-list clearfix">
                                    <?php if($post->get_meta('_sim_slot')): ?>
                                        <li><strong>Sim Slot:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_sim_slot')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_camera')): ?>
                                        <li><strong>Camera:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_camera')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_smartphone_os')): ?>
                                        <li><strong>OS:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_smartphone_os')); ?></span>
                                        </li><?php endif; ?>
                                    <?php if($post->get_meta('_screen_size')): ?>
                                        <li><strong>Screen Size:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_screen_size')); ?></span>
                                        </li><?php endif; ?>
                                    <?php if($post->get_meta('_cpu_core')): ?>
                                        <li><strong>CPU Core: </strong><span
                                                    class="entry"><?php echo e($post->get_meta('_cpu_core')); ?></span></li><?php endif; ?>
                                    <?php if($post->get_meta('_ram')): ?>
                                        <li><strong>RAM :</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_ram')); ?></span></li> <?php endif; ?>
                                    <?php if($post->get_meta('_internal_storage')): ?>
                                        <li><strong>Internal Storage:</strong><span
                                                    class="entry"><?php echo e($post->get_meta('_internal_storage')); ?></span>
                                        </li> <?php endif; ?>
                                        <?php if(count(json_decode($post->get_meta('_features'))) > 0): ?>
                                        <li><strong>Features :</strong><span
                                                    class="entry"><?php foreach(json_decode($post->get_meta('_features')) as $features): ?><?php echo e($features); ?>, <?php endforeach; ?></span></li>  <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
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
                                        <?php foreach($node->getAncestorsAndSelf() as $cat): ?><?php echo e($cat->name); ?>

                                        <?php if($i < $count-1): ?>
                                            /
                                        <?php endif; ?>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                </span>
                                </li>
                                <li><strong>Condition: </strong><span
                                            class="entry"><?php echo HTML::condition($post->condition); ?></span></li>
                                <?php if($post->get_meta('_is_used_for')): ?>
                                    <li><strong>is Used For:</strong><span
                                                class="entry"><?php echo e($post->get_meta('_is_used_for')); ?></span></li>
                                <?php endif; ?>
                                <li><strong>Is Negotiable: </strong><span
                                            class="entry"><?php echo HTML::negotiable($post->is_negotiable); ?></span>
                                <?php if($post->get_meta('_is_home_delivary') == 0): ?>
                                    <li><strong>Home Delivery :</strong><span
                                                class="entry"><?php echo HTML::delivary($post->get_meta('_is_home_delivary')); ?></span>
                                    </li>
                                <?php else: ?>
                                    <li><strong>Home Delivery :</strong><span
                                                class="entry"><?php echo HTML::delivary($post->get_meta('_is_home_delivary')); ?></span>
                                    </li>
                                    <li><strong>Delivery Areas :</strong><span
                                                class="entry"><?php echo HTML::delivary($post->get_meta('_delivary_area')); ?></span>
                                    </li>
                                    <li><strong>Delivery Charge:</strong><span
                                                class="entry"><?php echo e($post->get_meta('_delivary_charges')); ?></span></li>
                                <?php endif; ?>
                                <?php if($post->get_meta('_warranty_type') == 0): ?>
                                    <li><strong>Warranty Type:</strong><span
                                                class="entry"><?php echo HTML::warranty($post->get_meta('_warranty_type')); ?></span>
                                    </li>
                                <?php else: ?>
                                    <li><strong>Warranty Type:</strong><span class="entry"><?php echo HTML::warranty($post->get_meta('_warranty_type')); ?></span>
                                    </li>
                                    <li><strong>Warranty Period:</strong><span class="entry"><?php echo e($post->get_meta('_warrenty_period')); ?></span>
                                    </li>
                                    <li><strong>Warranty Includes:</strong><span class="entry"><?php echo e($post->get_meta('_warranty_includes')); ?></span>
                                    </li>
                                    <?php endif; ?>
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
                                    <li><a target="_blank" class="share-icon fa fa-facebook-square" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url($post->slug)); ?>"></a></li>
                                    <li><a target="_blank" class="share-icon fa fa-twitter-square" href="https://twitter.com/home?status=<?php echo e(url($post->slug)); ?>"></a></li>
                                    <li><a target="_blank" class="share-icon fa fa-google-plus-square " href="https://plus.google.com/share?url=<?php echo e(url($post->slug)); ?>"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="google-ad"> <?php echo $__env->make('googleads.banner-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                    <div class="content">
                        <div class="sec-title">
                            <h4>Comments</h4>
                        </div>
                        <div class="fb-comments" data-href="<?php echo e(url($post->slug)); ?>"
                             data-numposts="10" data-width="100%"></div>
                    </div>

                </div>
                <?php echo $__env->make('sidebar-single', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-area'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/fancybox/jquery.fancybox.pack.js?v=2.1.5')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/fancybox/jquery.easing-1.4.pack.js')); ?>"></script>
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

            var wishlistaddUrl = "<?php echo e(route('add-wishlist')); ?>";
            var token = "<?php echo e(Session::getToken()); ?>";
            $('.wishlist').on('click', function () {
                var id_value = $(this).attr('data-id'); // get value pos
                var wishlist_url = "<?php echo e(route('my-wishlist')); ?>";
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>