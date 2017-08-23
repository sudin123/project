@extends('site')
@section('title')404 error - Sellnepal@parent @stop
@section('styles')

@endsection
@include('helper.macros')
@section('content')
<section id="main-content">
    <div class="container">
        <div class="content text-center error-page">
            <div class="media">
                
                <div class="media-body media-middle">
                    <h2 class="text-404">Looks like <span>Rajesh Dai</span> broke this Page . </h2>
                    <h4>It may never recover....  :(</h4>
                    <a href="{{url('/')}}" class="button big">Get Outta Here !!</a>
                </div>
                <div class="media-left media-middle">
                    <img src="{{asset('assets/images/rajeshdai.png')}}" alt="" class="media-object"/>
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
