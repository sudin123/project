<?php $__env->startSection('title'); ?>Company Profile - sellnepal.com@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong> <?php echo Breadcrumbs::render('edit-company-profile'); ?>

                </div>
                <?php echo $__env->make('auth.items.member-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="form-wrapper">
                    <?php echo Form::open(array('url' => route('update-company-profile'), 'method' => 'POST', 'role' => 'form', 'files' => true)); ?>

                   <?php echo $__env->make('auth.forms.companyprofile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="gform_footer left_label">
                        <?php echo Form::button(Lang::get('auth.update'), array('class' => 'button gform_button button1','type' => 'submit')); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>