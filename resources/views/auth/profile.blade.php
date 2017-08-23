@extends('site')
@section('title')My Profile - sellnepal.com@parent @stop
@section('styles')

@endsection
@section('content')
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong> {!! Breadcrumbs::render('my-profile') !!}
                </div>
                @include('auth.items.member-menu')
                <div class="form-wrapper">
                    {!! Form::open(array('url' => route('update-profile'), 'method' => 'POST', 'role' => 'form')) !!}
                    <div class="gform_body">
                        <ul class="gform_fields">
                            {!! csrf_field() !!}
                            @include('messages.messages')
                            @if(\Auth::user()->isBuyer())
                                <li class="gfield role-select">
                                    {!! Form::label('selectrole', 'Select Account Type (*)' , array('class' => 'gfield_label')) !!}
                                    {!! Form::select('selectrole', [
                                                       '' => 'Select Account Type',
                                                       '1' => 'Individual',
                                                       '2' => 'Business',
                                               ], old('selectrole'), ['class'=>'chosen-select'])  !!}
                                    <p class="help-block text-blue">Account Type can be selected only once. So please choose what is best for you before you Proceed.</p>
                                </li>
                            @endif
                            <li class="gfield">
                                {!! Form::label('username', 'Username' , array('class' => 'gfield_label')) !!}
                                {!! Form::label('username', $user->username , array('class' => 'gfield_label')) !!}
                            </li>
                            <li class="gfield">
                                {!! Form::label('email', 'Email' , array('class' => 'gfield_label')) !!}
                                {!! Form::label('email',  $user->email , array('class' => 'gfield_label')) !!}
                            </li>
                            <li class="gfield">
                                {!! Form::label('firstname', 'First Name (*)' , array('class' => 'gfield_label')) !!}
                                {!! Form::text('firstname', $user->firstname, array('id' => 'firstname', 'class' => 'form-control', 'required' => 'required')) !!}
                            </li>
                            <li class="gfield">
                                {!! Form::label('last_name', 'Last Name (*)' , array('class' => 'gfield_label')) !!}
                                {!! Form::text('lastname', $user->lastname, array('id' => 'lastname', 'class' => 'form-control','required' => 'required')) !!}
                            </li>
                            <li class="gfield">
                                {!! Form::label('phone', 'Phone (*)' , array('class' => 'gfield_label')) !!}
                                {!! Form::text('phone', $user->user_profile->phone , array('id' => 'phone', 'class' => 'form-control','required' => 'required')) !!}
                            </li>
                            <li class="gfield user-city">
                                {!! Form::label('show_phone', 'Show Phone Number' , array('class' => 'gfield_label')) !!}
                                {!! Form::select('show_phone', [
                                                        '1' => 'Yes',
                                                        '0' => 'No',
                                                ], $user->user_profile->show_phone, ['class'=>'chosen-select'])  !!}
                            </li>
                            <li class="gfield">
                                {!! Form::label('telephone', 'Other Phone.' , array('class' => 'gfield_label')) !!}
                                {!! Form::text('telephone', $user->user_profile->telephone , array('id' => 'telephone', 'class' => 'form-control')) !!}
                            </li>
                            <li class="gfield">
                                {!! Form::label('street', 'Street Address' , array('class' => 'gfield_label')) !!}
                                {!! Form::text('street', $user->user_profile->street , array('id' => 'street', 'class' => 'form-control' , 'placeholder' =>'Nirmal Lama Marg')) !!}
                            </li>
                            <li class="gfield">
                                {!! Form::label('area', 'Area (*)' , array('class' => 'gfield_label')) !!}
                                {!! Form::text('area', $user->user_profile->area , array('id' => 'area', 'class' => 'form-control', 'required' => 'required', 'placeholder' =>'Shorakhutte')) !!}
                            </li>
                            <li class="gfield user-city">
                                {!! Form::label('city', 'City (*)' , array('class' => 'gfield_label')) !!}
                                <select class="chosen-select" name="city" required>
                                    <option value="">Select City</option>
                                    @foreach($cities as $ct)
                                        <option value="{{ $ct->id }}" @if($ct->id == $user->user_profile->city) {{ "selected" }} @endif>{{ $ct->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ul>
                    </div>
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
