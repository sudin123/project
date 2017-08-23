<?php $categories = \App\Category::all()->toHierarchy(); ?>
<?php $cities = \App\City::all(); ?>
<div class="col-md-3 col-sm-3">
    <div class="widget widget-searchfrom widget-quick-searchfrom">
        <h2 class="widget-title">Dealers Search</h2>
        <div class="widget-entry">
            <?php echo Form::open(array('route' => 'dealers-search', 'method'=>'GET')); ?>

            <ul>
                <li class="form-group">
                    <?php echo Form::text('d', $search, array('class'=>'form-control', 'placeholder'=>'Search ads...')); ?>

                </li>
                <li>
                    <?php echo Form::submit('Search', array('class'=>'button big')); ?>

                </li>
            </ul>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <div class="widget widget-ad">
        <?php echo $__env->make('googleads.sidebar-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>