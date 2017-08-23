{!! Form::open(array('url' => 'login', 'method' => 'POST', 'class' => 'login-form', 'role' => 'form')) !!}
<div class="gform_body">
    <ul class="gform_fields">
        <li class="gfield">
            {!! Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder'   => Lang::get('auth.ph_email'),'value' => '','required' => 'required',)) !!}
        </li>
        <li class="gfield">
            {!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder'   => Lang::get('auth.ph_password'),'required' => 'required')) !!}
        </li>
        <li class="gfield">
            <div class="checkbox icheck">
                {!! Form::checkbox('remember', 'remember', true, array('id' => 'remember', 'class' => 'icheckbox_square-blue')) !!}
                {!! Form::label('remember', Lang::get('auth.rememberMe')) !!}
            </div>
        </li>
    </ul>
</div>
<div class="gform_footer left_label">
    {!! Form::button(Lang::get('auth.login-button'), array('class' => 'button big button1','type' => 'submit')) !!}
    <a href="{{ url('password/email') }}">{{ Lang::get('auth.forgot') }}</a>
</div>
<div class="m-t-10">
    <p class="register-info">Don't have an account? <a href="{{ url('register') }}">{{ Lang::get('auth.register') }}</a>
    </p>
</div>
{!! Form::close() !!}