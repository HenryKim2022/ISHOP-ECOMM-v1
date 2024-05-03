<section class="pt-80 pb-100">
    <div class="container">
        <div class="row justify-content-center justify-content-xl-between g-4">
            <?php if(getSetting('best_selling_banner_link')): ?>
                <div class="col-xl-9">
            <?php else: ?>
                <div class="col-xl-12">                    
            <?php endif; ?>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="product-listing-box bg-white rounded-2">
                            <div class="d-flex align-items-center justify-content-between gap-3 mb-5 flex-wrap">
                                <h4 class="mb-0"><?php echo e(localize('New Products')); ?></h4>
                                <a href="<?php echo e(route('products.index')); ?>"
                                    class="explore-btn text-secondary fw-bold"><?php echo e(localize('View More')); ?><span
                                        class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                            </div>

                            <?php $__currentLoopData = \App\Models\Product::isPublished()->latest()->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3">

                                    <?php echo $__env->make(
                                        'frontend.default.pages.partials.products.horizontal-product-card',
                                        [
                                            'product' => $product,
                                        ]
                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-listing-box bg-white rounded-2">
                            <div class="d-flex align-items-center justify-content-between gap-3 mb-5 flex-wrap">
                                <h4 class="mb-0"><?php echo e(localize('Best Selling')); ?></h4>
                                <a href="<?php echo e(route('products.index')); ?>"
                                    class="explore-btn text-secondary fw-bold"><?php echo e(localize('All Products')); ?><span
                                        class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                            </div>
                            <?php
                                $best_selling_products = getSetting('best_selling_products') != null ? json_decode(getSetting('best_selling_products')) : [];
                                $products = \App\Models\Product::whereIn('id', $best_selling_products)->get();
                            ?>

                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3">
                                    <?php echo $__env->make(
                                        'frontend.default.pages.partials.products.horizontal-product-card',
                                        [
                                            'product' => $product,
                                        ]
                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(getSetting('best_selling_banner_link')): ?>
                <div class="col-xl-3 d-none d-xl-block">
                    <a href="<?php echo e(getSetting('best_selling_banner_link')); ?>" class=""><img
                            src="<?php echo e(uploadedAsset(getSetting('best_selling_banner'))); ?>" alt=""
                            class="img-fluid rounded-2 d-flex flex-column h-100 object-fit-cover"></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/partials/home/products.blade.php ENDPATH**/ ?>