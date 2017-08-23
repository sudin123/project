<?php $__env->startSection('title'); ?>My Ads - sellnepal.com@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="box">
                <div class="breadcrumb">
                    <strong>You are here:</strong> <?php echo Breadcrumbs::render('my-ads'); ?>

                </div>
                <?php echo $__env->make('auth.items.member-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="entry">
                    <h2>My Ads</h2>
                    <?php echo $__env->make('messages.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php if($posts): ?>
                        <div class="table-responsive fancy-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Ad Views</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($posts as $post): ?>
                                    <tr>
                                        <td><a target="_blank"
                                               href="<?php echo e(url($post->slug)); ?>"><?php echo e(str_limit($post->title, $limit = 80, $end = '...')); ?></a><?php if($post->status=='sold'): ?>
                                                <a href="javascript:void(0);" class="fa fa-check-circle-o item-sold"
                                                   title="Item is sold" data-toggle="tooltip"></a>
                                            <?php endif; ?></td>
                                        <td><?php echo e($post->created_at); ?></td>
                                        <td><span class="higlight"><?php echo e($post->view_count); ?></span> times</td>
                                        <td>
                                            <div class="icon-group">
                                                <?php if(\Auth::user()->hasRole('administrator')): ?>
                                                    <?php if($post->is_featured==1): ?>
                                                    <a href="<?php echo e(route('mark-notfeatured', $post->id)); ?>"
                                                       class="fa fa-star" title="UnMark as Featured"
                                                       data-toggle="tooltip"></a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('mark-featured', $post->id)); ?>"
                                                           class="fa fa-star-o" title="Mark as Featured"
                                                           data-toggle="tooltip"></a>
                                                    <?php endif; ?>
                                                    <?php if($post->status=='publish'): ?>
                                                        <a href="<?php echo e(route('mark-sold', $post->id)); ?>"
                                                           class="fa fa-upload" title="Mark as sold"
                                                           data-toggle="tooltip"></a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('mark-publish', $post->id)); ?>"
                                                           class="fa fa-check-circle-o item-sold"
                                                           title="Mark as publish" data-toggle="tooltip"></a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('add-images', $post->id)); ?>"
                                                       class="fa fa-picture-o" title="Update Gallery"
                                                       data-toggle="tooltip"></a>
                                                    <?php if($post->status=='publish'): ?>
                                                        <a href="<?php echo e(route('mark-sold', $post->id)); ?>"
                                                           class="fa fa-upload" title="Mark as sold"
                                                           data-toggle="tooltip"></a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('mark-publish', $post->id)); ?>"
                                                           class="fa fa-check-circle-o item-sold"
                                                           title="Mark as publish" data-toggle="tooltip"></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('ad-edit', $post->id)); ?>" class="fa fa-edit"
                                                       title="Edit Ad." data-toggle="tooltip"></a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(route('ad-delete', $post->id)); ?>"
                                                   class="fa fa-trash-o delete-item" title="Delete Ad."
                                                   data-toggle="tooltip"></a>
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
    <script src="<?php echo e(asset('assets/js/bootbox.js')); ?>"></script>
    <script>
        $('.icon-group').on('click', '.delete-item', function (e) {
            e.preventDefault();
            var ad_delete_link = $(this).attr('href'); // get value post you want delete
            bootbox.dialog({
                title: 'Delete Confirm',
                message: 'Are you sure delete this Ad?',
                className: 'my-class',
                buttons: {
                    cancel: {
                        className: 'btn btn-danger',
                        label: 'Close'
                    },
                    success: {
                        className: 'btn btn-success',
                        label: 'Delete',
                        callback: function () {
                            location.href = ad_delete_link;
                        }
                    }
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>