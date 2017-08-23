<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if(session('status')): ?>
    <div class="alert alert-success alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4><i class="icon fa fa-check"></i> Success</h4>
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>