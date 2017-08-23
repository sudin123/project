<div class="gform_body">
    <ul class="gform_fields">
        @include('messages.messages')
        <li class="gfield">
            {!! Form::label('username', 'Username', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::text('username',$user->username, array('id' => 'username', 'class' => 'form-control', 'disabled' => 'disabled')) !!}
            </div>
        </li>
        <li class="gfield">
            {!! Form::label('companyemail', 'Email', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::text('email',$user->email, array('id' => 'email', 'class' => 'form-control', 'disabled' => 'disabled')) !!}
            </div>
        </li>
        <li class="gfield first">
            {!! Form::label('companyname', 'Company Name (*)', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::text('companyname',$user->profile->company_name, array('id' => 'companyname', 'class' => 'form-control', 'placeholder' => 'Company Name', 'required'=>'required')) !!}
            </div>
        </li>
        <li class="gfield file-upload">
            {!! Form::label('companylogo', 'Company Logo (use 180 X 145 logo)', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::file('companylogo', ['id' => 'companylogo', 'class'=>'hide']) !!}
                @if($user->profile->company_logo)
                <button id="add_logo" class="button big">Change Logo</button>
                @else
                <button id="add_logo" class="button big">Add Logo</button>
                @endif

                @if($user->profile->company_logo)
                <div class="img-prev"><img src="{{ url('uploads/company-logo/'. $user->profile->company_logo) }}" alt=""
                                           class="thumb"></div>
                @endif
            </div>
        </li>
        <li class="gfield">
            {!! Form::label('aboutcompany', 'About Company', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::textarea('aboutcompany', $user->profile->about, array('class' => 'small','placeholder' => 'Description about your Company.')) !!}
            </div>
        </li>
        <li class="gfield">
            {!! Form::label('companyphone', 'Phone No.  (*)', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::text('companyphone', $user->profile->phone, array('id' => 'companyphone', 'class' => 'form-control', 'placeholder' => 'Phone No.','required'=>'required')) !!}
            </div>
        </li>
        <li class="gfield">
            {!! Form::label('companyphone2', 'Other Phone No.', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::text('companyphone2', $user->profile->telephone, array('id' => 'companyphone2', 'class' => 'form-control', 'placeholder' => 'Other Ph. No.')) !!}
            </div>
        </li>
        <li class="gfield">
            {!! Form::label('companyfax', 'Fax No.', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::text('companyfax', $user->profile->fax, array('id' => 'companyfax', 'class' => 'form-control', 'placeholder' => 'FAX.')) !!}
            </div>
        </li>

        <li class="gfield">
            {!! Form::label('companywebsite', 'Website', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::text('companywebsite', $user->profile->website, array('id' => 'companywebsite', 'class' => 'form-control', 'placeholder' => 'Website')) !!}
            </div>
        </li>
        <li class="gfield user-city">
            {!! Form::label('city', 'Select City  (*)', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                <?php $city = array('' => 'Select City'); ?>
                @foreach($cities as $ct)
                <?php $city[$ct->id] = $ct->name; ?>
                @endforeach
                {!! Form::select('city', $city, $user->user_profile->city, ['class'=>'chosen-select form-control','required' => 'required'])  !!}
            </div>
        </li>
        <li class="gfield">
            {!! Form::label('street', 'Street', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::text('street', $user->profile->street, array('id' => 'street', 'class' => 'form-control', 'placeholder' => Lang::get('auth.street'))) !!}
            </div>
        </li>
        <li class="gfield">
            {!! Form::label('area', 'Area  (*)', array('class' => 'gfield_label')) !!}
            <div class="ginput_container">
                {!! Form::text('area',$user->profile->area, array('id' => 'area', 'class' => 'form-control', 'placeholder' => Lang::get('auth.area'),'required' => 'required')) !!}
            </div>
        </li>

    </ul>
</div>