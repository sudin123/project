<?php $__env->startSection('title'); ?>Member Area :: Site Name@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:<?php echo Breadcrumbs::render('member-area'); ?></strong>
                </div>
                <?php echo $__env->make('auth.items.member-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="entry ">
                                    <h2>Hello, <?php echo e($user->firstname . ' '. $user->lastname); ?>.</h2>
                                    <p> Welcome to your member area!</p>
                                    <p> From here, you can post new ad, manage your existing ads, pictures and contact information. Please choose your action from the menu on the left hand side. </p>
                                    <p>If you require any help, please contact us at <a href="mailto:help@sellnepal.com">help@sellnepal.com</a></p>
                                    <p>
                                        <em>Number of Ads.: <?php echo e($posts_num); ?></em><br>
                                        <em>Number of Views.: <?php echo e($views_num); ?></em>
                                    </p>
                        </div>
                    </div>
                </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>