<?php $__env->startSection('title'); ?>404 error - Sellnepal@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<section id="main-content">
    <div class="container">
        <div class="content text-center error-page">
            <div class="media">
                
                <div class="media-body media-middle">
                    <h2 class="text-404">Looks like <span>Rajesh Dai</span> broke this Page . </h2>
                    <h4>It may never recover....  :(</h4>
                    <a href="<?php echo e(url('/')); ?>" class="button big">Get Outta Here !!</a>
                </div>
                <div class="media-left media-middle">
                    <img src="<?php echo e(asset('assets/images/rajeshdai.png')); ?>" alt="" class="media-object"/>
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