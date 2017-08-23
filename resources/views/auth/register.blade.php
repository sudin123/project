@extends('site')
@section('title')Register - sellnepal.com@parent @stop
@section('styles')

@endsection
@include('helper.macros')
@section('content')
<section id="main-content">
    <div class="container">
        <div class="col-xs-12 col-lg-6 col-lg-offset-3 col-xs-offset-0">
            <div class="access-block   login-block">
                <div class="access-fields">
                    <h2>Register</h2>
                    @include('helper.sm-logins')
                    <div class="sep-or"><span>OR</span></div>
                    @include('auth.forms.registerform')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('extra-area')
@endsection
@section('scripts')
<script>
    var val = $('form select[name="account_type"]').val();
    if (val == 1) {
        $('.company-field').show();
        $('.type-individual').hide();
        $('.type-individual').hide();
    } else {
        $('.company-field').hide();
        $('.type-individual').show();
        $('.type-individual').show();
    }
    $('form select[name="account_type"]').change(function () {
        if ($('form select option:selected').val() == '1') {
            $('.company-field').show();
            $('.type-individual').hide();
            $('.type-individual').hide();
        } else {
            $('.company-field').hide();
            $('.type-individual').show();
            $('.type-individual').show();
        }
    });
</script>
@endsection