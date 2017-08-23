<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('make_year', 'Make Year', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('make_year', $post->get_meta('_make_year'), array('id' => 'makeyear', 'class' => 'medium', 'placeholder' => '(e.g. 2012, 2010, 2006)')) !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('kilometers', 'Kilometers', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('kilometers', $post->get_meta('_kilometers'), array('id' => 'kilometers', 'class' => 'medium', 'placeholder' => '(e.g. 2000, 9510, 10105)')) !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('colour', 'Colour', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('colour', $post->get_meta('_colour'), array('id' => 'colour', 'class' => 'medium', 'placeholder' => '(e.g. Red, Black, White)')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('engine_cc', 'Engine (CC)', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('engine_cc', $post->get_meta('_engine_cc'), array('id' => 'enginecc', 'class' => 'medium')) !!}
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
          ], $post->get_meta('_fuel_type'), ['class'=>'chosen-select'])  !!}
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
          ], $post->get_meta('_transmission'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>