@extends('site')
@section('title')My Wishlists - sellnepal.com@parent @stop
@section('styles')

@endsection
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong> {!! Breadcrumbs::render('my-wishlist') !!}
                </div>
                @include('auth.items.member-menu')
                <div class="entry">
                    <h2>My Wishlist</h2>
                    @if($posts)
                        <div class="table-responsive fancy-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><a target="_blank" href="{{ url($post->slug) }}">{{ str_limit($post->title, $limit = 80, $end = '...') }}</a></td>
                                        <td>
                                            <div class="icon-group">
                                                <a href="{{ route('delete-wishlist', ['postid' => $post->id]) }}" class="fa fa-trash-o" title="Remove from Wishlist" data-toggle="tooltip"></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                    @endif
                    {{ $posts->render() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
