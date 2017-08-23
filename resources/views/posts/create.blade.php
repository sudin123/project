@extends('site')
@section('title')Create New Ad - Sellnepal@parent @stop
@section('styles')

@endsection
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="post-ads-box clearfix">
                <a class="link home-link" href="{{ url('/') }}">back to home</a>
                <h4 class="text-center title">Place your ad</h4>
                <div class="col-md-8 col-md-offset-2">
                    <div class="breadcrumb">
                        <strong>Selected Category
                            :</strong> <?php $node = \App\Category::findorFail($cat_id); $i = 0; $count = count($node->getAncestorsAndSelf());?>
                        @foreach($node->getAncestorsAndSelf() as $cat)
                            {{ $cat->name }}
                            @if($i < $count-1)
                                /
                            @endif
                            <?php $i++; ?>
                        @endforeach
                        <a title="Select Category." href="{{ route('select-category') }}" class="go-back">(Change Selected Category)</a>
                    </div>
                    <h4 class="text-center">Add Details</h4>
                    @include('messages.messages')
                    {!! Form::open(array('route' => 'create-ad',  'method' => 'POST', 'role' => 'form',  'files' => true)) !!}
                    <input type="hidden" name="cat_id" value="{{ $cat_id }}">
                    @include('posts.createform')
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


