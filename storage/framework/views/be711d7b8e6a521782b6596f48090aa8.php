<div class="horizontal-product-card d-sm-flex align-items-center p-3 bg-white rounded-2 border card-md gap-4">
    <div class="thumbnail position-relative rounded-2">
        <a href="javascript:void(0);"><img src="<?php echo e(uploadedAsset($product->thumbnail_image)); ?>" alt="product"
                class="img-fluid"></a>
        <div
            class="product-overlay position-absolute start-0 top-0 w-100 h-100 d-flex align-items-center justify-content-center gap-1 rounded-2">
            <?php if(isLoggedIn() && isCustomer()): ?>
                <a href="javascript:void(0);" class="rounded-btn fs-xs" onclick="addToWishlist(<?php echo e($product->id); ?>)"><i
                        class="fa-regular fa-heart"></i></a>
            <?php elseif(!isLoggedIn()): ?>
                <a href="javascript:void(0);" class="rounded-btn fs-xs" onclick="addToWishlist(<?php echo e($product->id); ?>)"><i
                        class="fa-regular fa-heart"></i></a>
            <?php endif; ?>

            <a href="javascript:void(0);" class="rounded-btn fs-xs"
                onclick="showProductDetailsModal(<?php echo e($product->id); ?>)"><i class="fa-solid fa-eye"></i></a>

        </div>
    </div>
    <div class="card-content mt-4 mt-sm-0 w-100">
        <a
            href="<?php echo e(route('products.show', $product->slug)); ?>"
            class="fw-bold text-heading title fs-sm tt-line-clamp tt-clamp-1">
            <?php echo e($product->collectLocalization('name')); ?>

        </a>
        <div class="pricing mt-2">
            <?php echo $__env->make('frontend.default.pages.partials.products.pricing', [
                'product' => $product,
                'onlyPrice' => true,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <?php
            $isVariantProduct = 0;
            $stock = 0;
            if ($product->variations()->count() > 1) {
                $isVariantProduct = 1;
            } else {
                $stock = $product->variations[0]->product_variation_stock ? $product->variations[0]->product_variation_stock->stock_qty : 0;
            }
        ?>

        <?php if($isVariantProduct): ?>
            <div class="d-flex justify-content-between align-items-center mt-10">
                <span class="flex-grow-1">
                    <a href="javascript:void(0);" class="fs-xs fw-bold mt-10 d-inline-block explore-btn"
                        onclick="showProductDetailsModal(<?php echo e($product->id); ?>)"><?php echo e(localize('Buy Now')); ?><span
                            class="ms-1"><i class="fa-solid fa-arrow-right"></i></span></a>
                </span>

                <?php if(getSetting('enable_reward_points') == 1): ?>
                    <span class="fs-xxs fw-bold" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="<?php echo e(localize('Reward Points')); ?>">
                        <i class="fas fa-medal"></i> <?php echo e($product->reward_points); ?>

                    </span>
                <?php endif; ?>


            </div>
        <?php else: ?>
            <form action="" class="direct-add-to-cart-form">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" name="product_variation_id" value="<?php echo e($product->variations[0]->id); ?>">
                <input type="hidden" value="1" name="quantity">

                <div class="d-flex justify-content-between align-items-center mt-10">
                    <span class="flex-grow-1">
                        <?php if(!$isVariantProduct && $stock < 1): ?>
                            <a href="javascript:void(0);" class="fs-xs fw-bold d-inline-block explore-btn">
                                <?php echo e(localize('Out of Stock')); ?>

                                <span class="ms-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        <?php else: ?>
                            <a href="javascript:void(0);" onclick="directAddToCartFormSubmit(this)"
                                class="fs-xs fw-bold d-inline-block explore-btn direct-add-to-cart-btn">
                                <span class="add-to-cart-text"><?php echo e(localize('Buy Now')); ?></span>
                                <span class="ms-1"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        <?php endif; ?>
                    </span>

                    <?php if(getSetting('enable_reward_points') == 1): ?>
                        <span class="fs-xxs fw-bold" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="<?php echo e(localize('Reward Points')); ?>">
                            <i class="fas fa-medal"></i> <?php echo e($product->reward_points); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </form>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/partials/products/horizontal-product-card.blade.php ENDPATH**/ ?>