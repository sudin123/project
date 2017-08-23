<?php $__env->startSection('title'); ?><?php echo e($page->title); ?> - Sellnepal@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="content ">
                <div class="sec-title filter-option clearfix">
                    <h2><?php echo e($page->title); ?></h2>
                </div>
                <div class="content-entry">
                    <?php echo HTML::content($page->content); ?>

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