@extends('site')
@section('title')Activiate Account - sellnepal.com@parent @stop
@section('styles')

@endsection
@include('helper.macros')
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="col-xs-12 col-lg-9 col-lg-offset-2 col-xs-offset-0">
                <div class="access-block middle-align login-block">
                    <div class="clearfix login-header">
                        <a class="login-logo" href="{{ url('/') }}">Sell<span>Nepal</span></a>
                    </div>
                    <div class="access-fields">
                        <h2>Activiate Account</h2>
                        <div class="icon-with-message text-center">
                            <div class="welcome-image">
                                {!! HTML::image(Gravatar::get(Lang::get('auth.newUserEmail',['email' => $email] )), Lang::get('auth.newUsername',['username' => $username] ), array('class' => 'image-no-drag')) !!}
                            </div>
                            <div class="lockscreen-name margin-bottom-2">
                                <h3>
                                    <strong>
                                        {{ Lang::get('auth.newUserWelcome',['username' => $username] ) }}
                                    </strong>
                                </h3>
                            </div>
                            {!! HTML::icon_btn( '/resendEmail', 'fa fa-paper-plane-o margin-left-1', Lang::get('auth.clickHereResend'), array('title' => Lang::get('auth.clickHereResend'), 'class' => 'button gform_button button1')) !!}
                        </div>
                        <div class="m-t-10">
                            <p class="register-info">Already Verified? Please login to continue <a href="{{ url('login') }}">{{ Lang::get('auth.login') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-area')
    <div class="overlay"></div>
@endsection
@section('scripts')

@endsection