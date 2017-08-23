@extends('site')
@section('title')My Ads - sellnepal.com@parent @stop
@section('styles')

@endsection
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong> {!! Breadcrumbs::render('my-ads') !!}
                </div>
                @include('auth.items.member-menu')
                <div class="entry">
                    <h2>My Ads</h2>
                    @include('messages.messages')
                    @if($posts)
                        <div class="table-responsive fancy-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Ad Views</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><a target="_blank"
                                               href="{{ url($post->slug) }}">{{ str_limit($post->title, $limit = 80, $end = '...') }}</a>@if($post->status=='sold')
                                                <a href="javascript:void(0);" class="fa fa-check-circle-o item-sold"
                                                   title="Item is sold" data-toggle="tooltip"></a>
                                            @endif</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td><span class="higlight">{{ $post->view_count }}</span> times</td>
                                        <td>
                                            <div class="icon-group">
                                                @if(\Auth::user()->hasRole('administrator'))
                                                    @if($post->is_featured==1)
                                                    <a href="{{ route('mark-notfeatured', $post->id) }}"
                                                       class="fa fa-star" title="UnMark as Featured"
                                                       data-toggle="tooltip"></a>
                                                    @else
                                                        <a href="{{ route('mark-featured', $post->id) }}"
                                                           class="fa fa-star-o" title="Mark as Featured"
                                                           data-toggle="tooltip"></a>
                                                    @endif
                                                    @if($post->status=='publish')
                                                        <a href="{{ route('mark-sold', $post->id) }}"
                                                           class="fa fa-upload" title="Mark as sold"
                                                           data-toggle="tooltip"></a>
                                                    @else
                                                        <a href="{{ route('mark-publish', $post->id) }}"
                                                           class="fa fa-check-circle-o item-sold"
                                                           title="Mark as publish" data-toggle="tooltip"></a>
                                                    @endif
                                                @else
                                                    <a href="{{ route('add-images', $post->id) }}"
                                                       class="fa fa-picture-o" title="Update Gallery"
                                                       data-toggle="tooltip"></a>
                                                    @if($post->status=='publish')
                                                        <a href="{{ route('mark-sold', $post->id) }}"
                                                           class="fa fa-upload" title="Mark as sold"
                                                           data-toggle="tooltip"></a>
                                                    @else
                                                        <a href="{{ route('mark-publish', $post->id) }}"
                                                           class="fa fa-check-circle-o item-sold"
                                                           title="Mark as publish" data-toggle="tooltip"></a>
                                                    @endif
                                                    <a href="{{ route('ad-edit', $post->id) }}" class="fa fa-edit"
                                                       title="Edit Ad." data-toggle="tooltip"></a>
                                                @endif
                                                <a href="{{ route('ad-delete', $post->id) }}"
                                                   class="fa fa-trash-o delete-item" title="Delete Ad."
                                                   data-toggle="tooltip"></a>
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
    <script src="{{  asset('assets/js/bootbox.js') }}"></script>
    <script>
        $('.icon-group').on('click', '.delete-item', function (e) {
            e.preventDefault();
            var ad_delete_link = $(this).attr('href'); // get value post you want delete
            bootbox.dialog({
                title: 'Delete Confirm',
                message: 'Are you sure delete this Ad?',
                className: 'my-class',
                buttons: {
                    cancel: {
                        className: 'btn btn-danger',
                        label: 'Close'
                    },
                    success: {
                        className: 'btn btn-success',
                        label: 'Delete',
                        callback: function () {
                            location.href = ad_delete_link;
                        }
                    }
                }
            });
        });
    </script>

@endsection
