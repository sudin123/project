@extends('site')
@section('title')Select Category - New Post@parent @stop
@section('styles')

@endsection
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="post-ads-box clearfix tab-content">
                <a class="link home-link" href="{{ url('/') }}">back to home</a>
                <h4 class="text-center title">Place your ad</h4>
                <div class="new-ads-wizard">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="breadcrumb">
                            <strong>You are here:</strong> {!! Breadcrumbs::render('select-category') !!}
                        </div>
                        <h4 class="text-center">Select Category </h4>
                        <div id="firstlvl-category" class="box-1">
                            <ul class="style-list">
                                @foreach ($categories as $pcat)
                                    @if($pcat->isRoot())
                                        <li><a class="categories" data-id="{{ $pcat->id }}" href="javascript:void(0);">{{ $pcat->name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div id="secondlvl-cat" class="box-1" style="display:none"></div>
                        <div id="thirdlvl-cat" class="box-1" style="display:none"></div>
                        <div id="proceedtonext" class="gform_footer left_label" style="display:none">
                            <a class="button gform_button big" href="">Proceed</a>
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
    <script src="{{ asset('assets/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#rootwizard').bootstrapWizard();
            $('li.disabled a').click(function (e) {
                e.preventDefault();
            });
            var baseUrl = "{{ url('/') }}";
            var subcatUrl = "{{ route('getsubcategory') }}";
            var CreateWithCat = "{{ url('member-area/create-ad/step2?cat_id=') }}";
            var token = "{{ Session::getToken() }}";

            $('div.setup-panel div a.btn-primary').trigger('click');
            $('#firstlvl-category').on('click', '.categories', function () {
                $('#thirdlvl-cat').hide();
                $('#proceedtonext').hide();
                _this = $(this);
                _this.parent().siblings().find('.selected').removeClass('selected');
                _this.addClass('selected');

                var id_value = $(this).attr('data-id'); // get value post you want delete
                $.ajax({
                    url: subcatUrl,
                    type: 'post',
                    data: {id: id_value, _token: token},
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#secondlvl-cat").show();

                            $("#secondlvl-cat").html(response.html)
                            $('html, body').animate({
                                scrollTop: $("#secondlvl-cat").offset().top
                            }, 2000);
                        } else {
                            alert('ERROR');
                        }
                    }
                });
            });
            $('#secondlvl-cat').on('click', '.categories', function () {
                _this = $(this);
                _this.parent().siblings().find('.selected').removeClass('selected');
                _this.addClass('selected');
                var id_value = $(this).attr('data-id'); // get value post you want delete
                $.ajax({
                    url: subcatUrl,
                    type: 'post',
                    data: {id: id_value, _token: token},
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#thirdlvl-cat").show();
                            $("#thirdlvl-cat").html(response.html);
                            $('#proceedtonext').hide();
                            $('html, body').animate({
                                scrollTop: $("#thirdlvl-cat").offset().top
                            }, 2000);
                        } else if(response.status == 'nochildren'){
                            var id_value = _this.attr('data-id'); // get value post you want delete
                            $('#proceedtonext').show();
                            $("#proceedtonext a").attr("href",'');
                            $("#proceedtonext a").attr("href", function(i, href) {
                                return CreateWithCat + id_value;
                            });
                        }
                    }
                });
            });
            $('#thirdlvl-cat').on('click', '.categories', function () {
                _this = $(this);
                _this.parent().siblings().find('.selected').removeClass('selected');
                _this.addClass('selected');
                var id_value = _this.attr('data-id'); // get value post you want delete
                $("#proceedtonext a").attr("href",'');
                $("#proceedtonext a").attr("href", function(i, href) {
                    return CreateWithCat + id_value;
                });
                $('#proceedtonext').show();
            });
        });
    </script>
@endsection


