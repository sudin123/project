<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('lot_no', 'Lot No.', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('lot_no', $post->get_meta('_lot_no'), array('id' => 'lotno', 'class' => 'medium', 'placeholder' => 'Lot No.')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('zone', 'Anchal (Zone)', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('zone', [
                  '' => 'Select Zone',
                  'Anchalikaran' => 'Anchalikaran',
                  'Bagmati' => 'Bagmati',
                  'Bheri' => 'Bheri',
                  'Dhawalagiri' => 'Dhawalagiri',
                  'Gandaki' => 'Gandaki',
                  'Janakpur' => 'Janakpur',
                  'Karnali' => 'Karnali',
                  'Koshi' => 'Koshi',
                  'Lumbini' => 'Lumbini',
                  'Mahakali' => 'Mahakali',
                  'Mechi' => 'Mechi',
                  'Narayani' => 'Narayani',
                  'Rapti' => 'Rapti',
                  'Sagarmatha' => 'Sagarmatha',
                  'Seti' => 'Seti',
          ], $post->get_meta('_zone'), ['class'=>'chosen-select'])  !!}
        </div>

    </div>
</li>
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
            {!! Form::label('milage', 'Milage (KM/L)', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('milage', $post->get_meta('_milage'), array('id' => 'milage', 'class' => 'medium', 'placeholder' => 'Milage')) !!}
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
