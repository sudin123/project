{!! Form::open(array('url' => url('/register'), 'method' => 'POST', 'role' => 'form')) !!}

{!! csrf_field() !!}

@include('messages.messages')
<div class="gform_body">
    <ul class="gform_fields">
        <li class="gfield">
            {!! Form::select('account_type', [
                    '' => 'Select Account Type',
                    '0' => 'Individual',
                    '1' => 'Business (For Company , Shop)',
            ], old('account_type'), ['class'=>'chosen-select'])  !!}
        </li>
        <li class="gfield">
            {!! Form::text('username', old('username'), array('id' => 'name', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_name'), 'required' => 'required')) !!}
        </li>
        <li class="gfield">
            {!! Form::email('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_email'), 'required' => 'required')) !!}
        </li>
        <li class="gfield company-field" style="display:none">
            {!! Form::text('companyname', old('companyname'), array('id' => 'companyname', 'class' => 'form-control', 'placeholder' => 'Company Name')) !!}
        </li>
        <li class="gfield type-individual">
            {!! Form::text('first_name', old('first_name'), array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_firstname'))) !!}
        </li>
        <li class="gfield type-individual">
            {!! Form::text('last_name', old('last_name'), array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_lastname'))) !!}
        </li>
        <li class="gfield">
            {!! Form::text('phone', old('phone'), array('id' => 'phone', 'class' => 'form-control', 'placeholder' => Lang::get('auth.phone'), 'required' => 'required')) !!}
        </li>
        <li class="gfield">
            {!! Form::text('street', old('street'), array('id' => 'street', 'class' => 'form-control', 'placeholder' => Lang::get('auth.street'))) !!}
        </li>
        <li class="gfield">
            {!! Form::text('area', old('area'), array('id' => 'area', 'class' => 'form-control', 'placeholder' => Lang::get('auth.area'))) !!}
        </li>
        <li class="gfield">
            <?php $city = array('' => 'Select City'); ?>
            @foreach($cities as $ct)
                <?php $city[$ct->id] = $ct->name; ?>
            @endforeach
            {!! Form::select('city', $city, old('city'), ['class'=>'chosen-select'])  !!}
        </li>
        <li class="gfield">
            {!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password'), 'required' => 'required',)) !!}
        </li>
        <li class="gfield">
            {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password_conf'), 'required' => 'required',)) !!}
        </li>
        {{--<li class="gfield">--}}
            {{--{!! Form::checkbox('showphone', 'showphone', true, array('id' => 'showphone',  'class' => 'icheckbox_square-blue','required' => 'required')) !!}--}}
            {{--{{ Lang::get('auth.show_phone') }}--}}
        {{--</li>--}}
        <li class="gfield">
            {!! Form::checkbox('agree', 'agree', true, array('id' => 'agreetoterms','required' => 'required')) !!}
            &nbsp; I agree to the {!! HTML::link('page/termsandconditions', 'terms and conditions', array('target' => '_blank')) !!}
        </li>
    </ul>
</div>
<div class="gform_footer left_label">
    {!! Form::button(Lang::get('auth.register_submit'), array('class' => 'button gform_button button1','type' => 'submit')) !!}
</div>
<div class="m-t-10">
    <p class="register-info">Already have an account? <a href="{{ url('login') }}">{{ Lang::get('auth.login') }}</a>
    </p>
</div>
{!! Form::close() !!}
