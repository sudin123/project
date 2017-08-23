<?php $__env->startSection('title'); ?>Company Profiles - sellnepal.com@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?>Dealers Profile - Sellnepal@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_keywords'); ?> dealers in nepal, vendors in nepal, buy sale nepal, classified ads nepal @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_robots'); ?>index follow@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('googlebot'); ?>index follow@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<section id="main-content">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('sidebar-company', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-md-9 col-sm-9">
                <div class="google-ad"> <?php echo $__env->make('googleads.banner-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="content">
                    <div class="sec-title clearfix">
                        <h2>Company Profiles</h2>
                    </div>
                    <div class="content-entry">
                        <ul class="post-listing dealers-listing">
                            <?php foreach($users as $user): ?>
                            <li class="post clearfix">
                                <figure class="image-holder">
                                    <?php if($user->profile->company_logo): ?>
                                    <?php echo HTML::cropimage('uploads/company-logo/'.$user->profile->company_logo, $w="180",$h="145", $crop = false, $parms = array()); ?>

                                    <?php else: ?>
                                        <?php echo HTML::cropimage('uploads/no-image.png', $w="180",$h="145", $crop = false, $parms = array()); ?>

                                    <?php endif; ?>
                                </figure>
                                <div class="entry clearfix">
                                    <h4>
                                        <a href="<?php echo e(url('dealers/'.$user->username)); ?>"><?php echo e($user->profile->company_name); ?> </a>
                                        <a class="dealers-post-count" href="<?php echo e(url('dealers/'.$user->username)); ?>">
                                            <?php echo e(count($user->AuthorAds)); ?>

                                            <span>Ads</span>
                                        </a>
                                    </h4>
                                    <div class="meta clearfix">
                                        <strong>Contact No:</strong> <?php echo e($user->profile->phone); ?><br>
                                        <strong>Email:</strong> <?php echo e($user->email); ?><br>
                                        <?php if($user->profile->website != ''): ?>
                                        <strong>Website:</strong> <?php echo e($user->profile->website); ?><br>
                                        <?php endif; ?>
                                        <strong>City:</strong> <?php echo e(\App\City::findorFail($user->user_profile->city)->name); ?>

                                        <br>
                                        <strong>Location:</strong> <?php echo e($user->profile->street); ?> <?php echo e($user->profile->area); ?>

                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php echo e($users->render()); ?>

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