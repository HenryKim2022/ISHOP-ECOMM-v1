<div class="quickview-double-slider">
    <?php
        if (!is_null($product->gallery_images)) {
            $galleryImages = explode(',', $product->gallery_images);
        } else {
            $product->thumbnail_image ? $galleryImages[] = $product->thumbnail_image :$galleryImages = [];
        }
    ?>

    <div class="quickview-product-slider swiper">
        <div class="swiper-wrapper">
            <?php $__empty_1 = true; $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="swiper-slide text-center">
                    <img src="<?php echo e(uploadedAsset($galleryImage)); ?>"
                         alt="<?php echo e($product->collectLocalization('name')); ?>"
                         loading="lazy"
                         class="img-fluid-md">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="swiper-slide text-center">
                    <img src="<?php echo e(noImage()); ?>"
                         loading="lazy"
                         alt="No Image"
                         class="img-fluid-md">
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="product-thumbnail-slider swiper mt-80">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="swiper-slide product-thumb-single rounded-2 d-flex align-items-center justify-content-center">
                    <img
                        loading="lazy"
                        src="<?php echo e(uploadedAsset($galleryImage)); ?>?thumb"
                        alt="<?php echo e($product->collectLocalization('name')); ?>"
                        class="img-fluid"
                    />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/partials/products/sliders.blade.php ENDPATH**/ ?>