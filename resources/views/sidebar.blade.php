<?php $categories = \App\Category::all()->toHierarchy(); ?>
<?php $cities = \App\City::all(); ?>
<div class="col-md-3 col-sm-3">
    <div class="widget widget-searchfrom">
        <h2 class="widget-title">Advance Search</h2>
        <div class="widget-entry">
            {!! Form::open(array('route' => 'search', 'method'=>'GET')) !!}
            <ul>
                <li class="form-group">
                    {!! Form::text('q', '', array('class'=>'form-control', 'placeholder'=>'Keyword...')) !!}
                </li>
                <li>
                    <select name="city" class="chosen-select">
                        <option value="">All Cities</option>
                        @foreach ($cities as $ct)
                            <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <select name="category" class="chosen-select">
                        <option value="">All Categories</option>
                        @foreach ($categories as $pcat)
                            @if($pcat->isRoot())
                                <option value="{{ $pcat->id }}">{{ $pcat->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </li>
                <li class="half first">
                    {!! Form::input('number','pmin', '', array('class'=>'form-control', 'placeholder'=>'MIN Price NRS...')) !!}
                </li>
                <li class="half">
                    {!! Form::input('number','pmax', '', array('class'=>'form-control', 'placeholder'=>'MAX Price NRS...')) !!}
                </li>
                <li>
                    {!!  Form::select('condition', array('' => 'Select Condition', '1' => 'Brand New', '2' => 'Like New (used few times)', '3'=>'Excellent', '4'=>'Good/Fair', '5'=>'Not Working'), '', array('class'=>'chosen-select')) !!}
                </li>

                <li>
                    <input type="submit" value="Search" class="button"/>
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="widget widget-toplist">
        <h2 class="widget-title">Categories</h2>
        <ul class="cat-list" id="accordion">
            @foreach ($categories as $node)
                {{  renderNode($node) }}
            @endforeach
        </ul>
    </div>
    <div class="widget widget-ad">
        @include('googleads.sidebar-ad')
    </div>
</div>
<?php
function renderNode($node) { ?>

@if($node->getLevel() <= 1)
    @if ($node->isLeaf())
        <li>
            <a href="{{ url('categories/'. implode('/', $node->getAncestorsAndSelf()->lists('slug')->toArray())) }}">{{ $node->name  }}
                <span>({{ countPosts($node->id) }})</span></a>
        </li>
    @else
        <li>
            <a href="{{ url('categories/'. implode('/', $node->getAncestorsAndSelf()->lists('slug')->toArray())) }}">{{ $node->name  }}
                <span>({{ countPosts($node->id) }})</span></a>
            <ul class="catlvl-{{ $node->getLevel() }}">
                @foreach ($node->children as $child)
                    {{ renderNode($child) }}
                @endforeach
            </ul>
        </li>
    @endif
@endif
<?php } ?>
<?php

function countPosts($catid)
{
    $category = \App\Category::where('id', $catid)->first();
    $categories = $category->getDescendantsAndSelf()->lists('id');
    $posts_count = \App\Post::whereIn('category_id', $categories)->whereStatus('publish')->count();
    return $posts_count;
} ?>
