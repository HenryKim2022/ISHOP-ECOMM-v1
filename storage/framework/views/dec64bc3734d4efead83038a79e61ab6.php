<!DOCTYPE html>
<?php
    $locale = str_replace('_', '-', app()->getLocale()) ?? 'en';
    $localLang = \App\Models\Language::where('code', $locale)->first();
    if ($localLang == null) {
        $localLang = \App\Models\Language::where('code', 'en')->first();
    }
?>
<?php if($localLang->is_rtl == 1): ?>
    <html dir="rtl" lang="<?php echo e($locale); ?>" data-bs-theme="dark">
<?php else: ?>
    <html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-bs-theme="dark">
<?php endif; ?>

<head>
    <!--required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <!--meta-->
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?php echo e(getSetting('global_meta_description')); ?>">
    <meta name="keywords" content="<?php echo e(getSetting('global_meta_keywords')); ?>">

    <!--favicon icon-->
    <link rel="icon" href="<?php echo e(uploadedAsset(getSetting('favicon'))); ?>" type="image/png" sizes="16x16">

    <!--title-->
    <title>
        <?php echo $__env->yieldContent('title', getSetting('system_title')); ?>
    </title>

    <?php echo $__env->yieldContent('meta'); ?>

    <?php if(!isset($detailedProduct) && !isset($blog)): ?>
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?php echo e(getSetting('global_meta_title')); ?>" />
        <meta itemprop="description" content="<?php echo e(getSetting('global_meta_description')); ?>" />
        <meta itemprop="image" content="<?php echo e(uploadedAsset(getSetting('global_meta_image'))); ?>" />

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product" />
        <meta name="twitter:site" content="@publisher_handle" />
        <meta name="twitter:title" content="<?php echo e(getSetting('global_meta_title')); ?>" />
        <meta name="twitter:description" content="<?php echo e(getSetting('global_meta_description')); ?>" />
        <meta name="twitter:creator"
            content="@author_handle"/>
    <meta name="twitter:image" content="<?php echo e(uploadedAsset(getSetting('global_meta_image'))); ?>"/>

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e(getSetting('global_meta_title')); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(route('home')); ?>" />
    <meta property="og:image" content="<?php echo e(uploadedAsset(getSetting('global_meta_image'))); ?>" />
    <meta property="og:description" content="<?php echo e(getSetting('global_meta_description')); ?>" />
    <meta property="og:site_name" content="<?php echo e(env('APP_NAME')); ?>" />
    <meta property="fb:app_id" content="<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>">
<?php endif; ?>

    <!-- head-scripts -->
    <?php echo $__env->make('frontend.default.inc.head-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- head-scripts -->

    <!--build:css-->
    <?php echo $__env->make('frontend.default.inc.css', ['localLang' => $localLang], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- endbuild -->

    <!-- PWA  -->
    <meta name="theme-color" content="#6eb356"/>
    <link rel="apple-touch-icon" href="<?php echo e(staticAsset('/pwa.png')); ?>"/>
    <link rel="manifest" href="<?php echo e(staticAsset('/manifest.json')); ?>"/>

    <!-- recaptcha -->
    <?php if(getSetting('enable_recaptcha') == 1): ?>
        <?php echo RecaptchaV3::initJs(); ?>

    <?php endif; ?>
    <!-- recaptcha -->

</head>

<body>

    <?php
        // for visitors to add to cart
        $tempValue = strtotime('now') . rand(10, 1000);
        $theTime = time() + 86400 * 365;
        if (!isset($_COOKIE['guest_user_id'])) {
            setcookie('guest_user_id', $tempValue, $theTime, '/'); // 86400 = 1 day
        }

    ?>

    <!--preloader start-->
    <div id="preloader">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/preloader.gif')); ?>" alt="preloader" class="img-fluid" max-width="180">
    </div>
    <!--preloader end-->

    <!--main content wrapper start-->
    <?php
        $wrapperClass = 'main-wrapper';
        if(getTheme() == "halal" && \Route::is('home')){
            $wrapperClass = 'main-wrapper meat-body clr-scheme clr-scheme--home-five';
        }
    ?>
    <div class="<?php echo e($wrapperClass); ?>">
        <!--header section start-->
        <?php if(isset($exception)): ?>
            <?php if($exception->getStatusCode() != 503): ?>
                <?php echo $__env->make('frontend.default.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php else: ?>
            <?php echo $__env->make('frontend.default.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <!--header section end-->

        <!--breadcrumb section start-->
        <?php echo $__env->yieldContent('breadcrumb'); ?>
        <!--breadcrumb section end-->

        <!--offcanvas menu start-->
        <?php echo $__env->make('frontend.default.inc.offcanvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--offcanvas menu end-->

        <?php echo $__env->yieldContent('contents'); ?>

        <!-- modals -->
        <?php echo $__env->make('frontend.default.pages.partials.products.quickViewModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- modals -->


        <!--footer section start-->
        <?php if(isset($exception)): ?>
            <?php if($exception->getStatusCode() != 503): ?>
                <?php echo $__env->make('frontend.default.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('frontend.default.inc.bottomToolbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php else: ?>
            <?php echo $__env->make('frontend.default.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('frontend.default.inc.bottomToolbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php endif; ?>
        <!--footer section end-->

    </div>


    <!--scroll bottom to top button start-->
    <button class="scroll-top-btn">
        <i class="fa-regular fa-hand-pointer"></i></button>
        <!--scroll bottom to top button end-->

        <!--build:js-->
        <?php echo $__env->make('frontend.default.inc.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--endbuild-->

        <!--page's scripts-->
        <?php echo $__env->yieldContent('scripts'); ?>
        <!--page's script-->

        <!--for pwa-->
        
        <!--for pwa-->

        <!--for pwa-->
        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', function() {
                    navigator.serviceWorker.register('/sw.js').then(function(registration) {
                        console.log('Service Worker registered with scope: ', registration.scope);
                    }).catch(function(error) {
                        console.log('Service Worker registration failed: ', error);
                    });
                });
            }
        </script>
        <!--for pwa-->

        </body>

        </html>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/layouts/master.blade.php ENDPATH**/ ?>