
<?php $__env->startSection('title'); ?>Login - sellnepal.com@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="col-xs-12 col-lg-6 col-lg-offset-3 col-xs-offset-0">
                <div class="access-block login-block">
                    <div class="access-fields">
                        <h2>login</h2>
                        <?php echo $__env->make('helper.sm-logins', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="sep-or"><span>OR</span></div>
                        <?php echo $__env->make('messages.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('auth.forms.loginform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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