<ul class="style-list">
        <?php foreach($children as $child): ?>
            <li><a class="categories" href="javascript:void(0);" data-id="<?php echo e($child->id); ?>"><?php echo e($child->name); ?></a></li>
        <?php endforeach; ?>
</ul>