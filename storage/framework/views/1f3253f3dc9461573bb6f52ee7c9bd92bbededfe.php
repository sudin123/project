<?php $__env->startSection('title'); ?>Change Password - sellnepal.com@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong><?php echo Breadcrumbs::render('change-password'); ?>

                </div>
                <?php echo $__env->make('auth.items.member-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="entry">
                    <div class="form-wrapper">
                        <?php echo Form::open(array('url' => route('update-password'), 'method' => 'POST', 'role' => 'form')); ?>

                        <div class="gform_body">
                            <ul class="gform_fields">
                                <?php echo csrf_field(); ?>

                                <?php echo $__env->make('messages.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <li class="gfield">
                                    <?php echo Form::label('oldpassword', Lang::get('auth.oldpassword') , array('class' => 'gfield_label')); ?>

                                    <?php echo Form::password('oldpassword', array('id' => 'oldpassword', 'class' => 'form-control', 'placeholder' => Lang::get('auth.oldpassword'))); ?>

                                    <p class="help-block text-blue">(Please leave empty if you have registered from facebook/google or has not yet set the password.)</p>
                                </li>
                                <li class="gfield">
                                    <?php echo Form::label('password', Lang::get('auth.newpassword') , array('class' => 'gfield_label')); ?>

                                    <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => Lang::get('auth.newpassword'), 'required' => 'required',)); ?>

                                </li>
                                <li class="gfield">
                                    <?php echo Form::label('password_confirmation', Lang::get('auth.confirmPassword') , array('class' => 'gfield_label')); ?>

                                    <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password_conf'), 'required' => 'required',)); ?>

                                </li>
                            </ul>
                        </div>
                        <div class="gform_footer left_label">
                            <?php echo Form::button(Lang::get('auth.update'), array('class' => 'button gform_button button1','type' => 'submit')); ?>

                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>