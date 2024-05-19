<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Customer Dashboard')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

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
                    <div class="recent-orders bg-white rounded py-5">
                        <h6 class="mb-4 px-4"><?php echo e(localize('Recent Orders')); ?></h6>
                        <?php
                            $recentOrders = \App\Models\Order::where('user_id', auth()->user()->id)
                                ->latest()
                                ->take(5)
                                ->get();
                        ?>
                        <div class="table-responsive">
                            <table class="order-history-table table">
                                <tbody>
                                    <tr>
                                        <th><?php echo e(localize('Order Code')); ?></th>
                                        <th><?php echo e(localize('Placed on')); ?></th>
                                        <th><?php echo e(localize('Items')); ?></th>
                                        <th><?php echo e(localize('Total')); ?></th>
                                        <th><?php echo e(localize('Status')); ?></th>
                                        <th class="text-center"><?php echo e(localize('Action')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(getSetting('order_code_prefix')); ?><?php echo e($recentOrder->orderGroup->order_code); ?>

                                            </td>
                                            <td><?php echo e(date('d M, Y', strtotime($recentOrder->created_at))); ?></td>
                                            <td><?php echo e($recentOrder->orderItems()->count()); ?></td>
                                            <td class="text-secondary">
                                                <?php echo e(formatPrice($recentOrder->orderGroup->grand_total_amount)); ?></td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    <?php echo e(ucwords(str_replace('_', ' ', $recentOrder->delivery_status))); ?>

                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo e(route('customers.trackOrder')); ?>?code=<?php echo e($recentOrder->orderGroup->order_code); ?>"
                                                    class="view-invoice fs-xs me-2" target="_blank" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-title="<?php echo e(localize('Track My Order')); ?>"><i
                                                        class="fas fa-truck text-dark"></i></a>

                                                <a href="<?php echo e(route('checkout.invoice', $recentOrder->orderGroup->order_code)); ?>"
                                                    class="view-invoice fs-xs" target="_blank" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-title="<?php echo e(localize('View Details')); ?>"><i
                                                        class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\resources\views/frontend/default/pages/users/dashboard.blade.php ENDPATH**/ ?>