<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('lot_no', 'Lot No.', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('lot_no', old('lot_no'), array('id' => 'lotno', 'class' => 'medium', 'placeholder' => 'Lot No.')); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('zone', 'Anchal (Zone)', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::select('zone', [
                  '' => 'Select Zone',
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
          ], old('zone'), ['class'=>'chosen-select']); ?>

        </div>

    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('make_year', 'Make Year', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('make_year', old('make_year'), array('id' => 'makeyear', 'class' => 'medium', 'placeholder' => '(e.g. 2012, 2010, 2006)')); ?>

        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('kilometers', 'Kilometers', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('kilometers', old('kilometers'), array('id' => 'kilometers', 'class' => 'medium', 'placeholder' => '(e.g. 2000, 9510, 10105)')); ?>

        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('milage', 'Milage (KM/L)', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('milage', old('milage'), array('id' => 'milage', 'class' => 'medium', 'placeholder' => 'Milage')); ?>

        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('colour', 'Colour', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('colour', old('colour'), array('id' => 'colour', 'class' => 'medium', 'placeholder' => '(e.g. Red, Black, White)')); ?>

        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('engine_cc', 'Engine (CC)', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('engine_cc', old('engine_cc'), array('id' => 'enginecc', 'class' => 'medium')); ?>

        </div>
    </div>
</li>
