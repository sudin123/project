<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('title', 'Ad Title.', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {{$post->title}}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('category', 'Category', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            <?php $node = \App\Category::findorFail($post->category_id); $i = 0; $count = count($node->getAncestorsAndSelf());?>
            @foreach($node->getAncestorsAndSelf() as $cat)
                {{ $cat->name }}
                @if($i < $count-1)
                    /
                @endif
                <?php $i++; ?>
            @endforeach
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('featured_image', 'Add Featured Image', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9 image-upload">
            {!! Form::file('featuredimage', ['id' => 'featuredimage', 'accept'=>'image/*;capture=camera']) !!}
            @if($post->get_meta('_featured_image') != "no-image.png")
                <button id="add_img" class="button big">Change Featured Image</button>
            @else
                <button id="add_img" class="button big">Add Featured Image</button>
            @endif
            @if($post->get_meta('_featured_image') != "no-image.png")
                <div class="img-prev"><img src="{{ url('uploads/'. $post->get_meta('_featured_image')) }}" alt=""
                                           class="thumb"></div>
            @endif
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! HTML::decode(Form::label('content', 'Description of your Ad.<span>*</span>', array('class' => 'form-label'))) !!}
        </div>
        <div class="col-md-9">
            {!! Form::textarea('content', $post->content, array('class' => 'small','placeholder' => 'Description about your Ad.')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! HTML::decode(Form::label('price', 'Ad Price.(NRS.) <span>*</span>', array('class' => 'form-label'))) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('price', $post->price, array('id' => 'price', 'class' => 'medium', 'placeholder' => 'Ad Price', 'required' => 'required')) !!}
        </div>
    </div>
</li>
<?php $node = \App\Category::findorFail($post->category_id);
$parent = \App\Category::findorFail($node->parent_id); ?>
@if(View::exists('posts.categories-edit-forms.'.$node->slug))
    <hr>
    @include('posts.categories-edit-forms.'.$node->slug)
    <hr>
@elseif(View::exists('posts.categories-edit-forms.'.$parent->slug))
    <hr>
    @include('posts.categories-edit-forms.'.$parent->slug)
    <hr>
@endif
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! HTML::decode(Form::label('condition', 'Condition <span>*</span>', array('class' => 'form-label'))) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('condition', [
                    '' => 'Select Ad Condition',
                    '1' => 'Brand New (not used)',
                    '2' => 'Like New (used few times)',
                    '3' => 'Excellent',
                    '4' => 'Good/Fair',
                    '5' => 'Not Working',
            ], $post->condition, ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('is_used_for', 'Used For (year or month or days)', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('is_used_for', $post->get_meta('_is_used_for'), array('id' => 'isusedfor', 'class' => 'medium', 'placeholder' => '(e.g. 10 days, 5 months, 2 years)')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! HTML::decode(Form::label('is_negotiable', 'Is Price Negotiable? <span>*</span>', array('class' => 'form-label'))) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('is_negotiable', [
                    '' => 'Select Is Price Negotiable',
                    '0' => 'Yes (I Can Negotiate)',
                    '1' => 'No (Sorry Its Fixed)',
            ], $post->is_negotiable, ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>

<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! HTML::decode(Form::label('home_delivary', 'Home Delivery <span>*</span>', array('class' => 'form-label'))) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('home_delivary', [
                   '' => 'Select Delivery',
                   '0' => 'Yes (I Can Deliver)',
                   '1' => 'No (Sorry You have to Come to Recieve)',
           ], $post->get_meta('_is_home_delivary'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('delivaryarea', 'Select Delivery Area', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('delivaryarea', [
                  '' => 'Select Delivery Area',
                  '0' => 'Within my Area',
                  '1' => 'Within my City',
                  '2' => 'Almost anywhere in Nepal',
          ],$post->get_meta('_delivary_area'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('delivary_charges', 'Delivery Charges', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('delivary_charges', $post->get_meta('_delivary_charges'), array('id' => 'delivarycharges', 'class' => 'medium', 'placeholder' => 'Delivery Charges (eg. Rs 1000)')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! HTML::decode(Form::label('warranty', 'Has Warranty <span>*</span>', array('class' => 'form-label'))) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select('warranty', [
                 '' => 'Select Warranty Type',
                 '0' => 'No Warranty',
                 '1' => 'Yes (Manufacturer/Distributor)',
                 '2' => 'Yes (Dealer/Shop)',
         ], $post->get_meta('_warranty_type'), ['class'=>'chosen-select'])  !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('warranty_period', 'Warranty Period', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('warranty_period', $post->get_meta('_warrenty_period'), array('id' => 'warrantyperiod', 'class' => 'medium', 'placeholder' => 'Warranty Period (eg. 6 Months, 1 Year, 2 Year)')) !!}
        </div>
    </div>
</li>
<li class="gfield">
    <div class="ginput_container">
        <div class="col-md-3">
            {!! Form::label('warranty_includes', 'Warranty Includes', array('class' => 'form-label')) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text('warranty_includes', $post->get_meta('_warranty_includes'), array('id' => 'warrantyincludes', 'class' => 'medium', 'placeholder' => 'Warranty Includes (What parts and repair problems are covered)')) !!}
        </div>
    </div>
</li>
{!! Form::button("Submit & Continue.", array('class' => 'button big','type' => 'submit')) !!}