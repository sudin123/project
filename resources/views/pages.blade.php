@extends('site')
@section('title'){{$page->title}} - Sellnepal@parent @stop
@section('styles')

@endsection
@include('helper.macros')
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="content ">
                <div class="sec-title filter-option clearfix">
                    <h2>{{ $page->title }}</h2>
                </div>
                <div class="content-entry">
                    {!! HTML::content($page->content) !!}
                </div>
            </div>
        </div>
    </section>
@endsection


@section('extra-area')
@endsection
@section('scripts')

@endsection
