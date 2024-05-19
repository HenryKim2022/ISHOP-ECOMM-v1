<!--COD-->

<?php if(getSetting('enable_cod') == 1): ?>
    <div class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-3">
        <div class="radio-left d-inline-flex align-items-center">
            <div class="theme-radio">
                <input type="radio" name="payment_method" id="cod" value="cod" required>
                <span class="custom-radio"></span>
            </div>
            <label for="cod" class="ms-2 h6 mb-0"><?php echo e(localize('Cash on delivery')); ?>

                (<?php echo e(localize('COD')); ?>)</label>
        </div>
        <div class="radio-right text-end">
            <img src="<?php echo e(staticAsset('frontend/pg/cod.svg')); ?>" alt="cod" class="img-fluid">
        </div>
    </div>
<?php endif; ?>

<!--wallet-->
<?php if(getSetting('enable_wallet_checkout') == 1): ?>
    <div class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-3">
        <div class="radio-left d-inline-flex align-items-center">
            <div class="theme-radio">
                <input type="radio" name="payment_method" id="wallet" value="wallet" required>
                <span class="custom-radio"></span>
            </div>
            <label for="wallet" class="ms-2 h6 mb-0"><?php echo e(localize('Wallet Payment')); ?>

                <small>(<?php echo e(localize('Balance')); ?>:
                    <?php echo e(formatPrice(auth()->user()->user_balance)); ?>)</small></label>
        </div>
        <div class="radio-right text-end">
            <img src="<?php echo e(staticAsset('frontend/pg/wallet.svg')); ?>" alt="wallet" class="img-fluid">
        </div>
    </div>
<?php endif; ?>

<!--Paypal-->
<?php if(isset($activeGateways)): ?>
    <?php $__currentLoopData = $activeGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-3">
            <div class="radio-left d-inline-flex align-items-center">
                <div class="theme-radio">
                    <input type="radio" name="payment_method" id="<?php echo e($gateway->gateway); ?>" value="<?php echo e($gateway->gateway); ?>" required>
                    <span class="custom-radio"></span>
                </div>
                <label for="<?php echo e($gateway->gateway); ?>" class="ms-2 h6 mb-0"><?php echo e(localize('Pay with ')); ?> <?php echo e(ucfirst($gateway->gateway)); ?></label>
            </div>
            <div class="radio-right text-end">
                <img src="<?php echo e(asset($gateway->image)); ?>" alt="<?php echo e($gateway->gateway); ?>" class="img-fluid">
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/checkout/inc/paymentMethods.blade.php ENDPATH**/ ?>