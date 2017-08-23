<?php $__env->startSection('title'); ?>My Wishlists - sellnepal.com@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong> <?php echo Breadcrumbs::render('my-wishlist'); ?>

                </div>
                <?php echo $__env->make('auth.items.member-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="entry">
                    <h2>My Wishlist</h2>
                    <?php if($posts): ?>
                        <div class="table-responsive fancy-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($posts as $post): ?>
                                    <tr>
                                        <td><a target="_blank" href="<?php echo e(url($post->slug)); ?>"><?php echo e(str_limit($post->title, $limit = 80, $end = '...')); ?></a></td>
                                        <td>
                                            <div class="icon-group">
                                                <a href="<?php echo e(route('delete-wishlist', ['postid' => $post->id])); ?>" class="fa fa-trash-o" title="Remove from Wishlist" data-toggle="tooltip"></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php echo e($posts->render()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>