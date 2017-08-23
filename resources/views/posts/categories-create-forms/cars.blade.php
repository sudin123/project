<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('make_year', 'Make Year', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('make_year', old('make_year'), array('id' => 'makeyear', 'class' => 'medium', 'placeholder' => '(e.g. 2012, 2010, 2006)')) !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('kilometers', 'Kilometers', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('kilometers', old('kilometers'), array('id' => 'kilometers', 'class' => 'medium', 'placeholder' => '(e.g. 2000, 9510, 10105)')) !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('colour', 'Colour', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('colour', old('colour'), array('id' => 'colour', 'class' => 'medium', 'placeholder' => '(e.g. Red, Black, White)')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('engine_cc', 'Engine (CC)', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('engine_cc', old('engine_cc'), array('id' => 'enginecc', 'class' => 'medium')) !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('fuel_type', 'Fuel', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('fuel_type', [
                  '' => 'Select Fuel Type',
                  'Petrol' => 'Petrol',
                  'Diesel' => 'Diesel',
                  'Electric' => 'Electric',
          ], old('fuel_type'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('transmission', 'Transmission', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('transmission', [
                  '' => 'Select Transmission',
                  'Manual - 2 WD' => 'Manual - 2 WD',
                  'Manual - 4 WD' => 'Manual - 4 WD',
                  'Automatic - 2 WD' =>'Automatic - 2 WD',
                  'Automatic - 4 WD' => 'Automatic - 4 WD',
          ], old('transmission'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>