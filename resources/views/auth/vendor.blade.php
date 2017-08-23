@extends('site')
@section('title')Company Profile - sellnepal.com@parent @stop
@section('styles')

@endsection
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong> {!! Breadcrumbs::render('edit-company-profile') !!}
                </div>
                @include('auth.items.member-menu')
                <div class="form-wrapper">
                    {!! Form::open(array('url' => route('update-company-profile'), 'method' => 'POST', 'role' => 'form', 'files' => true)) !!}
                   @include('auth.forms.companyprofile')
                    <div class="gform_footer left_label">
                        {!! Form::button(Lang::get('auth.update'), array('class' => 'button gform_button button1','type' => 'submit')) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
