<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta name="description" content="<?php echo $__env->yieldContent('meta_description'); ?>" />
        <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords'); ?>">
        <meta name="robots" content="<?php echo $__env->yieldContent('meta_robots'); ?>">
        <meta name="googlebot" content="<?php echo $__env->yieldContent('googlebot'); ?>">
        <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>" />
        <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description'); ?>" />
        <meta property="og:image" content="http://sellnepal.com/logo.png" />
        <meta name="author" content="sellnepal">

        <!-- FAVICON -->
        <link rel="shortcut icon" href="<?php echo e(url('favicon.ico')); ?>" type="image/x-icon">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Lato:400,700' rel='stylesheet' type='text/css' media="all">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" media="all">
        <!-- STYLE -->
        <link href="<?php echo e(asset('assets/css/bootstrap.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/css/fonts.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/css/superfish.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/owl.carousel.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/chosen.css')); ?>"/>
        <link href="<?php echo e(asset('assets/style.min.css')); ?>" rel="stylesheet" media="all">
        <?php echo $__env->yieldContent('styles'); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="home" class="loading">
        <header id="header">
            <div class="container">
                <div class="header-left">
                <h1><a href="<?php echo e(url('/')); ?>" id="logo">Sell<span>Nepal</span></a></h1>
                    <span class="tagline">Sell or Advertise anything</span>
                </div>
                <div class="header-right">
                    <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse" id="nav-bar">
                        <ul class="main-nav">
                            <li><a href="<?php echo e(route('companies')); ?>">Dealers</a></li>
                        </ul>
                    </nav>
                    <?php if(Auth::guest()): ?>
                    <div class="user-nav">
                        <span class="user-area"><i class="fa fa-lock"></i><a href="<?php echo e(url('login')); ?>" class="link">Login </a> / <a
                                href="<?php echo e(url('register')); ?>" class="link">Register</a></span>
                        <a href="<?php echo e(url('create-ad')); ?>" class="button">place an ad</a>
                    </div>
                    <?php else: ?>
                    <?php $user = Auth::user(); ?>
                    <div class="user-nav">
                        <div class="logined">
                            <?php if(\Auth::user()->hasRole('vendor')): ?>
                                <?php if($user->profile->company_name != ''): ?>
                                    <a href="javascript:void(0);" class="user-name"> <?php echo e(str_limit($user->profile->company_name, $limit = 10, $end = '...')); ?></a>
                                <?php else: ?>
                                    <a href="javascript:void(0);" class="user-name">Hello User!</a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="javascript:void(0);" class="user-name"><?php echo e($user->firstname); ?></a>
                            <?php endif; ?>
                            <ul class="user-link">
                                <?php if(\Auth::user()->hasRole('administrator')): ?>
                                    <li><a href="<?php echo e(route('my-ads')); ?>">All Ads</a></li>
                                    <li><a href="<?php echo e(route('change-password')); ?>">Change Password</a></li>
                                    <li><a href="<?php echo e(url('logout')); ?>">Logout</a></li>
                                <?php else: ?>
                                <li><a href="<?php echo e(route('member-area')); ?>">Member Area</a></li>
                                <li><a href="<?php echo e(route('my-ads')); ?>">My Ads</a></li>
                                <li><a href="<?php echo e(route('my-wishlist')); ?>">My Wishlists</a></li>
                                <?php if(\Auth::user()->hasRole('vendor')): ?>
                                <li><a href="<?php echo e(route('edit-company-profile')); ?>">Company Profile</a></li>
                                <?php else: ?>
                                <li><a href="<?php echo e(route('my-profile')); ?>">My Profile</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo e(route('change-password')); ?>">Change Password</a></li>
                                <li><a href="<?php echo e(url('logout')); ?>">Logout</a></li>
                            <?php endif; ?>
                            </ul>
                        </div>
                        <a href="<?php echo e(route('select-category')); ?>" class="button">place an ad</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </header>