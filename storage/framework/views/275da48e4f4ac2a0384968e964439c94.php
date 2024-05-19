<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Customer Addresses')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="my-account pt-6 pb-120">
        <div class="container">

            <?php echo $__env->make('frontend.default.pages.users.partials.customerHero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row g-4">
                <div class="col-xl-3">
                    <?php echo $__env->make('frontend.default.pages.users.partials.customerSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-xl-9">
                    <div class="address-book bg-white rounded p-5">

                        <div class="d-flex justify-content-between">
                            <h4 class="mb-5"><?php echo e(localize('Address Book')); ?></h4>
                            <a href="javascript:void(0);" onclick="addNewAddress()" class="fw-semibold"><i
                                    class="fas fa-plus me-1"></i> <?php echo e(localize('Add Address')); ?></a>
                        </div>
                        <div class="row g-4">
                            <?php $__empty_1 = true; $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-6">
                                    <div
                                        class="tt-address-content border p-3 rounded address-book-content pe-md-4 position-relative">
                                        <div class="address tt-address-info pt-10 position-relative">
                                            <!-- address -->
                                            <?php echo $__env->make('frontend.default.inc.address', [
                                                'address' => $address,
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <!-- address -->

                                            <div class="tt-edit-address position-absolute">
                                                <a href="javascript:void(0);" onclick="editAddress(<?php echo e($address->id); ?>)"
                                                    class="pe-1"><?php echo e(localize('Edit')); ?></a>

                                                <a href="javascript:void(0);"
                                                    data-url="<?php echo e(route('address.delete', $address->id)); ?>"
                                                    onclick="deleteAddress(this)"
                                                    class="text-danger"><?php echo e(localize('Delete')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--add address modal start-->
        <?php echo $__env->make('frontend.default.inc.addressForm', ['countries' => $countries], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--add address modal end-->

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/users/address.blade.php ENDPATH**/ ?>