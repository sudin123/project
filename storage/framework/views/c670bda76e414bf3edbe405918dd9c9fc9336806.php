<?php $__env->startSection('title'); ?>Register - sellnepal.com@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<section id="main-content">
    <div class="container">
        <div class="col-xs-12 col-lg-6 col-lg-offset-3 col-xs-offset-0">
            <div class="access-block   login-block">
                <div class="access-fields">
                    <h2>Register</h2>
                    <?php echo $__env->make('helper.sm-logins', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="sep-or"><span>OR</span></div>
                    <?php echo $__env->make('auth.forms.registerform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-area'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    var val = $('form select[name="account_type"]').val();
    if (val == 1) {
        $('.company-field').show();
        $('.type-individual').hide();
        $('.type-individual').hide();
    } else {
        $('.company-field').hide();
        $('.type-individual').show();
        $('.type-individual').show();
    }
    $('form select[name="account_type"]').change(function () {
        if ($('form select option:selected').val() == '1') {
            $('.company-field').show();
            $('.type-individual').hide();
            $('.type-individual').hide();
        } else {
            $('.company-field').hide();
            $('.type-individual').show();
            $('.type-individual').show();
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>