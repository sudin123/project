<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('property_type', 'Property Type', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::select('property_type', [
                    '' => 'Select Property Type',
                    'House - Individual'=>'House - Individual',
                    'House - In a Colony'=>'House - In a Colony',
                    'House - Semi-commercial'=>'House - Semi-commercial',
                    'Bungalow'=>'Bungalow',
                    'Apartment Building'=>'Apartment Building',
                    'Commercial Building'=>'Commercial Building',
                    'Land - Individual'=>'Land - Individual',
                    'Land - Plotted'=>'Land - Plotted',
                    'Land - Commercial Use'=>'Land - Commercial Use',
                    'Land - Agriculture'=>'Land - Agriculture',
                    'Godown/Tahara'=>'Godown / Tahara',
                    'Others'=>'Others',
          ], old('property_type'), ['class'=>'chosen-select']); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('property_location', 'Property Location', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('property_location', old('property_location'), array('id' => 'location', 'class' => 'medium', 'placeholder' => 'eg.(Samakhusi, Near ALL Nepal Hospital)')); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('access_road', 'Access Road', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::select('access_road', [
                    '' => 'Select Access Road',
                    'Less than 5 feet'=>'Less than 5 feet',
                    '5 to 8 feet'=>'5 to 8 feet',
                    '9 to 12 feet'=>'9 to 12 feet',
                    '13 to 20 feet'=>'13 to 20 feet',
                    'Above 20 feet'=>'Above 20 feet',
                    'Non Motorable'=>'Non Motorable',
          ], old('access_road'), ['class'=>'chosen-select']); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('land_size', 'Land Size(Anna/Dhur)', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('land_size', old('land_size'), array('id' => 'landsize', 'class' => 'medium', 'placeholder' => 'Land Size')); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('bedrooms', 'Bedrooms', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('bedrooms', old('bedrooms'), array('id' => 'bedrooms', 'class' => 'medium', 'placeholder' => 'eg: 5')); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('bathroom', 'Bathroom', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('bathroom', old('bathroom'), array('id' => 'bathroom', 'class' => 'medium', 'placeholder' => 'eg: 2')); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('livingroom', 'Livingroom', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::text('livingroom', old('livingroom'), array('id' => 'livingroom', 'class' => 'medium', 'placeholder' => 'eg: 1')); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('water_supply', 'Water Supply', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::select('water_supply', [
                    '' => 'Select Water Supply',
                    'Yes'=>'Yes',
                    'No'=>'No',
          ], old('water_supply'), ['class'=>'chosen-select']); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('furnished', 'Furnish', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::select('furnished', [
                    '' => 'Select Furnish',
                    'Yes Full Furnished'=>'Yes Full Furnished',
                    'Yes Semi Furnished'=>'Yes Semi Furnished',
                    'No Furnished'=>'No Furnished',
          ], old('furnished'), ['class'=>'chosen-select']); ?>

        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            <?php echo Form::label('features', 'Other Features', array('class' => 'form-label')); ?>

        </div>
        <div class="col-md-9">
            <?php echo Form::select('features[]', [
                    'Garden'=>'Garden',
                    'Parking Space'=>'Parking Space',
                    'Garage'=>'Garage',
                    'Servant Quarter'=>'Servant Quarter',
                    'Security Guards'=>'Security Guards',
                    'Backup Generator'=>'Backup Generator',
                    'Elevator'=>'Elevator',
                    'Swimming Pool'=>'Swimming Pool',
                    'Gymnasium'=>'Gymnasium',
          ], old('features[]'), ['class'=>'chosen-select'], array('multiple')); ?>

        </div>
    </div>
</li>