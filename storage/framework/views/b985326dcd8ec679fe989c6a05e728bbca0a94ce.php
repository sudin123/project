<?php $__env->startSection('title'); ?>My Profile - sellnepal.com@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong> <?php echo Breadcrumbs::render('my-profile'); ?>

                </div>
                <?php echo $__env->make('auth.items.member-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="form-wrapper">
                    <?php echo Form::open(array('url' => route('update-profile'), 'method' => 'POST', 'role' => 'form')); ?>

                    <div class="gform_body">
                        <ul class="gform_fields">
                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('messages.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php if(\Auth::user()->isBuyer()): ?>
                                <li class="gfield role-select">
                                    <?php echo Form::label('selectrole', 'Select Account Type (*)' , array('class' => 'gfield_label')); ?>

                                    <?php echo Form::select('selectrole', [
                                                       '' => 'Select Account Type',
                                                       '1' => 'Individual',
                                                       '2' => 'Business',
                                               ], old('selectrole'), ['class'=>'chosen-select']); ?>

                                    <p class="help-block text-blue">Account Type can be selected only once. So please choose what is best for you before you Proceed.</p>
                                </li>
                            <?php endif; ?>
                            <li class="gfield">
                                <?php echo Form::label('username', 'Username' , array('class' => 'gfield_label')); ?>

                                <?php echo Form::label('username', $user->username , array('class' => 'gfield_label')); ?>

                            </li>
                            <li class="gfield">
                                <?php echo Form::label('email', 'Email' , array('class' => 'gfield_label')); ?>

                                <?php echo Form::label('email',  $user->email , array('class' => 'gfield_label')); ?>

                            </li>
                            <li class="gfield">
                                <?php echo Form::label('firstname', 'First Name (*)' , array('class' => 'gfield_label')); ?>

                                <?php echo Form::text('firstname', $user->firstname, array('id' => 'firstname', 'class' => 'form-control', 'required' => 'required')); ?>

                            </li>
                            <li class="gfield">
                                <?php echo Form::label('last_name', 'Last Name (*)' , array('class' => 'gfield_label')); ?>

                                <?php echo Form::text('lastname', $user->lastname, array('id' => 'lastname', 'class' => 'form-control','required' => 'required')); ?>

                            </li>
                            <li class="gfield">
                                <?php echo Form::label('phone', 'Phone (*)' , array('class' => 'gfield_label')); ?>

                                <?php echo Form::text('phone', $user->user_profile->phone , array('id' => 'phone', 'class' => 'form-control','required' => 'required')); ?>

                            </li>
                            <li class="gfield user-city">
                                <?php echo Form::label('show_phone', 'Show Phone Number' , array('class' => 'gfield_label')); ?>

                                <?php echo Form::select('show_phone', [
                                                        '1' => 'Yes',
                                                        '0' => 'No',
                                                ], $user->user_profile->show_phone, ['class'=>'chosen-select']); ?>

                            </li>
                            <li class="gfield">
                                <?php echo Form::label('telephone', 'Other Phone.' , array('class' => 'gfield_label')); ?>

                                <?php echo Form::text('telephone', $user->user_profile->telephone , array('id' => 'telephone', 'class' => 'form-control')); ?>

                            </li>
                            <li class="gfield">
                                <?php echo Form::label('street', 'Street Address' , array('class' => 'gfield_label')); ?>

                                <?php echo Form::text('street', $user->user_profile->street , array('id' => 'street', 'class' => 'form-control' , 'placeholder' =>'Nirmal Lama Marg')); ?>

                            </li>
                            <li class="gfield">
                                <?php echo Form::label('area', 'Area (*)' , array('class' => 'gfield_label')); ?>

                                <?php echo Form::text('area', $user->user_profile->area , array('id' => 'area', 'class' => 'form-control', 'required' => 'required', 'placeholder' =>'Shorakhutte')); ?>

                            </li>
                            <li class="gfield user-city">
                                <?php echo Form::label('city', 'City (*)' , array('class' => 'gfield_label')); ?>

                                <select class="chosen-select" name="city" required>
                                    <option value="">Select City</option>
                                    <?php foreach($cities as $ct): ?>
                                        <option value="<?php echo e($ct->id); ?>" <?php if($ct->id == $user->user_profile->city): ?> <?php echo e("selected"); ?> <?php endif; ?>><?php echo e($ct->name); ?></option>
                                    <?php endforeach; ?>
                                </select>
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
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>