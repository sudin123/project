<?php $__env->startSection('title'); ?>Sellnepal - Free Classified Nepal, Online Advertising Nepal @parent  <?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>Sellnepal is a free online classified site of Nepal where you can buy, sell and advertise any used or brand new products or service faster and easier. @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_keywords'); ?> sellnepal, classified nepal, free classified nepal, online advertising, free advertising nepal, classified nepal, used shop nepal,secondhand shop nepal, buy sell nepal, classified ads in nepal, online advertising nepal, best offers, nepali online classified, secondhand shop kathmandu, used shop nepal  @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_robots'); ?>index follow@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('googlebot'); ?>index follow@parent <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<section id="top-sec">
    <div class="container">
        <div class="sec-title clearfix">
            <h2>Featured Ads</h2>
        </div>
        <div id="rec-slider" class="owl-carousel recommendation">
            <?php foreach($featured_posts as $post): ?>
            <div class="item">
                <div class="post-box">
                    <figure class="image-holder"> 
                        <a href="<?php echo e(url($post->slug)); ?>">
                                         <?php $images = $post->gallery; ?>
                                        <?php if($post->get_meta('_featured_image') != 'no-image.png'): ?>
                                        <?php echo HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="260",$h="150", $crop = true, $parms = array()); ?>

                                        <?php elseif(count($images) > 0): ?>
                                        <?php echo HTML::cropimage('uploads/'.$images[0]['filename'], $w="260",$h="150", $crop = true, $parms = array()); ?>

                                        <?php else: ?>
                                        <?php echo HTML::cropimage('uploads/no-image.png', $w="260",$h="150", $crop = true, $parms = array()); ?>

                                        <?php endif; ?>
                                    </a> 
                        <div class="item-meta">
                            <span class="price">
                                Rs <?php echo e($post->price); ?>

                            </span>
                            <span class="condition">
                                <?php echo HTML::condition($post->condition); ?>

                            </span>
                        </div>
                    </figure>
                    <h3 class="post-title"><a
                            href="<?php echo e(url($post->slug)); ?>"> <?php echo e(str_limit($post->title, $limit = 30, $end = '...')); ?></a>
                    </h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section id="main-sec">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-md-9 col-sm-9">
                <div class="google-ad">
                    <?php echo $__env->make('googleads.banner-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="block">
                    <div class="sec-title clearfix">
                        <h2>Popular Ads <a href="<?php echo e(route('popular-ads')); ?>" class="small">(View all)</a></h2>
                    </div>
                    <div class="content-entry">
                        <ul class="box-listing row">
                            <?php foreach($popular_posts as $post): ?>
                            <li class="post clearfix col-md-4">
                                <figure class="image-holder">
                                    <a href="<?php echo e(url($post->slug)); ?>">
                                         <?php $images = $post->gallery; ?>
                                        <?php if($post->get_meta('_featured_image') != 'no-image.png'): ?>
                                        <?php echo HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="260",$h="150", $crop = true, $parms = array()); ?>

                                        <?php elseif(count($images) > 0): ?>
                                        <?php echo HTML::cropimage('uploads/'.$images[0]['filename'], $w="260",$h="150", $crop = true, $parms = array()); ?></a>
                                        <?php else: ?>
                                        <?php echo HTML::cropimage('uploads/no-image.png', $w="260",$h="150", $crop = true, $parms = array()); ?>

                                        <?php endif; ?>
                                    </a> 
                                    <div class="item-meta">
                                        <span class="price">
                                            Rs <?php echo e($post->price); ?>

                                        </span>
                                        <span class="condition">
                                            <?php echo HTML::condition($post->condition); ?>

                                        </span>
                                    </div>
                                </figure>
                                <h3 class="post-title"><a
                                        href="<?php echo e(url($post->slug)); ?>"> <?php echo e(str_limit($post->title, $limit = 30, $end = '...')); ?></a>
                                </h3>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="google-ad">
                    <?php echo $__env->make('googleads.banner-ad-2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="block add-margin-5">
                    <div class="sec-title  clearfix">
                        <h2>Recent Ads <a href="<?php echo e(route('recent-ads')); ?>" class="small">(View all)</a></h2>
                    </div>
                    <div class="content-entry">
                        <ul class="box-listing row">
                            <?php foreach($latest_posts as $post): ?>
                            <li class="post clearfix col-md-4">
                                <figure class="image-holder">
                                    <a href="<?php echo e(url($post->slug)); ?>">
                                         <?php $images = $post->gallery; ?>
                                        <?php if($post->get_meta('_featured_image') != 'no-image.png'): ?>
                                        <?php echo HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="260",$h="150", $crop = true, $parms = array()); ?>

                                        <?php elseif(count($images) > 0): ?>
                                        <?php echo HTML::cropimage('uploads/'.$images[0]['filename'], $w="260",$h="150", $crop = true, $parms = array()); ?></a>
                                        <?php else: ?>
                                        <?php echo HTML::cropimage('uploads/no-image.png', $w="260",$h="150", $crop = true, $parms = array()); ?>

                                        <?php endif; ?>
                                    </a> 
                                    <div class="item-meta">
                                        <span class="price">
                                            Rs <?php echo e($post->price); ?>

                                        </span>
                                        <span class="condition">
                                            <?php echo HTML::condition($post->condition); ?>

                                        </span>
                                    </div>
                                </figure>
                                <h3 class="post-title"><a
                                        href="<?php echo e(url($post->slug)); ?>"><?php echo e(str_limit($post->title, $limit = 30, $end = '...')); ?></a>
                                </h3>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-area'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>