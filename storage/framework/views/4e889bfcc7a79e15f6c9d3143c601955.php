<div class="sidebar-widget py-6 px-4 bg-white rounded-2">
    <div class="widget-title d-flex">
        <h5 class="mb-0 flex-shrink-0"><?php echo e(localize('Order Summery')); ?></h5>
        <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
    </div>
    <table class="sidebar-table w-100 mt-5">
        <tr>
            <td>(+) <?php echo e(localize('Items')); ?>(<?php echo e(count($carts)); ?>):</td>
            <td class="text-end"><?php echo e(formatPrice(getSubTotal($carts, false, '', false))); ?></td>
        </tr>

        <tr>
            <td>(+) <?php echo e(localize('Tax')); ?>:</td>
            <td class="text-end"><?php echo e(formatPrice(getTotalTax($carts))); ?></td>
        </tr>

        <?php if(isset($shippingAmount)): ?>
            <tr>
                <td>(+) <?php echo e(localize('Shipping Charge')); ?>:</td>
                <td class="text-end"><?php echo e(formatPrice($shippingAmount)); ?></td>
            </tr>
        <?php endif; ?>

        <?php
            $is_free_shipping = false;
            if (getCoupon() != '' && getCouponDiscount(getSubTotal($carts, false), getCoupon()) > 0) {
                $coupon = \App\Models\Coupon::where('code', getCoupon())->first();
                if (!is_null($coupon) && $coupon->is_free_shipping == 1) {
                    $is_free_shipping = true;
                }
            }
        ?>

        <?php
            $shipping = 0;
            if (isset($shippingAmount) && $is_free_shipping == false) {
                $shipping = $shippingAmount;
            }
            $total = getSubTotal($carts, false, '', false) + getTotalTax($carts) + $shipping - getCouponDiscount(getSubTotal($carts, false), getCoupon());
        ?>


        <?php if(getCoupon() != ''): ?>

            <?php if(getCouponDiscount(getSubTotal($carts, false), getCoupon()) > 0): ?>
                <tr>
                    <td>(-) <?php echo e(localize('Coupon Discount')); ?>:</td>
                    <td class="text-end"><?php echo e(formatPrice(getCouponDiscount(getSubTotal($carts, false), getCoupon()))); ?>

                    </td>
                </tr>
            <?php endif; ?>

            <?php if($is_free_shipping && isset($shippingAmount)): ?>
                <tr>
                    <td>(-) <?php echo e(localize('Shipping Discount')); ?>:</td>
                    <td class="text-end"><?php echo e(formatPrice($shippingAmount)); ?>

                    </td>
                </tr>
            <?php endif; ?>
        <?php endif; ?>
    </table>

    <span class="sidebar-spacer d-block my-4 opacity-50"></span>

    <div class="d-flex align-items-center justify-content-between">
        <h6 class="mb-0 fs-md"><?php echo e(localize('Total')); ?></h6>
        <h6 class="mb-0 fs-md"><?php echo e(formatPrice($total)); ?></h6>
    </div>

    <span class="sidebar-spacer d-block my-4 opacity-50"></span>

    <div class="label-input-field mt-6">
        <label><?php echo e('Add Tips For Deliveryman?'); ?></label>
        <input type="number" name="tips" value="0" min="0" step="0.001">
    </div>

    <button type="submit" class="btn btn-primary btn-md rounded mt-6 w-100"><?php echo e(localize('Place Order')); ?></button>
</div>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/partials/checkout/orderSummary.blade.php ENDPATH**/ ?>