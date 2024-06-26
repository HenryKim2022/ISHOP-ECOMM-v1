<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Home')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--hero section start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--hero section end-->

    <!--category section start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--category section end-->

    <!--featured products start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.featuredProducts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--featured products end-->

    <!--trending products start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.trendingProducts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--trending products end-->

    <!--banner section start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.banners', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--banner section end-->

    <!--banner section start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.bestDeals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--banner section end-->

    <!--banner 2 section start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.bannersTwo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--banner 2 section end-->

    <!--feedback section start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.feedback', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--feedback section end-->


    <!--products listing start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--products listing end-->

    <?php if(getSetting('enable_custom_product_section') == 1): ?>
        <!-- start -->
        <?php echo $__env->make('frontend.default.pages.partials.home.customProductsSection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end -->
    <?php endif; ?>

    <!--blog section start-->
    <?php echo $__env->make('frontend.default.pages.partials.home.blogs', ['blogs' => $blogs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--blog section end-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";

        // runs when the document is ready 
        $(document).ready(function() {
            <?php if(\App\Models\Location::where('is_published', 1)->count() > 1): ?>
                notifyMe('info', '<?php echo e(localize('Select your location if not selected')); ?>');
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/home.blade.php ENDPATH**/ ?>