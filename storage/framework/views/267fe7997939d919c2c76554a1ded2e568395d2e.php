<?php $categories = \App\Category::all()->toHierarchy(); ?>
<?php $cities = \App\City::all(); ?>
<div class="col-md-3 col-sm-3">
    <div class="widget widget-searchfrom">
        <h2 class="widget-title">Advance Search</h2>
        <div class="widget-entry">
            <?php echo Form::open(array('route' => 'search', 'method'=>'GET')); ?>

            <ul>
                <li class="form-group">
                    <?php echo Form::text('q', '', array('class'=>'form-control', 'placeholder'=>'Keyword...')); ?>

                </li>
                <li>
                    <select name="city" class="chosen-select">
                        <option value="">All Cities</option>
                        <?php foreach($cities as $ct): ?>
                            <option value="<?php echo e($ct->id); ?>"><?php echo e($ct->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <li>
                    <select name="category" class="chosen-select">
                        <option value="">All Categories</option>
                        <?php foreach($categories as $pcat): ?>
                            <?php if($pcat->isRoot()): ?>
                                <option value="<?php echo e($pcat->id); ?>"><?php echo e($pcat->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </li>
                <li class="half first">
                    <?php echo Form::input('number','pmin', '', array('class'=>'form-control', 'placeholder'=>'MIN Price NRS...')); ?>

                </li>
                <li class="half">
                    <?php echo Form::input('number','pmax', '', array('class'=>'form-control', 'placeholder'=>'MAX Price NRS...')); ?>

                </li>
                <li>
                    <?php echo Form::select('condition', array('' => 'Select Condition', '1' => 'Brand New', '2' => 'Like New (used few times)', '3'=>'Excellent', '4'=>'Good/Fair', '5'=>'Not Working'), '', array('class'=>'chosen-select')); ?>

                </li>

                <li>
                    <input type="submit" value="Search" class="button"/>
                </li>
            </ul>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <div class="widget widget-toplist">
        <h2 class="widget-title">Categories</h2>
        <ul class="cat-list" id="accordion">
            <?php foreach($categories as $node): ?>
                <?php echo e(renderNode($node)); ?>

            <?php endforeach; ?>
        </ul>
    </div>
    <div class="widget widget-ad">
        <?php echo $__env->make('googleads.sidebar-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php
function renderNode($node) { ?>

<?php if($node->getLevel() <= 1): ?>
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
