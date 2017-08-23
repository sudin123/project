@extends('site')
@section('title')Reset Password - sellnepal.com@parent @stop
@section('styles')

@endsection
@include('helper.macros')
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="col-xs-12 col-lg-6 col-lg-offset-3 col-xs-offset-0">
                <div class="access-block  login-block">
                    <div class="access-fields">
                        <h2>Reset Password</h2>
                        @include('messages.messages')
                        @include('auth.forms.resetform')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-area')
@endsection
@section('scripts')

@endsection