<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Checkout')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-contents'); ?>
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center"><?php echo e(localize('Check Out')); ?></h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="<?php echo e(route('home')); ?>"><?php echo e(localize('Home')); ?></a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page"><?php echo e(localize('Checkout')); ?></li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--breadcrumb-->
    <?php echo $__env->make('frontend.default.inc.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--breadcrumb-->

    <!--checkout form start-->
    <form class="checkout-form" action="<?php echo e(route('checkout.complete')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="checkout-section ptb-120">
            <div class="container">
                <div class="row g-4">
                    <!-- form data -->
                    <div class="col-xl-8">
                        <div class="checkout-steps">
                            <!-- shipping address -->
                            <div class="d-flex justify-content-between">
                                <h4 class="mb-3"><?php echo e(localize('Shipping Address')); ?></h4>
                                <a href="javascript:void(0);" onclick="addNewAddress()" class="fw-semibold"><i
                                        class="fas fa-plus me-1"></i> <?php echo e(localize('Add Address')); ?></a>
                            </div>
                            <div class="row g-4">
                                <?php $__empty_1 = true; $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="tt-address-content">
                                            <input type="radio" class="tt-custom-radio" name="shipping_address_id"
                                                id="shipping-<?php echo e($address->id); ?>" value="<?php echo e($address->id); ?>"
                                                onchange="getLogistics(<?php echo e($address->city_id); ?>)"
                                                <?php if($address->is_default): ?> checked <?php endif; ?>
                                                data-city_id="<?php echo e($address->city_id); ?>">

                                            <label for="shipping-<?php echo e($address->id); ?>"
                                                class="tt-address-info bg-white rounded p-4 position-relative">
                                                <!-- address -->
                                                <?php echo $__env->make('frontend.default.inc.address', [
                                                    'address' => $address,
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <!-- address -->
                                                <a href="javascript:void(0);" onclick="editAddress(<?php echo e($address->id); ?>)"
                                                    class="tt-edit-address checkout-radio-link position-absolute"><?php echo e(localize('Edit')); ?></a>
                                            </label>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="col-12 mt-5">
                                        <div class="tt-address-content">
                                            <div class="alert alert-secondary text-center">
                                                <?php echo e(localize('Add your address to checkout')); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- shipping address -->

                            <!-- checkout-logistics -->
                            <div class="checkout-logistics"></div>
                            <!-- checkout-logistics -->

                            <!-- billing address -->
                            <?php if(count($addresses) > 0): ?>
                                <h4 class="mb-3 mt-7"><?php echo e(localize('Billing Address')); ?></h4>
                                <div class="row g-4">
                                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="tt-address-content">
                                                <input type="radio" class="tt-custom-radio" name="billing_address_id"
                                                    id="billing-<?php echo e($address->id); ?>" value="<?php echo e($address->id); ?>"
                                                    <?php if($address->is_default): ?> checked <?php endif; ?>>

                                                <label for="billing-<?php echo e($address->id); ?>"
                                                    class="tt-address-info bg-white rounded p-4 position-relative">
                                                    <!-- address -->
                                                    <?php echo $__env->make('frontend.default.inc.address', [
                                                        'address' => $address,
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <!-- address -->
                                                    <a href="javascript:void(0);"
                                                        onclick="editAddress(<?php echo e($address->id); ?>)"
                                                        class="tt-edit-address checkout-radio-link position-absolute"><?php echo e(localize('Edit')); ?></a>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <!-- billing address -->

                            <!-- Delivery Time -->
                            <h4 class="mt-7 mb-3"><?php echo e(localize('Preferred Delivery Time')); ?></h4>
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="tt-address-content">
                                        <input type="radio" class="tt-custom-radio" name="shipping_delivery_type"
                                            id="regular-shipping" value="regular" checked>
                                        <label for="regular-shipping"
                                            class="tt-address-info bg-white rounded p-4 position-relative">
                                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                <span class=""><i class="fas fa-truck me-1"></i>
                                                    <?php echo e(localize('Regular Delivery')); ?>

                                                </span>
                                                <p class="mb-0 fs-sm">
                                                    <?php echo e(localize('We will deliver your products soon.')); ?>

                                                </p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <?php if(getSetting('enable_scheduled_order') == 1): ?>
                                    <div class="col-12">
                                        <div class="tt-address-content">
                                            <input type="radio" class="tt-custom-radio" name="shipping_delivery_type"
                                                id="scheduled-shipping" value="scheduled">

                                            <label for="scheduled-shipping"
                                                class="tt-address-info bg-white rounded p-4 position-relative">
                                                <div class="row flex-wrap justify-content-between align-items-center">
                                                    <div class="col-12 col-md-4 mb-2 mb-md-0">
                                                        <i class="fas fa-clock me-1"></i>
                                                        <?php echo e(localize('Scheduled Delivery')); ?>

                                                    </div>

                                                    <div
                                                        class="col-auto d-flex flex-grow-1 align-items-center justify-content-between">

                                                        <?php
                                                            $date = date('Y-m-d');
                                                            $dateCount = 7;
                                                            if (getSetting('allowed_order_days') != null) {
                                                                $dateCount = getSetting('allowed_order_days');
                                                            }
                                                        ?>

                                                        <select class="form-select py-1 me-3" name="scheduled_date">
                                                            <?php for($i = 1; $i <= $dateCount; $i++): ?>
                                                                <?php
                                                                    $addDay = strtotime($date . '+' . $i . ' days');
                                                                ?>
                                                                <option
                                                                    value="<?php echo e(strtotime($date . '+' . $i . ' days')); ?>">
                                                                    <?php echo e(date('d F', $addDay)); ?></option>
                                                            <?php endfor; ?>
                                                        </select>

                                                        <?php
                                                            $timeSlots = \App\Models\ScheduledDeliveryTimeList::orderBy('sorting_order', 'ASC')->get();
                                                        ?>

                                                        <select class="form-select py-1" name="timeslot">
                                                            <?php $__currentLoopData = $timeSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($slot->id); ?>">
                                                                    <?php echo e($slot->timeline); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <!-- Delivery Time -->

                            </div>

                            <!-- personal information -->
                            <h4 class="mt-7"><?php echo e(localize('Personal Information')); ?></h4>
                            <div class="checkout-form mt-3 p-5 bg-white rounded-2">
                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label><?php echo e(localize('Phone')); ?></label>
                                            <input type="text" name="phone"
                                                placeholder="<?php echo e(localize('Phone Number')); ?>" value="<?php echo e($user->phone); ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label><?php echo e(localize('Alternative Phone')); ?></label>
                                            <input type="text" name="alternative_phone"
                                                placeholder="<?php echo e(localize('Your Alternative Phone')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="label-input-field">
                                            <label><?php echo e(localize('Additional Info')); ?></label>
                                            <textarea rows="3" type="text" name="additional_info"
                                                placeholder="<?php echo e(localize('Type your additional informations here')); ?>"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- personal information -->

                            <!-- payment methods -->
                            <h4 class="mt-7"><?php echo e(localize('Payment Method')); ?></h4>
                            <?php echo $__env->make('frontend.default.pages.checkout.inc.paymentMethods', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- payment methods -->
                        </div>
                    </div>
                    <!-- form data -->

                    <!-- order summary -->
                    <div class="col-xl-4">
                        <div class="checkout-sidebar">
                            <?php echo $__env->make('frontend.default.pages.partials.checkout.orderSummary', [
                                'carts' => $carts,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <!-- order summary -->
                </div>
            </div>
        </div>
    </form>
    <!--checkout form end-->


    <!--add address modal start-->
    <?php echo $__env->make('frontend.default.inc.addressForm', ['countries' => $countries], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--add address modal end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/checkout/checkout.blade.php ENDPATH**/ ?>