<h4 class="mt-7"><?php echo e(localize('Available Logistics')); ?></h4>
<?php $__empty_1 = true; $__currentLoopData = $logisticZoneCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zoneCity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-3">
        <div class="radio-left d-inline-flex align-items-center">
            <div class="theme-radio">
                <input type="radio" name="chosen_logistic_zone_id" id="logistic-<?php echo e($zoneCity->logistic_zone_id); ?>"
                    value="<?php echo e($zoneCity->logistic_zone_id); ?>">
                <span class="custom-radio"></span>
            </div>
            <div>
                <label for="logistic-<?php echo e($zoneCity->logistic_zone_id); ?>" class="ms-3 mb-0">
                    <div class="h6 mb-0"><?php echo e($zoneCity->logistic->name); ?></div>
                    <div> <?php echo e(localize('Shipping Charge')); ?>

                        <?php echo e(formatPrice($zoneCity->logisticZone->standard_delivery_charge)); ?></div>
                </label>
            </div>
        </div>
        <div class="radio-right text-end">
            <img src="<?php echo e(uploadedAsset($zoneCity->logistic->thumbnail_image)); ?>" alt="<?php echo e($zoneCity->logistic->name); ?>"
                class="img-fluid">
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-12 mt-5">
        <div class="tt-address-content">
            <div class="alert alert-danger text-center">
                <?php echo e(localize('We are not shipping to your city now.')); ?>

            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH G:\laragon\www\resources\views/frontend/default/inc/logistics.blade.php ENDPATH**/ ?>