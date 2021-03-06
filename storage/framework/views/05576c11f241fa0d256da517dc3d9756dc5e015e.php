<?php $__env->startSection('title'); ?><?php echo e($user->profile->company_name); ?> Profile - Sellnepal @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<section id="main-content">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('sidebar-company', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-md-9 col-sm-9">
                <div class="content">
                    <div class="sec-title filter-option clearfix">
                        <h2>About <?php echo e($user->profile->company_name); ?></h2>
                        <div class="dealers-post-count pull-right"><?php echo e(count($user->AuthorAds)); ?> <span>Ads</span></div>
                    </div>
                    <div class="content-entry">
                        <article class="post-details clearfix">
                            <figure class="image-holder alignright">
                                <?php if($user->profile->company_logo): ?>
                                    <?php echo HTML::cropimage('uploads/company-logo/'.$user->profile->company_logo, $w="180",$h="145", $crop = false, $parms = array()); ?>

                                <?php else: ?>
                                    <?php echo HTML::cropimage('uploads/no-image.png', $w="180",$h="145", $crop = false, $parms = array()); ?>

                                <?php endif; ?>
                            </figure>
                            <div class="entry">
                               
                                <div class="entry">    <p><?php echo e($user->profile->about); ?></p></div>
                                <div class="meta clearfix">
                                    <p>
                                        <strong>Contact No:</strong> <a
                                            href="tel:<?php echo e($user->profile->phone); ?>"><?php echo e($user->profile->phone); ?></a> <?php if($user->profile->telephone): ?>
                                        ,
                                        <a href="tel:<?php echo e($user->profile->telephone); ?>"><?php echo e($user->profile->telephone); ?></a> <?php endif; ?>
                                        <br>
                                        <?php if($user->profile->fax): ?>
                                        <strong>FAX.</strong> <?php echo e($user->profile->fax); ?><br>
                                        <?php endif; ?>
                                        <strong>Email:</strong> <a
                                            href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a><br>
                                        <?php if($user->profile->website != ''): ?>
                                        <strong>Website:</strong> <?php echo e($user->profile->website); ?><br>
                                        <?php endif; ?>
                                        <strong>City:</strong> <?php echo e(\App\City::findorFail($user->user_profile->city)->name); ?>

                                        <br>
                                        <strong>Location:</strong> <?php echo e($user->profile->street); ?> <?php echo e($user->profile->area); ?>

                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="google-ad"> <?php echo $__env->make('googleads.banner-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="content">
                    <div class="sec-title clearfix">
                        <h2><?php echo e($user->profile->company_name); ?> Ads</h2>
                    </div>
                    <div class="content-entry">
                    <?php if(count($posts) >= 1): ?>
                    <ul class="box-listing row">
                        <?php foreach($posts as $post): ?>
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
                            <h3 class="post-title"><a href="<?php echo e(url($post->slug)); ?>"> <?php echo e(strip_tags(str_limit($post->title, $limit = 30, $end = '...'))); ?></a></h3>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?php echo e($posts->render()); ?>

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