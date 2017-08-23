@extends('site')
@section('title')Edit Ad - Sellnepal@parent @stop
@section('styles')

@endsection
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="post-ads-box clearfix">
                <a class="link home-link" href="{{ url('/') }}">back to home</a>
                <h4 class="text-center title">Edit your Ad</h4>
                <div class="col-md-8 col-md-offset-2">
                    <div class="breadcrumb">
                        <strong>You are here:</strong><strong>You are here:</strong> {!! Breadcrumbs::render('edit-ads', $post) !!}
                    </div>
                    <h4 class="text-center">Add Details</h4>
                    @include('messages.messages')
                    {!! Form::open(array('route' => 'ad-update',  'method' => 'POST', 'role' => 'form',  'files' => true)) !!}
                    <input type="hidden" name="post_id" value="{{ \Crypt::encrypt($post->id) }}">
                    @include('posts.editform')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-area')
@endsection

@section('scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
            selector:'textarea',
            menubar:false,
            statusbar: false,
        });</script>
@endsection


