<?php $categories = \App\Category::all()->toHierarchy(); ?>
<?php $cities = \App\City::all(); ?>
<div class="col-md-3 col-sm-3">
    <div class="widget widget-searchfrom">
        <h2 class="widget-title">Quick Search</h2>
        <div class="widget-entry">
            <?php echo Form::open(array('route' => 'search', 'method'=>'GET')); ?>

            <ul>
                <li class="form-group">
                    <?php echo Form::text('q', '', array('class'=>'form-control', 'placeholder'=>'Keyword...')); ?>

                </li>
                <li>
                    <input type="submit" value="Search" class="button big"/>
                </li>
            </ul>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <?php if(count($relatedPosts) >1): ?>
        <div class="widget widget-similar">
            <h2 class="widget-title">Similar Ads</h2>
            <div class="widget-entry">
            <ul>
                <?php foreach($relatedPosts as $post): ?>
                    <li>
                        <figure class="image-holder">
                            <?php $images = $post->gallery; ?>
                                        <?php if($post->get_meta('_featured_image') != 'no-image.png'): ?>
                                        <?php echo HTML::cropimage('uploads/'.$post->get_meta('_featured_image'), $w="260",$h="150", $crop = true, $parms = array()); ?>

                                        <?php elseif(count($images) > 0): ?>
                                        <?php echo HTML::cropimage('uploads/'.$images[0]['filename'], $w="260",$h="150", $crop = true, $parms = array()); ?></a>
                                    <?php else: ?>
                                    <?php echo HTML::cropimage('uploads/no-image.png', $w="260",$h="150", $crop = true, $parms = array()); ?>

                                    <?php endif; ?>
                            <div class="item-meta">
                                        <span class="price">
                                            Rs <?php echo e($post->price); ?>

                                        </span>
                                        <span class="condition">
                                            <?php echo HTML::condition($post->condition); ?>

                                        </span>
                            </div>
                        </figure>
                        <h3 class="post-title"><a href="<?php echo e(url($post->slug)); ?>"><?php echo e($post->title); ?></a></h3>
                    </li>
                <?php endforeach; ?>
            </ul>
            </div>
        </div>
    <?php endif; ?>
<div class="widget widget-ad">
    <?php echo $__env->make('googleads.sidebar-long-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</div>
