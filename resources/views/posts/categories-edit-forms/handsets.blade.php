<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('sim_slot', 'Sim SLot', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('sim_slot', [
                '' => 'Select Sim Slot',
                'Single Sim - 2G'=>'Single Sim - 2G',
                'Single Sim - 3G'=>'Single Sim - 3G',
                'Single Sim - 4G (LTE)'=>'Single Sim - 4G (LTE)',
                'Single Sim - CDMA'=>'Single Sim - CDMA',
                'Dual Sim - 2G + 2G'=>'Dual Sim - 2G + 2G',
                'Dual Sim - 3G + 2G'=>'Dual Sim - 3G + 2G',
                'Dual Sim - 4G + 3G/2G'=>'Dual Sim - 4G + 3G/2G',
                'Dual Sim - GSM + CDMA'=>'Dual Sim - GSM + CDMA',
                'Triple Sim'=>'Triple Sim',
          ], $post->get_meta('_sim_slot'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('camera', 'Camera', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('camera', [
                '' => 'Select Camera',
                'No'=>'No',
                'Less than 2 MP'=>'Less than 2 MP',
                '2 MP - 2.9 MP'=>'2 MP - 2.9 MP',
                '3 MP - 4.9 MP'=>'3 MP - 4.9 MP',
                '5 MP - 7.9 MP'=>'5 MP - 7.9 MP',
                '8 MP - 11.9 MP'=>'8 MP - 11.9 MP',
                '12 MP - 19.9 MP'=>'12 MP - 19.9 MP',
                '20 MP or more'=>'20 MP or more',
          ], $post->get_meta('_camera'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('smartphone_os', 'Smartphone OS', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('smartphone_os', [
                '' => 'Select Smartphone Os',
                'Not a Smartphone'=>'Not a Smartphone',
                'Symbian' =>'Symbian',
                'RIM Blackberry'=>'RIM Blackberry',
                'Firefox OS'=>'Firefox OS',
                'Tizen'=>'Tizen',
                'Android 4.0 (ICS) or below'=>'Android 4.0 (ICS) or below',
                'Android 4.1 - 4.3 (Jellybean)'=>'Android 4.1 - 4.3 (Jellybean)',
                'Android 4.4 (KitKat)'=>'Android 4.4 (KitKat)',
                'Android 5.0 (Lollipop)'=>'Android 5.0 (Lollipop)',
                'Android 6.0 (Marshmallow)'=>'Android 6.0 (Marshmallow)',
                'Apple iOS 7 or below'=>'Apple iOS 7 or below',
                'Apple iOS 8'=>'Apple iOS 8',
                'Apple iOS 9'=>'Apple iOS 9',
                'Windows 7 or below'=>'Windows 7 or below',
                'Windows 8.x'=>'Windows 8.x',
                'Windows 10'=>'Windows 10',
                'Other OS'=>'Other OS',
          ], $post->get_meta('_smartphone_os'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('screen_size', 'Screen Size', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('screen_size', [
                ''=>'Select Screen Size',
                'Less than 3.5 inch'=>'Less than 3.5 inch',
                '3.5 to 3.9 inch'=>'3.5 to 3.9 inch',
                '4.0 to 4.4 inch'=>'4.0 to 4.4 inch',
                '4.5 to 4.9 inch'=>'4.5 to 4.9 inch',
                '5.0 to 5.4 inch'=>'5.0 to 5.4 inch',
                '5.5 to 5.9 inch'=>'5.5 to 5.9 inch',
                '6.0 inch or more'=>'6.0 inch or more',
          ], $post->get_meta('_screen_size'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('cpu_core', 'CPU Core', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('cpu_core', [
                ''=>'Select CPU Core',
                'Single'=>'Single',
                'Dual - 2'=>'Dual - 2',
                'Quad - 4'=>'Quad - 4',
                'Hexa - 6'=>'Hexa - 6',
                'Octa - 8'=>'Octa - 8',
          ], $post->get_meta('_cpu_core'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('ram', 'RAM', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('ram', [
                ''=>'Select RAM',
                '256 MB or less'=>'256 MB or less',
                '512 MB'=>'512 MB',
                '768 MB'=>'768 MB',
                '1 GB'=>'1 GB',
                '1.5 GB'=>'1.5 GB',
                '2.5 GB'=>'2.5 GB',
                '3 GB or more'=>'3 GB or more',
          ], $post->get_meta('_ram'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('internal_storage', 'Internal Storage', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('internal_storage', [
                ''=>'Select Internal Storage',
                'Less than 512 MB'=>'Less than 512 MB',
                '512 MB'=>'512 MB',
                '1 GB'=>'1 GB',
                '4 GB'=>'4 GB',
                '8 GB'=>'8 GB',
                '16 GB'=>'16 GB',
                '32 GB'=>'32 GB',
                '64 GB'=>'64 GB',
                '128 GB or more'=>'128 GB or more',
          ], $post->get_meta('_internal_storage'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('features', 'Choose Features', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('features[]', [
                    'Memory Card Slot'=>'Memory Card Slot',
                    'Front Facing Camera'=>'Front Facing Camera',
                    'Water & Dust Proof (IP)'=>'Water & Dust Proof (IP)',
                    'Gorilla Glass Screen'=>'Gorilla Glass Screen',
                    'WiFi'=>'WiFi',
                    'FM Radio'=>'FM Radio',
                    'Bluetooth'=>'Bluetooth',
                    'Camera Led Flash'=>'Camera Led Flash',
                    'GPS'=>'GPS',
                    'Fingerprint Scanner'=>'Fingerprint Scanner',
                    'Light Sensor'=>'Light Sensor',
                    'Proximity Sensor'=>'Proximity Sensor',
                    'Compass Sensor'=>'Compass Sensor',
          ], json_decode($post->get_meta('_features')), ['class'=>'chosen-select','multiple'=>''])  !!}
        </div>
    </div>
</li>



