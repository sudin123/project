@extends('site')
@section('title')Dealers Search - Sellnepal@parent @stop
@section('styles')

@endsection
@include('helper.macros')
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="row">
                @include('sidebar-company')
                <div class="col-md-9 col-sm-9">
                    @include('googleads.banner-ad')
                    <div class="content">
                        <div class="sec-title filter-option clearfix">
                            <h2>Search Dealers</h2>
                        </div>
                        <div class="content-entry">
                            <ul class="post-listing dealers-listing">
                                @foreach($dealers as $user)
                                    <li class="post clearfix">
                                            <figure class="image-holder">
                                                @if($user->profile->company_logo)
                                                    {!! HTML::cropimage('uploads/company-logo/'.$user->profile->company_logo, $w="180",$h="145", $crop = false, $parms = array()) !!}
                                                @else
                                                    {!! HTML::cropimage('uploads/no-image.png', $w="180",$h="145", $crop = false, $parms = array()) !!}
                                                @endif
                                            </figure>
                                        <div class="entry clearfix">
                                            <h4>
                                                <a href="{{ url('dealers/'.$user->username) }}">{{ $user->profile->company_name }} </a>
                                                <a class="dealers-post-count"
                                                   href="{{ url('dealers/'.$user->username) }}">
                                                    {{ count($user->AuthorAds) }}
                                                    <span>Ads</span>
                                                </a>
                                            </h4>
                                            <div class="meta clearfix">
                                                <strong>Contact No:</strong> {{ $user->profile->phone }}<br>
                                                <strong>Email:</strong> {{ $user->email }}<br>
                                                @if($user->profile->website != '')
                                                <strong>Website:</strong> {{ $user->profile->website }}<br>
                                                @endif
                                                <strong>City:</strong> {{ \App\City::findorFail($user->user_profile->city)->name }}
                                                <br>
                                                <strong>Location:</strong> {{ $user->profile->street }} {{ $user->profile->area }}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{ $dealers->appends(array('d' => $search))->links() }}
                    </div>
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
