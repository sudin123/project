<?php $__env->startSection('title'); ?>Edit Ad - Sellnepal@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="post-ads-box clearfix">
                <a class="link home-link" href="<?php echo e(url('/')); ?>">back to home</a>
                <h4 class="text-center title">Edit your Ad</h4>
                <div class="col-md-8 col-md-offset-2">
                    <div class="breadcrumb">
                        <strong>You are here:</strong><strong>You are here:</strong> <?php echo Breadcrumbs::render('edit-ads', $post); ?>

                    </div>
                    <h4 class="text-center">Add Details</h4>
                    <?php echo $__env->make('messages.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(array('route' => 'ad-update',  'method' => 'POST', 'role' => 'form',  'files' => true)); ?>

                    <input type="hidden" name="post_id" value="<?php echo e(\Crypt::encrypt($post->id)); ?>">
                    <?php echo $__env->make('posts.editform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-area'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
            selector:'textarea',
            menubar:false,
            statusbar: false,
        });</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>