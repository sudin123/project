<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('property_type', 'Property Type', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('property_type', [
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
          ], $post->get_meta('_property_type'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('property_location', 'Property Location', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('property_location', $post->get_meta('_property_location'), array('id' => 'location', 'class' => 'medium', 'placeholder' => 'eg.(Samakhusi, Near ALL Nepal Hospital)')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('access_road', 'Access Road', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('access_road', [
                    '' => 'Select Access Road',
                    'Less than 5 feet'=>'Less than 5 feet',
                    '5 to 8 feet'=>'5 to 8 feet',
                    '9 to 12 feet'=>'9 to 12 feet',
                    '13 to 20 feet'=>'13 to 20 feet',
                    'Above 20 feet'=>'Above 20 feet',
                    'Non Motorable'=>'Non Motorable',
          ], $post->get_meta('_access_road'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('land_size', 'Land Size(Anna/Dhur)', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('land_size', $post->get_meta('_land_size'), array('id' => 'landsize', 'class' => 'medium', 'placeholder' => 'Land Size')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('bedrooms', 'Bedrooms', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('bedrooms', $post->get_meta('_bedrooms'), array('id' => 'bedrooms', 'class' => 'medium', 'placeholder' => 'eg: 5')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('bathroom', 'Bathroom', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('bathroom', $post->get_meta('_bathroom'), array('id' => 'bathroom', 'class' => 'medium', 'placeholder' => 'eg: 2')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('livingroom', 'Livingroom', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('livingroom', $post->get_meta('_livingroom'), array('id' => 'livingroom', 'class' => 'medium', 'placeholder' => 'eg: 1')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('water_supply', 'Water Supply', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('water_supply', [
                    '' => 'Select Water Supply',
                    'Yes'=>'Yes',
                    'No'=>'No',
          ], $post->get_meta('_water_supply'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('furnished', 'Furnish', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('furnished', [
                    '' => 'Select Furnish',
                    'Yes Full Furnished'=>'Yes Full Furnished',
                    'Yes Semi Furnished'=>'Yes Semi Furnished',
                    'No Furnished'=>'No Furnished',
          ], $post->get_meta('_furnished'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('features', 'Other Features', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('features[]', [
                    'Garden'=>'Garden',
                    'Parking Space'=>'Parking Space',
                    'Garage'=>'Garage',
                    'Servant Quarter'=>'Servant Quarter',
                    'Security Guards'=>'Security Guards',
                    'Backup Generator'=>'Backup Generator',
                    'Elevator'=>'Elevator',
                    'Swimming Pool'=>'Swimming Pool',
                    'Gymnasium'=>'Gymnasium',
          ], json_decode($post->get_meta('_features')), ['class'=>'chosen-select','multiple'=>''])  !!}
        </div>
    </div>
</li>