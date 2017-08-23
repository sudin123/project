<?php $categories = \App\Category::all()->toHierarchy(); ?>
<?php $cities = \App\City::all(); ?>
<div class="col-md-3 col-sm-3">
    <div class="widget widget-searchfrom widget-quick-searchfrom">
        <h2 class="widget-title">Quick Search</h2>
        <div class="widget-entry">
            {!! Form::open(array('route' => 'search', 'method'=>'GET')) !!}
            <ul>
                <li class="form-group">
                    {!! Form::text('q', null, array('required',  'class'=>'form-control', 'placeholder'=>'Search ads...')) !!}
                </li>
                <li>
                    {!! Form::submit('Search', array('class'=>'button big')) !!}
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="widget widget-toplist">
        <h2 class="widget-title">Categories</h2>
        <ul class="cat-list">
            @if($category->getLevel() == 2)
                <?php  $cat = $category->parent_id;
                $root = \App\Category::findorFail($cat);
                ?>
            @else
                @if($category->getLevel() == 1 && count($category->getDescendants()) > 0)
                    <?php $root = $category; ?>
                @else
                    <?php $root = $category->getRoot();  ?>
                @endif
            @endif
            @foreach($root->getDescendantsAndSelf(2)->toHierarchy() as $descendant)
                {{ renderNode($descendant) }}
            @endforeach
        </ul>
    </div>
    <div class="widget widget-ad">
        @include('googleads.sidebar-ad')
    </div>
</div>
<?php
function renderNode($node) {  $count = 0;?>
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
<?php } ?>
<?php

function countPosts($catid)
{
    $category = \App\Category::where('id', $catid)->first();
    $categories = $category->getDescendantsAndSelf()->lists('id');
    $posts_count = \App\Post::whereIn('category_id', $categories)->whereStatus('publish')->count();
    return $posts_count;
} ?>


