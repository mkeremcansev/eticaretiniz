<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="<?php echo e(setting('title')); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title><?php echo e(setting('title')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet"> 
    <link rel="icon" href="<?php echo e(asset(setting('favicon'))); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('web/fonts/flaticon/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/fonts/icofont/icofont.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/fonts/fontawesome/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/vendor/venobox/venobox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/vendor/slickslider/slick.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/vendor/niceselect/nice-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/vendor/bootstrap/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/home-category.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/product-details.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/user-auth.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/profile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/orderlist.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/error.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/story/demo/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/story/dist/zuck.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/story/dist/skins/snapgram.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/marquee.css')); ?>">
    <?php echo $__env->make('web.layouts.style.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
    <?php echo $__env->make('web.layouts.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal fade" id="shopping_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal" id="shopping_modal_button"><i class="icofont-close"></i></button>
                <img class="img-fluid  rounded" src="<?php echo e(asset(setting('popup'))); ?>" alt="<?php echo e(setting('title')); ?>">
            </div>
        </div>
    </div>
    <div class="backdrop"></div>
    <a class="backtop fas fa-arrow-up" href="#"></a>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mobile-currency">
                    <p class="text-white">
                        <span class="usd"></span>
                        <span class="eur"></span>
                    </p>
                </div>
                <div class="col-lg-6 mobile-social custom-text-align-right">
                    <a class="text-white custom-margin-right-0-5" href="<?php echo e(setting('facebook')); ?>"><i class="icofont-facebook"></i></a>
                    <a class="text-white custom-margin-right-0-5" href="<?php echo e(setting('twitter')); ?>"><i class="icofont-twitter"></i></a>
                    <a class="text-white custom-margin-right-0-5" href="<?php echo e(setting('instagram')); ?>"><i class="icofont-instagram"></i></a>
                    <a class="text-white custom-margin-right-0-5" href="mailto:<?php echo e(setting('mail')); ?>"><i class="fas fa-envelope"></i></a>
                    <a class="text-white" href="tel:<?php echo e(setting('phone')); ?>"><i class="icofont-phone"></i></a>
                </div>
            </div>
        </div>
    </div>
    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-media-group">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('web.account.index')); ?>" class="header-user">
                            <i class="fa fa-user"></i>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('web.user.login.index')); ?>" class="header-user">
                            <i class="fa fa-user"></i>
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('web.index')); ?>">
                        <img src="<?php echo e(asset(setting('logo'))); ?>" alt="<?php echo e(setting('title')); ?>">
                    </a>
                    <button class="header-src"><i class="fas fa-search"></i>
                    </button>
                </div>
                <a href="<?php echo e(route('web.index')); ?>" class="header-logo">
                    <img src="<?php echo e(asset(setting('logo'))); ?>" alt="<?php echo e(setting('title')); ?>">
                </a>
                <?php if(auth()->guard()->check()): ?>
                    <div class="header-widget-group">
                        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                        <a href="<?php echo e(route('panel.index')); ?>" class="header-widget" title="<?php echo app('translator')->get('words.admin_panel'); ?>">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('web.account.index')); ?>" class="header-widget" title="<?php echo app('translator')->get('words.my_account'); ?>">
                            <i class="fa fa-user"></i>
                        </a>
                        <a href="<?php echo e(route('web.account.logout.store')); ?>" class="header-widget" title="<?php echo app('translator')->get('words.logout'); ?>">
                            <i class="fa fa-sign-out-alt"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('web.user.login.index')); ?>" class="header-widget" title="<?php echo app('translator')->get('words.login'); ?>">
                        <i class="fa fa-user"></i>
                    </a>
                <?php endif; ?>
                
                <form class="header-form" id="realtime-search-submit" method="GET" action="<?php echo e(route('web.search.products.store')); ?>">
                    <input type="text" name="search" id="search_input_typing" autocomplete="off" placeholder="">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <div class="header-widget-group">
                    <button class="header-widget header-wish">
                        <i class="fas fa-heart"></i>
                        <sup><?php echo e(Cart::instance('wishlist')->content()->count()); ?></sup>
                    </button>
                    <button class="header-widget header-cart">
                        <i class="fas fa-shopping-basket"></i>
                        <sup><?php echo e(Cart::instance('cart')->content()->count()); ?></sup>
                        <span><?php echo app('translator')->get('words.total_price'); ?><small><?php echo e(getMoneyOrderShoppingCart(Cart::instance('cart')->subtotal())); ?></small></span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <?php echo $__env->make('web.layouts.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.layouts.menu.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.layouts.menu.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.layouts.menu.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.layouts.menu.wish', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('web.layouts.menu.mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eticaretim\resources\views/web/layouts/header.blade.php ENDPATH**/ ?>