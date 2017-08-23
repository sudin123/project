<?php echo Form::open(array('url' => url('/register'), 'method' => 'POST', 'role' => 'form')); ?>


<?php echo csrf_field(); ?>


<?php echo $__env->make('messages.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="gform_body">
    <ul class="gform_fields">
        <li class="gfield">
            <?php echo Form::select('account_type', [
                    '' => 'Select Account Type',
                    '0' => 'Individual',
                    '1' => 'Business (For Company , Shop)',
            ], old('account_type'), ['class'=>'chosen-select']); ?>

        </li>
        <li class="gfield">
            <?php echo Form::text('username', old('username'), array('id' => 'name', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_name'), 'required' => 'required')); ?>

        </li>
        <li class="gfield">
            <?php echo Form::email('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_email'), 'required' => 'required')); ?>

        </li>
        <li class="gfield company-field" style="display:none">
            <?php echo Form::text('companyname', old('companyname'), array('id' => 'companyname', 'class' => 'form-control', 'placeholder' => 'Company Name')); ?>

        </li>
        <li class="gfield type-individual">
            <?php echo Form::text('first_name', old('first_name'), array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_firstname'))); ?>

        </li>
        <li class="gfield type-individual">
            <?php echo Form::text('last_name', old('last_name'), array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_lastname'))); ?>

        </li>
        <li class="gfield">
            <?php echo Form::text('phone', old('phone'), array('id' => 'phone', 'class' => 'form-control', 'placeholder' => Lang::get('auth.phone'), 'required' => 'required')); ?>

        </li>
        <li class="gfield">
            <?php echo Form::text('street', old('street'), array('id' => 'street', 'class' => 'form-control', 'placeholder' => Lang::get('auth.street'))); ?>

        </li>
        <li class="gfield">
            <?php echo Form::text('area', old('area'), array('id' => 'area', 'class' => 'form-control', 'placeholder' => Lang::get('auth.area'))); ?>

        </li>
        <li class="gfield">
            <?php $city = array('' => 'Select City'); ?>
            <?php foreach($cities as $ct): ?>
                <?php $city[$ct->id] = $ct->name; ?>
            <?php endforeach; ?>
            <?php echo Form::select('city', $city, old('city'), ['class'=>'chosen-select']); ?>

        </li>
        <li class="gfield">
            <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password'), 'required' => 'required',)); ?>

        </li>
        <li class="gfield">
            <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password_conf'), 'required' => 'required',)); ?>

        </li>
        <?php /*<li class="gfield">*/ ?>
            <?php /*<?php echo Form::checkbox('showphone', 'showphone', true, array('id' => 'showphone',  'class' => 'icheckbox_square-blue','required' => 'required')); ?>*/ ?>
            <?php /*<?php echo e(Lang::get('auth.show_phone')); ?>*/ ?>
        <?php /*</li>*/ ?>
        <li class="gfield">
            <?php echo Form::checkbox('agree', 'agree', true, array('id' => 'agreetoterms','required' => 'required')); ?>

            &nbsp; I agree to the <?php echo HTML::link('page/termsandconditions', 'terms and conditions', array('target' => '_blank')); ?>

        </li>
    </ul>
</div>
<div class="gform_footer left_label">
    <?php echo Form::button(Lang::get('auth.register_submit'), array('class' => 'button gform_button button1','type' => 'submit')); ?>

</div>
<div class="m-t-10">
    <p class="register-info">Already have an account? <a href="<?php echo e(url('login')); ?>"><?php echo e(Lang::get('auth.login')); ?></a>
    </p>
</div>
<?php echo Form::close(); ?>

