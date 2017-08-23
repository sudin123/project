@extends('site')
@section('title')Change Password - sellnepal.com@parent @stop
@section('styles')

@endsection
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong>{!! Breadcrumbs::render('change-password') !!}
                </div>
                @include('auth.items.member-menu')
                <div class="entry">
                    <div class="form-wrapper">
                        {!! Form::open(array('url' => route('update-password'), 'method' => 'POST', 'role' => 'form')) !!}
                        <div class="gform_body">
                            <ul class="gform_fields">
                                {!! csrf_field() !!}
                                @include('messages.messages')
                                <li class="gfield">
                                    {!! Form::label('oldpassword', Lang::get('auth.oldpassword') , array('class' => 'gfield_label')) !!}
                                    {!! Form::password('oldpassword', array('id' => 'oldpassword', 'class' => 'form-control', 'placeholder' => Lang::get('auth.oldpassword'))) !!}
                                    <p class="help-block text-blue">(Please leave empty if you have registered from facebook/google or has not yet set the password.)</p>
                                </li>
                                <li class="gfield">
                                    {!! Form::label('password', Lang::get('auth.newpassword') , array('class' => 'gfield_label')) !!}
                                    {!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => Lang::get('auth.newpassword'), 'required' => 'required',)) !!}
                                </li>
                                <li class="gfield">
                                    {!! Form::label('password_confirmation', Lang::get('auth.confirmPassword') , array('class' => 'gfield_label')) !!}
                                    {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => Lang::get('auth.ph_password_conf'), 'required' => 'required',)) !!}
                                </li>
                            </ul>
                        </div>
                        <div class="gform_footer left_label">
                            {!! Form::button(Lang::get('auth.update'), array('class' => 'button gform_button button1','type' => 'submit')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
