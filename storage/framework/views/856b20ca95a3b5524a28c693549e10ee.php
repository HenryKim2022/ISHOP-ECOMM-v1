<!DOCTYPE html>

<?php
    $locale = str_replace('_', '-', app()->getLocale()) ?? 'en';
    $localLang = \App\Models\Language::where('code', $locale)->first();
    if ($localLang == null) {
        $localLang = \App\Models\Language::where('code', 'en')->first();
    }
?>

<?php if($localLang->is_rtl == 1): ?>
    <html dir="rtl" lang="<?php echo e($locale); ?>" data-bs-theme="light">
<?php else: ?>
    <html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-bs-theme="light">
<?php endif; ?>


<head>
    <!--required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!--favicon icon-->
    <link rel="icon" href="<?php echo e(staticAsset('frontend/default/assets/img/favicon.png')); ?>" type="image/png"
        sizes="16x16">

    <!--title-->
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>

    <!--build:css-->
    <?php echo $__env->make('frontend.default.inc.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- endbuild -->

    <!-- recaptcha -->
    <?php if(getSetting('enable_recaptcha') == 1): ?>
        <?php echo RecaptchaV3::initJs(); ?>

    <?php endif; ?>
    <!-- recaptcha -->

</head>

<body>

    <!--preloader start-->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!--preloader end-->

    <!--main content wrapper start-->
    <div class="main-wrapper">

        <?php echo $__env->yieldContent('contents'); ?>

    </div>


    <!-- scripts -->
    <?php echo $__env->yieldContent('scripts'); ?>

    <!--build:js-->
    <?php echo $__env->make('frontend.default.inc.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--endbuild-->
</body>

</html>
<?php /**PATH G:\laragon\www\resources\views/layouts/auth.blade.php ENDPATH**/ ?>