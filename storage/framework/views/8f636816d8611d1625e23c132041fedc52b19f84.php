<?php $__env->startSection('title'); ?>Reset Password - sellnepal.com@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="col-xs-12 col-lg-9 col-lg-offset-2 col-xs-offset-0">
                <div class="access-block middle-align login-block">
                    <div class="clearfix login-header">
                        <a class="login-logo" href="<?php echo e(url('/')); ?>">Sell<span>Nepal</span></a>
                    </div>
                    <div class="access-fields">
                        <h2>Reset Password</h2>
                        <?php echo $__env->make('messages.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('auth.forms.resetform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-area'); ?>
    <div class="overlay"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>