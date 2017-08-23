<?php echo Form::open(array('url' => 'password/reset', 'method' => 'POST', 'class' => 'login-form', 'role' => 'form')); ?>

<?php echo csrf_field(); ?>

<input type="hidden" name="token" value="<?php echo e($token); ?>">
<div class="gform_body">
    <ul class="gform_fields">
        <li class="gfield">
            <?php echo Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder'   => Lang::get('auth.ph_email'),'value' => '','required' => 'required',)); ?>

        </li>
        <li class="gfield">
            <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder'   => Lang::get('auth.ph_password'),'required' => 'required')); ?>

        </li>
        <li class="gfield">
            <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder'   => Lang::get('auth.ph_password'),'required' => 'required')); ?>

        </li>
    </ul>
</div>
<div class="gform_footer left_label">
    <?php echo Form::button(Lang::get('auth.change'), array('class' => 'button big button1','type' => 'submit')); ?>

</div>
<?php echo Form::close(); ?>