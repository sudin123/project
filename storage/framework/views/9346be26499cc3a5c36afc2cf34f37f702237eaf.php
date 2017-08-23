
<?php $__env->startSection('title'); ?><?php echo e($category->name); ?> - buy or sell new & used item in Nepal - Sellnepal@parent <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('helper.macros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('meta_description'); ?><?php echo HTML::catdesc($category->id); ?>@parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_keywords'); ?> <?php echo HTML::catkey($category->id); ?> @parent  <?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_robots'); ?>index follow@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('googlebot'); ?>index follow@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="main-content">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('sidebar-category', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-md-9 col-sm-9">
                <div class="google-ad">
                    <?php echo $__env->make('googleads.banner-ad', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="content ">
                    <div class="sec-title filter-option clearfix">
                        <h2>Ads in <strong><?php echo e($category->name); ?></strong></h2>
                        <ul class="sort-option clearfix ">
                            <li class="dropdown-parent"><a class="dropdown-toggle" href="javascript:void(0)">Sort by: <?php if($price): ?><?php echo HTML::pricesort($price); ?> <?php endif; ?> <?php if($order): ?><?php echo HTML::ordersort($order); ?> <?php endif; ?> <?php if(empty($price) && empty($order)): ?> Recent Ads <?php endif; ?></a>
                                <div class="dropdown-menu pointer sort-price"> 
                                    <ul class="disc-list">
                                        <li><a href="?price=high">Price High to Low</a></li>
                                        <li><a href="?price=low">Price Low to High</a></li>
                                        <li><a href="?order=popular">Popular Posts First</a></li>
                                        <li><a href="?order=older">Older Posts First</a></li>
                                        <li><a href="<?php echo e(Request::url()); ?>">Recent Ads</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="content-entry">
                        <ul class="post-listing">
                            <?php foreach($posts as $post): ?>
                            <li class="post clearfix">
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
                                <div class="entry clearfix">
                                    <h4><a href="<?php echo e(url($post->slug)); ?>"> <?php echo e($post->title); ?></a></h4>
                                    <p>
                                        <?php echo e(strip_tags(str_limit($post->content, $limit = 150, $end = '...'))); ?>

                                    </p>
                                    <div class="meta clearfix">
                                        <strong>Published:</strong> <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()); ?><br>
                                        <strong>Seller:</strong> <?php if($post->user->hasRole('vendor')): ?>
                                        <a href="<?php echo e(url('dealers/'.$post->user->username)); ?>"><?php echo e($post->user->profile->company_name); ?></a>
                                        <?php else: ?>
                                        <a href="<?php echo e(url('dealers/'.$post->user->username)); ?>"><?php echo e($post->user->firstname); ?> <?php echo e($post->user->lastname); ?></a>
                                        <?php endif; ?><br>
                                        <strong>Is
                                            Negotiable:</strong> <?php echo HTML::negotiable($post->is_negotiable); ?>

                                        <br>
                                        <strong>Warranty:</strong> <?php echo HTML::warranty($post->get_meta('_warranty_type')); ?>

                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php echo e($posts->appends(array('price' => $price, 'order'=> $order))->links()); ?>

                    </div>
                </div>
                <div class="google-ad">
                    <?php echo $__env->make('googleads.banner-ad-2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('extra-area'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>