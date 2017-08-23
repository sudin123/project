<ul class="tabs clearfix">
    <?php if(\Auth::user()->hasRole('administrator')): ?>
        <li <?php if(Request::segment(2) == 'my-ads'): ?> class="active" <?php endif; ?> ><a href="<?php echo e(route('my-ads')); ?>">All Ads</a></li>
        <li <?php if(Request::segment(2) == 'change-password'): ?> class="active" <?php endif; ?> ><a
                    href="<?php echo e(route('change-password')); ?>">Change
                Password</a></li>
    <?php else: ?>
        <?php $urlArray = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $segments = explode('/', $urlArray); ?>
        <li <?php if(Request::segment(1) == 'member-area' && count($segments) == 2 ): ?> class="active" <?php endif; ?> ><a
                    href="<?php echo e(route('member-area')); ?>">Member Area</a></li>
        <li <?php if(Request::segment(2) == 'my-ads'): ?> class="active" <?php endif; ?> ><a href="<?php echo e(route('my-ads')); ?>">My Ads</a></li>
        <li <?php if(Request::segment(2) == 'my-wishlist'): ?> class="active" <?php endif; ?> ><a href="<?php echo e(route('my-wishlist')); ?>">My
                Wishlist</a></li>
        <?php if(\Auth::user()->hasRole('vendor')): ?>
            <li <?php if(Request::segment(2) == 'company-profile'): ?> class="active" <?php endif; ?> ><a
                        href="<?php echo e(route('edit-company-profile')); ?>">Company Profile</a></li>
        <?php else: ?>
            <li <?php if(Request::segment(2) == 'my-profile'): ?> class="active" <?php endif; ?> ><a href="<?php echo e(route('my-profile')); ?>">My
                    Profile</a></li>
        <?php endif; ?>
        <li <?php if(Request::segment(2) == 'change-password'): ?> class="active" <?php endif; ?> ><a
                    href="<?php echo e(route('change-password')); ?>">Change
                Password</a></li>
    <?php endif; ?>
</ul>