<!-- 3rd party -->
<link rel="stylesheet" href="<?php echo e(staticAsset('frontend/common/css/toastr.css')); ?>">
<!-- 3rd party -->
<?php if($localLang->is_rtl == 1): ?>
    <link rel="stylesheet" href="<?php echo e(staticAsset('frontend/default/assets/css/main-rtl.css')); ?>">
<?php else: ?>
    <link rel="stylesheet" href="<?php echo e(staticAsset('frontend/default/assets/css/main.css')); ?>">
<?php endif; ?>

<link rel="stylesheet" href="<?php echo e(staticAsset('frontend/common/css/select2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(staticAsset('frontend/common/css/custom.css')); ?>">
<link rel="stylesheet" href="<?php echo e(staticAsset('frontend/common/css/summernote-lite.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(staticAsset('frontend/common/css/summernote-custom.css')); ?>">

<style>
    @media (min-width: 1200px) {
        .choose-us-section::after {
            background-image: url(<?php echo e(uploadedAsset(getSetting('halal_why_choose_us_large_img'))); ?>);
        }

        .on-sale-banner {
            background-image: url(<?php echo e(uploadedAsset(getSetting('halal_on_sale_banner'))); ?>);
        }

        .category-cust-ellipsis {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    }
</style>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/inc/css.blade.php ENDPATH**/ ?>