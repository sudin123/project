<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('processor', 'Processor', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('processor', [
                '' => 'Select Processor',
                'Intel Pentium 4'=>'Intel Pentium 4',
                'Intel Pentium M'=>'Intel Pentium M',
                'Intel Pentium Dual Core'=>'Intel Pentium Dual Core',
                'Intel Celeron'=>'Intel Celeron',
                'Intel Celeron Dual Core'=>'Intel Celeron Dual Core',
                'Intel Core 2'=>'Intel Core 2',
                'Intel Atom'=>'Intel Atom',
                'Intel Core i3'=>'Intel Core i3',
                'Intel Core i5'=>'Intel Core i5',
                'Intel Core i7'=>'Intel Core i7',
                'AMD Athlon II'=>'AMD Athlon II',
                'AMD Sempron'=>'AMD Sempron',
                'AMD Phenom II'=>'AMD Phenom II',
                'AMD Opteron'=>'AMD Opteron',
                'AMD Turion II'=>'AMD Turion II',
                'AMD A-Series APU'=>'AMD A-Series APU',
                'AMD E-Series APU' =>'AMD E-Series APU',
                'Others'=>'Others',
          ],$post->get_meta('_processor'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('ram', 'RAM(GB)', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('ram',$post->get_meta('_ram'), array('placeholder'=>'RAM(GB)', 'id' => 'ram', 'class' => 'medium')) !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('graphics_card', 'Graphics Card', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('graphics_card',$post->get_meta('_graphics_card'), array('placeholder'=>'eg (NVDIA GeForce 640 M)','id' => 'ram', 'class' => 'medium')) !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('harddisk', 'Hard Disk(GB/TB)', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('harddisk',$post->get_meta('_harddisk'), array('placeholder'=>'Hard Disk(GB/TB)','id' => 'harddisk', 'class' => 'medium')) !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('screen_size', 'Screen Size (inch)', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('screen_size',$post->get_meta('_screen_size'), array('placeholder'=>'eg (15,17,13.5)','id' => 'screen_size', 'class' => 'medium')) !!}
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
                'DVD-CD Rewritable'=>'DVD-CD Rewritable',
                'DVD-CD Combo'=>'DVD-CD Combo',
                'Blu-ray Drive'=>'Blu-ray Drive',
                'Webcam'=>'Webcam',
                'Bluetooth'=>'Bluetooth',
                'HDMI'=>'HDMI',
          ], json_decode($post->get_meta('_features')), ['class'=>'chosen-select', 'multiple'=>''])  !!}
        </div>
    </div>
</li>