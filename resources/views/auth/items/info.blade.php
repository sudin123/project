@extends('site')
@section('title')Member Area :: Site Name@parent @stop
@section('styles')

@endsection
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:{!! Breadcrumbs::render('member-area') !!}</strong>
                </div>
                @include('auth.items.member-menu')
                <div class="entry ">
                                    <h2>Hello, {{ $user->firstname . ' '. $user->lastname }}.</h2>
                                    <p> Welcome to your member area!</p>
                                    <p> From here, you can post new ad, manage your existing ads, pictures and contact information. Please choose your action from the menu on the left hand side. </p>
                                    <p>If you require any help, please contact us at <a href="mailto:help@sellnepal.com">help@sellnepal.com</a></p>
                                    <p>
                                        <em>Number of Ads.: {{ $posts_num }}</em><br>
                                        <em>Number of Views.: {{ $views_num }}</em>
                                    </p>
                        </div>
                    </div>
                </div>
    </section>
@endsection

@section('scripts')

@endsection
