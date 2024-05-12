<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Carts')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-contents'); ?>
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center"><?php echo e(localize('Shopping Cart')); ?></h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="<?php echo e(route('home')); ?>"><?php echo e(localize('Home')); ?></a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page"><?php echo e(localize('Carts')); ?></li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--breadcrumb-->
    <?php echo $__env->make('frontend.default.inc.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--breadcrumb-->

    <!--cart section start-->
    <section class="cart-section ptb-120">
        <div class="container">
            <div class="rounded-2 overflow-hidden">
                <table class="cart-table w-100 bg-white">
                    <thead>
                        <th><?php echo e(localize('Image')); ?></th>
                        <th><?php echo e(localize('Product Name')); ?></th>
                        <th><?php echo e(localize('U. Price')); ?></th>
                        <th><?php echo e(localize('Quantity')); ?></th>
                        <th><?php echo e(localize('T. Price')); ?></th>
                        <th><?php echo e(localize('Action')); ?></th>
                    </thead>
                    <tbody class="cart-listing">
                        <!--cart listing-->
                        <?php echo $__env->make('frontend.default.pages.partials.carts.cart-listing', ['carts' => $carts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--cart listing-->
                    </tbody>
                </table>
            </div>
            <div class="row g-4">
                <div class="col-xl-7">
                    <div class="voucher-box py-7 px-5 position-relative z-1 overflow-hidden bg-white rounded mt-4">
                        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/circle-half.png')); ?>"
                            alt="circle shape" class="position-absolute end-0 top-0 z--1">
                        <h4 class="mb-4"><?php echo e(localize('Have a coupon?')); ?></h4>
                        <div class="font-bold mb-2"><?php echo e(localize('Apply coupon to get discount.')); ?></div>

                        <!-- coupon form -->
                        <form class="d-flex align-items-center coupon-form">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                            <input type="text" name="code" placeholder="<?php echo e(localize('Enter Your Coupon Code')); ?>"
                                class="theme-input w-100 coupon-input"
                                <?php if(isset($_COOKIE['coupon_code'])): ?> value="<?php echo e($_COOKIE['coupon_code']); ?>" disabled <?php endif; ?>
                                required>

                            <?php if(isset($_COOKIE['coupon_code'])): ?>
                                <button type="submit"
                                    class="btn btn-secondary flex-shrink-0 apply-coupon-btn d-none px-4"><?php echo e(localize('Apply Coupon')); ?></button>
                                <button type="button" class="btn btn-secondary flex-shrink-0 clear-coupon-btn"><i
                                        class="fas fa-close"></i></button>
                            <?php else: ?>
                                <button type="submit"
                                    class="btn btn-secondary flex-shrink-0 apply-coupon-btn px-4"><?php echo e(localize('Apply Coupon')); ?></button>
                                <button type="button" class="btn btn-secondary flex-shrink-0 clear-coupon-btn d-none"><i
                                        class="fas fa-close"></i></button>
                            <?php endif; ?>
                        </form>
                        <!-- coupon form -->

                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="cart-summery bg-white rounded-2 pt-4 pb-7 px-5 mt-4">
                        <table class="w-100">
                            <tr>
                                <td class="py-3">
                                    <h5 class="mb-0 fw-medium"><?php echo e(localize('Subtotal')); ?></h5>
                                </td>
                                <td class="py-3">
                                    <h5 class="mb-0 text-end sub-total-price">
                                        <?php echo e(formatPrice(getSubTotal($carts, false))); ?></h5>
                                </td>
                            </tr>

                            <tr class="coupon-discount-wrapper <?php echo e(getCoupon() == '' ? 'd-none' : ''); ?>">
                                <td class="py-3">
                                    <h5 class="mb-0 fw-medium"><?php echo e(localize('Coupon Discount')); ?></h5>
                                </td>
                                <td class="py-3">
                                    <h5 class="mb-0 text-end coupon-discount-price">
                                        <?php echo e(formatPrice(getCouponDiscount(getSubTotal($carts, false), getCoupon()))); ?></h5>
                                </td>
                            </tr>

                        </table>
                        <p class="mb-5 mt-2"><?php echo e(localize('Shipping options will be updated during checkout.')); ?></p>
                        <div class="btns-group d-flex flex-wrap gap-3">

                            <a href="<?php echo e(route('home')); ?>"
                                class="btn btn-outline-secondary border-secondary btn-md rounded-1"><?php echo e(localize('Continue Shopping')); ?></a>

                            <a href="<?php echo e(route('checkout.proceed')); ?>" type="submit"
                                class="btn btn-primary btn-md rounded-1"><?php echo e(localize('Checkout')); ?></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--cart section end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/checkout/carts.blade.php ENDPATH**/ ?>