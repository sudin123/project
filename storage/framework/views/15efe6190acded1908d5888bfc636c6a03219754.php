<?php $__env->startSection('title'); ?>Recent Ads - Sellnepal@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?>Recent ads - Sellnepal@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_keywords'); ?> sellnepal, recent ads in nepal, ads in nepal, buy sale nepal, classified ads nepal @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_robots'); ?>index follow@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('googlebot'); ?>index follow@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<section id="main-content">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-md-9 col-sm-9">
                <div class="google-ad">
                    <?php echo $__env->make('googleads.banner-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="content ">
                    <div class="sec-title clearfix">
                        <h2>Recent Post</h2>
                    </div>
                    <div class="content-entry">
                        <ul class="post-listing">
                            <?php foreach($posts as $post): ?>
                            <li class="post clearfix">
                                <figure class="image-holder">
                                    <?php $images = $post->gallery; ?>
                                    <?php if($post->get_meta('_featured_image') != 'no-image.png'): ?>
                                    <?php echo HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="260",$h="150", $crop = true, $parms = array()); ?>

                                    <?php elseif(count($images) > 0): ?>
                                    <?php echo HTML::cropimage('uploads/'.$images[0]['filename'], $w="260",$h="150", $crop = true, $parms = array()); ?></a>
                                    <?php else: ?>
                                    <?php echo HTML::cropimage('uploads/no-image.png', $w="260",$h="150", $crop = true, $parms = array()); ?>

                                    <?php endif; ?> 
                                    <div class="item-meta">
                                        <span class="price">
                                            Rs <?php echo e($post->price); ?>

                                        </span>
                                        <span class="condition">
                                            <?php echo HTML::condition($post->condition); ?>

                                        </span>
                                    </div>
                                </figure>
                                <div class="entry clearfix">
                                    <h4><a href="<?php echo e(url($post->slug)); ?>"> <?php echo e($post->title); ?></a></h4>
                                    <p>
                                        <?php echo e(strip_tags(str_limit($post->content, $limit = 150, $end = '...'))); ?>

                                    </p>
                                    <div class="meta clearfix">
                                        <strong>Published:</strong> <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()); ?><br>
                                        <strong>Seller:</strong> <?php if($post->user->hasRole('vendor')): ?>
                                        <a href="<?php echo e(url('dealers/'.$post->user->username)); ?>"><?php echo e($post->user->profile->company_name); ?></a>
                                        <?php else: ?>
                                        <a href="<?php echo e(url('dealers/'.$post->user->username)); ?>"><?php echo e($post->user->firstname); ?> <?php echo e($post->user->lastname); ?></a>
                                        <?php endif; ?><br>
                                        <strong>Is
                                            Negotiable:</strong> <?php echo HTML::negotiable($post->is_negotiable); ?>

                                        <br>
                                        <strong>Warranty:</strong> <?php echo HTML::warranty($post->get_meta('_warranty_type')); ?>

                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php echo $posts->render(); ?>

                    </div>
                </div>
                <div class="google-ad">
                    <?php echo $__env->make('googleads.banner-ad-2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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