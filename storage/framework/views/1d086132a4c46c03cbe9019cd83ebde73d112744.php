<?php $__env->startSection('title'); ?>Create New Ad - Sellnepal@parent <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="main-content">
        <div class="container">
            <div class="post-ads-box clearfix">
                <a class="link home-link" href="<?php echo e(url('/')); ?>">back to home</a>
                <h4 class="text-center title">Place your ad</h4>
                <div class="col-md-8 col-md-offset-2">
                    <div class="breadcrumb">
                        <strong>Selected Category
                            :</strong> <?php $node = \App\Category::findorFail($cat_id); $i = 0; $count = count($node->getAncestorsAndSelf());?>
                        <?php foreach($node->getAncestorsAndSelf() as $cat): ?>
                            <?php echo e($cat->name); ?>

                            <?php if($i < $count-1): ?>
                                /
                            <?php endif; ?>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <a title="Select Category." href="<?php echo e(route('select-category')); ?>" class="go-back">(Change Selected Category)</a>
                    </div>
                    <h4 class="text-center">Add Details</h4>
                    <?php echo $__env->make('messages.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(array('route' => 'create-ad',  'method' => 'POST', 'role' => 'form',  'files' => true)); ?>

                    <input type="hidden" name="cat_id" value="<?php echo e($cat_id); ?>">
                    <?php echo $__env->make('posts.createform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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