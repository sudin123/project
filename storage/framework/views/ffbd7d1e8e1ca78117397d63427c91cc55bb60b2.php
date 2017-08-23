<?php echo Form::open(array('url' => 'login', 'method' => 'POST', 'class' => 'login-form', 'role' => 'form')); ?>

<div class="gform_body">
    <ul class="gform_fields">
        <li class="gfield">
            <?php echo Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder'   => Lang::get('auth.ph_email'),'value' => '','required' => 'required',)); ?>

        </li>
        <li class="gfield">
            <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder'   => Lang::get('auth.ph_password'),'required' => 'required')); ?>

        </li>
        <li class="gfield">
            <div class="checkbox icheck">
                <?php echo Form::checkbox('remember', 'remember', true, array('id' => 'remember', 'class' => 'icheckbox_square-blue')); ?>

                <?php echo Form::label('remember', Lang::get('auth.rememberMe')); ?>

            </div>
        </li>
    </ul>
</div>
<div class="gform_footer left_label">
    <?php echo Form::button(Lang::get('auth.login-button'), array('class' => 'button big button1','type' => 'submit')); ?>

    <a href="<?php echo e(url('password/email')); ?>"><?php echo e(Lang::get('auth.forgot')); ?></a>
</div>
<div class="m-t-10">
    <p class="register-info">Don't have an account? <a href="<?php echo e(url('register')); ?>"><?php echo e(Lang::get('auth.register')); ?></a>
    </p>
</div>
<?php echo Form::close(); ?>