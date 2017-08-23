{!! Form::open(array('url' => 'password/email', 'method' => 'POST', 'class' => 'login-form', 'role' => 'form')) !!}
{!! csrf_field() !!}
<div class="gform_body">
    <ul class="gform_fields">
        <li class="gfield">
            {!! Form::email('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_email'), 'required' => 'required')) !!}
        </li>
    </ul>
</div>
<div class="gform_footer left_label">
    {!! Form::button(Lang::get('auth.forget_password'), array('class' => 'button gform_button button1','type' => 'submit')) !!}
</div>
<div class="m-t-10">
    <p class="register-info">Don't have an account? <a href="{{ url('register') }}">&nbsp;Register a new membership</a></p>
</div>
{!! Form::close() !!}