<?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td class="h-100px">
            <img src="<?php echo e(uploadedAsset($cart->product_variation->product->thumbnail_image)); ?>"
                alt="<?php echo e($cart->product_variation->product->collectLocalization('name')); ?>" class="img-fluid"
                width="100">
        </td>
        <td class="text-start product-title">
            <h6 class="mb-0"><?php echo e($cart->product_variation->product->collectLocalization('name')); ?>

            </h6>
            <?php $__currentLoopData = generateVariationOptions($cart->product_variation->combinations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="fs-xs">
                    <?php echo e($variation['name']); ?>:
                    <?php $__currentLoopData = $variation['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($value['name']); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$loop->last): ?>
                        ,
                    <?php endif; ?>
                </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td>
            <span class="text-dark fw-bold me-2 d-lg-none"><?php echo e(localize('Unit Price')); ?>:</span>
            <span class="text-dark fw-bold">
                <?php echo e(formatPrice(variationDiscountedPrice($cart->product_variation->product, $cart->product_variation))); ?>

            </span>
        </td>

        <td>
            <div class="product-qty d-inline-flex align-items-center">
                <button class="decrese" onclick="handleCartItem('decrease',<?php echo e($cart->id); ?>)">-</button>
                <input type="text" readonly value="<?php echo e($cart->qty); ?>">
                <button class="increase" onclick="handleCartItem('increase', <?php echo e($cart->id); ?>)">+</button>
            </div>
        </td>

        <td>
            <span class="text-dark fw-bold me-2 d-lg-none"><?php echo e(localize('Total Price')); ?>:</span>
            <span class="text-dark fw-bold">
                <?php echo e(formatPrice(variationDiscountedPrice($cart->product_variation->product, $cart->product_variation) * $cart->qty)); ?>

            </span>
        </td>
        <td>
            <span class="text-dark fw-bold me-2 d-lg-none"><?php echo e(localize('Delete')); ?>:</span>
            <span class="text-dark fw-bold"><button type="button" class="close-btn ms-3"
                    onclick="handleCartItem('delete', <?php echo e($cart->id); ?>)"><i
                        class="fas fa-close"></i></button></span>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td colspan="6" class="py-4"><?php echo e(localize('No data found')); ?></td>
    </tr>
<?php endif; ?>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/partials/carts/cart-listing.blade.php ENDPATH**/ ?>