<?php $categories = \App\Category::all()->toHierarchy(); ?>
<?php $cities = \App\City::all(); ?>
<div class="col-md-3 col-sm-3">
    <div class="widget widget-searchfrom widget-quick-searchfrom">
        <h2 class="widget-title">Quick Search</h2>
        <div class="widget-entry">
            <?php echo Form::open(array('route' => 'search', 'method'=>'GET')); ?>

            <ul>
                <li class="form-group">
                    <?php echo Form::text('q', null, array('required',  'class'=>'form-control', 'placeholder'=>'Search ads...')); ?>

                </li>
                <li>
                    <?php echo Form::submit('Search', array('class'=>'button big')); ?>

                </li>
            </ul>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <div class="widget widget-toplist">
        <h2 class="widget-title">Categories</h2>
        <ul class="cat-list">
            <?php if($category->getLevel() == 2): ?>
                <?php  $cat = $category->parent_id;
                $root = \App\Category::findorFail($cat);
                ?>
            <?php else: ?>
                <?php if($category->getLevel() == 1 && count($category->getDescendants()) > 0): ?>
                    <?php $root = $category; ?>
                <?php else: ?>
                    <?php $root = $category->getRoot();  ?>
                <?php endif; ?>
            <?php endif; ?>
            <?php foreach($root->getDescendantsAndSelf(2)->toHierarchy() as $descendant): ?>
                <?php echo e(renderNode($descendant)); ?>

            <?php endforeach; ?>
        </ul>
    </div>
    <div class="widget widget-ad">
        <?php echo $__env->make('googleads.sidebar-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php
function renderNode($node) {  $count = 0;?>
<?php if($node->isLeaf()): ?>
    <li>
        <a href="<?php echo e(url('categories/'. implode('/', $node->getAncestorsAndSelf()->lists('slug')->toArray()))); ?>"><?php echo e($node->name); ?>

            <span>(<?php echo e(countPosts($node->id)); ?>)</span></a>
    </li>
<?php else: ?>
    <li>
        <a href="<?php echo e(url('categories/'. implode('/', $node->getAncestorsAndSelf()->lists('slug')->toArray()))); ?>"><?php echo e($node->name); ?>

            <span>(<?php echo e(countPosts($node->id)); ?>)</span></a>
        <ul class="catlvl-<?php echo e($node->getLevel()); ?>">
            <?php foreach($node->children as $child): ?>
                <?php echo e(renderNode($child)); ?>

            <?php endforeach; ?>
        </ul>
    </li>
<?php endif; ?>
<?php } ?>
<?php

function countPosts($catid)
{
    $category = \App\Category::where('id', $catid)->first();
    $categories = $category->getDescendantsAndSelf()->lists('id');
    $posts_count = \App\Post::whereIn('category_id', $categories)->whereStatus('publish')->count();
    return $posts_count;
} ?>


